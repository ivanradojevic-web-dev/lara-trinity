<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::with('author')->withCount('replies')->latest()->paginate(10);

        return view('comments.index', compact('comments'));
    }

    public function destroy($id)
    {
        Comment::destroy($id);

        return back()->with('message', 'Comment Deleted!');
    }
}
