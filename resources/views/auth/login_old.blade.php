
{{--@include('assets.css')--}}
{{--<div class="container-scroller">--}}
{{--    <div class="container-fluid page-body-wrapper full-page-wrapper">--}}
{{--        <div class="content-wrapper d-flex align-items-center auth px-0">--}}
{{--            <div class="row w-100 mx-0">--}}
{{--                <div class="col-lg-1"></div>--}}

{{--                 <div class="col-lg-10">--}}
{{--                     <div class="row">--}}
{{--                         <div class="col-md-4" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;" >--}}
{{--                             <div class="auth-form-light text-left py-5 px-4 px-sm-5">--}}
{{--                                 <div class="brand-logo">--}}
{{--                                     <h4 class="text-centet font-weight-bold" style="font-weight: bold; text-align: center">Login Here</h4>--}}
{{--                                 </div>--}}
{{--                                 <h4>Hello! let's get started</h4>--}}
{{--                                 <h6 class="font-weight-light">Sign in to continue.</h6>--}}
{{--                                 <form class="pt-3" method="POST" action="{{ route('login') }}">--}}
{{--                                     @csrf--}}
{{--                                     <div class="form-group">--}}

{{--                                         <input type="email" class="form-control form-control-lg  @error('email') is-invalid @enderror" name="email" placeholder="Username" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}
{{--                                         @error('email')--}}
{{--                                         <span class="invalid-feedback" role="alert">--}}
{{--                                          <strong>{{ $message }}</strong>--}}
{{--                                         </span>--}}
{{--                                         @enderror--}}
{{--                                     </div>--}}
{{--                                     <div class="form-group">--}}


{{--                                         <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">--}}
{{--                                         @error('password')--}}
{{--                                         <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                         @enderror--}}
{{--                                     </div>--}}
{{--                                     <div class="mt-3 d-grid gap-2">--}}
{{--                                         <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit"> {{ __('Login') }}</button>--}}
{{--                                     </div>--}}
{{--                                     <div class="my-2 d-flex justify-content-between align-items-center">--}}
{{--                                         <div class="form-check">--}}
{{--                                             <label class="form-check-label text-muted">--}}
{{--                                                 <input type="checkbox" class="form-check-input">--}}
{{--                                                 Keep me signed in--}}
{{--                                             </label>--}}
{{--                                         </div>--}}
{{--                                         @if (Route::has('password.request'))--}}
{{--                                             <a href="#" class="auth-link text-black">{{ __('Forgot Your Password?') }}</a>--}}
{{--                                         @endif--}}

{{--                                     </div>--}}
{{--                                     --}}{{--                            <div class="mb-2 d-grid gap-2">--}}
{{--                                     --}}{{--                                <button type="button" class="btn btn-block btn-facebook auth-form-btn">--}}
{{--                                     --}}{{--                                    <i class="ti-facebook me-2"></i>Connect using facebook--}}
{{--                                     --}}{{--                                </button>--}}
{{--                                     --}}{{--                            </div>--}}
{{--                                     --}}{{--                            <div class="text-center mt-4 font-weight-light">--}}
{{--                                     --}}{{--                                Don't have an account? <a href="#" class="text-primary">Create</a>--}}
{{--                                     --}}{{--                            </div>--}}
{{--                                 </form>--}}
{{--                             </div>--}}
{{--                         </div>--}}
{{--                         <div class="col-md-4">--}}
{{--                             <div class="auth-form-light text-left py-5 px-4 px-sm-5">--}}
{{--                                 <div class="brand-logo">--}}
{{--                                     <h4 class="text-centet font-weight-bold" style="font-weight: bold; text-align: center">Login Here</h4>--}}
{{--                                 </div>--}}
{{--                                 <h4>Hello! let's get started</h4>--}}
{{--                                 <h6 class="font-weight-light">Sign in to continue.</h6>--}}

{{--                             </div>--}}
{{--                         </div>--}}
{{--                     </div>--}}

{{--                 </div>--}}

{{--                <div class="col-lg-1"></div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@include('assets.js')--}}




@include('assets.css')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
            <div class="row flex-grow">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="auth-form-transparent text-left p-3">
                        <div class="brand-logo">
{{--                            <img src="../../../assets/images/logo.svg" alt="logo">--}}
                            <h3>Login Here </h3>
                        </div>
                        <h4>Welcome back!</h4>
                        <h6 class="font-weight-light">Happy to see you again!</h6>
                        <form class="pt-3" METHOD="POST" ACTION="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail">Username</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                        <span class="input-group-text bg-transparent border-right-0"><i class="ti-user text-primary"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg border-left-0  @error('email') is-invalid @enderror" name="email" placeholder="Username" value="{{ old('email') }}"  required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword">Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                        <span class="input-group-text bg-transparent border-right-0"><i class="ti-lock text-primary"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg border-left-0  @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input">
                                        Keep me signed in
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a href="#" class="auth-link text-black">{{ __('Forgot Your Password?') }}</a>
                                @endif
                            </div>
                            <div class="my-3 d-grid gap-2">
                                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit"> {{ __('Login') }}</button>
                            </div>

                            <div class="text-center mt-4 font-weight-light">
                                Don't have an account? <a href="{{route('register-client')}}" class="text-primary">Create</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 login-half-bg d-flex flex-row">
                    <div class="row m-5">
                        <div class="col-12">
                            <div class="inspiration-container">
                                <div class="inspiration">Dream Big</div>
                                <div class="inspiration">Innovate</div>
                                <div class="inspiration">Achieve</div>
                                <div class="inspiration">Succeed</div>
                                <div class="inspiration">Build Your Brand</div>
                                <div class="inspiration">Lead the Market</div>
                            </div>
                            <h2 class="text-white mt-5 font-weight-bold">Welcome! Ready to start your business journey?</h2>
                            <a href="{{route('business-registration')}}" class="btn btn-primary mt-3">Create Your Business</a>
                        </div>
                        <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2021 All
                            rights reserved.</p>
                    </div>

                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

@include('assets.js')
