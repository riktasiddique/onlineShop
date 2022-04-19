{{-- Js --}}
<script src="{{asset('front/assets/add-cart/shipping.js')}}"></script>
{{-- style --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@extends('layouts.app-layouts.front.app')
@section('title', 'Confirm Order')
@section('content')
<div class="row">
    <form action="{{route('home.cash_on_delivery')}}" method="post">
        @csrf
        <div class="row mt-5 justify-content-center">
            <div class="col-md-6">
                <div class="card border border-secondary p-5">
                    <div class="card-header mb-5"><strong>Shipping Address</strong><small class="text-danger"> (Please Fill Out Your Information)</small></div>
                    <div class="card-body">
                            <input class="w-100" type="text" name="name" placeholder="" value="{{$user->name}}">
                            <hr class="w-60">
                            <br>
                            <input class="w-100" type="text" name="email" placeholder="" value="{{$user->email}}">
                            <hr class="w-60">
                            <br>
                            <input class="w-100" type="text" name="phone" placeholder="Phone Number">
                            <hr class="w-60">
                            <br>
                            <input type="text" name="address" placeholder="Address">
                            <hr class="w-60">
                    </div>
                </div>
            </div>
            <?php
                $total = 0;
            ?>
            <div class="col-md-4 order-md-2 mb-4">
                <div class="card">
                    <h5 class="card-header text-center">Checkout Summary</h5>
                    <div class="card-body">
                        @foreach ($carts as $cart)  
                            <div class="row">
                                <?php
                                    $total += $cart->product->price * $cart->quantity;
                                ?>
                                <div class="col-md-6">
                                    <p><span>{{$cart->product->subCategory->name}} X {{$cart->quantity}}</span> kg/pc</p>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <p> {{$cart->product->price * $cart->quantity}} Tk</p>
                                </div>
                            </div>
                            
                        @endforeach
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Shipping:</p>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <p><span id="shippingCharge">50</span>Tk</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Total:</p>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <p><span id="total">{{$total + 50}}</span> Tk</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row" style="border: dotted gray 2px">
                            <div class="col-md-4">
                                <p>Payable:</p>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <p><span id="payable">{{$total+50}}</span> Tk</p>
                            </div>
                        </div>
                        <input type="hidden" name="total" value="{{$total + 50}}">
                        <button type="submit" class="btn-success p-2 w-100 mt-4 border-success">Confirm Order</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection