@extends('layouts.app-layouts.admin-app.app')
@section('title', 'All Product')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <button type="button" class="btn btn-info mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                + Add New
              </button>
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">All Product Table</strong>
                </div>
                <div class="card-body">
                    <table class="table table-success table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Image1</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delate</th>
                                <th scope="col">WishList</th>
                                <th scope="col">Add Cart</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{$product->id}}</th>
                                <td><img src="{{url($product->image1)}}" alt="" height="50" ></td>
                                <td>
                                    <a href="{{route('products.edit', $product->id)}}" class="btn btn-primary"><i class="fa  fa-edit (alias)"></i></a>
                                    <a href="{{route('products.show', $product->id)}}" class="btn btn-secondary">Details</a>
                                </td>
                                <td>
                                    <form action="{{route('products.destroy', $product->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <form action="" method="POST">
                                        @csrf
                                        <button type="submit" class="btn"><i class="fa fa-heart"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <form action="" method="post">
                                        @csrf
                                        {{-- <a href="" class="btn btn-primary">Add Cart</a> --}}
                                        <button type="submit" class="btn btn-primary">Add Cart</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"      aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p>Create a new product</p>
                </div>
                <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
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
                                    @foreach($mainCategories as $mainCategorie)
                                    <option value="{{$mainCategorie->id}}">{{$mainCategorie->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                
                            </div>
                            <div class="row form-group">
                                <label for="select" class=" form-control-label mt-2">Title</label>
                                <div class="col-12 col-md-12">
                                    <select name="sub_category_id" id="select" class="form-control">
                                        @foreach($subCategories as $subCategorie)
                                        <option value="{{$subCategorie->id}}">{{$subCategorie->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Price</label>
                            <input type="text" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-2">
                            <label for="exampleInputEmail1" class="form-label">Quantity</label>
                            <input type="text" name="quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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