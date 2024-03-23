<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

//যেন লগিন ছাড়া এক্সেস করতে না পারে, সে জন্য নিচের মতো করে Constructor Method টি লিখুন। এবং আমরা যেন Role এবং পারমিশন এর জন্য Gate ব্যবহার করতে পারি তাই Gate Facade টি use করুন একই সাথে Post Model টি use করুন :

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::with('user')->get();
        // dd($posts);
        return view('posts.show', compact('posts'));
    }

    public function create()
    {
        $posts = Post::with('user')->get();
        // dd($posts);
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // Create the post
        $post = Post::create([
            'user_id' => Auth::id(), // Assuming you want to associate the post with the current user
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('posts.show', ['post' => $post->id])->with('success', 'Post created successfully.');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
         // Check if the user is authorized to update the post
        if (Gate::allows('update-post', $post))
        {
            // User is authorized to update the post
            // Return the edit view or implement your logic here
            $post = Post::findOrFail($id);
            return view('posts.edit', ['post' => $post]);
        }
        else
        {
            // User is not authorized to update the post
            abort(403, "You are not authorized to update this post.");
        }
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        // Check if the user is authorized to update the post
        if (Gate::allows('update-post', $post))
        {
            // User is authorized to update the post
            // Validate the request data
            $request->validate([
                'title' => 'required',
                'content' => 'required',
            ]);

            // Update the post
            $post->update([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
            ]);

            return redirect()->route('posts.show', ['post' => $post->id])->with('success', 'Post updated successfully.');
        }
        else
        {
            // User is not authorized to update the post
            abort(403, "You are not authorized to update this post.");
        }
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        // Check if the user is authorized to delete the post
        if (Gate::allows('delete-post', $post))
        {
            // User is authorized to delete the post
            $post->delete();
            return redirect()->route('posts.show')->with('success', 'Post deleted successfully.');
        }
        else
        {
            // User is not authorized to delete the post
            abort(403, "You are not authorized to delete this post.");
        }
    }
}
