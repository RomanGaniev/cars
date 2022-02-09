<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CarPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return Response|bool
     */
    public function create(User $user)
    {
        return $user->isModerator();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Car  $car
     * @return Response|bool
     */
    public function update(User $user)
    {
        return $user->isModerator();
        // или что-то вроде: return $user->id === $car->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Car  $car
     * @return Response|bool
     */
    public function delete(User $user)
    {
        return $user->isModerator();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Car  $car
     * @return Response|bool
     */
    public function restore(User $user)
    {
        return $user->isModerator();
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Car  $car
     * @return Response|bool
     */
    public function forceDelete(User $user)
    {
        return $user->isAdmin();
    }
}
