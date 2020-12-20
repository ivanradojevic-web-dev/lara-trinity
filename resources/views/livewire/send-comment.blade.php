<div>
	@if (Auth::check()) 

	@if (session("message"))
    <div x-data="{ isOpen: true }" x-show="isOpen" class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-indigo-600">
        <span class="text-xl inline-block mr-5 align-middle">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
        </span>
        <span class="inline-block align-middle mr-8">
            {{ session('message') }}                             
        </span> 
        <button @click="isOpen = false" class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
    		<span>×</span>
  		</button>                              
    </div>
    @endif
                                  
    <div class="login shadow border-1 border-gray-400 p-4">
        <p class="tracking-wider font-bold text-gray-700">Comments</p>
        <h4 class="tracking-wider text-2xl font-extrabold text-gray-900">Join the conversation</h4>
        <p>You are signed in, <span>{{ Auth::user()->name }}</span></p>
        <form wire:submit.prevent="sendComment">
        	<input wire:model.lazy="content" type="text" class="block w-full" placeholder="Add your comment...">
        	@error('content')
        		<p class="text-red-500 mt-1">{{ $message }}</p>
      		@enderror
        	<button type="submit" class="mt-4 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                Post
            </button>
            <button type="button" wire:click="clearContent" class="ml-2 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 text-base font-medium text-gray-900">
                Cancel
            </button>
        </form>	
        <p class="text-sm">Comments must follow the house rules</p>    
    </div>
    
    @else
    <div class="login shadow border-1 border-gray-400 p-4">
        <p class="tracking-wider font-bold text-gray-700">Comments</p>
        <h4 class="tracking-wider text-2xl font-extrabold text-gray-900">Join the conversation</h4>
        <p>Sign in to comment and reply</p>
        <a href="{{ route('login') }}">
            <button class="whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                Login
            </button>
        </a>
        <p class="text-sm">Comments must follow the house rules</p>    
    </div>
    @endif
</div>
