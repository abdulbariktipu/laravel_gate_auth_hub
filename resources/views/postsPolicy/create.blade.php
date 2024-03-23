@extends('layouts.app') {{-- Assuming you have a layout template --}}

@section('content')
    <div class="container">
        <h2>Create a New Post</h2>

        <form method="POST" action="{{ route('postsPolicy.store') }}">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" name="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
            </div>

            <div class="form-check">
                <input type="checkbox" id="is_published" name="is_published" class="form-check-input" value="1" {{ old('is_published') ? 'checked' : '' }}>
                <label class="form-check-label" for="is_published">Publish this post</label>
            </div>

            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
@endsection