@extends('layouts.app-layouts.front.app')
@section('title', 'Profile')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            <aside class="profile-nav alt">
                <section class="card">
                    <div class="card-header user-header alt bg-dark">
                        <div class="media">
                            {{-- <a href="#">
                               <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="images/admin.jpg">
                            </a> --}}
                            <div class="media-body">
                                <h2 class="text-light display-6 text-center">{{$user->name}}</h2>
                                <p class="text-center">{{$user->email}}</p>
                                <div>
                                    <div class="row justify-content-center ml-5">
                                        <div class="col-md-4">
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <a href="" class="btn-danger p-2 rounded" :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">Log Out</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-5">
                        <div class="col-md-11">
                            <form action="{{route('user.changePassword')}}"  method="POST">
                                @csrf
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Old Password</label>
                                  <input type="password" name="oldPassword" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputPassword1" class="form-label">New Password</label>
                                  <input type="password" name="newPassword" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                                    <input type="password" name="confirmPassword" class="form-control" id="exampleInputPassword1">
                                  </div>
                                <button type="submit" class="btn-success w-100 p-2 bordered">Save</button>
                              </form>
                        </div>
                    </div>
                </section>
            </aside>
        </div>
    </div>
@endsection