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
        // $response = $this->assertSeeText('Log out');

        // $response->assertOk();

        // $this->browse(function ($browser) {
        //     $browser->visit('/dashboard')
        //         ->clickLink('Log Out')
        //         ->assertPathIs('/');
        // });
    }
}
