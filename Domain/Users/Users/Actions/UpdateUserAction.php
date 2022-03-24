<?php

namespace Domain\Users\Users\Actions;

use App\Models\User;
use Domain\Users\Users\ResponseCodes\ResponseCodeUserStored;

class UpdateUserAction
{
    public function __construct(array $data, User $user)
    {
        $this->data = $data;
        $this->user = $user;

        $this->name = isset($data['name']) ? $data['name'] : $user['name'];
        $this->email = isset($data['email']) ? $data['email'] : ['email'];
        $this->surname = isset($data['surname']) ? $data ['surname'] : $user['surname'];
        $this->password = isset($data['password']) ? $data ['password'] : $user['name'];
    }

    public function update(User $user)
    {
        $user->fill([
            'name' => $this->data['name'],
            'surname' => $this->surname,
            'email' => $this->email,

        ]);

        $user->save();
        return new ResponseCodeUserStored($user);
    }

}
