<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PieceJointe extends Model
{
    protected $fillable = [
        'taches_id',
        'filename',
        'file_size',
        'file_path',
    ];

    // Relation avec le type de projet
    public function Tache()
    {
        return $this->belongsTo(Tache::class, 'taches_id');
    }
}
