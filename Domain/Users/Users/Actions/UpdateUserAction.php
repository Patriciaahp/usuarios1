<?php

namespace Domain\Users\Users\Actions;

use App\Models\User;
use Domain\Users\Users\ResponseCodes\ResponseCodeUserUpdated;

class UpdateUserAction
{
    private $name;
    private $email;
    private $surname;
    private $password;
    private $user;


    public function __construct(User $user, array $data )
    {

        $this->data = $data;
        $this->user = $user;

        $this->name = isset($data['name']) ? $data['name'] : $user['name'];
        $this->email = isset($data['email']) ? $data['email'] : $user['email'];
        $this->surname = isset($data['surname']) ? $data['surname'] : $user['surname'];
        $this->password = isset($data['password']) ? $data['password'] : null;
    }
//mirar password
    public function execute()
    {
       $data = array(
        'name'    => $this->name,
        'surname' => $this->surname,
        'email'   => $this->email
    );

    if($this->password){
        $data['password'] = bcrypt($this->password);
    }


        $this->user->fill($data);

        $this->user->save();
        return new ResponseCodeUserUpdated($this->user);
    }

}
