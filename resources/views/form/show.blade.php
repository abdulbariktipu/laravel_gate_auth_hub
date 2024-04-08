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
                            <li class="active">Show Data</li>
                        </ol>
                    </div>
                </div>
                
                <div>
                                                            
                    <a href="{{ route('form.create') }}" class="btn btn-primary text-right">Create New</a>
                    
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
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Image</th>
                                                            <th scope="col">Skill</th>
                                                            <th scope="col">Gender</th>
                                                            <th scope="col">Country</th>
                                                            <th scope="col">Create Date</th>
                                                            <th scope="col">Update Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($data as $row)
                                                        <tr>
                                                            <th scope="row">{{ $row->id }}</th>
                                                            <td>{{ $row->name }}</td>
                                                            <td><img src="storage/images{{$row->image}}" style="height: 80px; width: 80px;" alt="No Image"></td>
                                                            <td>{{ $row->skill }}</td>
                                                            <td>{{ $row->gender }}</td>
                                                            <td>{{ $row->country }}</td>
                                                            <td>{{ $row->created_at }}</td>
                                                            <td>{{ $row->updated_at }}</td>
                                                            <td>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    {{-- @can > update-form > app\Providers\AuthServiceProvider.php --}}
                                                                @can('update-form', $row)
                                                                <a class="btn btn-info" href="edit/{{ $row->id }}">Edit</a>
                                                                @endcan
                                                                </div>

                                                                <div class="col-md-4">
                                                                @can('delete-form', $row)
                                                                <a id="delete" class="btn btn-danger" href="delete/{{ $row->id }}">Delete</a>
                                                                @endcan
                                                                </div>
                                                            </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
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

            </div>
        </div>
    </div>
@endsection