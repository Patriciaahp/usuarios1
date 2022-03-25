<?php

namespace Tests\Feature\Domain\Users\Users;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use InvalidArgumentException;
use Tests\TestCase;
use Domain\Users\Users\Actions\StoreUserAction;
use Domain\Users\Users\ResponseCodes\ResponseCodeUserStored;
use App\Models\User;

class StoreUserActionTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;
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

        $credentials = [
            'email' => $data['email'],
            'password' => 123456
        ];

        Auth::once($credentials);
        $this->assertAuthenticated();

        $this->assertEquals($user->name, $data['name']);
        $this->assertEquals($user->email, $data['email']);
        $this->assertEquals($user->surname, $data['surname']);
        $user = new User();
        $response_fake = new ResponseCodeUserStored($user);
        $this->assertTrue(get_class($response_fake) == get_class($result));
    }

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_users_users_store_user_action_no_name
     * @return void
     */
    public function domain_users_users_store_user_action_no_name()
    {
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

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_users_users_store_user_action_no_surname
     * @return void
     */
    public function domain_users_users_store_user_action_no_surname()
    {
        $data = array(
            'name' => $this->faker->name,
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
        $this->assertTrue(get_class($response_fake) == get_class($result));
    }

    /**
     * A basic feature test example.
     * @test
     * Command for testing: vendor\bin\phpunit --filter=domain_users_users_store_user_action_no_password
     * @return void
     */
    public function domain_users_users_store_user_action_no_password()
    {
        $data = array(
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
           'surname' => $this->faker->name
        );

        $action = new StoreUserAction($data);
        $result = $action->execute();
        $user = $result->object;
        $this->assertNotNull($user);

        $this->assertEquals($user->name, $data['name']);
        $this->assertEquals($user->email, $data['email']);
        $this->assertEquals($user->surname, $data['surname']);
        $user = new User();
        $response_fake = new ResponseCodeUserStored($user);
        $this->assertTrue(get_class($response_fake) == get_class($result));
    }

}
