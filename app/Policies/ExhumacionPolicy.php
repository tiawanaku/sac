<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Exhumacion;
use App\Models\User;

class ExhumacionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Exhumacion') || $user->hasAnyRole(['Administrador', 'Funcionario']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Exhumacion $exhumacion): bool
    {
        return $user->can('view Exhumacion') || $user->hasAnyRole(['Administrador', 'Funcionario']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Exhumacion') || $user->hasRole(['Administrador', 'Funcionario']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Exhumacion $exhumacion): bool
    {
        return $user->can('update Exhumacion') || $user->hasRole(['Administrador', 'Funcionario']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Exhumacion $exhumacion): bool
    {
        return $user->can('delete Exhumacion') || $user->hasRole('Administrador');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Exhumacion $exhumacion): bool
    {
        return $user->can('restore Exhumacion') || $user->hasRole('Administrador');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Exhumacion $exhumacion): bool
    {
        return $user->can('force-delete Exhumacion') || $user->hasRole('Administrador');
    }
}
