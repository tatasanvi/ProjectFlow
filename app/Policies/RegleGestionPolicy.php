<?php

namespace App\Policies;

use App\Models\RegleGestion;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegleGestionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RegleGestion  $regleGestion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, RegleGestion $regleGestion)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
         // Logique d'autorisation pour la création de règle de gestion
    return $user->hasRole('decideur');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RegleGestion  $regleGestion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, RegleGestion $regleGestion)
    {
        // Logique d'autorisation pour la mise à jour d'une règle de gestion
    return $user->hasRole('decideur');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RegleGestion  $regleGestion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, RegleGestion $regleGestion)
    {
        // Logique d'autorisation pour la suppression d'une règle de gestion
    return $user->hasRole('decideur');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RegleGestion  $regleGestion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, RegleGestion $regleGestion)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RegleGestion  $regleGestion
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, RegleGestion $regleGestion)
    {
        //
    }
}
