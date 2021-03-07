<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function store(Request $request) {
        $user = $request->user();
        $experience = $user->profile->experiences()
        ->create($request->all());
        return response()->json([
            'data' => $experience
        ]);
    }

    public function update(Request $request, Experience $experience) {
        $experience->update($request->all());
        return response()->json([
            'data' => $experience
        ]);
    }

    public function destroy(Experience $experience) {
        $experience->delete();
        return response()->json([
            'message' => 'Experience deleted',
            'status' => 204
        ]);
    }
}
