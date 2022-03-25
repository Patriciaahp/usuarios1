<?php

namespace Domain\Users\Users\Actions;

use App\Models\User;
use Domain\Users\Users\ResponseCodes\ResponseCodeUserDeleted;

class DeleteUserAction
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function execute()
    {
        $this->user->forceDelete();
        return new ResponseCodeUserDeleted();
    }

}
