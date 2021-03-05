<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function show(User $profile) {
        $profile->profile;
        $profile->profile->skills;
        $profile->profile->educations;
        $profile->profile->experiences;
        return response()->json([
            'data' => $profile,
        ]);
    }
}
