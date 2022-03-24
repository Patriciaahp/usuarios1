<?php

namespace Tests\Feature\Domain\Users\Users;

use Domain\Users\Users\Actions\StoreUserAction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use InvalidArgumentException;
use Tests\TestCase;
use Domain\Users\Users\Actions\UpdateUserAction;
use Domain\Users\Users\ResponseCodes\ResponseCodeUserUpdated;
use App\Models\User;

class UpdateUserActionTest extends TestCase
{
use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_users_users_update_user_action_ok
     * @return void
     */
    public function domain_users_users_update_user_action_ok()
    {
        $user = array(
            'name' => $this->faker->name,
            'surname' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'password' => 123456
        );

        $action = new StoreUserAction($user);
        $result = $action->execute();

        $user1 = $result->object;

        $this->assertNotNull($user1);

        $data = array(
            'name' => 'hola',
            'surname' => 'adios',
            'email' => 'hola@mail.test',
            'password' => 12345
        );

        $action = new UpdateUserAction($data, $user1);
        $result = $action->update($user1);

        $user = $result->object;

        $this->assertNotNull($user);

        $this->assertDatabaseHas($user->getTable(), [
            'id' => $user->id,
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],

        ]);

        $user = new User();
        $response_fake = new ResponseCodeUserUpdated($user);
        $this->assertTrue(gettype($response_fake) == gettype($result));
    }

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_users_users_update_user_action_no_name
     * @return void
     */
    public function domain_users_users_update_user_action_no_name()
    {
        $user = array(
            'name' => $this->faker->name,
            'surname' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'password' => 123456
        );

        $action = new StoreUserAction($user);
        $result = $action->execute();

        $user1 = $result->object;

        $this->assertNotNull($user1);

        $data = array(

            'surname' => 'adios',
            'email' => 'hola@mail.test',
            'password' => 12345
        );

        $action = new UpdateUserAction($data, $user1);
        $result = $action->update($user1);

        $user = $result->object;

        $this->assertNotNull($user);

        $this->assertDatabaseHas($user->getTable(), [
            'id' => $user->id,
            'name' => $user['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],

        ]);

        $user = new User();
        $response_fake = new ResponseCodeUserUpdated($user);
        $this->assertTrue(gettype($response_fake) == gettype($result));
    }
}
