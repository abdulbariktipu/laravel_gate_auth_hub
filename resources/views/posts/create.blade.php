@extends('layouts.app')
 
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Create Post by user {{ Auth::user()->name }}</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Moltran</a></li>
                            <li class="active">Create Post</li>
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
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection