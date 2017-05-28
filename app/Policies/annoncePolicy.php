<?php

namespace App\Policies;

use App\User;
use App\Annonce;
use Illuminate\Auth\Access\HandlesAuthorization;

class annoncePolicy
{
    use HandlesAuthorization;

    public function before(User $user){
        //return $user->isSuperAdmin();
    }


    /**
     * Determine whether the user can view the annonce.
     *
     * @param  \App\User  $user
     * @param  \App\Annonce  $annonce
     * @return mixed
     */
    public function view(User $user, Annonce $annonce)
    {
        return true;
    }

    /**
     * Determine whether the user can create annonces.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Annonce $annonce){
        return true;
    }

    /**
     * Determine whether the user can update the annonce.
     *
     * @param  \App\User  $user
     * @param  \App\Annonce  $annonce
     * @return mixed
     */
    public function update(User $user, Annonce $annonce)
    {
        return ($annonce->creator_user_id == $user->id);
    }

    /**
     * Determine whether the user can delete the annonce.
     *
     * @param  \App\User  $user
     * @param  \App\Annonce  $annonce
     * @return mixed
     */
    public function delete(User $user, Annonce $annonce)
    {
        return ($annonce->creator_user_id == $user->id);
    }
}
