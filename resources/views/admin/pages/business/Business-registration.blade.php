
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
                                <h3 class="font-weight-bold">Business Registration</h3>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        {{--                        <h4 class="card-title">List of Products</h4>--}}
                        <div class="row">
                            <div class="col-12">
                                <form class="pt-3" id="business-add">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">

                                                <label for="exampleInputEmail">Business Name</label>
                                                <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" placeholder="name" required autocomplete="current-name">
                                                @error('name')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail">Business Email</label>
                                                <input type="email" class="form-control form-control-lg  @error('email') is-invalid @enderror" name="email" placeholder="Username" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail">Business Phone Number</label>
                                                <input type="text" class="form-control form-control-lg  @error('email') is-invalid @enderror" name="phoneNumber" placeholder="phoneNumber" value="{{ old('phoneNumber') }}" required autocomplete="phoneNumber" autofocus>
                                                @error('phoneNumber')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">

                                                <label for="exampleInputEmail">Business Short Code</label>
                                                <input type="text" class="form-control form-control-lg @error('businessShortCode') is-invalid @enderror" name="businessShortCode" placeholder="businessShortCode" required autocomplete="current-name">
                                                @error('businessShortCode')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail">Business Admin Number</label>
                                                <input type="text" class="form-control form-control-lg  @error('administrationPhoneNumber') is-invalid @enderror" name="administrationPhoneNumber" placeholder="administrationPhoneNumber" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('administrationPhoneNumber')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail">Business Tin Number</label>
                                                <input type="text" class="form-control form-control-lg  @error('tinNumber') is-invalid @enderror" name="tinNumber" placeholder="tinNumber" value="{{ old('tinNumber') }}" required autocomplete="tinNumber" autofocus>
                                                @error('tinNumber')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">

                                                <label for="exampleInputEmail">Business Contact Person</label>
                                                <input type="text" class="form-control form-control-lg @error('contactPerson') is-invalid @enderror" name="contactPerson" placeholder="contactPerson" required autocomplete="current-name">
                                                @error('contactPerson')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail">Business Contact Number Phone</label>
                                                <input type="text" class="form-control form-control-lg  @error('contactNumberPhone') is-invalid @enderror" name="contactNumberPhone" placeholder="administrationPhoneNumber" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('contactNumberPhone')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail">Business Status</label>
                                                <select class="form-control form-control-lg @error('status') is-invalid @enderror" name="status" required autofocus>
                                                    <option value="" disabled selected>Select status</option>
                                                    <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Open</option>
                                                    <option value="Closed" {{ old('status') == 'Closed' ? 'selected' : '' }}>Closed</option>
                                                    <!-- Add more options as needed -->
                                                </select>
                                                @error('status')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <div class="mt-3 d-grid gap-2">
                                                <button class="btn  btn-primary btn-lg font-weight-medium auth-form-btn" type="submit"  id="business-add">Register The business</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4"></div>

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
</div>
@include('admin.pages.business.business_script')
@include('assets.js')
