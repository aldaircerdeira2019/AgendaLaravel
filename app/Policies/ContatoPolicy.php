<?php

namespace App\Policies;

use App\Model\ContatoModel;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContatoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any contato models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the contato model.
     *
     * @param  \App\User  $user
     * @param  \App\Model\ContatoModel  $contatoModel
     * @return mixed
     */
    public function view(User $user, ContatoModel $contatoModel)
    {
        return $user->id === $contatoModel->user_id;
    }

    /**
     * Determine whether the user can create contato models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the contato model.
     *
     * @param  \App\User  $user
     * @param  \App\Model\ContatoModel  $contatoModel
     * @return mixed
     */
    public function update(User $user, ContatoModel $contatoModel)
    {
        return $user->id === $contatoModel->user_id;
    }

    /**
     * Determine whether the user can delete the contato model.
     *
     * @param  \App\User  $user
     * @param  \App\Model\ContatoModel  $contatoModel
     * @return mixed
     */
    public function delete(User $user, ContatoModel $contatoModel)
    {
        return $user->id === $contatoModel->user_id;
    }

    /**
     * Determine whether the user can restore the contato model.
     *
     * @param  \App\User  $user
     * @param  \App\Model\ContatoModel  $contatoModel
     * @return mixed
     */
    public function restore(User $user, ContatoModel $contatoModel)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the contato model.
     *
     * @param  \App\User  $user
     * @param  \App\Model\ContatoModel  $contatoModel
     * @return mixed
     */
    public function forceDelete(User $user, ContatoModel $contatoModel)
    {
        //
    }
}
