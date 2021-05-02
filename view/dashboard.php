<?php include '../includes/header.php';
include "../model/sale_model.php";
include "../model/job_model.php";
include "../model/customer_model.php";
include "../model/employee_model.php";

$saleObj = new Sale();
$jobObj = new Job();
$cusObj = new Customer();
$empObj = new Employee();


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
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Name", "No of Days", { role: "style" } ],
                <?php
                $result = $empObj->getEmployeeAttendanceKPI();
                $count = 0;
                while($r = $result->fetch_assoc())
                {
                $color = $count % 2 == 0 ? "#b87333" : "gold"
                ?>
                ["<?php echo $r['name']; ?>", <?php echo $r['DayCount']; ?>, "<?php echo $color; ?>"],
                <?php $count++; } ?>
                // ["Silver", 10.49, "silver"],
                // ["Gold", 19.30, "gold"],
                // ["Platinum", 21.45, "color: #e5e4e2"]
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation" },
                2]);

            var options = {
                title: "Attendance in <?php echo date("Y"); ?>",
                width: 450,
                height: 300,
                bar: {groupWidth: "95%"},
                legend: { position: "none" },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            chart.draw(view, options);
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
                    <a class="nav-link" href="report-management.php"><i class="fa fa-bar-chart"></i>&nbsp;&nbsp;Reports Management</a>
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
                            <p class="card-text text-center circle-amount">

                                <?php
                                echo $cusObj->getTotalLoyaltyEnrollments($cusObj->getPointsOfSmallestLoyaltyProgram());
                                ?>

                            </p>
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
                            <div id="columnchart_values" class="d-flex justify-content-center"></div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card">
                        <div class="h3 card-header">Customer Feedback</div>
                        <div class="card-bod p-5">
                            <?php
                            $rating_result = $cusObj->getAverageStarRating();
                            $sum_count = 0;
                            $sum_total = 0;
                            while($r = $rating_result->fetch_assoc()){
                                $sum_count += $r['feedback_star_rating'];
                                $sum_total += $r['total'];
                            }

                            $average = $sum_total / $sum_count;
                            ?>
                            <h5 class="text-center">Average Rating</h5>
                            <div class="d-flex justify-content-center">
                            <?php
                            for($i=0 ; $i<floor($average); $i++){
                                ?>
                                <i class="fa fa-star mr-1" style="color: orange;"></i>
                                <?php
                            }
                            if(!is_int($average))
                            {
                                ?>
                                <i class="fa fa-star-half" style="color: orange;"></i>
                                <?php
                            }
                            ?>
                            </div>
                            <h1 class="text-center rounded-circle"><?php echo round($average,1); ?></h1>

                            <div class="progress mt-4">

                                <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: <?php echo ($average / 5) * 100; ?>%" aria-valuenow="<?php echo $average; ?>" aria-valuemin="0" aria-valuemax="5"></div>
                            </div>
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