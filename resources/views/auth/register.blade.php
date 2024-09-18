

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
                        <div class="card-header"><h4>REGISTER</h4></div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="POST" action="{{route('register')}}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="usename">Name</label>
                                            <input id="username" type="text" class="form-control @error('name') is-invalid @enderror" name="name" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="usename">Email</label>
                                            <input id="username" type="text" class="form-control @error('email') is-invalid @enderror" name="email" autofocus>
                                            @error('email')
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
                                            <label for="password" class="d-block">{{ __('Confirm Password') }}</label>
                                            <input id="password" type="password" class="form-control"  name="password_confirmation"  required autocomplete="new-password">

                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </form>

                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                                                <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                                                <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                                            </ol>
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img class="d-block w-100" src="{{asset('assets/img/sample-4.jpg')}}" alt="First slide">
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <h5>Heading</h5>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                            tempor incididunt ut labore et dolore magna aliqua.</p>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block w-100" src="{{asset('assets/img/sample-2.jpg')}}" alt="Second slide">
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <h5>Heading</h5>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                            tempor incididunt ut labore et dolore magna aliqua.</p>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block w-100" src="{{asset('assets/img/sample-3.jpg')}}" alt="Third slide">
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <h5>Heading</h5>
                                                        <p>Create The business with us to make Easy Management.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="custom-control">
                                        {{--                                            <input type="checkbox" name="agree" class="custom-control-input" id="agree">--}}
                                        <span class="text-center ml-4">Create the Business by Register Account in Portal  <a href="{{route('register-client')}}" class="text-primary">Register Business</a></span>
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
@include('assets.js')



