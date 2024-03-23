@extends('layouts.app')
 
@section('content')
    <div class="container">
        <h2>Edit Post</h2>
        <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST">
            @csrf
            @method('PUT')
 
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
            </div>
 
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content">{{ $post->content }}</textarea>
            </div>
 
            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </div>
@endsection