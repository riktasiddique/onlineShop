@extends('layouts.app-layouts.admin-app.app')
@section('title', 'All Users')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">All Users Table</strong>
                </div>
                <div class="card-body">
                    <table class="table table-success table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                                <th scope="col">Show</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->role->name}}</td>
                                <td>
                                    @if (auth()->user()->id !== $user->id)
                                        @if ($user->is_active)   
                                            <a href="{{route('is_block', $user->id)}}" class="btn btn-danger">Block</a>
                                        @else
                                            <a href="{{route('is_block', $user->id)}}" class="btn btn-success">Unblock</a>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('users.show', $user->id)}}" class="btn btn-secondary">Details</a> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection