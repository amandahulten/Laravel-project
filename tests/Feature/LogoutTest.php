<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;



class LogoutTest extends TestCase
{
    use RefreshDatabase;
    public function test_view_logout_button()
    {
        $user = User::factory()->create();

        // I have checked with Vincent - it is ok that $user is red - it is a fault with the editor. /Emma
        $this->actingAs($user)
            ->get('/feed')->assertok();
    }

    public function test_logout_user()
    {
        $user = User::factory()->create();
        // I have checked with Vincent - it is ok that $user is red - it is a fault with the editor. /Emma
        $this->actingAs($user);
        $this->followingRedirects($user)->get('logout')->assertok()->assertSeeText('Log in'); // redirect to login,
    }
}
