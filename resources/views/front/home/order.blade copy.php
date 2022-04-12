{{-- Js --}}
<script src="{{asset('front/assets/add-cart/shipping.js')}}"></script>
{{-- style --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@extends('layouts.front-app.app')
@section('title', 'Confirm Order')
@section('content')
<div class="row">
    <form action="{{route('home.order_store')}}" method="post">
        @csrf
        <div class="row mt-5 justify-content-center">
            <div class="col-md-6">
                <div class="card border border-secondary p-5">
                    <div class="card-header mb-5"><strong>Shipping Address</strong><small class="text-danger"> (Please Fill Out Your Information)</small></div>
                    <div class="card-body">
                            <input class="w-100" type="text" name="phone_number" placeholder="Phone Number">
                            <hr class="w-60">
                            <br>
                            <input class="w-100" type="text" name="division" placeholder="Division">
                            <hr class="w-60">
                            <br>
                            <input class="w-100" type="text" name="district" placeholder="District">
                            <hr class="w-60">
                            <br>
                            <input class="w-100" type="text" name="upazila" placeholder="Upazila">
                            <hr class="w-60">
                            <br>
                            <input type="text" name="address" placeholder="Address">
                            <hr class="w-60">
                            <input type="hidden" name="shipping_charge" value="50">
                            <div class="mb-3 form-check">
                                <input type="checkbox" name="cashOnDelivery" class="form-check-input" value="Cash on delivery">
                                <label class="form-check-label" for="exampleCheck1">Cash on Delivery</label>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h5 class="card-header text-center text-danger">Checkout Summary</h5>
                    <div class="card-body" style="border: dotted gray 2px">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <p>Title</p>
                            </div>
                            <div class="col-md-4"><p>Quantity</p></div>
                            <div class="col-md-4">
                                <p>Price</p>
                            </div>
                        </div>
                        <hr>
                        <?php
                            $total = 0;
                        ?>
                        @foreach ($carts as $cart) 
                        <?php
                            $total += $cart->price * $cart->quantity;
                        ?> 
                        <div class="row justify-content-center">
                            <div class="col-md-4 text-center">
                                <p><span>{{$cart->subCategory->name}}</span></p>
                            </div>
                            <div class="col-md-4 text-center">
                                <p>1 x {{$cart->quantity}} kg/pc</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <p><span>{{$cart->price * $cart->quantity}}</span> Tk</p>
                            </div>
                        </div>
                        @endforeach
                        <div class="row text-center">
                            <div class="col-md-4">
                                <p>Shipping:</p>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <p><span id="">50</span> Tk</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-center">
                            <div class="col-md-4">
                                <p>Total:</p>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <p>{{$total + 50}} Tk</p>
                                <input type="hidden" name="total_price" value="{{$total + 50}}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn">Confirm Order</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection