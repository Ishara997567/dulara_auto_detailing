<?php include '../includes/header.php';
include "../model/sale_model.php";
include "../model/job_model.php";

$saleObj = new Sale();
$jobObj = new Job();
?>

    <style>
        a:link{
            text-decoration: none;
        }
        .circle-amount{
            border-radius: 50%;
            line-height: 150px;
            vertical-align: center;
            width: 150px;
            height: 150px;
            padding: 10px;
            background: #fff;
            border: 3px solid #000;
            color: #000;
            text-align: center;
            font: 100px Arial, sans-serif;

        }
    </style>
    <title>Main Dashboard</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart1);
        google.charts.setOnLoadCallback(drawChart2);

        function drawChart1() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Sales', 'Expenses'],
                ['2004',  1000,      400],
                ['2005',  1170,      460],
                ['2006',  660,       1120],
                ['2007',  1030,      540]
            ]);

            var options = {
                title: 'Worker KPI',
                curveType: 'function',
                legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('line_chart1'));

            chart.draw(data, options);
        }
        function drawChart2() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Sales', 'Expenses'],
                ['2004',  1000,      400],
                ['2005',  1170,      460],
                ['2006',  660,       1120],
                ['2007',  1030,      540]
            ]);

            var options = {
                title: 'Customer Feedbakc Reception',
                curveType: 'function',
                legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('line_chart2'));

            chart.draw(data, options);
        }
    </script>
    </head>
    <body>
<!-- Navigation Bar -->

<?php include '../includes/navbar.php'; ?>

<!-- Side Panel -->
<div class="container-fluid padding">
    <!-- Dashboard Title    -->
    <div class="row bg-dark align-items-end">
        <ul class="nav flex-column">
            <li class="nav-link">
                <a href="#" class="display-1 navbar-brand"><i class="fa fa-tachometer"></i> Dashboard</a>
            </li>
        </ul>

    </div>
    <div class="row padding">
        <!-- Side bar   -->
        <div class="col-3 d-none d-md-block sidebar bg-dark">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="service-management.php"><i class="fa fa-car"></i>&nbsp;&nbsp;Services Management</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="inventory-management.php"><i class="fa fa-list"></i>&nbsp;&nbsp;Inventory Management</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="job-management.php"><i class="fa fa-tasks"></i>&nbsp;&nbsp;Jobs Management</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="customer-management.php"><i class="fa fa-users"></i>&nbsp;&nbsp;Customer Management</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="sale-management.php"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Sale Management</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="employee-management.php"><i class="fa fa-address-card"></i>&nbsp;&nbsp;Worker Management</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="notification-management.php"><i class="fa fa-bell"></i>&nbsp;&nbsp;Notifications Management</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-bar-chart"></i>&nbsp;&nbsp;Reports Management</a>
                </li>
            </ul>
        </div>

        <!-- Card for Jobs  -->
        <div class="col-9 mt-2">
            <div id="slides" class="carousel slide" data-ride="carousel" data-interval="1000">
                <ul class="carousel-indicators">
                    <li data-target="#slides" data-slide-to="0" class="active"></li>
                    <li data-target="#slides" data-slide-to="1"></li>
                    <li data-target="#slides" data-slide-to="2"></li>
                    <li data-target="#slides" data-slide-to="3"></li>
                </ul>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../includes/images/carousel/background.jpg" width="1000" height="450">
<!--                        <div class="carousel-caption">-->
<!--                            <h1 class="display-1">DULARA</h1>-->
<!--                            <h1 class="display-1">AUTO DETAILING</h1>-->
<!--                            <div class="display-3">The finest automobile service center in area</div>-->
<!--                        </div>-->
                    </div>

                    <div class="carousel-item">
                        <img src="../includes/images/carousel/background2.jpg" width="1000" height="450">
                    </div>

                    <div class="carousel-item">
                        <img src="../includes/images/carousel/background3.jpg" width="1000" height="450">
                    </div>

                    <div class="carousel-item">
                        <img src="../includes/images/carousel/background4.jpg" width="1000" height="450">
                    </div>


                </div>

            </div>
            <!-- First Row 2 Cards  -->
            <div class="row mt-2">
                <div class="col-4">
                    <div class="card border-success">
                        <div class="h3 card-header">Total Jobs for Today</div>
                        <div class="card-body d-flex justify-content-center">
                            <p class="card-text circle-amount"><?php echo $jobObj->getTodayCompletedJobCount(); ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card border-dark">
                        <div class="h3 card-header">Total Job Completion</div>
                        <div class="card-body d-flex justify-content-center">
                            <p class="card-text text-center circle-amount"><?php echo $jobObj->getAllCompletedJobCount(); ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card border-danger">
                        <div class="h3  card-header">Loyalty Enrollments</div>
                        <div class="card-body d-flex justify-content-center">
                            <p class="card-text text-center circle-amount">7</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 2nd Row 2 Cards  -->
            <div class="row mt-3">
                <div class="col-6">
                    <div class="card">
                        <div class="h3 card-header">Worker KPI</div>
                        <div class="card-body">
                            <div id="line_chart1"></div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card">
                        <div class="h3 card-header">Customer Feedback</div>
                        <div class="card-body">
                            <div id="line_chart2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 3rd Row 2 Cards  -->
            <div class="row mt-3">
                <div class="col-6">
                    <div class="card border-secondary">
                        <div class="h3 card-header">Total Purchasing Amount</div>
                        <div class="card-body">
                            <?php

                            $amount = $saleObj->getTotalPurchaseAmount();
                            setlocale(LC_MONETARY, "en_US");
                            ?>
                            <p class="display-3 text-center">Rs. <?php echo number_format($amount, 2); ?> </p>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card border-primary">
                        <div class="h3 card-header">Total Goods Received</div>
                        <div class="card-body">
                            <?php
                            $a = $saleObj->getTotalGRNAmount();
                            setlocale(LC_MONETARY, "en_US")
                            ?>
                            <p class="display-3 text-center">Rs. <?php echo number_format($a, 2); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Side Panel -->
<div class="col-2">&nbsp;</div>
<div class="col-10">&nbsp;</div>
<?php include '../includes/footer.php'; ?>