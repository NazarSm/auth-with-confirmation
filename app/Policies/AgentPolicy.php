<?php

namespace App\Policies;

use App\Models\Agent;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AgentPolicy
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
       return $user->agent()->exists() || $user->email == User::EMAIL_ADMIN ;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Agent  $agent
     * @return mixed
     */
    public function view(User $user, Agent $agent)
    {
        return $user->id == $agent->user->id || $user->email == User::EMAIL_ADMIN;;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
       return $user->email == User::EMAIL_ADMIN;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Agent  $agent
     * @return mixed
     */
    public function update(User $user, Agent $agent)
    {
        return $user->id == $agent->user->id || $user->email == User::EMAIL_ADMIN;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Agent  $agent
     * @return mixed
     */
    public function delete(User $user, Agent $agent)
    {
        return $user->email == User::EMAIL_ADMIN ;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Agent  $agent
     * @return mixed
     */
    public function restore(User $user, Agent $agent)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Agent  $agent
     * @return mixed
     */
    public function forceDelete(User $user, Agent $agent)
    {
        //
    }
}
