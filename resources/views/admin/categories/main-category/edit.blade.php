@extends('layouts.app-layouts.admin-app.app')
@section('title', 'Edit Main Category')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <form action="{{route('main_categories.update', $mainCategory->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label"> Category Image</label>
                            <input type="file" name="image1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$mainCategory->image1}}">
                        </div>
                        <div class="mb-2 mt-2">
                          <label for="exampleInputEmail1" class="form-label"> Category Name</label>
                          <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$mainCategory->name}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection