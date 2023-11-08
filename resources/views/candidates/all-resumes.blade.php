@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All your submitted resumes</h1>
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
                            <h3 class="card-title">Submitted Resume</h3>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered table-hover">

                                <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Company</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>View</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($submittedResumes as $advertisement)

                                    <tr data-widget="expandable-table" aria-expanded="false">

                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $advertisement->employer->company_name }}</td>

                                        <td>{{ $advertisement->title}}</td>

                                        <td> {!! Str::limit($advertisement->description, 400); !!} </td>

                                        <td>
                                            <a href="{{ route('show-job', $advertisement->id) }}" type="button"
                                               class="btn-sm bg-green">View</a>
                                        </td>

                                    </tr>

                                @endforeach
                                </tbody>

                            </table>
                        </div>

                        <div class="card-footer clearfix">
                            {{ $submittedResumes->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
