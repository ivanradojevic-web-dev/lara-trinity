<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{   
	public function browse()
	{
		if (request()->channel === 'posts') {      
            return $comments = Comment::with('author', 'posts', 'news', 'replies')
                ->withCount('replies')
                ->whereHas(request()->channel)
                ->latest()
                ->paginate(10);
        } else if (request()->channel === 'news') {
            return $comments = Comment::with('author', 'posts', 'news', 'replies')
                ->withCount('replies')
                ->whereHas(request()->channel)
                ->latest()
                ->paginate(10);     
        } else {
            return $comments = Comment::with('author', 'posts', 'news', 'replies')->withCount('replies')->latest()->paginate(10); 
        }
	}
}