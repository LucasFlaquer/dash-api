<?php

namespace Tests\Feature;

use App\Models\User;
use App\Services\UserService;
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
    public function test_create_a_user()
    {
        $service = new UserService();
        $user = new User(['name'=>'Lucas Flaquer', 'email'=>'lucas.flaquer@gmail.com', 'password'=>bcrypt('123')]);
        $service->saveUser($user);
        $response = $this->get('api/users');
        $response->assertJson(['users'=>true]);

    }
}
