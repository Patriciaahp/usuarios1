<?php

namespace Tests\Feature\Panel;


use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class UserTest extends TestCase
{

    use RefreshDatabase;
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_it_creates_a_user()
    {
       User::create([
            'name'=> 'hola',
            'surname'=>'adios',
            'email'=>'hola@mail.test',
            'password' => bcrypt(1234)
        ]);
        User::create([
            'name'=> 'hola1',
            'surname'=>'adios1',
            'email'=>'hoeela@mail.test',
            'password' => bcrypt(1234)
        ]);
        $this->assertDatabaseCount('users', 2);
    }
}
