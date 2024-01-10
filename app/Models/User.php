<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'mdp',
        'password',
        'tel',
        'adresse',
        'sexe',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function Role(){
        return $this->belongsToMany(Role::class);
    }


    public function ligneTaches()
    {
        return $this->hasMany(LigneTache::class, 'users_id');
    }

    public function taches()
    {
        return $this->belongsToMany(Tache::class, 'ligne_taches', 'users_id', 'taches_id');
    }

    /* public function Tache()
    {
        return $this->hasMany(Tache::class, 'user_id');
    }


    public function Message()
    {
        return $this->hasMany(Message::class, 'user_id');
    } */

}
