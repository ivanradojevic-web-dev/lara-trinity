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

        if ($this->comment->is_post()) {
            $channelname = $this->comment->title;
            $sendto = $this->comment->author->email;
        } elseif ($this->comment->is_news()) {
            $channelname = $this->comment->title;
            $sendto = $this->comment->author->email;
        }

        Mail::to($sendto)->send(new ChannelCommented($channelname));
        Mail::to($this->comment->author->email)->send(new CommentApproved($channelname));
    }

    public function render()
    {
        return view('livewire.comment-status');
    }
}
