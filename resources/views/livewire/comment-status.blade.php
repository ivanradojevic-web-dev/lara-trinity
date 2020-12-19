@if($comment->is_active)
<td class="px-6 py-4 whitespace-nowrap text-sm text-white">
    <button disabled class="p-1 bg-green-400 cursor-default">{{ $comment->status }}</button>
</td>                                              
@else
<td class="px-6 py-4 whitespace-nowrap text-sm text-white">
    <form wire:submit.prevent="editStatus">         
        <button type="submit" class="p-1 bg-yellow-400 hover:bg-yellow-300 shadow">
        {{ $comment->status }}
        </button>
    </form>    
</td>
@endif


