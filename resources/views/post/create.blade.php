<x-app-layout>
    <div class="max-w-7xl  mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Create New Post</h1>
    
        <form action="{{ route('post.store') }}" method="POST" class="bg-white rounded-lg shadow-md p-6">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                <input type="text" name="title" id="title" class="shadow appearance-none border   rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-400 @enderror" value="{{ old('title') }}" >
                <br>
                @error('title')
                    <p class="text-red-400 text-xs font-semibold">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                <textarea name="description" id="description" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') border-red-400 @enderror" >{{ old('description') }}</textarea>
                @error('description')
                <p class="text-red-400 text-xs font-semibold">{{ $message }}</p>
            @enderror
            </div>
    
            <div class="mb-4">
                <label for="categories" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
                <select class="@error('category') border-red-400 @enderror" name="category">
                    <option value="">Select category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                <p class="text-red-400 text-xs font-semibold">{{ $message }}</p>
            @enderror
            </div>
    
            <div class="flex items-center gap-3 justify-end">
                <a  href="{{ route('post.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Back</a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Create Post
                </button>
            </div>
        </form>
    </div>
</x-app-layout>