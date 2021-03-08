<?php

namespace App\Policies;

use App\Models\Tableau;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TableauPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Tableau  $tableau
     * @return mixed
     */
    public function view(User $user, Tableau $tableau)
    {
        if( (!$tableau->prive) ||
            ($tableau->user == $user) ||
            ($tableau->users->isNotEmpty() && $tableau->users->contains($user))
        )
            return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Tableau  $tableau
     * @return mixed
     */
    public function update(User $user, Tableau $tableau)
    {
        if($tableau->user == $user)
            return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Tableau  $tableau
     * @return mixed
     */
    public function delete(User $user, Tableau $tableau)
    {
        if($tableau->user == $user)
            return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Tableau  $tableau
     * @return mixed
     */
    public function restore(User $user, Tableau $tableau)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Tableau  $tableau
     * @return mixed
     */
    public function forceDelete(User $user, Tableau $tableau)
    {
        //
    }

    //J'ajoute une fonction : vérifier si on peut poster sur un tableau (si on est collaborateur)
    public function addPost(User $user, Tableau $tableau)
    {
        if( (!$tableau->prive)
            || ($tableau->user == $user)
            || ($tableau->users->isNotEmpty()
                && $tableau->users->contains($user)
                && $tableau->users->first()->pivot->contributeur
            )
        )
            return true;
    }
}
