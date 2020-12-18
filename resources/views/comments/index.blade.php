<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('comments.index') }}" class="ml-3 font-semibold inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            All Comments
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
                                                    <span>Actions
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
                                                    <a href="#" target="_blank" class="text-indigo-600 hover:text-indigo-900">View</a>
                                                    <form class="inline-block" action="" method="POST">
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