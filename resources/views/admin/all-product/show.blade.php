@extends('layouts.app-layouts.admin-app.app')
@section('title', 'Product Details')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="feed-box text-center">
                <section class="card">
                    <div class="card-body">
                        <div class="corner-ribon blue-ribon">
                            <i class="fa fa-twitter"></i>
                        </div>
                        <a href="#">
                            <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="{{url($product->image1)}}">
                        </a>
                        <h2>{{$product->subCategory->name}}</h2>
                        <p class="border border-danger">Creator: {{$product->creator->name}}</p>
                        <hr>
                        <p>Category: {{$product->subCategory->name}} <span class="text-danger">({{$product->mainCategory->name}})</span></p>
                        <p>Quantity: {{$product->quantity}}</p>
                        <p>Price: {{$product->price}}</p>
                        <hr>
                        <p>Created _at: {{$product->created_at->diffForHumans()}}, ({{$product->created_at}})</p>
                        <p> Last Updated_At: {{$product->updated_at->diffForHumans()}}, {{$product->updated_at}}</p>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection