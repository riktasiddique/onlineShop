<header>
    <div class="header-1">

        <a href="#" class="logo"><i class="fas fa-shopping-basket"></i>groco</a>
{{-- 
        <form action="{{route('home.product')}}" class="search-box-container" method="GET">
            <input type="search" name="query" id="search-box" placeholder="search here..." value="{{request()->get('query')}}">
            <button type="submit" class="fas fa-search btn btn-success mb-2 p-3"></button>
        </form> --}}
        <form action="" class="search-box-container">
            <input type="search" name="query" id="search-box" placeholder="search here...">
            <button type="submit" class="fas fa-search btn btn-success mb-2 p-3"></button>
        </form>

    </div>

    <div class="header-2 mb-5">
        <div id="menu-bar" class="fas fa-bars"></div>
        <nav class="navbar">
            <a href="">home</a>
            <a href="{{route('home.category')}}">category</a>
            <a href="{{route('home.product')}}">product</a>
            @auth
            <a href="{{route('home.myDeal')}}">My Deal</a>
            @else
                <a href="{{ route('login') }}">log in</a>
            @endauth
        </nav>
        <div class="icons">
            @auth
                <a href="{{route('home.addCart')}}" class="fas fa-shopping-cart">
                <a href="{{route('home.wish_list')}}" class="fas fa-heart"></a>
                <a href="{{route('home.profile')}}" class="fas fa-user-circle"></a>
                <a href="" class="fas  fa-phone"></a>
                @else
                <a href="" class="fas  fa-phone"></a>
            @endauth
        </div>

</header>