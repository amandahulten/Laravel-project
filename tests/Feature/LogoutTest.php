<?php

namespace Tests\Feature;

use Database\Factories\UserFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Foundation\Testing\HasFactory;


class LogoutTest extends TestCase
{
    use RefreshDatabase;
    //use HasFactory;
    public function test_view_logout_button()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/logout');
        $response->assertOk();

        //$this->actingAs($user)->post('feed')->assertOk(); // login
        // $this->followingRedirects()->post('logout');
        // //$this->post(route('/logout'))->assertRedirect(route('/')); // redirect to login,
        // $this->assertGuest(); // check that your user not auth more
    }
}
