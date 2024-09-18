
@include('assets.css')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-1"></div>

                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="auth-form-light text-left py-5 px-4 px-sm-5" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;" >
                                <div class="brand-logo">
                                    <h4 class="text-centet font-weight-bold" style="font-weight: bold; text-align: center">Business Registration.</h4>
                                </div>
                                <h4>Hello! let's get started</h4>
                                <h6 class="font-weight-light">Business Registration.</h6>
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

                <div class="col-lg-1"></div>

            </div>
        </div>
    </div>
</div>
@include('script.business-registration')
@include('assets.js')




