<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CreateAccountTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_create_account_form()
    {
        $response = $this->get('/');

        $response->assertOk();
    }

    public function test_create_user()
    {
        // $user = new User();
        // $user->name = 'Amanda';
        // $user->email = 'example@email.com';
        // $user->password = Hash::make('123');
        // $user->save();

        $this->post('users', [
            'email' => 'example@email.com',
            'password' => '123',
            'name' => 'Amanda'
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'example@email.com',
            'password' => '123',
            'name' => 'Amanda'
        ]);

        // $response = $this->followingRedirects($user)->post('createuser', [
        //     'email' => 'example@email.com',
        //     'password' => '123',
        //     'name' => 'Amanda'
        // ]);

        // $response->assertSeeText('Hello, Amanda!');
        // $response->assertOk();
    }
}
