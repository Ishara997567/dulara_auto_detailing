<?php include '../includes/header.php'; ?>

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
                <a href="#" class="h3 display-4 navbar-brand"><i class="fa fa-home"></i> Dashboard</a>
            </li>
        </ul>

    </div>
    <div class="row padding">
        <!-- Side bar   -->
        <div class="col-2 d-none d-md-block sidebar bg-dark">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="service-manage.php"><i class="fa fa-car"></i>&nbsp;&nbsp;Services</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="inventory-dashboard.php"><i class="fa fa-list"></i>&nbsp;&nbsp;Inventory</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="job-dashboard.php"><i class="fa fa-tasks"></i>&nbsp;&nbsp;Jobs</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="customer-dashboard.php"><i class="fa fa-users"></i>&nbsp;&nbsp;Customer</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="sales-dashboard.php"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Sale</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="worker-dashboard.php"><i class="fa fa-address-card"></i>&nbsp;&nbsp;Worker</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="notifications.php"><i class="fa fa-bell"></i>&nbsp;&nbsp;Notifications</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-bar-chart"></i>&nbsp;&nbsp;Reports</a>
                </li>
            </ul>
        </div>

        <!-- Card for Jobs  -->
        <div class="col-10">
            <!-- First Row 2 Cards  -->
            <div class="row mt-3">
                <div class="col-4">
                    <div class="card border-success">
                        <div class="h3 card-header">Total Jobs for Today</div>
                        <div class="card-body d-flex justify-content-center">
                            <p class="card-text circle-amount">99</p>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card border-dark">
                        <div class="h3 card-header">Total Job Completion</div>
                        <div class="card-body d-flex justify-content-center">
                            <p class="card-text text-center circle-amount">99</p>
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
                        <div class="h3 card-header">Today Purchasing Amount</div>
                        <div class="card-body">
                            <p class="display-3 text-center">Rs. 1,200,000</p>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card border-primary">
                        <div class="h3 card-header">Goods Received Today</div>
                        <div class="card-body">
                            <p class="display-3 text-center">Rs. 1,000,000</p>
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