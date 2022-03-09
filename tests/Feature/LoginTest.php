<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_login_form()
    {
        $response = $this->get('/');
        $response->assertSeeText('Email');
        $response->assertStatus(200);
    }

    public function test_login_user()
    {
        $user = new User();
        $user->name = 'Emma';
        $user->email = 'hej@email.com';
        $user->password = 'test';
        $user->save();

        $response = $this->followingRedirects($user)->post('login', [
            'email' => 'hej@email.com',
            'password' => 'test',
        ]);

        $response->assertSeeText("Hello, Emma!");
        $response->assertOk();
        // $user = new User();
        // $user->name = 'Emma';
        // $user->email = 'hej@email.com';
        // $user->password = 'test';
        // $user->save();

        // $response = $this->followingRedirects($user)->post('login', [
        //     'email' => 'hej@email.com',
        //     'password' => 'test'
        // ]);

        // $response->assertSeeText("Hello, Emma!");
        // $response->assertOk();
    }


    public function test_login_user_without_password()
    {
        $user = new User();
        $user->name = 'Emma';
        $user->email = 'hej@email.com';
        $user->password = Hash::make(123);
        $user->save();

        $response = $this->followingRedirects($user)->post('login', [
            'email' => 'example@email.com'
        ]);

        $response->assertSeeText('Woops! Please try to login again.');
    }
}
