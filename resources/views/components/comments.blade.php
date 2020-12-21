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
        </div>
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
    </div>
    @endforeach
</div>
@endforeach
{{ $comments->links() }}    