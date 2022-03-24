<?php

namespace App\Panel\Users\Controllers;


use App\Models\User;

use Domain\Users\ResponseCodes\ResponseCodeUserStored;

class StoreUserAction
{

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;

        if (!isset($data['name']))
            throw new \InvalidArgumentException('name is required.');
        $this->name = isset($data['name']) ? $data['name'] : null;

    if (!isset($data['email']))
        throw new \InvalidArgumentException('email is required.');
    $this->email = isset($data['email']) ? $data['email'] : null;


    $this->surname = isset($data['surname']) ? $data ['surname'] : null;
    $this->password = isset($data['password']) ? $data ['password'] : \Str::random(20);
    }

    public function execute()
    {

        $user = User::create([
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ]);

        return new ResponseCodeUserStored($user);




    }

}
