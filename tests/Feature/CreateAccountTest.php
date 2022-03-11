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

        $response = $this->get('/createaccount');
        $response->assertOk();
    }

    public function test_create_user()
    {
        $this->followingRedirects()->post('/createuser', [
            'name' => 'emma',
            'email' => 'hejhejhej@hejmail.nu',
            'password' => 'test',
        ])->assertOk()->assertSeeText('Email');
    }

    public function test_create_user_without_username()
    {
        $this->followingRedirects()->post('/createuser', [
            'email' => 'hejhejhej@hejmail.nu',
            'password' => 'test',
        ])->assertOk()->assertSeeText('The name field is required.');
    }

    public function test_create_user_without_email()
    {
        $this->followingRedirects()->post('/createuser', [
            'name' => 'emma',
            'password' => 'test',
        ])->assertOk()->assertSeeText('The email field is required.');
    }

    public function test_create_user_without_password()
    {
        $this->followingRedirects()->post('/createuser', [
            'name' => 'emma',
            'email' => 'hejhejhej@hejmail.nu',
        ])->assertOk()->assertSeeText('The password field is required.');
    }

    public function test_create_user_with_existing_email()
    {
        $user = User::factory()->create();
        $this->followingRedirects()->post('/createuser', [
            'name' => 'emma',
            'email' => $user->email,
            'password' => 'test',
        ])->assertOk()->assertSeeText('The email has already been taken.');
    }
}
