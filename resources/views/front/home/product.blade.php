@extends('layouts.app-layouts.front.app')
@section('title', 'Products')
@section('content')
{{-- Any Error --}}
@if ($errors->any())
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif
    <section class="product" id="product">
        <h1 class="heading">latest <span>products</span></h1>
        <div class="box-container">
            @foreach ($products as $product) 
                    <div class="box">
                        <div class="icons">
                            <form action="{{route('home.wish_list', $product->id)}}" method="POST">
                                @csrf
                                <button type="submit"><i class="fa fa-heart"></i></button>
                            </form>
                            <a href="#" class="fas fa-share"></a>
                            <a href="{{route('home.product_view', $product->id)}}" class="fas fa-eye"></a>
                        </div>
                        <img src="{{url($product->image1)}}" alt="">
                        <h3>{{$product->subCategory->name}}</h3>
                        <div class="price">Price: {{$product->price}} Tk</div>
                        <a href="{{route('home.product_view', $product->id)}}" class="btn">View Details</a>
                    </div>
            @endforeach
        </div>
    </section>
@endsection