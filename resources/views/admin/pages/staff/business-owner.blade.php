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
                    <h1>Business-Owners</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="/home">Dashboard</a></div>

                    </div>
                </div>
                <div class="section-body">
                    <h2 class="section-title">List of All Users</h2>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                {{--       <th>Date</th>--}}
                                                <th>Email</th>
                                                <th>Business Name</th>
                                                 <th>Phone Number</th>
                                                <th>Business Code </th>
                                                <th>Tin Number</th>
                                                <th>Contact Person</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($owners as $owner)
                                                <tr>
                                                    <td>{{ $owner->name }}</td>
                                                    <td>{{ $owner->email }}</td>
                                                    <td>{{ $owner->business_name }}</td>
                                                    <td>{{$owner->phoneNumber}}</td>
                                                    <td>{{$owner->businessShortCode}}</td>
                                                    <td>{{$owner->tinNumber}}</td>
                                                    <td>{{$owner->contactPerson}}</td>
                                                    <!-- Assuming the 'User' model has a 'business' relationship -->
                                                    <td>
                                                        <!-- Add action buttons here, like view, edit, delete -->
                                                        <a href="#" class="btn btn-sm btn-primary">View</a>
                                                    </td>
                                                </tr>
                                            @endforeach
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
{{--@include('admin.pages.staff.staff_script')--}}
@include('assets.js')
