<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            {{-- <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a> --}}
            {{-- <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a> --}}
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="header-left">
                <button class="search-trigger"><i class="fa fa-search"></i></button>
                <div class="form-inline">
                    <form class="search-form">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                    </form>
                </div>
            </div>

            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle" src="{{asset('admin/assets/images/admin.jpg')}}" alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="#"><i class="fa fa-user"></i>My Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="nav-link" href="" :href="route('logout')" onclick="event.preventDefault();  this.closest('form').submit();"><i class="fa fa-power-off"></i>Log out</a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>