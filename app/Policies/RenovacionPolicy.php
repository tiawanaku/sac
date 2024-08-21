<?php

namespace App\Policies;

use App\Models\Renovacion;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RenovacionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Verificar si el usuario tiene permiso o rol específico
        return $user->can('view-any Renovacion') || $user->hasAnyRole(['Administrador', 'Funcionario']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Renovacion $renovacion): bool
    {
        return $user->can('view Renovacion') || $user->hasAnyRole(['Administrador', 'Funcionario']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Renovacion') || $user->hasRole(['Administrador', 'Funcionario']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Renovacion $renovacion): bool
    {
        return $user->can('update Renovacion') || $user->hasRole(['Administrador', 'Funcionario']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Renovacion $renovacion): bool
    {
        return $user->can('delete Renovacion') || $user->hasRole('Administrador');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Renovacion $renovacion): bool
    {
        return $user->can('restore Renovacion') || $user->hasRole('Administrador');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Renovacion $renovacion): bool
    {
        return $user->can('force-delete Renovacion') || $user->hasRole('Administrador');
    }
}
