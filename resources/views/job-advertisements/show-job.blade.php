@extends('layouts.app')

@section('content')

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <!-- Header content -->
            <div class="row pt-5 pb-3">

                <div class="col-sm-6">
                    <h3>Information {{ $employer->title }}:</h3>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary text-white float-right px-5 py-2" href="#" role="button">
                        <i class="fas fa-upload"></i>
                        Send Resume
                    </a>
                </div>

            </div>

            <!-- Main content -->
            <div class="card">
                <div class="card-body table-responsive ">
                    <table class="table table-hover table-bordered">
                        <tbody>

                        <tr>
                            <td class="col-3">Description:</td>
                            <td>{{ $employer->description }}</td>
                        </tr>

                        <tr>
                            <td class="col-3">Company Name:</td>
                            <td>{{ $employer->company_name }}</td>
                        </tr>

                        <tr>
                            <td class="col-3">Address:</td>
                            <td>{{ $employer->company_address }}</td>
                        </tr>

                        <tr>
                            <td class="col-3">Email:</td>
                            <td>{{ $employer->email }}</td>
                        </tr>

                        <tr>
                            <td class="col-3">Website:</td>
                            <td>{{ $employer->website }}</td>
                        </tr>

                        <tr>
                            <td class="col-3">Phone:</td>
                            <td>{{ $employer->phone }}</td>
                        </tr>

                        <tr>
                            <td class="col-3">Created date:</td>
                            <td>{{ $employer->created_at }}</td>
                        </tr>

                        <tr>
                            <td class="col-3">Tags:</td>
                            <td>
                                <a class="btn bg-indigo btn-sm" href="#" role="button">Laravel</a>
                                <button class="btn bg-indigo btn-sm" style="margin: 2px" type="submit">php
                                </button>
                                <button class="btn bg-indigo btn-sm" style="margin: 2px" type="submit">
                                    nodeJs
                                </button>
                                <button class="btn bg-indigo btn-sm " style="margin: 2px" type="submit">
                                    MySql
                                </button>
                                <button class="btn bg-indigo btn-sm " style="margin: 2px" type="submit">
                                    Docker
                                </button>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
