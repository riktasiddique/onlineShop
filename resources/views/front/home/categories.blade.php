@extends('layouts.app-layouts.front.app')
@section('title', 'Categories')
@section('content')
{{-- Categories Section --}}
    <section class="category" id="category">

        <h1 class="heading">shop by <span>category</span></h1>

        <div class="box-container">
            @foreach ($categories as $category)
                <div class="box">
                    <h3>{{$category->name}}</h3>
                    {{-- <p>upto 44% off</p> --}}
                    <img src="{{url($category->image1)}}" alt="">
                    <a href="" class="btn">shop now</a>
                </div>
            @endforeach
        </div>

    </section>
{{-- Products Section --}}
    <section class="product" id="product">
        <h1 class="heading">latest <span>products</span></h1>
        <div class="box-container">
            @foreach ($products as $product) 
                    <div class="box">
                        <div class="icons">
                            <a href="#" class="fas fa-heart"></a>
                            {{-- <a href="#" class="fas fa-share"></a> --}}
                            <a href="{{route('home.product_view', $product->id)}}" class="fas fa-eye"></a>
                        </div>
                        <img src="{{url($product->image1)}}" alt="">
                        <h3>{{$product->subCategory->name}}</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <div class="price">Price: {{$product->price}} Tk</div>
                        <div class="quantity">
                            <span>quantity : {{$product->quantity}}</span>
                            {{-- <input type="number" min="1" max="1000" value="">
                            <span>/kg </span> --}}
                        </div>
                        <a href="{{route('home.product_view', $product->id)}}" class="btn">view product</a>
                    </div>
            @endforeach
        </div>
    </section>
@endsection