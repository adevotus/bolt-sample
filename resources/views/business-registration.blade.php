

@include('assets.css')
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10  col-md-12  col-lg-12  col-xl-12">
                    <div class="login-brand">
                        {{--                        <img src="assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">--}}
                        <h4>D FLEX | BUSINESS</h4>

                    </div>

                    <div class="card card-primary">
                        <div class="card-header"><h4>BUSINESS REGISTER</h4></div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form id="business-add">
                                        @csrf

                                        <div class="form-group">
                                            <label for="usename">Business Name</label>
                                            <input id="username" type="text" class="form-control @error('name') is-invalid @enderror" name="name" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="usename">Business Email</label>
                                            <input id="username" type="text" class="form-control @error('email') is-invalid @enderror" name="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="d-block">Business Phone Number</label>
                                            <input id="password" type="text" class="form-control  @error('password') is-invalid @enderror"  name="phoneNumber">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <label for="usename">Business Short Code</label>
                                            <input id="username" type="text" class="form-control @error('name') is-invalid @enderror" name="businessShortCode" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="usename">Business Admin Number</label>
                                            <input id="username" type="text" class="form-control @error('name') is-invalid @enderror" name="administrationPhoneNumber" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="usename">Business Tin Number</label>
                                            <input id="username" type="text" class="form-control @error('name') is-invalid @enderror" name="tinNumber" placeholder="" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="usename">Business Contact Person</label>
                                            <input id="username" type="text" class="form-control @error('name') is-invalid @enderror" name="contactPerson" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="usename">Business Contact Number Phone</label>
                                            <input id="username" type="text" class="form-control @error('name') is-invalid @enderror" name="contactNumberPhone" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="usename">Business Status</label>
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

                                        <div class="form-group">
                                            <label for="password" class="d-block">Password</label>
                                            <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror"  name="password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </form>

                                </div>
                                <div class="col-md-6">

                                    <div class="custom-control">
                                        {{--                                            <input type="checkbox" name="agree" class="custom-control-input" id="agree">--}}
                                        <span class="text-center ml-4">Create the Business by Register Account in Portal  <a href="#" class="text-primary">Register Here</a></span>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; D-Flex 2024
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('script.business-registration')
@include('assets.js')



