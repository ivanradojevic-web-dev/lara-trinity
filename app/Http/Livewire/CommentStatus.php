<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Mail\ChannelCommented;
use App\Mail\CommentApproved;
use Illuminate\Support\Facades\Mail;

class CommentStatus extends Component
{
	public $comment;

    public function mount(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function editStatus()
    {
        $this->comment->status = 'active';
        $this->comment->save();

        if ($this->comment->commentable_type === "App\Models\Post" ) {
            $channelname = $this->comment->commentable()->first()->title;
            $sendto = $this->comment->commentable()->first()->author->email;
        } elseif ($this->comment->commentable_type === "App\Models\News") {
            $channelname = $this->comment->commentable()->first()->title;
            $sendto = $this->comment->commentable()->first()->author->email;
        }

        Mail::to($sendto)->send(new ChannelCommented($channelname));
        Mail::to($this->comment->author->email)->send(new CommentApproved($channelname));
    }

    public function render()
    {
        return view('livewire.comment-status');
    }
}
