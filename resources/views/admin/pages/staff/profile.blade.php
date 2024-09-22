@include('assets.css')
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        @include('layouts.header')

        @include('layouts.sidebar')

        <!-- Main Content -->
        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Profile</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                        <div class="breadcrumb-item">Profile</div>
                    </div>
                </div>

                <div class="section-body">
                    <h2 class="section-title">{{(Auth::user()->name)}}</h2>
                    <p class="section-lead">
                        Change information about yourself on this page.
                    </p>

                    <div class="row mt-sm-4">
                        <div class="col-12 col-md-12 col-lg-5">
                            <div class="card profile-widget">
                                <div class="profile-widget-header">
                                    <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                                    <form id="update-profile-image" action="" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="profile_image" accept="image/*" onchange="this.form.submit()" style="display:none;" id="image-upload">
                                        <label for="image-upload" class="btn btn-primary mt-2 ml-5">Change Image</label>
                                    </form>
                                    <div class="profile-widget-items">
                                        <div class="profile-widget-item">
                                            <div class="profile-widget-item-label">Posts</div>
                                            <div class="profile-widget-item-value">187</div>
                                        </div>
                                        <div class="profile-widget-item">
                                            <div class="profile-widget-item-label">Followers</div>
                                            <div class="profile-widget-item-value">6,8K</div>
                                        </div>
                                        <div class="profile-widget-item">
                                            <div class="profile-widget-item-label">Following</div>
                                            <div class="profile-widget-item-value">2,1K</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-widget-description">
                                    <div class="profile-widget-name">Ujang Maman <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Web Developer</div></div>
                                    Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-7">
                            <div class="card">
                                <form method="POST" action="{{ route('profile-update') }}" class="needs-validation" novalidate="">
                                    @csrf
                                    <div class="card-header">
                                        <h4>Edit Profile</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>First Name</label>
                                                <input type="text" name="name" class="form-control" value="{{(Auth::user()->name)}}" required="">
                                                <div class="invalid-feedback">
                                                    Please fill in the first name
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" value="{{(Auth::user()->email)}}" required="">
                                                <div class="invalid-feedback">
                                                    Please fill in the email
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>

                                <form method="POST" action="{{ route('profile_password-update') }}" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="card-header">
                                        <h4>Update Password</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-12">
                                                <label>New Password</label>
                                                <input type="password" name="password" class="form-control" required>
                                                <div class="invalid-feedback">
                                                    Please enter a new password.
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 col-12">
                                                <label>Confirm Password</label>
                                                <input type="password" name="confirm_password" class="form-control" required>
                                                <div class="invalid-feedback">
                                                    Please confirm the new password.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        @include('layouts.footer')
    </div>
</div>
@include('assets.js')
<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "timeOut": "5000"
    };

    @if(session('success'))

    toastr.success("{{ session('success') }}");

    @endif

    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error("{{ $error }}");
    @endforeach
    @endif
</script>

