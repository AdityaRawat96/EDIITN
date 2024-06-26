<?php

namespace App\Policies;

use App\Models\Application;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ApplicationPolicy
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
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Application $application)
    {
        return $user->role === 'admin' || $user->id == $application->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user, Application $application)
    {
        if ($user->role == 'admin') {
            return true;
        } else {
            return $user->id == $application->user_id && $application->status == 'pending';
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Application $application)
    {
        if ($user->role == 'admin') {
            return $user->privilege == 'superadmin' || $application->status == 'processing';
        } else {
            return $user->id == $application->user_id && $application->status == 'pending';
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function updateStatus(User $user, Application $application)
    {
        return $user()->role == 'admin' && $user->privlege == 'superadmin' || $user->role == 'admin' && $application->status == 'processing';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Application $application)
    {
        $user->role == 'admin' && $user->privlege == 'superadmin';
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Application $application)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Application $application)
    {
        //
    }
}
