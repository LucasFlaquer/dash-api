<?php

namespace Tests\Feature;

use App\Models\User;
use App\Services\UserService;
use Faker\Factory;
use Faker\Generator as Faker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_fetch_users()
    {
        $faker = Factory::create();

        $data = [
            'name'=>$faker->name,
            'email'=>$faker->email,
            'password'=>$faker->password
        ];
        $service = new UserService();
        $user = new User($data);
        $service->saveUser($user);
        $response = $this->get('/api/users');
        $response->assertJsonCount(1, $key = 'users');
//        $response = $this->post('/api/users', $data);
//        $service = new UserService();
//        $user = new User(['name'=>'Lucas Flaquer', 'email'=>'lucas.flaquer@gmail.com', 'password'=>bcrypt('123')]);
//        $service->saveUser($user);
//        $response = $this->get('api/users');
//        $response->assertJson(['users'=>true]);

    }
}
