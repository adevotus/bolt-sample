@include('assets.css')
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        @include('layouts.client.header')

        @include('layouts.client.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Orders</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="/client-dashboard">Dashboard</a></div>

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
                                        <table class="table table-striped" id="table-1-order">
                                            <thead>
                                            <tr>
                                                <th>Order Number</th>
                                                <th>Order Date</th>
{{--                                                <th>Shipment  Date</th>--}}
                                                <th>Total Amount</th>
                                                <th>Shipping Cost</th>
                                                <th>Unit Price</th>
                                                <th>Quantity</th>
                                                <th>Order PaymentReference</th>
                                                <th>Order Status</th>
                                                <th>Payment Status</th>
{{--                                                <th>createdDate</th>--}}
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

        @include('layouts.client.footer')
    </div>
</div>
@include('client.scripts.client-script')
@include('assets.js')
