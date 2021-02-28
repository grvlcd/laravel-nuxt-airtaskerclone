<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class LoginController extends Controller
{
    
    public function login(Request $request) {
        $credentials = $request->only(['email', 'password']);

        if(!auth()->attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => "Username or Password is incorrect!",
            ]);
        }
        
        $request->session()->regenerate();
        return response()->json(null, 201);
    }

    public function logout(Request $request) {
        auth()->guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(null, 200);
    }
}
