
<div class="main-sidebar sidebar-style-2">
<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="/home">D-flex</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="/home">DF</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="active">
            <a href="/home" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>

        </li>
        <li class="menu-header">Starter</li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Business</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('business-list')}}">List</a></li>
                <li><a class="nav-link" href="#">Management</a></li>
                <li><a class="nav-link" href="#">Report</a></li>

            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Product</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('product-list')}}">List</a></li>
                <li><a class="nav-link" href="#">Report</a></li>

            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Orders</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('orders-list')}}">List</a></li>
                <li><a class="nav-link beep beep-sidebar" href="#">Report</a></li>

            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Sales</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('payment-list')}}">Payment List</a></li>
                <li><a class="nav-link" href="#">Reports</a></li>
            </ul>
        </li>

        <li class="menu-header">Managements</li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Users</span></a>
            <ul class="dropdown-menu">
                <li><a href="{{route('business-owner')}}">Business Owners</a></li>
                <li><a href="#">Staffs</a></li>

            </ul>
        </li>

    </ul>


</aside>

</div>
