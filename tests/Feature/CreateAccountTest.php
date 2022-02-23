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
        $user = new User();
        $user->name = 'Amanda';
        $user->email = 'example@email.com';
        $user->password = Hash::make(123);
        $user->save();

        $response = $this->followingRedirects($user)->post('login', [
            'email' => 'example@email.com',
            'password' => 123
        ]);

        $response->assertSeeText('Hello, Amanda!');
        $response->assertOk();
    }

    public function test_login_user_without_password()
    {
        $user = new User();
        $user->name = 'Amanda';
        $user->email = 'example@email.com';
        $user->password = Hash::make(123);
        $user->save();

        $response = $this->followingRedirects($user)->post('login', [
            'email' => 'example@email.com'
        ]);

        $response->assertSeeText('Woops! Please try to login again.');
    }
}
