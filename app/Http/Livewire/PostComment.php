<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;


class PostComment extends Component
{
	public $post;
	public $content;
    public $showForm = true;

	protected $rules = [
        'content' => ['required', 'min:3']
    ];

	public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function sendComment()
    {
        $this->validate();    

        $this->post->comments()->create([
        	'user_id' => auth()->user()->id,
            'content' => $this->content,
        ]);

        $this->showForm = false;

        session()->flash('message', 'Your comment has been sent');
    }

    public function clearContent()
    {
        $this->content = '';
    }

    public function render()
    {
        return view('livewire.post-comment');
    }
}
