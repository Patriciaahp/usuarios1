<?php

namespace Domain\Users\Users\Actions;

use App\Models\User;

class DeleteUserAction
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function execute()
    {
        $this->user->delete();
    }

}
