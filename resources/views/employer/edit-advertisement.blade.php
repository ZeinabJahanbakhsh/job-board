@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Advertisement</h1>
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
                            <h3 class="card-title">Edit Form: {{ $advertisementData->title }} </h3>
                        </div>

                        <form action="{{ route('update-advertisement', [$advertisementData->employer_id,$advertisementData->id]) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            {{ csrf_field() }}

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{$advertisementData->title}}">
                                    @error('title')
                                    <div class="alert text-red  text-bold mt-1 mb-1 text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea type="text" class="form-control" id="description" name="description">
                                        {{ $advertisementData->description }}
                                    </textarea>
                                    @error('description')
                                    <div class="alert text-red  text-bold mt-1 mb-1 text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="block mb-2" for="category_id"> Category</label>
                                        <select  id="category_id" name="category_id" multiple class="col-4 form-control">
                                            <option selected value="{{ $advertisementData->category->id }}" class="text-bold">
                                                {{ $advertisementData->category->name }}
                                            </option>
                                            @foreach($allCategories as $category)
                                                <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('tag_id')
                                        <div class="alert alert-danger mt-1 mb-1 text-red-600">{{ $message }}</div>
                                        @enderror

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

@section('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection

