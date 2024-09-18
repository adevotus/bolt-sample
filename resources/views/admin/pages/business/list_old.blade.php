
@include('assets.css')
<div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    @include('layouts.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_settings-panel.html -->

        <!-- partial:../../partials/_sidebar.html -->
        @include('layouts.sidebar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="row">
                            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                <h3 class="font-weight-bold">Business</h3>
                                {{--  <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>--}}
                            </div>
                            <div class="col-12 col-xl-4">
                                <div class="justify-content-end d-flex">
                                    {{--                                    <div class="dropdown flex-md-grow-1 flex-xl-grow-0">--}}
                                    {{--                                        <button class="btn btn-sm btn-light bg-primary text-white"  data-bs-toggle="modal" data-bs-target="#business-registration">--}}
                                    {{--                                            <i class="mdi mdi-plus"></i> Register Business</button>--}}

                                    {{--                                    </div>--}}
                                    <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                        <a href="{{route('business-add-registration')}}" class="btn btn-sm btn-light bg-primary text-white">
                                            <i class="mdi mdi-plus"></i>Business Registration</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                <div class="row">--}}
                {{--                    <div class="col-12">--}}
                {{--                        <div class="row">--}}
                {{--                            <div class="col-12 col-sm-6 col-md-6 col-xl-4 grid-margin stretch-card">--}}
                {{--                                <div class="card">--}}
                {{--                                    <div class="card-body">--}}
                {{--                                        <h4 class="card-title">Total  Business Registered </h4>--}}
                {{--                                        <div class="d-flex justify-content-between">--}}
                {{--                                            <p class="text-muted">Avg. Session</p>--}}
                {{--                                            <p class="text-muted"> 100</p>--}}
                {{--                                        </div>--}}
                {{--                                        <div class="progress progress-md">--}}
                {{--                                            <div class="progress-bar bg-info w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0"--}}
                {{--                                                 aria-valuemax="100"></div>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}

                {{--                            <div class="col-12 col-sm-6 col-md-6 col-xl-4 grid-margin stretch-card">--}}
                {{--                                <div class="card">--}}
                {{--                                    <div class="card-body">--}}
                {{--                                        <h4 class="card-title">Total Products</h4>--}}
                {{--                                        <div class="d-flex justify-content-between">--}}
                {{--                                            <p class="text-muted">Avg. Session</p>--}}
                {{--                                            <p class="text-muted">54</p>--}}
                {{--                                        </div>--}}
                {{--                                        <div class="progress progress-md">--}}
                {{--                                            <div class="progress-bar bg-danger w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0"--}}
                {{--                                                 aria-valuemax="100"></div>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                            <div class="col-12 col-sm-6 col-md-6 col-xl-4 grid-margin stretch-card">--}}
                {{--                                <div class="card">--}}
                {{--                                    <div class="card-body">--}}
                {{--                                        <h4 class="card-title">Sales</h4>--}}
                {{--                                        <div class="d-flex justify-content-between">--}}
                {{--                                            <p class="text-muted">Avg. Session</p>--}}
                {{--                                            <p class="text-muted">143</p>--}}
                {{--                                        </div>--}}
                {{--                                        <div class="progress progress-md">--}}
                {{--                                            <div class="progress-bar bg-warning w-25" role="progressbar" aria-valuenow="25"--}}
                {{--                                                 aria-valuemin="0" aria-valuemax="100"></div>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Business List </h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table id="order-listing" class="table">
                                        <thead>
                                        <tr>

                                            <th>Order #</th>
                                            <th>name</th>
                                            <th>Phone Number</th>
                                            <th>Business Code</th>
                                            <th>administrationPhoneNumber</th>
                                            <th>email</th>
                                            <th>status</th>
                                            <th>tinNumber</th>
                                            <th>contactPerson</th>
                                            <th>contactNumberPhone</th>
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
                </div>
            </div>

            <div class="modal fade" id="business-registration" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">New Business</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="business-add" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Name:</label>
                                            <input type="text" class="form-control" id="" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Phone Number:</label>
                                            <input type="text" class="form-control" id="" name="phoneNumber" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Business Short Code:</label>
                                            <input type="text" class="form-control" id="" name="businessShortCode" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success" id="business-add">Add Business</button>

                            </form>
                        </div>

                    </div>
                </div>
            </div>


            @include('layouts.footer')
        </div>
    </div>
</div>
<!-- container-scroller -->
@include('admin.pages.business.business_script')
@include('assets.js')
