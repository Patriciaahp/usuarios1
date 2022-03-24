<?php

namespace Tests\Feature\Domain\Users\Users;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use InvalidArgumentException;
use Tests\TestCase;
use Domain\Users\Users\Actions\StoreUserAction;
use Domain\Users\Users\ResponseCodes\ResponseCodeUserStored;
use App\Models\User;

class StoreUserActionTest extends TestCase
{

    use WithFaker;

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_users_users_store_user_action_ok
     * @return void
     */
    public function domain_users_users_store_user_action_ok()
    {

        //TODO - Repasar
        $data = array(
            'name' => $this->faker->name,
            'surname' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'password' => 123456
        );

        $action = new StoreUserAction($data);
        $result = $action->execute();

        $user = $result->object;

        $this->assertNotNull($user);

        $this->assertDatabaseHas($user->getTable(), [
            'id' => $user->id
        ]);

        $this->assertEquals($user->name, $data['name']);
        $this->assertEquals($user->email, $data['email']);
        $user = new User();
        $response_fake = new ResponseCodeUserStored($user);
        $this->assertTrue(gettype($response_fake) == gettype($result));
    }

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_users_users_store_user_action_no_name
     * @return void
     */
    public function domain_users_users_store_user_action_no_name()
    {

        //TODO - Programar el test del StoreUserAction sin name
        //$this->expectException(InvalidArgumentException::class);

        $data = array(
            'surname' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'password' => 123456
        );
        $this->expectException(InvalidArgumentException::class);
        $action = new StoreUserAction($data);
        $result = $action->execute();
        $user = $result->object;
        $this->assertNull($user);

    }

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_users_users_store_user_action_no_email
     * @return void
     */
    public function domain_users_users_store_user_action_no_email()
    {

        //TODO - Programar el test del StoreUserAction sin name
        //$this->expectException(InvalidArgumentException::class);

        $data = array(
            'name' => $this->faker->name,
            'surname' => $this->faker->name,
            'password' => 123456
        );
        $this->expectException(InvalidArgumentException::class);
        $action = new StoreUserAction($data);
        $result = $action->execute();
        $user = $result->object;
        $this->assertNull($user);


    }

}
