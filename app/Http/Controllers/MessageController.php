<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function saveMessage(Request $request)
    {
        $user = Auth::user();

        // Vérifiez si la conversation existe déjà
        $existingConversation = Conversation::where('projets_id', $request->input('projet_id'))->first();

        if (!$existingConversation) {
            // Créez une nouvelle conversation
            $conversation = new Conversation();
            $conversation->projets_id = $request->input('projet_id');
            $conversation->titre = 'Conversation liée au projet';
            $conversation->save();
        } else {
            $conversation = $existingConversation;
        }

        // Enregistrez le message dans la conversation
        $message = new Message();
        $message->users_id = $user->id;
        $message->conversations_id = $conversation->id;
        $message->message = $request->input('message');
        $message->save();

        // Marquer la conversation comme lue pour l'utilisateur actuel
        $conversation->utilisateurs()->updateExistingPivot($user->id, ['is_read' => true]);

        // Retournez les informations nécessaires dans la réponse JSON
        return response()->json([
            'success' => true,
            'userId' => $user->id,
            'message' => $request->input('message'),
        ]);
    }

}
