@extends('layouts.app-layouts.front.app')
@section('title', 'My Deal View')
@section('content')
<section>
    <div class="row">
        <div class="col-md-4">
            <div class="card p-3">
                <h5>Hello,</h5>
                <h2 class="border-bottom mb-2">{{$order->name}}</h2>
                <h3>Delivery Type: <span class="text-secondary">{{$order->delivery_type}}</span></h3>
                <h3>Address: {{$order->address}}</h3>
                <h3>Phone: {{$order->phone}}</h3>
                <h3>Email: {{$order->email}}</h3>
                <h3>Transaction Id: <span class="text-danger">{{$order->transaction_id}}</span></h3>
                <h3>Amount: {{$order->amount}} Tk</h3>
            </div>
        </div>
        <?php
            $item_serial = 0
        ?>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Your ordered products</h3>
                </div>
                @foreach ($order_items as $order_item)  
                    <div class="row justify-content-center">
                        <?php
                                $item_serial +=1;
                            ?>
                        <div class="col-md-10">
                            <p>{{$item_serial}}</p>
                                <div class="row border-bottom">
                                    <div class="col-md-4">
                                        <img src="{{url($order_item->product->image1)}}"  class="rounded float-start w-100 h-100 p-4" alt="">
                                    </div>
                                    <div class="col-md-6 p-4 mt-5">
                                        <h2><span class="text-muted">Quantity: </span><span class="text-danger">1 X {{$order_item->quantity}}</span> <span class="text-muted">kg/pc</span></h2>
                                        <h2><span class="text-muted">Price: </span><span class="text-danger">{{$order_item->product->price * $order_item->quantity}}</span> <span class="text-muted">Tk</span></h2>
                                        {{-- <p>Price: {{$order_item->price * $myOrder->quantity}}<span></span></p> --}}
                                    </div>
                                    {{-- <div class="col-md-2 d-flex align-items-center mt-5">
                                    </div> --}}
                                </div>
                        </div>
                    </div>
                @endforeach
                <p class="text-center">+</p>
                <p class="text-center text-danger">Delivery Charge: 50 Tk</p>
            </div>    
        </div>
    </div>
</section>
@endsection