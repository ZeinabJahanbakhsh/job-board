@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Profile</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <!-- general form elements -->
                    <div class="card">

                        <div class="card-header alert alert-info">
                            <h3 class="card-title">Profile Form: </h3>
                        </div>

                        <form action="{{ route('candidates.store') }}" method="POST" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name">
                                    @error('first_name')
                                    <div class="alert text-red  text-bold mt-1 mb-1 text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name">
                                    @error('last_name')
                                    <div class="alert text-red  text-bold mt-1 mb-1 text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email">
                                    @error('email')
                                    <div class="alert text-red  text-bold mt-1 mb-1 text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter Your Mobile">
                                    @error('mobile')
                                    <div class="alert text-red  text-bold mt-1 mb-1 text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">File</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file" name="file">
                                            @error('file')
                                            <div class="alert text-red  text-bold mt-1 mb-1 text-red-600">{{ $message }}</div>
                                            @enderror
                                            <label class="custom-file-label" for="file">Upload Your Resume</label>
                                        </div>
                                        {{--<div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@stop
