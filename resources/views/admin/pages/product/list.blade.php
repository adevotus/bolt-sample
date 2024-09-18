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
                    <h1>Product </h1>
                    <div class="section-header-button">
                        <a href="{{route('product-add')}}" class="btn btn-primary btn-sm">Create Product</a>
                    </div>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="/home">Dashboard</a></div>

                    </div>
                </div>

                <div class="section-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total Product</h4>
                                    </div>
                                    <div class="card-body" id="total-product">
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
                                        <h4>Available Product</h4>
                                    </div>
                                    <div class="card-body" id="in-stock">
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
                                        <h4>Out of Stocks</h4>
                                    </div>
                                    <div class="card-body" id="out-stock">
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
                                        <h4>Coming Soon</h4>
                                    </div>
                                    <div class="card-body" id="coming-soon">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>name</th>
                                                <th>sellingPrice</th>
                                                <th>purchasePrice</th>
                                                <th>includeShipping</th>
                                                <th>unitShippingPrice</th>
                                                {{--                                            <th>description</th>--}}
                                                {{--                                            <th>color</th>--}}
                                                {{--                                            <th>unitMeasure</th>--}}
                                                <th>institution</th>
                                                <th>code</th>
                                                <th>unit</th>
                                                {{--                                            <th>pictureLink</th>--}}
                                                {{--                                            <th>createdDate</th>--}}
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
            </section>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="profile-widget">
                            <div class="profile-widget-header">
                                <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                                <div class="profile-widget-items">
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Purchase</div>
                                        <div class="profile-widget-item-value purchase-price"></div>
                                    </div>
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Selling</div>
                                        <div class="profile-widget-item-value selling-price"></div>
                                    </div>
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Unit Shipping</div>
                                        <div class="profile-widget-item-value unit-shipping-price"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-widget-description">
                                <div class="profile-widget-name"></div>
                                <div class="description"></div>
                            </div>
                            <div class="profile-widget-description">
                                <h6>Other Product Properties</h6>
                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <p><b class="m-2">Code</b><span class="code"></span></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><b class="m-1">Color</b><span class="color"></span></p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><b class="m-1">Unit</b><span class="unit"></span></p>
                                    </div>

                                </div>
{{--                                <h4 id="product-id"></h4>--}}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            <i class="fa fa-trash text-danger"></i>
                        </button>
                        <a href="#" id="edit-product-link" type="button" class="btn btn-primary">
                            <i class="fa fa-pencil-alt"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>


        @include('layouts.footer')
    </div>
</div>
@include('admin.pages.product.product_script')
@include('assets.js')
