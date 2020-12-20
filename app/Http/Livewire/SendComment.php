<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class SendComment extends Component
{
	public $post;
	public $content;

	protected $rules = [
        'content' => ['required', 'min:3']
    ];

	public function mount(Post $post)
    {
        $this->post = $post;
    }

    //public function updated($propertyName)
    //{
    //    $this->validateOnly($propertyName);
    //}

    public function sendComment()
    {
        $this->validate();    

        $this->post->comments()->create([
        	'user_id' => auth()->user()->id,
            'content' => $this->content,
        ]);

        $this->clearContent();
        
        session()->flash('message', 'Comment Sent');
    }

    public function clearContent()
    {
        $this->content = '';
    }

    public function render()
    {
        return view('livewire.send-comment');
    }
}
