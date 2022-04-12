{{-- cart js --}}
{{-- <script src="{{asset('front/assets/add-cart/app.js')}}"></script> --}}

@extends('layouts.front-app.app')
@section('title', 'Add Cart')
@section('content')
<section>
    <div class="container">
       <div class="cart">
          <div class="col-md-12 col-lg-10 mx-auto">
             <div class="cart-item">
                <div class="row">
                   <div class="col-md-7 center-item">
                      <img src="images/product-1.png" alt="">
                      <h5>iPhone 11 128GB Black</h5>
                   </div>

                   <div class="col-md-5 center-item">
                      <div class="input-group number-spinner">
                         <button class="btn-secondary btn" id="phone-minus"><i class="fas fa-minus"></i></button>
                         <input type="number" min="0" class="form-control text-center" value="1" id="phone-number">
                         <button class="btn-secondary btn" id="phone-pluse"><i class="fas fa-plus"></i></button>
                      </div>
                      <h5>$<span id="phone-price">1219</span></h5>
                   </div>
                </div>
             </div>

             <div class="cart-item">
                <div class="row">
                   <div class="col-md-7 center-item mx-auto">
                      <img src="images/product-2.png" alt="">
                      <h5>iPhone 11 Silicone Case - Black</h5>
                   </div>
                   <div class="col-md-5 center-item">
                      <div class="input-group number-spinner">
                         <button class="btn-secondary btn" id="case-minus"><i class="fas fa-minus"></i></button>
                         <input type="number" min="0" class="form-control text-center" value="1" id="case-number">
                         <button class="btn-secondary btn" id="case-pluse"><i class="fas fa-plus"></i></button>
                      </div>
                      <h5>$ <span id="case-price">58</span></h5>
                   </div>
                </div>
             </div>

             <div class="cart-item">
                <div class="row">

                   <div class="col-md-8">
                      <h5>Subtotal: </h5>
                      <h5>Tax:</h5>
                      <h5>Total:</h5>
                   </div>

                   <div class="col-md-4 status">
                      <h5>$<span id="product-subtotal">00</span></h5>
                      <h5>$<span id="tax-total">00</span></h5>
                      <h5>$<span id="all-product-price">00</span></h5>
                      <!-- <h5>$<span id="sub-total">1278</span></h5>
                      <h5>$<span id="tax-amount">0</span></h5>
                      <h5>$<span id="total-price">1278</span></h5> -->
                   </div>
                </div>
             </div>
             <div class="col-md-12 pt-4 pb-4">
                <button type="button" class="btn btn-success check-out">Check Out</button>
             </div>
          </div>
       </div>
    </div>
  </section>
    {{-- js --}}

@endsection