@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All your received resumes</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header alert alert-info">
                            <h3 class="card-title">Received Resume</h3>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered table-hover">

                                <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Mobile Number</th>
                                    <th>Show Resume</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($allReceivedCandidateResumes as $resume)

                                    <tr>

                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $resume->full_name }}</td>

                                        <td>{{ $resume->email }}</td>

                                        <td>{{ $resume->mobile }}</td>

                                        <td>
                                            <a href="{{ route('show-resume', $resume->id) }}" type="button" class="btn-sm btn-success">
                                                View Resume
                                            </a>
                                        </td>

                                    </tr>

                                @endforeach
                                </tbody>

                            </table>
                        </div>

                        <div class="card-footer clearfix">
                            {{ $allReceivedCandidateResumes->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop


