<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UnidadeCompradora;
use Illuminate\Auth\Access\HandlesAuthorization;

class UnidadeCompradoraPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_unidade::compradora');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UnidadeCompradora  $unidadeCompradora
     * @return bool
     */
    public function view(User $user, UnidadeCompradora $unidadeCompradora): bool
    {
        return $user->can('view_unidade::compradora');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_unidade::compradora');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UnidadeCompradora  $unidadeCompradora
     * @return bool
     */
    public function update(User $user, UnidadeCompradora $unidadeCompradora): bool
    {
        return $user->can('update_unidade::compradora');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UnidadeCompradora  $unidadeCompradora
     * @return bool
     */
    public function delete(User $user, UnidadeCompradora $unidadeCompradora): bool
    {
        return $user->can('delete_unidade::compradora');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_unidade::compradora');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UnidadeCompradora  $unidadeCompradora
     * @return bool
     */
    public function forceDelete(User $user, UnidadeCompradora $unidadeCompradora): bool
    {
        return $user->can('force_delete_unidade::compradora');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_unidade::compradora');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UnidadeCompradora  $unidadeCompradora
     * @return bool
     */
    public function restore(User $user, UnidadeCompradora $unidadeCompradora): bool
    {
        return $user->can('restore_unidade::compradora');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_unidade::compradora');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UnidadeCompradora  $unidadeCompradora
     * @return bool
     */
    public function replicate(User $user, UnidadeCompradora $unidadeCompradora): bool
    {
        return $user->can('replicate_unidade::compradora');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_unidade::compradora');
    }

}
