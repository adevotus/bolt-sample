<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        {{--        @php--}}
        {{--            use App\Helpers\PermissionHelper;--}}
        {{--        @endphp--}}
        {{--        @if(Auth::check() && PermissionHelper::hasPermission('view-dashboard'))--}}
        {{--            <li class="nav-item">--}}
        {{--                <a class="nav-link" href="/home">--}}
        {{--                    <i class="icon-grid menu-icon"></i>--}}
        {{--                    <span class="menu-title">Dashboard</span>--}}
        {{--                </a>--}}
        {{--            </li>--}}
        {{--        @endif--}}


        <li class="nav-item">

            <a class="nav-link" href="/client-dashboard">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>



        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link" href="{{ route('business-list-client') }}">--}}
        {{--                <i class="icon-head menu-icon"></i>--}}
        {{--                <span class="menu-title">Registration</span>--}}
        {{--                <i class="menu-arrow"></i>--}}
        {{--            </a>--}}
        {{--        </li>--}}



        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('product-list-client') }}">List </a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Available <span class="badge badge-warning bg-warning text-white">20</span></a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Out of Stock <span class="badge badge-warning bg-warning text-white">3</span></a></li>
                </ul>
            </div>
        </li>



        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Orders</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('orders-list-client') }}">Orders <span class="badge badge-warning bg-warning text-white">10</span></a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Reports <span class="badge badge-warning bg-danger text-white">0</span></a></li>
                </ul>
            </div>
        </li>


        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="icon-bar-graph menu-icon"></i>
                <span class="menu-title">Sales</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('payment-list-client')}}">Payment</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">Refunded</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">Reports</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Staff</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">All</a></li>
                </ul>
            </div>
        </li>

        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link" href="#">--}}
        {{--                <i class="icon-grid menu-icon"></i>--}}
        {{--                <span class="menu-title">Not Authenticated</span>--}}
        {{--            </a>--}}
        {{--        </li>--}}
    </ul>
</nav>

