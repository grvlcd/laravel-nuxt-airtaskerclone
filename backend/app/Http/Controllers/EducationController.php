<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;
use App\Http\Requests\EducationRequest;

class EducationController extends Controller
{
    public function store(EducationRequest $request) {
        $user = $request->user();
        $education = $user->profile->educations()
        ->create($request->all());
        return response()->json([
            'data' => $education
        ]);
    }

    public function update(EducationRequest $request, Education $education) {
        $education->update($request->all());
        return response()->json([
            'data' => $education
        ]);
    }

    public function destroy(Education $education) {
        $education->delete();
        return response()->json([
            'message' => 'Education deleted',
            'status' => 204
        ]);
    }
}
