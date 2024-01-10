<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'projets_id',
        'titre',
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class, 'projets_id');
    }

    // Vous pouvez ajouter d'autres relations ou méthodes ici si nécessaire



    public function Message()
    {
        return $this->hasMany(Message::class, 'conversation_id');
    }
}
