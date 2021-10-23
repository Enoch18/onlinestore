<?php include_once 'views/pages/admin/layouts/top_navbar.php' ?>
<?php include_once 'views/pages/admin/layouts/sidebar.php' ?>
<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Orders</li>
        </ol>
    </nav>

    <div class="card">
        <h4 class="h4">Orders</h4><br />
        <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order #</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>ORD90834</td>
                        <td>$20</td>
                        <td>Enock Soko</td>
                        <td>sokoenock@gmail.com</td>
                    </tr>

                    <tr>
                        <th scope="row">1</th>
                        <td>ORD90844</td>
                        <td>$20</td>
                        <td>Sam Soko</td>
                        <td>sam@gmail.com</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php include_once 'views/pages/admin/layouts/end.php' ?>