@extends('layouts.app')
 
@section('content')
<div class="container">
    <h3>{{ Auth::user()->name }}</h3>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-8">
 
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">User</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
 
                    @foreach ($posts as $post)
                     <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>
                          <div class="row">
                            <div class="col-md-4">
                          @can('update-post', $post)
                            <a class="btn btn-info" href="{{ route('posts.edit', ['post' => $post->id]) }}">Edit</a>
                            @endcan
                            </div>
                            <div class="col-md-4">
                            @can('delete-post', $post)
                            <form action="{{ route('posts.delete', ['post' => $post->id]) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                            @endcan
                            </div>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                      <div>
                           
                          <a href="{{ route('posts.create') }}" class="btn btn-primary text-right">Create New Post</a>
                           
                      </div>
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection