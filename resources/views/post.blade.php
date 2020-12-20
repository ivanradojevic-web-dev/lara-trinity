<x-guest-layout>
    <div class="relative py-16 bg-white overflow-hidden">
        <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:h-full lg:w-full">
            <div class="relative h-full text-lg max-w-prose mx-auto" aria-hidden="true">
                <svg class="absolute top-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)" />
                </svg>
                <svg class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)" />
                </svg>
                <svg class="absolute bottom-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="d3eb07ae-5182-43e6-857d-35c643af9034" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#d3eb07ae-5182-43e6-857d-35c643af9034)" />
                </svg>
            </div>
        </div>
        <div class="relative px-4 sm:px-6 lg:px-8">
            <div class="text-lg max-w-prose mx-auto">
                <span class="block text-base text-center text-indigo-600 font-semibold tracking-wide uppercase">Post</span>
                <h1>
                    <span class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">{{ $post->title }}</span>
                </h1>
            </div>
            <div class="mt-6 prose prose-indigo prose-lg text-gray-500 mx-auto">
                <p>{!! nl2br(e($post->content)) !!}</p>
            </div>
            <div class="mt-6 prose prose-indigo prose-lg text-gray-500 mx-auto">
                <hr>

                <livewire:send-comment :post="$post"/> 

            <div class="mt-4">
                @foreach($comments as $comment)
                <div class="bg-white rounded shadow overflow-hidden border-b-2 border-indigo-500 mb-8">      
                    <div class="flex flex-col p-4">
                        <div class="flex items-center">                 
                            <div>
                                <img class="w-16 h-16 rounded-full" src="https://st3.depositphotos.com/13159112/17145/v/600/depositphotos_171453724-stock-illustration-default-avatar-profile-icon-grey.jpg">
                                </img>
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
                                </img>
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
            </div>
        </div>
    </div>

</x-guest-layout>