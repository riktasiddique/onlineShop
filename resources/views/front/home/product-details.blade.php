<script src="{{asset('front/assets/add-cart/product-detail.js')}}"></script>
@extends('layouts.app-layouts.front.app')
@section('title', 'Add Cart')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body text-center border  border-success">
                    <img src="{{url($product->image1)}}" alt="" class="w-50 h-50">
                    {{-- <h3>{{$product->subCategory->name}}</h3> --}}
                    <div class="price mt-2"><p>Price: <span id="productPriceId{{$product->id}}">{{$product->price}}</span>TK</p></div>
                    <input type="hidden" value="{{$product->price}}" id="unitPrice{{$product->id}}">
                    <form action="{{route('home.homeCartStore', $product->id)}}" method="post">
                        @csrf
                        <div class="row d-flex justify-content-center mt-2">
                            <div class="col-md-2 d-flex align-items-center">
                                <div class="row justify-content-start">
                                     <i role="button" onclick="isIncrese(false, 'inputFeild{{$product->id}}', 'unitPrice{{$product->id}}', 'productPriceId{{$product->id}}')" class="btn-secondary w-25" id="">-</i></i>
                                     <input name="quantity" type="number" min="0" class="form-control text-center w-50" value="1" id="inputFeild{{$product->id}}">
                                     <i role="button" onclick="isIncrese(true, 'inputFeild{{$product->id}}', 'unitPrice{{$product->id}}', 'productPriceId{{$product->id}}')" class="btn-secondary w-25" >+</i>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn mx-auto w-100 mt-5">Add Cart</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection