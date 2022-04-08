@extends('layouts.app-layouts.admin-app.app')
@section('title', 'Edit Sub Category')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <form action="{{route('sub_category.update', $subCategory->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-2 mb-2">
                            <select name="main_category_id" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                                @foreach($main_categories as $main_category)
                                    <option value="{{$main_category->id}}"
                                     @if ($main_category->id == $subCategory->main_category_id)
                                     selected
                                    @endif>{{$main_category->name}}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class="mb-2 mt-5">
                          <label for="exampleInputEmail1" class="form-label"> Category Name</label>
                          <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$subCategory->name}}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button> --}}
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection