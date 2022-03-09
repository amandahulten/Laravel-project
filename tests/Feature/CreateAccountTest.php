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

        $response = $this->followingRedirects()->post('createuser', [
            'username' => 'emma',
            'email' => 'hejhejhej@email.com',
            'password' => 'test',
        ]);
        $response->assertStatus(200);
        $response->assertOk();


        // $user = new User();
        // $user->name = 'Amanda';
        // $user->email = 'example@email.com';
        // $user->password = Hash::make('123');
        // $user->save();

        // $user = $this->post('users', [

        //     'email' => 'example@email.com',
        //     'password' => '123',
        //     'name' => 'Amanda'
        // ]);

        // $this->followingRedirects($user)->post('login', [
        //     'email' => 'example@email.com'
        // ]);

        // $response = $this->followingRedirects($user)->post('createuser', [
        //     'email' => 'example@email.com',
        //     'password' => '123',
        //     'name' => 'Amanda'
        // ]);

        // $response->assertSeeText('Hello, Amanda!');
        // $response->assertOk();
    }
}
