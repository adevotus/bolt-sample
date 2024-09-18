@include('assets.css')
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        @include('layouts.client.header')

        @include('layouts.client.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Payment</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="/client-dashboard">Dashboard</a></div>

                    </div>
                </div>

                <div class="section-body">
                    <h2 class="section-title">Payment List</h2>
                    <p class="section-lead">
                        List Payment To all Product  Orders.
                    </p>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="all-payments">
                                            <thead>
                                            <tr>
                                                <th>Payment ID</th>
                                                {{--       <th>Date</th>--}}
                                                <th>company</th>
                                                <th>amount</th>
                                                {{--                                                        <th>currency</th>--}}
                                                <th>reference</th>
                                                <th>phone</th>
                                                {{--                                                        <th>paybillNumber</th>--}}
                                                <th>paymentStatus</th>
                                                {{--                                                        <th>country</th>--}}
                                                <th>paymentReceipt</th>
                                                {{--                                                        <th>transactionType</th>--}}
                                                {{--                                                        <th>remarks</th>--}}
                                                <th>transactionDate</th>
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

        @include('layouts.client.footer')
    </div>
</div>
@include('client.scripts.client-script')
@include('assets.js')
