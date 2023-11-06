@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Online Your Advertising Jobs</h1>
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
                            <h3 class="card-title">Your advertisements</h3>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered table-hover">

                                <thead>
                                <tr>
                                    <th>Num</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($advertisementsOfEmployer as $advertisements)
                                    <tr>

                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $advertisements->title }}</td>

                                        <td> {!! Str::limit($advertisements->description, 500); !!} </td>

                                        <td class="text-center">
                                            <span class="label label-success">
                                                <button class="btn bg-indigo btn-sm" style="margin: 1px" type="submit">
                                                    {{ $advertisements->category->name }}
                                                </button>
                                            </span>
                                        </td>

                                        <td class="text-center">
                                            <a href="{{ route('show-job', $advertisements->id) }}" type="button" class="btn-sm btn-success">View</a>
                                            <a href="{{ route('edit-advertisement', [$advertisements->employer_id, $advertisements->id]) }}" type="button"
                                               class="btn-sm btn-primary m-1">
                                                Edit
                                            </a>

                                            <form action="{{ route('destroy-advertisement', [$advertisements->employer_id, $advertisements->id]) }}" method="POST"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit"
                                                       class="btn-sm btn-danger"
                                                       onclick="return confirm({{ __('Are you sure?') }})"
                                                       value="Delete"/>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer clearfix">
                            {{ $advertisementsOfEmployer->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
