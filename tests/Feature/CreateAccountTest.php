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
        ])->assertStatus(200)->assertSeeText('Email');
    }
}
