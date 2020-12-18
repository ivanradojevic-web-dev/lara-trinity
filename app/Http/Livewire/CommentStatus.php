<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;

class CommentStatus extends Component
{
	public $comment;

    public function mount(Comment $comment)
    {
        $this->$comment = $comment;
    }

    public function EditStatus()
    {
        $this->comment->status = 'active';
        $this->comment->save();

        session()->flash('success', '');
    }

    public function render()
    {
        return view('livewire.comment-status');
    }
}
