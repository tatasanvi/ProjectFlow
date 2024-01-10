<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

    protected $fillable = [
        'projets_id',
        'users_id',
        'nomTache',
        'description',
        'dateDébut',
        'dateFin',
        'statut',

    ];


    public function ligneTaches()
    {
        return $this->hasMany(LigneTache::class, 'taches_id');
    }

    public function Projet()
    {
        return $this->belongsTo(Projet::class, 'projets_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function utilisateursAssignes()
    {
        return $this->belongsToMany(User::class, 'ligne_taches', 'taches_id', 'users_id');
    }

    public function piecesJointes()
    {
        return $this->hasMany(PieceJointe::class, 'taches_id');
    }






    // Vous pouvez ajouter d'autres relations ou méthodes ici si nécessaire
}
