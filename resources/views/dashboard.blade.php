<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex items-center justify-center gap-4">

                    <a href="{{ route('category.create') }}"  class="bg-green-400 p-2 text-sm rounded-lg text-white">Create Category</a>
                    <a href="{{ route('post.create') }}" class="bg-green-400 p-2 text-sm rounded-lg text-white">Create Post</a>
                    <a href="{{ route('post.index') }}" class="bg-green-400 p-2 text-sm rounded-lg text-white">View Your Posts</a>
                    <a href="{{ route('category.index') }}" class="bg-green-400 p-2 text-sm rounded-lg text-white">View Your Categories</a>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
