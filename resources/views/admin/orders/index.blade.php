@extends('layouts.app-layouts.admin-app.app')
@section('title', 'All Orders')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">All Orders Table</strong>
                </div>
                <div class="card-body">
                    <table class="table table-success table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Status</th>
                                <th scope="col">details</th>
                                {{-- <th scope="col">Action</th>    --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <th scope="row">{{$order->id}}</th>
                                    <td>{{$order->name}}</td>
                                    <td class="text-danger">{{$order->amount}}</td>
                                    <td class="text-info">{{$order->status}}</td>
                                    <td>
                                        <a href="{{route('orders.show', $order->id)}}" class="btn btn-secondary">Details</a>
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