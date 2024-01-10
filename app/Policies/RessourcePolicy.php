<?php

namespace App\Policies;

use App\Models\Ressource;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RessourcePolicy
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
     * @param  \App\Models\Ressource  $ressource
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Ressource $ressource)
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
      // Logique d'autorisation pour la création de ressource
    return $user->hasRole('decideur');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ressource  $ressource
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Ressource $ressource)
    {
        // Logique d'autorisation pour la mise à jour d'une ressource
        return $user->hasRole('decideur');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ressource  $ressource
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Ressource $ressource)
    {
       // Logique d'autorisation pour la suppression d'une ressource
    return $user->hasRole('decideur');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ressource  $ressource
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Ressource $ressource)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ressource  $ressource
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Ressource $ressource)
    {
        //
    }
}



