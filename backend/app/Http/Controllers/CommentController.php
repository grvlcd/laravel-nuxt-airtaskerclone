<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request) {
        dd($request);
    }

    public function update(Request $request, Comment $comment) {
        dd($request);
    }

    public function destroy(Comment $comment) {
        dd($request);
    }
}
