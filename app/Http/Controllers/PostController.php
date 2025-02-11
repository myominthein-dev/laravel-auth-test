<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

use function Pest\Laravel\post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('user_id',Auth::id())->get();

        return view('post.index',['posts' => $posts]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $request->validate([
            'title' => 'bail|required|unique:posts|max:255',
            'description' => 'bail|required',
            'category' => 'bail|required'
        ]);
        
        Post::create(['title'=>$request->title, 'description' => $request->description, 'category_id' => $request->category, 'user_id' => Auth::id()]);

        return redirect()->route('post.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if ($post->user_id != Auth::id()) {
            return abort('403');
        }
        return view('post.show',['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if ($post->user_id != Auth::id()) {
            return abort('403');
        }
        $categories = Category::where('user_id',Auth::id())->get();
        return view('post.update',['post'=>$post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if ($post->user_id != Auth::id()) {
            return abort('403');
        }

         $request->validate([
            'title' => ['required', Rule::unique('posts')->ignore($post->id)],
            'description' => 'required',
            'category' => 'required'
         ]);

        $post->update(['title' => $request->title, 'description' => $request->description, 'category' => $request->category]);

        $posts = Post::where('user_id',Auth::id())->get();
        return redirect()->route('post.index',['posts' => $posts]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->user_id != Auth::id()) {
            return abort('403');
        }
        $post->delete();
        $posts = Post::where('user_id', Auth::id())->get();

        return redirect()->route('post.index',['posts' => $post]);
    }
}
