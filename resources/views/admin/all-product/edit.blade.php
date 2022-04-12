@extends('layouts.app-layouts.admin-app.app')
@section('title', 'All Product')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Update The Product</h4>
                </div>
                <form action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Image1</label>
                            <input type="file" name="image1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        {{-- <label for="exampleInputEmail1" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> --}}
                        <div class="row form-group">
                            <label for="select" class=" form-control-label mt-2">Categories</label>
                            <div class="col-12 col-md-12">
                                <select name="main_category_id" id="select" class="form-control">
                                    @foreach($mainCategories as $mainCategory)
                                    <option value="{{$mainCategory->id}}"
                                        @if ($mainCategory->id == $product->main_category_id){
                                            selected
                                        }
                                        @endif
                                        >{{$mainCategory->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                
                            </div>
                            <div class="row form-group">
                                <label for="select" class=" form-control-label mt-2">Title</label>
                                <div class="col-12 col-md-12">
                                    <select name="sub_category_id" id="select" class="form-control">
                                        @foreach($subCategories as $subCategory)
                                        <option value="{{$subCategory->id}}"
                                            @if ($subCategory->id == $product->sub_category_id){
                                                selected
                                            }   
                                            @endif
                                            >{{$subCategory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Price</label>
                            <input type="text" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$product->price}}">
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Quantity</label>
                            <input type="text" name="quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$product->quantity}}">
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
@section('content')