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
                    <h1>Business</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="/home">Dashboard</a></div>

                    </div>
                </div>

                <div class="section-body">



                    <div class="card profile-widget">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-10">
                                    <h2><span class="m-3"><b>Business Name: </b></span>{{$businessInfo['name']}}</h2>

                                </div>
                                <div class="col-md-1">
                                    <span class="" style="float: right;margin-left: 100px">
                                        <p><a class="btn btn-primary btn-sm text-white btn-block" data-toggle="modal" data-target="#business-detail-edit">Edit <i class="fa fa-pen-alt px-1"></i></a></p>

                                    </span>

                                </div>
                                <div class="col-md-1">
                                    <span class="" style="float: right; margin-left: 650px">
                                        <p><a class="btn btn-danger btn-sm text-white btn-block"  data-confirm="Sure?|Do you want to continue?" data-confirm-yes="alert('Deleted :)');">Delete <i class="fa fa-trash px-1"></i></a></p>

                                    </span>

                                </div>


                            </div>
                        </div>

                        <div class="profile-widget-description">
                            <div class="profile-widget-name">
                                <p>
                                    <span class="m-4" style="font-weight: bold;color: #000000">Contact Person:</span>{{$businessInfo['contactPerson']}}

                                    <span class="ml-5" style="font-weight: bold;color: #000000"> Phone Number:</span>{{$businessInfo['phoneNumber']}}

                                    <span class="m-5" style="font-weight: bold;color: #000000">Administration  Number:</span>{{$businessInfo['administrationPhoneNumber']}}
                                </p>
                                <p>
                                    <br>
                                    <span class="m-4" style="font-weight: bold;color: #000000">Business Email:</span>{{$businessInfo['email']}}

                                    <span class="m-4" style="font-weight: bold;color: #000000">Business Status:</span>{{$businessInfo['status']}}

                                    <span class="m-4" style="font-weight: bold;color: #000000">Business TinNumber:</span>{{$businessInfo['tinNumber']}}

                                </p>


                    </div>
                </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                               <div class="card-header">
                                   <h6>Product List</h6>
                               </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1-product-list">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Picture</th>
                                                <th>Unit</th>
                                                <th>Description</th>
                                                <th>Code</th>
                                                <th>Color</th>
                                                <th>Unit Measure</th>
                                                <th>Selling Price</th>
                                                <th>Purchase Price</th>
                                                <th>Include Shipping</th>
                                                <th>Unit Shipping Price</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($info))
                                                <div class="alert alert-info text-center">{{ $info }}</div>

                                            @elseif(isset($error))
                                                <div class="alert alert-danger">{{ $error }}</div>

                                            @else
                                                @foreach($business as $index => $detail)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $detail['name'] }}</td>
                                                        <td><img src="{{ $detail['pictureLink'] }}" alt="Picture" width="50"></td>
                                                        <td>{{ $detail['unit'] }}</td>
                                                        <td>{{ $detail['description'] }}</td>
                                                        <td>{{ $detail['code'] }}</td>
                                                        <td>{{ $detail['color'] }}</td>
                                                        <td>{{ $detail['unitMeasure'] }}</td>
                                                        <td>{{ $detail['sellingPrice'] }}</td>
                                                        <td>{{ $detail['purchasePrice'] }}</td>
                                                        <td>{{ $detail['includeShipping'] }}</td>
                                                        <td>{{ $detail['unitShippingPrice'] }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($detail['createdDate'])->format('Y-m-d H:i:s') }}</td>

                                                        <td>
                                                            <a href="/edit-product/{{$detail['id']}}" class="btn btn-primary btn-sm text-white d-inline"><i class="fa fa-pen px-1"></i></a>
                                                            <a class="btn btn-danger btn-sm text-white d-inline"  data-confirm="Sure?|Do you want to continue?" data-confirm-yes="alert('Deleted :)');"><i class="fa fa-trash px-1"></i></a>

                                                        </td>

                                                    </tr>
                                                @endforeach

                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

{{--                    <div class="card">--}}
{{--                        <div class="card-header">--}}
{{--                            <h4>The Bootstrap Way</h4>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <p class="mb-2">Use the Bootstrap method to create modal. You need to create an HTML structure for modal and the following button will trigger it.</p>--}}
{{--                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Aw, yeah!</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>

            </section>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="business-detail-edit">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Form for ,{{$businessInfo['name']}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <form id="edit-business-details">
                                @csrf
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Business Name</label>
                                            <input type="text" class="form-control" name="name" value="{{$businessInfo['name']}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Email</label>
                                            <input type="email" class="form-control" id="inputPassword4"  value="{{$businessInfo['email']}}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress">Contact Person</label>
                                            <input type="text" class="form-control"  name="contactPerson" value="{{$businessInfo['contactPerson']}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Contact Number Phone</label>
                                            <input type="text" class="form-control" name="contactNumberPhone"  value="{{$businessInfo['contactNumberPhone']}}">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Contact Number Phone</label>
                                            <input type="text" class="form-control" name="contactNumberPhone"  value="{{$businessInfo['contactNumberPhone']}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Business tin Number</label>
                                            <input type="text" class="form-control" name="tinNumber"  value="{{$businessInfo['tinNumber']}}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Business Short Code</label>
                                            <input type="text" class="form-control" name="businessShortCode"  value="{{$businessInfo['businessShortCode']}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputAddress2">Business Short Code</label>
                                            <input type="text" class="form-control" name="administrationPhoneNumber"  value="{{$businessInfo['administrationPhoneNumber']}}">
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <button class="btn btn-primary btn-block" type="submit">Updates</button>

                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>
        @include('layouts.footer')
    </div>
</div>
@include('admin.pages.business.business_script')
@include('assets.js')
