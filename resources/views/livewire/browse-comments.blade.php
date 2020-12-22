<div>
<div class="mt-4">
    @foreach($comments as $comment)
    <div class="bg-white rounded shadow overflow-hidden border-b-2 border-indigo-500 mb-8">      
        <div class="flex flex-col p-4">
            <div class="flex items-center"> 
                <div>
                    <img class="w-16 h-16 rounded-full" src="https://st3.depositphotos.com/13159112/17145/v/600/depositphotos_171453724-stock-illustration-default-avatar-profile-icon-grey.jpg">                       
                </div>
                <div class="ml-6">
                    <div class="text-sm text-gray-700 font-bold">{{ $comment->author->name }}</div>
                    <div class="text-sm text-gray-600">{{ $comment->author->email }}</div>
                </div>
            </div>
            <div class="">
                <p>{{ $comment->content }}</p>
            </div> 
            @if(Auth::check())
            <div class="flex">
            	@if(!$form)
            	<button wire:click="openForm( {{ $comment->id }} )" class="text-indigo-600 text-opacity-80">Reply</button>
            	@endif
            	@if($form && $commentId === $comment->id)
            	<button wire:click="closeForm( {{ $comment->id }} )" class="text-indigo-600 text-opacity-80">Close</button>
            	@endif
            </div>   
            @endif
        </div>
        @if($form && $commentId === $comment->id)
        <div>
        	<form wire:submit.prevent="sendReply" class="ml-8">
        		<label>Your reply to {{ $comment->author->name }}</label>
        		<input wire:model.defer="reply" type="text" class="block w-full bg-gray-100" placeholder="Add your reply...">
            	@error('reply')
        		<p class="text-red-500">{{ $message }}</p>
      			@enderror
        		<button type="submit" class="my-4 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                Reply
            	</button>
        	</form>
        </div>	
        @endif
        @foreach($comment->replies as $reply)
        <div class="ml-8 flex flex-col p-4 border-dotted border-t-4 border-gray-400">
            <div class="flex items-center">                 
                <div>
                    <img class="w-16 h-16 rounded-full" src="https://alliancebjjmn.com/wp-content/uploads/2019/07/placeholder-profile-sq.jpg">
                </div>
                <div class="ml-6">
                    <div class="text-sm text-gray-700 font-bold">{{ $reply->author->name }}</div>
                    <div class="text-sm text-gray-600">{{ $reply->author->email }}</div>
                </div>                              
            </div>
            <div class="">
                <p>{{ $reply->content }}</p>
            </div>
        </div>
        @endforeach 
    </div>
    @endforeach
</div>
{{ $comments->links() }}
</div>

