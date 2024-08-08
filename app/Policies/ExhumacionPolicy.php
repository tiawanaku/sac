<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Exhumacion;
use App\Models\User;

class ExhumacionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Exhumacion');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Exhumacion $exhumacion): bool
    {
        return $user->checkPermissionTo('view Exhumacion');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Exhumacion');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Exhumacion $exhumacion): bool
    {
        return $user->checkPermissionTo('update Exhumacion');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Exhumacion $exhumacion): bool
    {
        return $user->checkPermissionTo('delete Exhumacion');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Exhumacion $exhumacion): bool
    {
        return $user->checkPermissionTo('restore Exhumacion');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Exhumacion $exhumacion): bool
    {
        return $user->checkPermissionTo('force-delete Exhumacion');
    }
}
