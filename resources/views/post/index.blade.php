<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class=" text-2xl font-semibold">Your Own Posts</h2>

        @foreach ($posts as $post ) 
            <div class="rounded-lg shadow-md overflow-hidden hover:shadow-lg  transition-shadow     duration-300">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-blue-400 mb-2"> Title : {{ $post->title }}</h2>
                    <p class="text-gray-600 mb-4 font-semibold"> <span class="">Description</span> : {{ $post->description }}</p>
                    <div class="flex font-semibold text-lg flex-wrap gap-2 mb-4">
                        Categories : {{ $post->category->name }}
                    </div>
                    <div class="flex font-semibold text-lg flex-wrap gap-2 mb-4">
                        Created By : {{ $post->user->name }}
                    </div>
                    <div class="flex font-semibold text-lg flex-wrap gap-2 ">
                        <a href="{{ route('post.edit',$post) }}" class="bg-blue-400 px-3 py-2 rounded-lg text-white">Edit</a>
                        
                        <form action="{{ route('post.destroy',$post) }}" method="POST">
                            @method('delete')
                            @csrf
                        <button onclick="return confirm()" class="bg-red-400 px-3 py-2 rounded-lg text-white">Delete</button>

                        </form>
                        <a href="{{ route('post.show',$post) }}" class="bg-blue-400 px-3 py-2 rounded-lg text-white">View Only</a>

                   </div>
                </div>
    
            </div>
        
            
        @endforeach
</x-app-layout>
