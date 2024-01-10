<?php

namespace App\Policies;

use App\Models\Contrainte;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContraintePolicy
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
     * @param  \App\Models\Contrainte  $contrainte
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Contrainte $contrainte)
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
         // Logique d'autorisation pour la création de contrainte
    return $user->hasRole('decideur');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Contrainte  $contrainte
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Contrainte $contrainte)
    {
         // Logique d'autorisation pour la mise à jour d'une contrainte
    return $user->hasRole('decideur');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Contrainte  $contrainte
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Contrainte $contrainte)
    {
       // Logique d'autorisation pour la suppression d'une contrainte
    return $user->hasRole('decideur');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Contrainte  $contrainte
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Contrainte $contrainte)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Contrainte  $contrainte
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Contrainte $contrainte)
    {
        //
    }




}



