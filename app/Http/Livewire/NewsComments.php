<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\News;
use App\Models\Comment;
use App\Models\Reply;


class NewsComments extends Component
{
	use WithPagination;

	public $news;
	public $form = false;
	public $commentId = "";
	public $reply = "";

	protected $rules = [
        'reply' => ['required', 'min:3'],
        'commentId' => ['required']
    ];

	public function mount(News $news)
    {
        $this->news = $news;
    }

    public function openForm(Comment $comment)
    {
        $this->form = true; 
        $this->commentId = $comment->id;  
    }

    public function closeForm(Comment $comment)
    {
        $this->form = false; 
        $this->commentId = "";
        $this->reply = "";  
    }

    public function sendReply()
    {
        $this->validate();    

        Reply::create([
        	'user_id' => auth()->user()->id,
        	'comment_id' => $this->commentId,
            'content' => $this->reply,
        ]);

        $this->form = false;
        $this->reply = "";

        //session()->flash('message', 'Comment Sent');
    }

    public function render()
    {
        return view('livewire.browse-comments', [
        	'comments' => $this->news->comments()->with('replies', 'author')
            ->where('status', 'active')
            ->latest()
            ->paginate(3)
        ]);
    }
}
