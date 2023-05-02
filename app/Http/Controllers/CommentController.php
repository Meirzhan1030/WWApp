<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required|max:225',
            'forum_id' => 'required|numeric|exists:forums,id'
        ]);
        Auth::user()->comments()->create($validated);
        return back();
    }

    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);
        $comment->update([
            'content' => $request->content,
            'forum_id' => $request->forum_id,
        ]);
        return back();
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return back();
    }
}
