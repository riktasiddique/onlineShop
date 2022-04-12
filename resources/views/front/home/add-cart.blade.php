{{-- cart js --}}
<script src="{{asset('front/assets/add-cart/app.js')}}"></script>
@extends('layouts.app-layouts.front.app')
@section('title', 'Add Cart')
@section('content')
    <section>
        <div class="row">
            <div class="col-md-2">
                <div class="card p-3">
                    <h5>Hello,</h5>
                    <h2>{{$user->name}}</h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    @if(count($addCarts) < 1)
                        <div class="alert alert-warning text-center">
                            <strong>Ops!</strong> Your cart is empty.
                        </div>
                        <h3 class="text-center text-danger">Please add some product to your cart</h3>                                      
                    @else
                    @foreach ($addCarts as $addCart)     
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src=" {{url($addCart->product->image1)}}"  class="rounded float-start w-100 h-100 p-4" alt="">
                                    </div>
                                    <div class="col-md-5 p-4 mt-6">
                                        <h5 class="text-center">{{$addCart->product->subCategory->name}}</h5>
                                        <p>Quantity: <span class="text-danger">1 X {{$addCart->quantity}}</span> Kg/PC</p>
                                        <p>Price: <span class="text-danger" id="productPriceId{{$addCart->product_id}}">{{$addCart->product->price * $addCart->quantity}}</span>Tk</p>
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-2 d-flex align-items-center mt-5">
                                <form action="{{route('cart.destroy', $addCart->id)}}" method="post">
                                @method('DELETE')
                                    @csrf
                                    <button type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    <h2 class="text-danger mb-3 text-center border border-danger p-2 m-5">Payment Type</h2>
                    <br>
                        <form action="{{route('home.choseOrder')}}" method="post">
                            @csrf
                            <div class="row m-2">
                                <div class="col-md-4">
                                    <div class="mb-3 form-check">
                                        <input type="radio" class="form-check-input" name="delivery_type" id="exampleCheck1" value="national_card">
                                        <label class="form-check-label" for="exampleCheck1">National Card</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 form-check">
                                        <input type="radio" name="delivery_type" class="form-check-input" id="exampleCheck1" value="international_card">
                                        <label class="form-check-label" for="exampleCheck1">International Card</label>
                                      </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3 form-check">
                                        <input type="radio" name="delivery_type" class="form-check-input" id="exampleCheck1" value="cash_on_delivery">
                                        <label class="form-check-label" for="exampleCheck1">Cash on delivery</label>
                                      </div>
                                </div>
                            </div>
                           <div class="row">
                            <button type="submit" class="btn-warning border border-success p-2 text-center text-white mt-5">Go to the shipping page</button>
                           </div>
                        </form>
                    @endif
                </div>    
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h5 class="card-header text-center">Checkout Summary</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p>Subtotal:</p>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <p><span id="subTotal"></span>Tk</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Shipping:</p>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <p><span id="shippingCharge"></span>Tk</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Total:</p>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <p><span id="total"></span> Tk</p>
                            </div>
                        </div>
                        {{-- <hr> --}}
                        <div class="row" style="border: dotted gray 2px">
                            <div class="col-md-4">
                                <p>Payable:</p>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <p><span id="payable"></span> Tk</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection