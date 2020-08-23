<?php include '../includes/header.php'; ?>

    <style>
        a:link{
            text-decoration: none;
        }
    </style>
    <title>Main Dashboard</title>
</head>
<body>
<!-- Navigation Bar -->

<?php include '../includes/navbar.php'; ?>

<!-- Side Panel -->
<div class="row">


    <div class="col-md-2">


        <div class="accordion mt-2" id="accordion1">
            <!-- Services -->
            <div class="card">
                <div class="card-header" id="service_heading">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#service_collapse" aria-expanded="true" aria-controls="service_collapse">
                            Services
                        </button>
                    </h5>
                </div>

                <div id="service_collapse" class="collapse ml-5" aria-labelledby="service_heading" data-parent="#accordion1">
                    <div class="card-body">
                        <a href="#">Services</a><br>
                        <a href="#">Hello</a><br>
                        <a href="#">Fuck</a>
                    </div>
                </div>
            </div>

            <!-- Inventory -->

            <div class="card">
                <div class="card-header" id="inventory_heading">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#inventory_collapse" aria-expanded="false" aria-controls="inventory_collapse">
                            Inventory
                        </button>
                    </h5>
                </div>
                <div id="inventory_collapse" class="collapse ml-5" aria-labelledby="inventory_heading" data-parent="#accordion1">
                    <div class="card-body">
                        <a href="#">Services</a><br>
                        <a href="#">Hello</a><br>
                        <a href="#">Fuck</a>
                    </div>
                </div>
            </div>

            <!-- Job    -->

            <div class="card">
                <div class="card-header" id="job_heading">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#job_collapse" aria-expanded="false" aria-controls="job_collapse">
                            Jobs
                        </button>
                    </h5>
                </div>
                <div id="job_collapse" class="collapse ml-5" aria-labelledby="job_heading" data-parent="#accordion1">
                    <div class="card-body">
                        <a href="#">Services</a><br>
                        <a href="#">Hello</a><br>
                        <a href="#">Fuck</a>
                    </div>
                </div>
            </div>

            <!-- Sales  -->
            <div class="card mt-2">
                <div class="card-header" id="sales_heading">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#sales_collapse" aria-expanded="false" aria-controls="sales_collapse">
                            Sales
                        </button>
                    </h5>
                </div>
                <div id="sales_collapse" class="collapse ml-5" aria-labelledby="job_heading" data-parent="#accordion1">
                    <div class="card-body">
                        <a href="#">Services</a><br>
                        <a href="#">Hello</a><br>
                        <a href="#">Fuck</a>
                    </div>
                </div>
            </div>


            <!-- Customer   -->
            <div class="card">
                <div class="card-header" id="customer_heading">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#customer_collapse" aria-expanded="false" aria-controls="customer_collapse">
                            Customer
                        </button>
                    </h5>
                </div>
                <div id="customer_collapse" class="collapse ml-5" aria-labelledby="customer_heading" data-parent="#accordion1">
                    <div class="card-body">
                        <a href="#">Services</a><br>
                        <a href="#">Hello</a><br>
                        <a href="#">Fuck</a>
                    </div>
                </div>
            </div>
            <!-- Worker -->
            <div class="card">
                <div class="card-header" id="worker_heading">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#worker_collapse" aria-expanded="false" aria-controls="worker_collapse">
                            Worker
                        </button>
                    </h5>
                </div>
                <div id="worker_collapse" class="collapse ml-5" aria-labelledby="worker_heading" data-parent="#accordion1">
                    <div class="card-body">
                        <a href="#">Services</a><br>
                        <a href="#">Hello</a><br>
                        <a href="#">Fuck</a>
                    </div>
                </div>
            </div>
            <!-- System User    -->
            <div class="card mt-2">
                <div class="card-header" id="systemuser_heading">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#sytemuser_collapse" aria-expanded="false" aria-controls="sytemuser_collapse">
                            System Users
                        </button>
                    </h5>
                </div>
                <div id="sytemuser_collapse" class="collapse ml-5" aria-labelledby="systemuser_heading" data-parent="#accordion1">
                    <div class="card-body">
                        <a href="#">Services</a><br>
                        <a href="#">Hello</a><br>
                        <a href="#">Fuck</a>
                    </div>
                </div>
            </div>
            <!-- Reports    -->

            <div class="card">
                <div class="card-header" id="reports_heading">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#reports_collapse" aria-expanded="false" aria-controls="reports_collapse">
                            Reports
                        </button>
                    </h5>
                </div>
                <div id="reports_collapse" class="collapse ml-5" aria-labelledby="reports_heading" data-parent="#accordion1">
                    <div class="card-body">
                        <a href="#">Services</a><br>
                        <a href="#">Hello</a><br>
                        <a href="#">Fuck</a>
                    </div>
                </div>
            </div>


        </div>


    </div>




</div>
<!-- Side Panel -->
<div class="col-md-2">&nbsp;</div>
<div class="col-md-10">&nbsp;</div>
<?php include '../includes/footer.php'; ?>