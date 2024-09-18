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
                    <h1>Product </h1>

                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="/client-dashboard">Dashboard</a></div>

                    </div>
                </div>

                <div class="section-body">

                    <div class="card">
                        <div class="card-header">
                            <h4>Create Product Form</h4>
                        </div>
                        <div class="card-body">

                            <form  id="add-product">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Name:</label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Selling Price:</label>
                                            <input type="text" class="form-control" id="recipient-name" name="sellingPrice" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Purchase Price:</label>
                                            <input type="text" class="form-control" id="recipient-name" name="purchasePrice" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Include Shipping:</label>
                                            <input type="text" class="form-control" id="recipient-name" name ="includeShipping" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">unit Measure:</label>
                                            <input type="text" class="form-control" id="recipient-name" name="unitMeasure" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">unit:</label>
                                            <input type="text" class="form-control" id="recipient-name" name="unit" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Product-Status:</label>
                                            <select class="form-control" id="exampleSelectProductStatus" name="productStatus" required>
                                                <!-- Options will be dynamically populated here -->
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">pictureLink:</label>
                                            <input type="text" class="form-control" id="recipient-name" name="pictureLink" required>
                                        </div>
                                    </div>
{{--                                    <div class="col-md-3">--}}
                                        {{--                                            <div class="form-group">--}}
                                        {{--                                                <label for="exampleSelectGender">Institutions</label>--}}
                                        {{--                                                <select class="form-select" id="exampleSelectGender" name="institution_id" required>--}}
                                        {{--                                                    <option value="1">shoppers</option>--}}
                                        {{--                                                    <option value="1">Home collections</option>--}}
                                        {{--                                                </select>--}}
                                        {{--                                            </div>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="exampleSelectGender">Institutions</label>--}}
{{--                                            <select class="form-control" id="exampleSelectGender" name="institution" required>--}}
{{--                                                <!-- Options will be dynamically populated here -->--}}
{{--                                            </select>--}}
{{--                                        </div>--}}


{{--                                    </div>--}}
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Color:</label>
                                            <input type="text" class="form-control" id="recipient-name" name="color" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">code:</label>
                                            <input type="text" class="form-control" id="recipient-name" name="code" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Descripton:</label>
                                    <textarea class="form-control" id="message-text" name="description" required></textarea>
                                </div>

                                <div class ="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 d-grid gap-2">
                                        <button class="btn btn-primary btn-block" type="submit">Add product</button>
                                    </div>
                                    <div class="col-md-4"></div>

                                </div>
                            </form>
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




                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-trash text-danger"></i></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></button>
                    </div>
                </div>
            </div>
        </div>


        @include('layouts.client.footer')
    </div>
</div>
@include('client.scripts.client-script')
@include('assets.js')
