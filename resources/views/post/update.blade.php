<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Edit Post</h1>
    
        <form action="{{ route('post.update', $post) }}" method="POST" class="bg-white rounded-lg shadow-md p-6">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-400 @enderror" >
                @error('title')
                <p class="text-red-400 text-xs font-semibold">{{ $message }}</p>
            @enderror
            </div>
    
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea name="description" id="description" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-400 @enderror" >{{ old('description', $post->description) }}</textarea>
                @error('description')
                <p class="text-red-400 text-xs font-semibold">{{ $message }}</p>
            @enderror
            </div>
    
            <div class="mb-4">
                <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
                <select class="@error('category') border-red-400 @enderror" name="category">
                    <option value="">Select category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($post->category_id == $category->id)
                            selected
                        @endif >{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                <p class="text-red-400 text-xs font-semibold">{{ $message }}</p>
            @enderror
            </div>
    
            
    
            <div class="flex items-center gap-4 justify-end">
                <a href="{{ route('post.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Back</a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update Post
                </button>
            </div>
        </form>
    </div>
</x-app-layout>