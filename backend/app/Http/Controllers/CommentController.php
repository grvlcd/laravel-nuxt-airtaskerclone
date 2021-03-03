<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Resources\Comment as CommentResource;

class CommentController extends Controller
{
    public function store(Request $request) {
        $user = $request->user();
        $comment = $user->comments()->create([
            'body' => $request->body,
            'task_id' => $request->task_id
        ]);
        return new CommentResource($comment);
    }

    public function update(Request $request, Comment $comment) {
        $comment->update(['body' => $request->body]);
        $comment->user;
        return new CommentResource($comment);
    }

    public function destroy(Comment $comment) {
        $comment->delete();
        return response()->json([
            'message' => 'Comment deleted.',
            'status' => 204
        ]);
    }
}
