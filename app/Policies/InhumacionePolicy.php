<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Inhumacione;
use App\Models\User;

class InhumacionePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Inhumacione');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Inhumacione $inhumacione): bool
    {
        return $user->checkPermissionTo('view Inhumacione');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Inhumacione');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Inhumacione $inhumacione): bool
    {
        return $user->checkPermissionTo('update Inhumacione');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Inhumacione $inhumacione): bool
    {
        return $user->checkPermissionTo('delete Inhumacione');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Inhumacione $inhumacione): bool
    {
        return $user->checkPermissionTo('restore Inhumacione');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Inhumacione $inhumacione): bool
    {
        return $user->checkPermissionTo('force-delete Inhumacione');
    }
}
