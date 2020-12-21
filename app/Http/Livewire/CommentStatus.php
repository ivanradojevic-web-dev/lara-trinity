<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Mail\ChannelCommented;
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

        if ($this->comment->channel === 'Post') {
            $channelname = $this->comment->posts[0]->title;
            $sendto = $this->comment->posts[0]->author->email;
        } elseif ($this->comment->channel === 'News') {
            $channelname = $this->comment->news[0]->title;
            $sendto = $this->comment->news[0]->author->email;
        }

        Mail::to($sendto)->send(new ChannelCommented($channelname));
            //Mail::to($this->comment->author)->send(new CommentApproved($channelname));

        session()->flash('success', '');
    }

    public function render()
    {
        return view('livewire.comment-status');
    }
}
