@extends('layouts.app')

@section('content')
<div class="content-page">
  <div class="content">
    <div class="container">

       <!-- Page-Title -->
       <div class="row">
          <div class="col-sm-12">
              <h4 class="pull-left page-title">Show All Post by user {{ Auth::user()->name }}</h4>
              <ol class="breadcrumb pull-right">
                  <li><a href="#">Moltran</a></li>
                  <li class="active">Post</li>
              </ol>
          </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                              <table id="datatable" class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">ID:</th>
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
                                            <a class="btn btn-info" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                                            @endcan
                                            </div>

                                            <div class="col-md-4">
                                            @can('delete-post', $post)
                                            {{-- <form action="{{ route('posts.delete', ['post' => $post->id]) }}" method="POST">
                                              @csrf
                                              @method('DELETE')
                                              <button id="delete" type="submit" class="btn btn-danger">Delete</button>
                                            </form> --}}
                                            <a href="{{URL::to('posts/'.$post->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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
                </div>
            </div> <!-- end col -->
            </div>
        </div>
      </div>

    </div> <!-- container -->
  </div> <!-- content -->
</div>
@endsection