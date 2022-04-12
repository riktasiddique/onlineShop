@extends('layouts.app-layouts.front.app')
@section('title', 'My Deal')
@section('content')
    <section>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">All Orders Table</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-success table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Id</td>
                                    <th scope="col">Transaction</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Show</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;
                                ?>
                                @foreach ($orders as $order)
                                    <tr>
                                        <?php
                                            $count +=1;
                                        ?>
                                        <td>
                                            {{$count}}
                                        </td>
                                        <td class="text-danger">{{$order->transaction_id}}</td>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->email}}</td>
                                        <td>{{$order->phone}}</td>
                                        <td>{{$order->address}}</td>
                                        <td>{{$order->amount}}</td>
                                        <td>
                                            {{-- @if ($order->status == 1)      
                                            <p><a class="btn-success p-2 border border-warning rounded-pill text-white">Complited</a></p>
                                            @else   
                                            <p><a class="btn-warning p-2 border border-warning rounded-pill text-secondary">Pendding</a></p>
                                            @endif --}}
                                            <p><a class="btn-warning p-2 border border-warning rounded-pill text-secondary mt-2">{{$order->status}}</a></p>
                                        </td>
                                        <td>
                                            <a href="{{route('home.myDealView', $order->id)}}" class="btn btn-secondary">Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection