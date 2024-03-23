<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;

class PostPolicyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Retrieve all postsPolicy from the database
        $postsPolicy = Post::orderBy('created_at', 'desc')->paginate(10);

        // Return the view with the postsPolicy data
        return view('postsPolicy.index', compact('postsPolicy'));
    }

    public function view(Post $post)
    {
        // Authorize the view action using the PostPolicy
        $this->authorize('view', $post);

        // View logic:
        // Display the post content.
        return view('postsPolicy.view', compact('post'));
    }

    public function create()
    {
        // Authorize the create action using the PostPolicy
        $this->authorize('create', Post::class);

        // Create logic:
        // Show a form to create a new post.
        return view('postsPolicy.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'is_published' => 'boolean',
        ]);

        // Create the post with the user as the author.
        $post = new Post();
        $post->user_id = Auth::id(); // Assign the current user as the author.
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->is_published = isset($validatedData['is_published']) ? true : false;
        $post->save();

        // Redirect to the post view page or some other appropriate action.
        return redirect()->route('postsPolicy.view', ['post' => $post->id]);
    }

    public function edit(Post $post)
    {
        // Authorize the update action using the PostPolicy
        $this->authorize('update', $post);

        // Edit logic:
        // Show an edit form for the post.
        return view('postsPolicy.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // Authorize the update action using the PostPolicy
        $this->authorize('update', $post);

        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'is_published' => 'boolean',
        ]);

        // Update the post based on the submitted form data.
        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->is_published = isset($validatedData['is_published']) ? true : false;
        $post->save();

        // Redirect to the post view page or some other appropriate action.
        return redirect()->route('postsPolicy.view', ['post' => $post->id]);
    }

    public function delete(Post $post)
    {
        // Authorize the delete action using the PostPolicy
        $this->authorize('delete', $post);

        // Delete logic:
        // Show a confirmation page for deleting the post.
        return view('postsPolicy.delete', compact('post'));
    }

    public function destroy(Post $post)
    {
        // Authorize the delete action using the PostPolicy
        $this->authorize('delete', $post);

        // Delete the post.
        $post->delete();

        // Redirect to a post list or some other appropriate action.
        return redirect()->route('postsPolicy.index');
    }
}
