<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepository
{   
	public function browse()
	{
		if (request()->channel === 'posts') {      
            return $comments = Comment::whereHas(request()->channel)->get();
        } else if (request()->channel === 'news') {
            return $comments = Comment::whereHas(request()->channel)->get();     
        } else {
            return $comments = Comment::get(); 
        }
	}
}