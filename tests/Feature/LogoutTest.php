<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;


class LogoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_logout_button()
    {



        //->assertPathIs('/');
        // $user = new User();
        // $user->name = 'Emma';
        // $user->email = 'hej@email.com';
        // $user->password = 'test';
        // $user->save();

        // $response = $this->followingRedirects($user)->post('login', [
        //     'email' => 'hej@email.com',
        //     'password' => 'test'
        // ]);

        // $response->assertSeeText("Log Out");

        // $this->clickLink('Log out');
        // $this->assertPathIs('/');

        // $response->assertOk();
    }
}
