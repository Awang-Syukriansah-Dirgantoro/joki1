<?php

namespace App\Http\Controllers;

use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        $validator = $this->check(request()->all(), [
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'max:255'],
        ]);

        if (auth()->attempt($validator)) {
            $token = request()->user()->createToken('token');
            return [
                'user' => auth()->user(),
                'token' => $token->plainTextToken,
            ];
        }

        return $this->json_res(['message' => "Wrong Email / Password"], 422);
    }

    public function register()
    {
        $validator = $this->check(request()->all(), [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'max:255', 'confirmed'],
        ]);

        $validator['password'] = bcrypt($validator['password']);

        User::create($validator);

        return $this->json_res(['message' => 'Registration Successful'], 200);

    }

    public function logout()
    {
        request()->user()->currentAccessToken()->delete();
        return $this->json_res(['message' => "Logout"]);
    }
}
