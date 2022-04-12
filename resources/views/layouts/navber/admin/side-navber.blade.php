<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="/" class=""><i class="menu-icon fa fa-home"></i>Home </a>
                </li>
                <li class="menu-title"><i class="menu-icon fa fa-group (alias)"></i> All Users</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-circle-o"></i>Users</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-table"></i><a href="{{route('users.index')}}">All Users Table</a></li>
                    </ul>
                </li>
                <li class="menu-title"><i class="menu-icon fa fa-shopping-cart"></i> Categories</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-circle-o"></i> Main Category</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa fa-table"></i><a href="{{route('main_categories.index')}}">All Main Category Table</a></li>
                        {{-- <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">Cr</a></li> --}}
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa  fa-circle-o"></i> Sub Category</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa fa-table"></i><a href="{{route('sub_category.index')}}">All Sub Category Table</a></li>
                        {{-- <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">Cr</a></li> --}}
                    </ul>
                </li>
                
                <li class="menu-title"><i class="menu-icon fa fa-group (alias)"></i> All Product</li><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-circle-o"></i>Product</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-table"></i><a href="{{route('products.index')}}">All Product Table</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-circle-o"></i>Cart</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-table"></i><a href="{{route('cart.index')}}">All Cart Table</a></li>
                    </ul>
                </li>
                {{-- WishList --}}
                <li class="menu-title"><i class="menu-icon fa fa-group (alias)"></i> All WishList</li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-circle-o"></i>WishList</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-table"></i><a href="{{route('wish_list.index')}}">WishList Table</a></li>
                    </ul>
                </li>
                {{-- Ordered Product --}}
                <li class="menu-title"><i class="menu-icon fa fa-group (alias)"></i> All Orderd Product</li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-circle-o"></i>Orderd Product</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-table"></i><a href="{{route('orders.index')}}">Orderd Table</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>