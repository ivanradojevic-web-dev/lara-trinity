@if($comment->is_active)
<td class="px-6 py-4 whitespace-nowrap text-sm text-white">	
    <button disabled class="h-8 w-16 p-1 bg-green-400 cursor-default">{{ $comment->status }}</button>
</td>                                              
@else
<td class="px-6 py-4 whitespace-nowrap text-sm text-white">
    <form wire:submit.prevent="editStatus">  
    	<button  wire:loading.remove type="submit" class="h-8 w-16 p-1 bg-yellow-400 hover:bg-yellow-300 shadow">
        	{{ $comment->status }}
        </button>       
        <button  wire:loading type="button" class="h-8 w-16 p-1 bg-yellow-400 hover:bg-yellow-300 ">
         	action...
    	</button>
    </form>    
</td>
@endif


