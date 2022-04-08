@extends('layouts.app-layouts.admin-app.app')
@section('title', 'User Details')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-user"></i><strong class="card-title pl-2">{{$user->id}}</strong>
                </div>
                <div class="card-body">
                    <div class="mx-auto d-block">
                        {{-- <img class="rounded-circle mx-auto d-block" src="images/admin.jpg" alt="Card image cap"> --}}
                        <h5 class="text-sm-center mt-2 mb-1">{{$user->name}}</h5>
                        <div class="location text-sm-center"><i class="fa  fa-envelope"> {{$user->email}}</i></div>
                        <h5 class="text-sm-center mt-2 mb-1">Role: {{$user->role->name}}</h5>
                    </div>
                    <hr>
                    <div class="card-text text-sm-center">
                        @if (auth()->user()->id !== $user->id)
                            @if ($user->is_active)   
                                <a href="{{route('is_block', $user->id)}}" class="btn btn-danger">Block</a>
                            @else
                                <a href="{{route('is_block', $user->id)}}" class="btn btn-success">Unblock</a>
                            @endif
                            <a href="" class="btn btn-warning" data-toggle="modal" data-target="#changeRolemodal">Change Role</a>
                        @endif
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Change Role Modal --}}
    <div class="modal fade" id="changeRolemodal" tabindex="-1" role="dialog" aria-labelledby="changeRolemodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changeRolemodalLabel">Roles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        <form action="{{route('user.change_role', $user->id)}}" method="post">
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="select" class=" form-control-label">Select</label></div>
                                <div class="col-12 col-md-9">
                                    <select name="role_id" id="select" class="form-control">
                                        {{-- <option value="0">Please select</option> --}}
                                        @foreach ($roles as $role)
                                        <option value="{{$role->id}}"
                                            @if($user->role_id == $role->id){
                                                selected
                                            }
                                            @endif
                                            >{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Confirm</button>
                            </div>
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection