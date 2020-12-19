<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('comments.index') }}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Comments
        </h2>
        </a>
        <div>
        <x-nav-link :href="route('comments.index', ['channel' => 'posts'])" 
            :active="request()->fullUrl() == route('comments.index', ['channel' => 'posts'])">
            Post Comments
        </x-nav-link>
        <x-nav-link :href="route('comments.index', ['channel' => 'news'])" 
            :active="request()->fullUrl() == route('comments.index', ['channel' => 'news'])">
            News Comments
        </x-nav-link>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(!count($comments))
                <p class="text-center font-bold text-3xl">No comments found!</p>
            @else
                <div class="bg-white mb-8 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    @if (session("message"))
                                    <div x-data="{ isOpen: true }" x-show="isOpen; setTimeout(() => isOpen = false, 1800);" class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-indigo-600">
                                        <span class="text-xl inline-block mr-5 align-middle">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        </span>
                                        <span class="inline-block align-middle mr-8">
                                            {{ session('message') }}
                                        </span>                               
                                    </div>
                                    @endif 
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    <span>Author</span>
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    <span>Content</span>
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    <span>Replies</span>
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    <span>Status</span>
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    <span>Channel</span>
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    <span class="mr-6">Actions</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($comments as $comment)
                                            <tr class="{{ $loop->iteration % 2 ? 'bg-white' : 'bg-gray-50' }}">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $comment->author->name }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ Str::limit($comment->content, 33) }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $comment->replies_count }}
                                                </td>
                                                <livewire:comment-status :comment="$comment"/>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $comment->channel }}                                                
                                                </td>                                             
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    @if ($comment->channel === 'Post')
                                                    <a href="{{ route('post.show', $comment->posts[0]->id) }}" target="_blank" class="text-indigo-600 hover:text-indigo-900">View</a>
                                                    @elseif ($comment->channel === 'News')
                                                    <a href="{{ route('news.show', $comment->news[0]->id) }}" target="_blank" class="text-indigo-600 hover:text-indigo-900">View</a>
                                                    @endif
                                                    <form class="inline-block" action="{{ route('comments.destroy', $comment->id) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="ml-4 text-indigo-600 hover:text-indigo-900">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{ $comments->links() }}
            @endif
        </div>
    </div>
</x-app-layout>