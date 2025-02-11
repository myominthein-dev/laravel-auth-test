<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class=" text-2xl font-semibold">Your Own Categories</h2>

        @foreach ($categories as $category ) 
            <div class="rounded-lg shadow-md overflow-hidden hover:shadow-lg  transition-shadow     duration-300">
                <div class="p-6 flex justify-between">
                    <div class="flex font-semibold text-lg flex-wrap gap-2 ">
                         {{ $category->name }}
                    </div>
                    <div class="flex font-semibold text-lg flex-wrap gap-2 ">
                        <a href="{{ route('category.edit',$category) }}" class="bg-blue-400 px-3 py-2 rounded-lg text-white">Edit</a>
                        
                        <form action="{{ route('category.destroy',$category) }}" method="POST">
                            @method('delete')
                            @csrf
                        <button onclick="return confirm()" class="bg-red-400 px-3 py-2 rounded-lg text-white">Delete</button>

                        </form>
                   </div>
                </div>
    
            </div>
        
            
        @endforeach
</x-app-layout>
