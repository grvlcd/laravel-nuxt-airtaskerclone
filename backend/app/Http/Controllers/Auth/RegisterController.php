<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(Request $request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $user->profile()->create([
            'bio' => "",
            'gender' => $request->gender,
            'age' => $request->age,
            'birthday' => $request->birthday
        ]);
        return response()->json([
            'message' => 'registration success!',
        ], 201);
    }
}
