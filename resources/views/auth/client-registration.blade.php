

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
                        <div class="card-header">
                            <h4>BUSINESS REGISTER</h4>

                            <span class="float-right ml-5" style="float:right; text-align: right;">Login to manage your business if your account <a href="#">Login</a></span>


                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form id="business-add">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="usename">Business Name</label>
                                                    <input id="username" type="text" class="form-control @error('name') is-invalid @enderror" name="name" autofocus>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="usename">Business Email</label>
                                                    <input id="username" type="text" class="form-control @error('email') is-invalid @enderror" name="email" autofocus>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="password" class="d-block">Business Phone Number</label>
                                                    <input id="password" type="text" class="form-control  @error('password') is-invalid @enderror"  name="phoneNumber">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                    @enderror

                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="usename">Business Short Code</label>
                                                    <input id="username" type="text" class="form-control @error('name') is-invalid @enderror" name="businessShortCode" autofocus>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="usename">Business Admin Number</label>
                                                    <input id="username" type="text" class="form-control @error('name') is-invalid @enderror" name="administrationPhoneNumber" autofocus>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="usename">Business Tin Number</label>
                                                    <input id="username" type="text" class="form-control @error('name') is-invalid @enderror" name="tinNumber" placeholder="" autofocus>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <label for="usename">Business Contact Person</label>
                                                    <input id="username" type="text" class="form-control @error('name') is-invalid @enderror" name="contactPerson" autofocus>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="usename">Business Contact Number Phone</label>
                                                    <input id="username" type="text" class="form-control @error('name') is-invalid @enderror" name="contactNumberPhone" autofocus>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror
                                                </div>

                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="usename">Business Status</label>
                                                    <select class="form-control form-control-lg @error('status') is-invalid @enderror" name="status" required autofocus>
                                                        <option value="" disabled selected>Select status</option>
                                                        <option value="1" {{ old('status') == 'Active' ? 'selected' : '' }}>Open</option>
                                                        <option value="2" {{ old('status') == 'Closed' ? 'selected' : '' }}>Closed</option>
                                                        <!-- Add more options as needed -->
                                                    </select>
                                                    @error('status')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                    @enderror

                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <button type="submit" class="btn btn-primary btn-lg btn-block" id="business-add">
                                                        Create Business
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-3"></div>
                                        </div>

                                    </form>
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



