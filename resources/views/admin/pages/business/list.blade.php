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
                    <h1>Business List</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="/home">Dashboard</a></div>

                    </div>
                </div>

                <div class="section-body">
                    <h2 class="section-title">Business  List</h2>
                    <p class="section-lead">
                        List Business  To all  Users.
                    </p>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
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
{{--                                                <th>createdDate</th>--}}
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
            </section>
        </div>

        @include('layouts.footer')
    </div>
</div>
@include('admin.pages.business.business_script')
@include('assets.js')
