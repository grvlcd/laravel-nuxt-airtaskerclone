<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Skill;
use App\Http\Requests\SkillRequest;

class SkillController extends Controller
{
    public function store(SkillRequest $request) {
        $user = $request->user();
        $skill = $user->profile->skills()->create($request->all());
        return response()->json([
            'data' => $skill,
        ]);
    }

    public function update(SkillRequest $request, Skill $skill) {
        $skill->update($request->all());
        return response()->json([
            'data' => $skill
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
