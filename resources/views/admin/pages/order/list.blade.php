@include('assets.css')
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        @include('layouts.header')

        @include('layouts.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Orders</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="/home">Dashboard</a></div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Orders</h4>
                                </div>
                                <div class="card-body" id="total-order">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="far fa-newspaper"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Accepted Orders</h4>
                                </div>
                                <div class="card-body" id="accepted-order">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                                <i class="far fa-file"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Pending Orders</h4>
                                </div>
                                <div class="card-body" id="pending-order">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="fas fa-circle"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Canceled Orders</h4>
                                </div>
                                <div class="card-body" id="canceled-order">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section-body">


                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                            <tr>
                                                <th>orderNumber</th>
                                                <th>orderDate</th>
                                                {{--                                                        <th>Shipment  Date</th>--}}
                                                <th>totalAmount</th>
                                                <th>shippingCost</th>
                                                <th>unitPrice</th>
                                                <th>quantity</th>
                                                <th>orderPaymentReference</th>
                                                <th>orderStatus</th>
                                                <th>paymentStatus</th>
                                                {{--                                                        <th>createdDate</th>--}}
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </section>
        </div>

        @include('layouts.footer')
    </div>
</div>
@include('admin.pages.order.order-script')
@include('assets.js')
