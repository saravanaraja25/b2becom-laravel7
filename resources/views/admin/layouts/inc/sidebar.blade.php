<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{ (request()->is('admin')) ? 'active' : '' }}" href="{{ route('admin.dashboard') }}" ><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{ (request()->is('admin/orders*')) ? 'active' : '' }}" href="#" ><i class="fa fa-fw fa-shopping-basket"></i>Orders <span class="badge badge-success">6</span></a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin/feedbacks*')) ? 'active' : '' }}">
                        <a class="nav-link " href="#" ><i class="fa fa-fw fa-star"></i>Feedback <span class="badge badge-success">6</span></a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin/offers*')) ? 'active' : '' }}">
                        <a class="nav-link " href="#" ><i class="fa fa-fw fa-calendar-check"></i>Offers <span class="badge badge-success">6</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('admin/customers*')) ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-user"></i>Customers</a>
                        <div id="submenu-5" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('customers.index') }}">Approved</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('customers.unapproved') }}">Unapproved</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-divider">
                        Settings
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('admin/tyresizes*')) ? 'active' : '' }}{{ (request()->is('admin/brands*')) ? 'active' : '' }}" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fab fa-get-pocket"></i>Product Categories</a>
                        <div id="submenu-6" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('tyresizes.index') }}">Tyre Sizes</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{ (request()->is('admin/products*')) ? 'active' : '' }} " href="{{ route('products.index') }}" ><i class="fas fa-shopping-bag"></i>Products <span class="badge badge-success">6</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>