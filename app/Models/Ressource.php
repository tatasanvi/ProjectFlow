<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ressource extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_projet_id',
        'name',
        'description',
    ];

    public function TypeProjet()
    {
        return $this->belongsTo(TypeProjet::class, 'type_projets_id');
    }
}
