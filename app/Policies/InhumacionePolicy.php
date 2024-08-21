<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Inhumacione;
use App\Models\User;

class InhumacionePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Inhumacione') || $user->hasAnyRole(['Administrador', 'Funcionario']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Inhumacione $inhumacione): bool
    {
        return $user->can('view Inhumacione') || $user->hasAnyRole(['Administrador', 'Funcionario']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Inhumacione') || $user->hasRole('Administrador');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Inhumacione $inhumacione): bool
    {
        return $user->can('update Inhumacione') || $user->hasRole('Administrador');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Inhumacione $inhumacione): bool
    {
        return $user->can('delete Inhumacione') || $user->hasRole('Administrador');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Inhumacione $inhumacione): bool
    {
        return $user->can('restore Inhumacione') || $user->hasRole('Administrador');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Inhumacione $inhumacione): bool
    {
        return $user->can('force-delete Inhumacione') || $user->hasRole('Administrador');
    }
}
