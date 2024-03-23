@extends('layouts.app') {{-- Assuming you have a layout template --}}

@section('content')
    <div class="container">
        <h2>All postsPolicy</h2>
        <a href="{{ route('postsPolicy.create') }}" class="btn btn-primary mb-3">Add New Post</a>

        @foreach ($postsPolicy as $post)
            @can('view', $post)
                <div class="card mb-3">
                    <div class="card-header">
                        <h2><a href="{{ route('postsPolicy.view', ['post' => $post->id]) }}">{{ $post->title }}</a></h2>
                    </div>
                    <div class="card-body">
                        <p>Published on {{ $post->created_at->format('F j, Y') }}</p>
                        <p>{!! nl2br(e(Str::limit($post->content, 200))) !!} <a href="{{ route('postsPolicy.view', ['post' => $post->id]) }}">Read more</a></p>
                    </div>
                </div>
            @endcan
        @endforeach

        {{ $postsPolicy->links() }} {{-- Pagination links --}}
    </div>
@endsection