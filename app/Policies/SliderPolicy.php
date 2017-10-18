<?php

namespace Corp\Policies;

use Corp\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SliderPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function save(User $user)
    {
        return $user->canDo('ADD_SLIDER');
    }

    public function edit(User $user)
    {
        return $user->canDo('EDIT_SLIDER');
    }

    public function destroy(User $user)
    {
        return $user->canDo('DELETE_SLIDER');
    }
}
