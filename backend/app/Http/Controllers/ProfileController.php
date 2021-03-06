<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function show(User $profile) {
        if(isset($profile->profile)) {
            $profile->profile;
        }
        if(isset($profile->profile->skills)) {
            $profile->profile->skills;
        }
        if(isset($profile->profile->educations)) {
            $profile->profile->educations;
        }
        if(isset($profile->profile->experiences)) {
            $profile->profile->experiences;
        }
        return response()->json([
            'data' => $profile,
        ]);
    }
}
