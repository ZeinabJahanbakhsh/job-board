@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Send Resume</h1>
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
                            <h3 class="card-title">Choose One Of Ways: </h3>
                        </div>

                        <form action="{{ route('store-resume', [Auth::user()->candidate_id, Request::route('advertisement')]) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="card-body">

                                @if ( isset($status))
                                    <div class="alert text-danger  text-bold col-4">
                                        {{ $status }}
                                    </div>
                                @endif

                                <!-- From Your Computer -->
                                <div class="form-group">
                                    <div class="input-group mb-4">
                                        <div class="custom-file">
                                            <label class="col-2" for="pc-file"> From Your Computer: </label>
                                            <input type="file" name="pc-file" id="pc-file" class="form-control col-6">
                                            <button type="submit" class="btn btn-success col-2 mx-4">
                                                <i class="fas fa-upload"></i>
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                    @error('pc-file')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <!-- From Your Dashboard -->
                                    <div class="input-group">
                                        <label for="dashboard-file" class="col-2"> From Your Dashboard: </label>
                                        <div class="custom-file">
                                            <button type="submit" class="btn btn-success col-2 mx-4" name="dashboard-file" value="dashboard-file">
                                                <i class="fas fa-upload"></i>
                                                Submit
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>

@stop
