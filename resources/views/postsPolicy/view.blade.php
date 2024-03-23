@extends('layouts.app') {{-- Assuming you have a layout template --}}

@section('content')
    <div class="container">
        <h2>{{ $post->title }}</h2>
        <p>Published on {{ $post->created_at->format('F j, Y') }}</p>

        <div class="post-content">
            {!! nl2br(e($post->content)) !!}
        </div>

        @can('update', $post)
            <p><a href="{{ route('postsPolicy.edit', ['post' => $post->id]) }}">Edit Post</a></p>
        @endcan

        @can('delete', $post)
            <form action="{{ route('postsPolicy.destroy', ['post' => $post->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Post</button>
            </form>
        @endcan
    </div>
@endsection