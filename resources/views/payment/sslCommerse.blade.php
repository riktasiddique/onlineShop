<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SSLCommerz">
    <title>Example - Hosted Checkout | SSLCommerz</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body class="bg-light">
<div class="container">
    <div class="py-5 text-center">
        <h2 class="text-success">Complete Your Payment - SSLCommerz</h2>
    </div>
    <?php
        $total = 0;
    ?>
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">
                    <?php

                    ?>
                </span>
            </h4>
            <div class="card">
                <h5 class="card-header text-center">Checkout Summary</h5>
                <div class="card-body">
                    @foreach ($carts as $cart)  
                        <div class="row">
                            <div class="col-md-6">
                                <p><span>{{$cart->product->subCategory->name}} X {{$cart->quantity}}</span> kg/pc</p>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <p><span id="subTotal">{{$cart->product->price * $cart->quantity}}</span>Tk</p>
                            </div>
                        </div>
                        <?php
                            $total += $cart->product->price * $cart->quantity;
                        ?>
                    @endforeach
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <p>Total:</p>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <p><span id="total">{{$total}}</span> Tk</p>
                        </div>
                    </div>
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
                    {{-- <div class="row">
                        <div class="col-md-4">
                            <p>Total:</p>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <p><span id="total">{{$total+50}}</span> Tk</p>
                        </div>
                    </div> --}}
                    {{-- <hr> --}}
                    <div class="row" style="border: dotted gray 2px">
                        <div class="col-md-4">
                            <p>Payable:</p>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <p><span id="payable">{{$total+50}}</span> Tk</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3 text-center">Billing address</h4>
            <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="firstName">Full name</label>
                        <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder=""
                               value="{{$user->name}}" required>
                        <div class="invalid-feedback">
                            Valid customer name is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="mobile">Mobile</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">+88</span>
                        </div>
                        <input type="text" name="customer_mobile" class="form-control" id="mobile" placeholder="Phone"
                               value="" required>
                        <div class="invalid-feedback" style="width: 100%;">
                            Your Mobile number is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email <span class="text-muted"></span></label>
                    <input type="email" name="customer_email" class="form-control" id="email"
                           placeholder="" value="{{$user->email}}" required>
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Address</label>
                    <input name="customer_address" type="text" class="form-control" id="address" placeholder="adress, Upazila, District, Division"
                           value="" required>
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                {{-- <div class="mb-3">
                    <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                    <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                </div> --}}

                <div class="row">
                    {{-- <div class="col-md-5 mb-3">
                        <label for="country">Country</label>
                        <select class="custom-select d-block w-100" id="country" required>
                            <option value="">Choose...</option>
                            <option value="Bangladesh">Bangladesh</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div> --}}
                    {{-- <div class="col-md-4 mb-3">
                        <label for="state">State</label>
                        <select class="custom-select d-block w-100" id="state" required>
                            <option value="">Choose...</option>
                            <option value="Dhaka">Dhaka</option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div> --}}
                    {{-- <div class="col-md-3 mb-3">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" id="zip" placeholder="" required>
                        <div class="invalid-feedback">
                            Zip code required.
                        </div>
                    </div> --}}
                </div>
                {{-- <hr class="mb-4"> --}}
                {{-- <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="same-address">
                    <input type="hidden" value="1200" name="amount" id="total_amount" required/>
                    <label class="custom-control-label" for="same-address">Shipping address is the same as my billing
                        address</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="save-info">
                    <label class="custom-control-label" for="save-info">Save this information for next time</label>
                </div> --}}
                {{-- <hr class="mb-4"> --}}
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout (Hosted)</button>
                {{-- Total Ammount of Cart --}}
                <input type="hidden" name="total_amount" value="{{$total}}">
            </form>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2019 Company Name</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous">
</script>
{{-- CheckOut --}}
<script src="{{asset('front/assets/add-cart/app.js')}}"></script>
</html>
