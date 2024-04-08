@extends('layouts.app')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Edit Post by user {{ Auth::user()->name }}</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Moltran</a></li>
                            <li class="active">Edit Form</li>
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
                                                <form action="{{ url('update_data', $row->id) }}" method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="formGroupExampleInput" class="form-label">Name</label>
                                                        <input type="text" name="name" class="form-control" id="name" value="{{ $row->name }}">
                                                      </div>
                                                      <div class="mb-3">
                                                        <label for="formGroupExampleInput2" class="form-label">Image</label>
                                                        <input type="file" name="image" class="form-control" id="image">
                                                      </div>
  
                                                      <br>
                                                      <legend>Skill</legend>
  
                                                      <div class="form-check">
                                                        <input class="form-check-input" name="skill[]" type="checkbox" value="Php" id="flexCheckDefault" {{ in_array('Php', explode(',', $row->skill )) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                          Php
                                                        </label>
                                                      </div>
                                                      <div class="form-check">
                                                        <input class="form-check-input" name="skill[]" type="checkbox" value="Laravel" id="flexCheckChecked"  {{ in_array('Laravel', explode(',', $row->skill )) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                          Laravel
                                                        </label>
                                                      </div>
                                                      <div class="form-check">
                                                        <input class="form-check-input" name="skill[]" type="checkbox" value="Java" id="flexCheckChecked"  {{ in_array('Java', explode(',', $row->skill )) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                          Java
                                                        </label>
                                                      </div>
  
                                                      <legend>Gender</legend>
  
                                                      <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Male" {{ $row->gender==='Male' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                          Male
                                                        </label>
                                                      </div>
                                                      <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="Female" {{ $row->gender==='Female' ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="flexRadioDefault2">
                                                          Female
                                                        </label>
                                                      </div>
  
                                                      <select class="form-select" name="country" aria-label="Default select example">
                                                        <option>Country</option>
                                                        <option value="USA" {{ $row->country==='USA' ? 'selected' : '' }}>USA</option>
                                                        <option value="UK" {{ $row->country==='UK' ? 'selected' : '' }}>UK</option>
                                                        <option value="BD" {{ $row->country==='BD' ? 'selected' : '' }}>BD</option>
                                                      </select>
                                                      <br>
                                                      <br>    
                                                    <button type="submit" class="btn btn-primary">Update</button>
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