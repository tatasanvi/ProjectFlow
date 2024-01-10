<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeProjet extends Model
{
    protected $fillable = ['name', 'description', 'users_id'];

    /* public function contrainte()
    {
        return $this->hasMany(contrainte::class, 'type_projet_id');
    }

    public function regleGestion()
    {
        return $this->hasMany(regleGestion::class, 'type_projet_id');
    }

    public function ressource()
    {
        return $this->hasMany(Ressource::class, 'type_projet_id');
    }

    // Relation avec les pièces jointes
    public function piecesJointes()
    {
        return $this->hasMany(PieceJointe::class, 'type_projet_id');
    } */

    public function User(){
        return $this->belongsTo(User::class, 'users_id');
    }
}
