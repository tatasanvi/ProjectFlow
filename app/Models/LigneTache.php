<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneTache extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        //'createur',
        'taches_id',
    ];


    public function User(){
        return $this->belongsTo(User::class, 'users_id');
    }
    public function Tache()
    {
        return $this->belongsTo(Tache::class, 'taches_id');
    }

}
