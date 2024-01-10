<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Tache;
use App\Models\User;
use App\Models\LigneTache;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class TacheController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $taches = Tache::with('ligneTaches.user')->get();

        $projetIdsToUpdate = Tache::whereDate('dateDébut', '<=', Carbon::today())->pluck('projets_id')->unique();
        Projet::whereIn('id', $projetIdsToUpdate)->update(['statut' => 'En cours']);

        return view('admins.taches', compact('taches'));
    }

    public function create() {
        $projets = Projet::all();
        $data = User::all();
        return view('admins.createTache', compact('data','projets'));
    }

    public function store(Request $request){
        $users= $request->input('users');
        $projets_id = $request->projets_id;
        $debutTache = $request->dateDébut;
        $finTache = $request->dateFin;
        $projetDebut = Projet::where('id', $projets_id)->value('dateDébut');
        $projetFin = Projet::where('id', $projets_id)->value('dateFin');

        if ($debutTache > $finTache){
            return back()->with("error", "La date de début de la tache ne peut pas être postérieure à la date de fin");
        } elseif ($debutTache < $projetDebut){
            return back()->with("error", "La date de début que vous assigné à la tâche est antérieure à la date de début du projet correspondant");
        } elseif ($finTache > $projetFin){
            return back()->with("error", "La date de fin que vous assigné à la tâche est postérieure à la date de fin du projet correspondant");
        } elseif ($debutTache >= $projetDebut  && $finTache <= $projetFin){
            $tache = new Tache();
            $tache->projets_id = $request->projets_id;
            $tache->users_id = Auth::user()->id;
            $tache->nomTache = $request->nomTache;
            $tache->description = $request->description;
            $tache->dateDébut = $request->dateDébut;
            $tache->dateFin = $request->dateFin;
            $tache->statut = 'En attente';
            $tache->save();

            foreach ($users as $userId) {
                $user = User::find($userId);
                if ($user) {
                    $ligne_tache = new LigneTache();
                    $ligne_tache->users_id = $user->id;
                    $ligne_tache->taches_id = $tache->id;
                    $ligne_tache->save();
                }
            }

            $hasTachesWithProjetId = Tache::where('projets_id', $tache->projets_id)
                ->where(function ($query) {
                    $query->where('dateDébut', '<=', now());
                })
                ->exists();

            if ($hasTachesWithProjetId) {
                Projet::where('id',$tache->projets_id)->update(array('statut' => 'En cours'));
            }

            return redirect('/taches')->with("success", "Tache créée et assignée aux utilisateurs avec succès!");
        } else {
            return back()->with("error", "Une erreur s'est produite !");
        }

    }

    public function edit(Tache $tache)
    {
        $projets = Projet::all();
        $data = User::all();
        $selectedUserIds = $tache->ligneTaches->pluck('user.id')->toArray();

        return view('admins.editTache', compact('projets' , 'tache', 'data', 'selectedUserIds'));
    }

    public function update(Request $request,$tache){
        $users= $request->input('users');
        $projets_id = $request->projets_id;
        $debutTache = $request->dateDébut;
        $finTache = $request->dateFin;
        $projetDebut = Projet::where('id', $projets_id)->value('dateDébut');
        $projetFin = Projet::where('id', $projets_id)->value('dateFin');

        $nomtache = $request->input('nomTache');
        $dateDébut = $request->input('dateDébut');
        $dateFin = $request->input('dateFin');
        $description = $request->input('description');

        if ($debutTache > $finTache){
            return back()->with("error", "La date de début de la tache ne peut pas être postérieure à la date de fin");
        } elseif ($debutTache < $projetDebut){
            return back()->with("error", "La date de début que vous assigné à la tâche est antérieure à la date de début du projet correspondant");
        } elseif ($finTache > $projetFin){
            return back()->with("error", "La date de fin que vous assigné à la tâche est postérieure à la date de fin du projet correspondant");
        } elseif ($debutTache >= $projetDebut  && $finTache <= $projetFin){
            Tache::where('id',$tache)->update(array('nomTache' => $nomtache));
            Tache::where('id',$tache)->update(array('projets_id' => $projets_id));
            Tache::where('id',$tache)->update(array('dateDébut' => $dateDébut));
            Tache::where('id',$tache)->update(array('dateFin' => $dateFin));
            Tache::where('id',$tache)->update(array('description' => $description));

            LigneTache::where('taches_id', $tache)->delete();
            foreach ($users as $userId) {
                $user = User::find($userId);
                if ($user) {
                    $ligne_tache = new LigneTache();
                    $ligne_tache->users_id = $user->id;
                    $ligne_tache->taches_id = $tache;
                    $ligne_tache->save();
                }
            }

            $hasTachesWithProjetId = Tache::where('projets_id', $projets_id)
                ->where(function ($query) {
                    $query->where('dateDébut', '<=', now());
                })
                ->exists();

            if ($hasTachesWithProjetId) {
                Projet::where('id',$projets_id)->update(array('statut' => 'En cours'));
            }

            return redirect('/taches')->with("success", "Tache mise à jour avec succès!");
        } else {
            return back()->with("error", "Une erreur s'est produite !");
        }


    }

    public function delete(tache $tache){
        LigneTache::where('taches_id', $tache->id)->delete();
        $nom = $tache->nomTache;
        $tache->delete();
        return back()->with("successDelete", "La tache nommée '$nom' est supprimé avec succès!");
    }
    public function updateTaskStatus(Request $request, $taskId)
    {
        // Récupérez le nouveau statut depuis la requête AJAX
        $newStatus = $request->input('status');

        // Validez le nouveau statut (vous pouvez ajouter vos propres règles de validation ici)
        $validStatuses = ['En attente', 'En cours', 'Terminée', 'Suspendu'];
        if (!in_array($newStatus, $validStatuses)) {
            return response()->json(['error' => 'Statut non valide'], 400);
        }

        // Trouvez la tâche à mettre à jour
        $task = Tache::findOrFail($taskId);

        // Mettez à jour le statut de la tâche
        $task->statut = $newStatus;
        $task->save();

        // Répondez avec les données mises à jour
        return response()->json(['message' => 'Statut mis à jour avec succès', 'new_status' => $newStatus]);
    }

    public function generateRapport()
    {
        $taches = Tache::with('utilisateursAssignes', 'projet')
            ->get();

        $totalTaches = $taches->count();
        $tachesTerminees = $taches->where('statut', 'Terminée')->count();
        $tachesNonTerminees = $taches->where('statut', '!=', 'Terminée')->count();

        $pdf = PDF::loadView('etatTaches', compact('taches', 'totalTaches', 'tachesTerminees', 'tachesNonTerminees'));

        return $pdf->download('PROJECTFLOW-EtatTache.pdf');
    }

}
