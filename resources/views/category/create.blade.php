<x-app-layout>
    <form method="POST" action="{{ route('category.store') }}">
        @csrf
        @method('post')
        <div class="max-w-7xl mx-auto px-4">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-xl font-bold mb-2">Name</label>
                <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-400 @enderror" >
                @error('name') <p class="text-red-400 text-xs font-semibold">{{ $message }}</p> @enderror
            </div>
            <div class="flex items-center justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Create Category
                </button>
            </div>
        </div>
    </form>
</x-app-layout>