@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header" xmlns="http://www.w3.org/1999/html">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Further Information') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <!-- Header content -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="alert alert-info">
                        Information {{ $advertisementData->title }}
                    </div>

                    <!-- Main content -->
                    <div class="card">
                        <div class="card-body table-responsive ">

                            <table class="table table-hover table-bordered">

                                <tbody>

                                <tr>
                                    <td class="col-3">Description:</td>
                                    <td>{!! $advertisementData->description !!}</td>
                                </tr>


                                <tr>
                                    <td class="col-3">Company Name:</td>
                                    <td>{{ $advertisementData->employer->company_name }}</td>
                                </tr>
                                <tr>
                                    <td class="col-3">Address:</td>
                                    <td>{{ $advertisementData->employer->company_address }}</td>
                                </tr>

                                <tr>
                                    <td class="col-3">Email:</td>
                                    <td>{{ $advertisementData->employer->email }}</td>
                                </tr>

                                <tr>
                                    <td class="col-3">Website:</td>
                                    <td>
                                        <a href={{ $advertisementData->employer->website }}>
                                            {{ $advertisementData->employer->website }}
                                        </a>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="col-3">Phone:</td>
                                    <td>{{ $advertisementData->employer->phone }}</td>
                                </tr>

                                <tr>
                                    <td class="col-3">Created date:</td>
                                    <td>{{ $advertisementData->created_at }}</td>
                                </tr>

                                <tr>
                                    <td class="col-3">Category:</td>
                                    <td>
                                        @if( $advertisementData->category())
                                            <button class="btn bg-indigo btn-sm" style="margin: 2px" type="submit">
                                                {{  $advertisementData->category->name }}
                                            </button>
                                        @else
                                            {{ __('') }}
                                        @endif

                                    </td>
                                </tr>

                                </tbody>

                            </table>

                            @if(Auth::user())
                                @if(Auth::user()->roles()->get()->isNotEmpty())
                                    @if(Auth::user()->roles()->candidateRole()->get()->isNotEmpty())

                                        {{-- <input
                                             class="btn btn-success text-white float-right px-5 py-2"
                                              name="logo" type="file" value=" Send Resume">

                                         @error('logo')
                                         <div class="alert alert-danger text-red-600 mt-1 mb-1">{{ $message }}</div>
                                         @enderror--}}

                                        <form action="{{ route('send-resume' , $advertisementData->id) }}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <button type="submit"
                                                    class="btn btn-success text-white float-right px-5 py-2"
                                                    onclick="return confirm({{ __('Are you sure?') }})"
                                                    value=" Send Resume"/>
                                            <i class="fas fa-upload"></i>
                                            &nbsp;
                                            Send Resume
                                        </form>
                                    @endif
                                @endif
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
