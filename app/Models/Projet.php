<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_projets_id',
        'users_id',
        'nomProjet',
        'description',
        'dateDébut',
        'dateFin',
        'userAssigne',
        'statut',
    ];

    public function TypeProjet()
    {
        return $this->belongsTo(TypeProjet::class, 'type_projets_id');
    }

    public function User(){
        return $this->belongsTo(User::class, 'users_id');
    }

    public function taches()
    {
        return $this->hasMany(Tache::class, 'projets_id');
    }

    /* public function Tache()
    {
        return $this->hasMany(Tache::class, 'projet_id');
    }



    public function Conversation()
    {
        return $this->hasMany(Conversation::class, 'conversation_id');
    }



    public function Message()
    {
        return $this->hasMany(Message::class, 'projet_id');
    } */

}
