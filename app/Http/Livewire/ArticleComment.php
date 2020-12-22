<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\News;


class ArticleComment extends Component
{
	public $news;
	public $content;
    public $showForm = true;

	protected $rules = [
        'content' => ['required', 'min:3']
    ];

	public function mount(News $news)
    {
        $this->news = $news;
    }

    public function sendComment()
    {
        $this->validate();    

        $this->news->comments()->create([
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
