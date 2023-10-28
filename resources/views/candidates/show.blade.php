@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Account Information') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <!-- Header content -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="alert alert-info">
                        {{ __('Your Profile') }}
                    </div>

                    <!-- Main content -->
                    <div class="card">
                        <div class="card-body table-responsive ">

                            <table class="table table-hover table-bordered">

                                <tbody>

                                <tr>
                                    <td class="col-3">FirstName:</td>
                                    <td>{{ $candidate->first_name }}</td>
                                </tr>

                                <tr>
                                    <td class="col-3">Last Name:</td>
                                    <td>{{ $candidate->last_name }}</td>
                                </tr>

                                <tr>
                                    <td class="col-3">Email:</td>
                                    <td>{{ $candidate->email }}</td>
                                </tr>

                                <tr>
                                    <td class="col-3">Mobile:</td>
                                    <td>{{ $candidate->mobile }}</td>
                                </tr>

                                <tr>
                                    <td class="col-3">Resume:</td>
                                    <td>{{ $candidate->file }}</td>
                                </tr>

                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
