@extends('layouts.app')
 
@section('content')
    <div class="container">
        <h2>Create New Post</h2>
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
 
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
 
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content"></textarea>
            </div>
 
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
@endsection