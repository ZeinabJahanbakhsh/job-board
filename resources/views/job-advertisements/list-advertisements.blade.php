@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Online Advertising Jobs</h1>
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
                            <h3 class="card-title">Employment advertisements</h3>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered table-hover">

                                <thead>
                                <tr>
                                    <th>Company Name</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($allAdvertisements as $advertisement)

                                    <tr data-widget="expandable-table" aria-expanded="false">

                                        <td>{{ $advertisement->employer->company_name }}</td>

                                        <td>{{ $advertisement->title}}</td>

                                        <td> {!! Str::limit($advertisement->description, 100); !!} </td>

                                        <td>
                                             <span class="label label-success">
                                                 @if($advertisement->category())
                                                     <button class="btn bg-indigo btn-sm" style="margin: 1px" type="submit">
                                                         {{$advertisement->category->name}}
                                                         </button>
                                                 @else
                                                     {{ __('') }}
                                                 @endif
                                           </span>
                                        </td>

                                        <td>
                                            <a href="{{ route('show-job', $advertisement->id) }}" type="button" class="btn-sm bg-green">View</a>
                                        </td>

                                    </tr>

                                    <tr class="expandable-body d-none">
                                        <td colspan="5">
                                            <p style="display: none;">
                                                {{ $advertisement->description }}
                                            </p>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>

                            </table>
                        </div>

                        <div class="card-footer clearfix">
                            {{ $allAdvertisements->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
