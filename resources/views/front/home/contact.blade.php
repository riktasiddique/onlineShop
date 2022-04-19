@extends('layouts.app-layouts.front.app')
@section('title', 'Contact')
@section('content')
    <section class="contact" id="contact">
    <h1 class="heading"> <span>contact</span> us </h1>
        <form action="{{route('home.contact_store')}}" method="POST">
            @csrf
            <div class="inputBox">
                <input type="text" name="name" placeholder="name">
                <input type="email" name="email" placeholder="email">
            </div>

            <div class="inputBox">
                <input type="number" name="phoneNumber" placeholder="number">
                <input type="text" name="mailSubject" placeholder="subject">
            </div>

            <textarea placeholder="message" name="massage" id="" cols="30" rows="10"></textarea>

            <input type="submit" value="send message" class="btn">

        </form>
    </section>
@endsection