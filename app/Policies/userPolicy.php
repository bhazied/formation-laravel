<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class userPolicy
{
    use HandlesAuthorization;

    public function before(User $user){
        //return $user->hasRole('ROLE_SUPER_ADMIN');
    }

    /**
     * Determine whether the user can view the user.
     *
     * @param  \App\User  $user
     * @param  \App\User  $user
     * @return mixed
     */
    //premier param : l'utilisateur en cours
    // second param l'objet en question , sur lakel on va appliquer les check
    public function view(User $user, User $userObject)
    {
        return ($user->id === $userObject->creator_user_id);
        return $user->hasRole('ROLE_SUPER_ADMIN');
    }

    public function index(User $user){
       // return $user->hasRole('ROLE_SUPER_ADMIN');
        return true;
    }

    /**
     * Determine whether the user can create users.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasRole('ROLE_SUPER_ADMIN');
    }



   /* public function store(User $user, User $userObject){
        return null;
    }*/

    /**
     * Determine whether the user can update the user.
     *
     * @param  \App\User  $user
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user, User $userObject)
    {
        return $user->hasRole('ROLE_SUPER_ADMIN');
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  \App\User  $user
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user, User $userObject)
    {
        //return $user->hasRole('ROLE_SUPER_ADMIN');
        return ($user->hasRole('ROLE_SUPER_ADMIN') && ($user->id != $userObject->id));
    }

    public function toggle(User $user, User $userObject)
    {
        return ($user->hasRole('ROLE_SUPER_ADMIN') && ($user->id != $userObject->id));
    }
}
