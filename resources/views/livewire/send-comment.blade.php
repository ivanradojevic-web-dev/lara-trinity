<div>
	@if (Auth::check()) 
    <div class="login shadow border-1 border-gray-400 p-4">
        <p class="tracking-wider font-bold text-gray-700">Comments</p>
        <h4 class="tracking-wider text-2xl font-extrabold text-gray-900">Join the conversation</h4>
        <p>You are signed in, <span>{{ Auth::user()->name }}</span></p>
        <form>
        	<input type="text" class="block w-full" placeholder="Add your comment...">
        	<button type="submit" class="mt-4 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                Post
            </button>
            <button class="ml-2 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 text-base font-medium text-gray-900">
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
