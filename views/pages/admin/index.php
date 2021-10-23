<?php include_once 'views/pages/admin/layouts/top_navbar.php' ?>
<?php include_once 'views/pages/admin/layouts/sidebar.php' ?>
    
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Overview</li>
        </ol>
    </nav>

    <h4 class="h4">Dashboard</h4>
    
    <div class="row my-4">
        <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
            <div class="card">
                <h5 class="card-header">Customers</h5>
                <div class="card-body">
                    <h5 class="card-title">345k</h5>
                    <p class="card-text">Feb 1 - Apr 1, United States</p>
                    <p class="card-text text-success">18.2% increase since last month</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
            <div class="card">
                <h5 class="card-header">Revenue</h5>
                <div class="card-body">
                    <h5 class="card-title">$2.4k</h5>
                    <p class="card-text">Feb 1 - Apr 1, United States</p>
                    <p class="card-text text-success">4.6% increase since last month</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
            <div class="card">
                <h5 class="card-header">Purchases</h5>
                <div class="card-body">
                    <h5 class="card-title">43</h5>
                    <p class="card-text">Feb 1 - Apr 1, United States</p>
                    <p class="card-text text-danger">2.6% decrease since last month</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
            <div class="card">
                <h5 class="card-header">Traffic</h5>
                    <div class="card-body">
                        <h5 class="card-title">64k</h5>
                        <p class="card-text">Feb 1 - Apr 1, United States</p>
                        <p class="card-text text-success">2.5% increase since last month</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-lg-0">
                <div class="card">
                    <h5 class="card-header">Latest transactions</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Order</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Date</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <th scope="row">17371705</th>
                                        <td>Volt Premium Bootstrap 5 Dashboard</td>
                                        <td>johndoe@gmail.com</td>
                                        <td>€61.11</td>
                                        <td>Aug 31 2020</td>
                                        <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                    </tr>

                                    <tr>
                                        <th scope="row">17370540</th>
                                        <td>Pixel Pro Premium Bootstrap UI Kit</td>
                                        <td>jacob.monroe@company.com</td>
                                        <td>$153.11</td>
                                        <td>Aug 28 2020</td>
                                        <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                    </tr>

                                    <tr>
                                        <th scope="row">17371705</th>
                                        <td>Volt Premium Bootstrap 5 Dashboard</td>
                                        <td>johndoe@gmail.com</td>
                                        <td>€61.11</td>
                                        <td>Aug 31 2020</td>
                                        <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                    </tr>

                                    <tr>
                                        <th scope="row">17370540</th>
                                        <td>Pixel Pro Premium Bootstrap UI Kit</td>
                                        <td>jacob.monroe@company.com</td>
                                        <td>$153.11</td>
                                        <td>Aug 28 2020</td>
                                        <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                    </tr>

                                    <tr>
                                        <th scope="row">17371705</th>
                                        <td>Volt Premium Bootstrap 5 Dashboard</td>
                                        <td>johndoe@gmail.com</td>
                                        <td>€61.11</td>
                                        <td>Aug 31 2020</td>
                                        <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                    </tr>

                                    <tr>
                                        <th scope="row">17370540</th>
                                        <td>Pixel Pro Premium Bootstrap UI Kit</td>
                                        <td>jacob.monroe@company.com</td>
                                        <td>$153.11</td>
                                        <td>Aug 28 2020</td>
                                        <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="#" class="btn btn-block btn-light">View all</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-4">
                <div class="card">
                    <h5 class="card-header">Traffic last 6 months</h5>
                    <div class="card-body">
                        <div id="traffic-chart"></div>
                    </div>
                </div>
            </div>
        </div>
</main>

<?php include_once 'views/pages/admin/layouts/end.php' ?>