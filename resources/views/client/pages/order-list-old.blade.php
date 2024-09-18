
@include('assets.css')
<div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    @include('layouts.client.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_settings-panel.html -->

        <!-- partial:../../partials/_sidebar.html -->
        @include('layouts.client.sidebar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="row">
                            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                <h3 class="font-weight-bold">Order Summary</h3>
                                {{--                                <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>--}}
                            </div>
                            {{--                            <div class="col-12 col-xl-4">--}}
                            {{--                                <div class="justify-content-end d-flex">--}}
                            {{--                                    <div class="dropdown flex-md-grow-1 flex-xl-grow-0">--}}
                            {{--                                        <a href="{{route('product-add')}}" class="btn btn-sm btn-light bg-primary text-white">--}}
                            {{--                                            <i class="mdi mdi-plus"></i> Add Product</a>--}}

                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Total  Orders</h4>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-muted">Total</p>
                                            {{--                                            <p class="text-muted" id="total-order"></p>--}}
                                            <span class="badge badge-primary bg-primary text-white" id="total-order">1</span>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Accepted  Orders</h4>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-muted">PAID</p>
                                            {{--                                            <p class="text-muted" id="accepted-order"></p>--}}
                                            <span class="badge badge-success bg-success text-white" id="accepted-order">2</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Pending Orders</h4>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-muted">NOT PAID</p>
                                            {{--                                            <p class="text-muted" id="pending-order"></p>--}}
                                            <span class="badge badge-warning bg-warning text-white" id="pending-order">0</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Canceled Orders</h4>
                                        <div class="d-flex justify-content-between">
                                            <p class="text-muted">FAILED</p>
                                            {{--                                            <p class="text-muted" id="canceled-order"></p>--}}
                                            <span class="badge badge-danger bg-danger text-white" id="canceled-order">0</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">List Of orders</h4>
                            <ul class="nav nav-pills nav-pills-success" id="pills-tab" role="tablist">
                                <li class="nav-item" style="height: 10px">
                                    <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab"
                                       aria-controls="pills-home" aria-selected="true">All</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab"
                                       aria-controls="pills-profile" aria-selected="false">Accepted</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#pills-contact" role="tab"
                                       aria-controls="pills-contact" aria-selected="false">Canceled</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#pills-contact" role="tab"
                                       aria-controls="pills-contact" aria-selected="false">Processed</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#pills-contact" role="tab"
                                       aria-controls="pills-contact" aria-selected="false">Refunded</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                     aria-labelledby="pills-home-tab">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table id="all-orders" class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>orderNumber</th>
                                                        <th>orderDate</th>
                                                        <th>Shipment  Date</th>
                                                        <th>totalAmount</th>
                                                        <th>shippingCost</th>
                                                        <th>unitPrice</th>
                                                        <th>quantity</th>
                                                        <th>orderPaymentReference</th>
                                                        <th>orderStatus</th>
                                                        <th>paymentStatus</th>
                                                        <th>createdDate</th>
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
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table id="order-listing" class="table">
                                                    <thead>
                                                    <tr>

                                                        <th>Order #</th>
                                                        <th>name</th>
                                                        <th>sellingPrice</th>
                                                        <th>purchasePrice</th>
                                                        <th>includeShipping</th>
                                                        <th>unitShippingPrice</th>
                                                        <th>description</th>
                                                        <th>color</th>
                                                        <th>unitMeasure</th>
                                                        <th>code</th>
                                                        <th>unit</th>
                                                        <th>pictureLink</th>
                                                        <th>createdDate</th>
                                                        <th>status</th>
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
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table id="order-listing" class="table">
                                                    <thead>
                                                    <tr>

                                                        <th>Order #</th>
                                                        <th>name</th>
                                                        <th>sellingPrice</th>
                                                        <th>purchasePrice</th>
                                                        <th>includeShipping</th>
                                                        <th>unitShippingPrice</th>
                                                        <th>description</th>
                                                        <th>color</th>
                                                        <th>unitMeasure</th>
                                                        <th>code</th>
                                                        <th>unit</th>
                                                        <th>pictureLink</th>
                                                        <th>createdDate</th>
                                                        <th>status</th>
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
                    </div>
                </div>

            </div>

            @include('layouts.client.footer')
        </div>
    </div>
</div>
<!-- container-scroller -->
@include('client.scripts.client-script')
@include('assets.js')
