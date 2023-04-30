<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index(){
        $allForums = Forum::all();
        return view('forums.index', ['forums' => $allForums]);
    }

    public function create(){
        return view('forums.create');
    }

    public function store(Request $request){
        Forum::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return redirect()->route('forums.index');
    }

    public function show(Forum $forum){
        return view('forums.show', ['forum' => $forum]);
    }

    public function edit(Forum $forum)
    {
        return view('forums.edit', ['forum' => $forum]);
    }

    public function update(Request $request, Forum $forum)
    {
        $forum->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);
        return redirect()->route('forums.index');
    }

    public function destroy(Forum $forum)
    {
        $forum->delete();
        return redirect()->route('forums.index');
    }
}
