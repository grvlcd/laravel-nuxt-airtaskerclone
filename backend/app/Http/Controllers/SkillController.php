<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Skill;

class SkillController extends Controller
{
    public function store(Request $request) {
        $user = $request->user();
        $skill = $user->profile->skills()->create($request->all());
        return response()->json([
            'data' => $skill,
        ]);
    }

    public function destroy(Skill $skill) {
        $skill->delete();
        return response()->json([
            'message' => 'Skill deleted',
            'status' => 204
        ]);
    }
}
