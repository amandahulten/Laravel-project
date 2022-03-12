<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CreateUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:20|regex:/^[A-Za-z]+$/',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ]);

        User::create(request(['name', 'email', 'password']));

        return redirect()->to('/');
    }
}
