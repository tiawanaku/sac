<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Ubicacion;
use App\Models\User;

class UbicacionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Ubicacion');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Ubicacion $ubicacion): bool
    {
        return $user->checkPermissionTo('view Ubicacion');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Ubicacion');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Ubicacion $ubicacion): bool
    {
        return $user->checkPermissionTo('update Ubicacion');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Ubicacion $ubicacion): bool
    {
        return $user->checkPermissionTo('delete Ubicacion');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Ubicacion $ubicacion): bool
    {
        return $user->checkPermissionTo('restore Ubicacion');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Ubicacion $ubicacion): bool
    {
        return $user->checkPermissionTo('force-delete Ubicacion');
    }
}
