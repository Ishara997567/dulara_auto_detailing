<?php include '../includes/header.php'; ?>
    <title>Sales Dashboard</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar','corechart']});
        google.charts.setOnLoadCallback(function(){
            drawChart();
            drawStuff();
            drawChart1();
        });


        var totalSale = document.getElementById('tot_sale');
        //Column Chart for Sales
        function drawChart1() {

            var data = google.visualization.arrayToDataTable([
                ['Year', 'Sale', 'Expenses', 'Profit'],
                ['2014', 1000, 400, 200],
                ['2015', 1170, 460, 250],
                ['2016', 660, 1120, 300],
                ['2017', 1030, 540, 350]
            ]);

            var options = {
                chart: {
                    title: 'Company Performance',
                    subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                },
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }

        //Pie Chart for Suppliers
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Effort', 'Amount given'],
                ['My all',      100],
            ]);

            var options = {
                pieHole: 0.9,
                pieSliceTextStyle: {
                    color: 'black',
                },
                legend: 'none'
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }

        //Horizontal Bar Chart for Item Wise Purchases
        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
                ['Item', 'Amount'],
                ["Item 1", 44],
                ["Item 2", 31],
                ["Item 3", 12],
                ["Item 4", 10],
                ['Item 5', 3]
            ]);

            var options = {
                title: 'Item Wise Purchases',
                width: 600,
                height: 200,
                legend: { position: 'none' },
                // chart: { title: 'Chess opening moves',
                //     subtitle: 'popularity by percentage' },
                bars: 'horizontal', // Required for Material Bar Charts.
                axes: {
                    x: {
                        0: { side: 'top', label: 'Amount'} // Top x-axis.
                    }
                },
                bar: { groupWidth: "90%" }
            };

            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
            chart.draw(data, options);
        }
    </script>
    </head>
    <body>
    <!-- Navigation Bar -->
    <?php include '../includes/navbar.php'; ?>
    <!-- Content    -->
    <div class="container-fluid">
        <!-- Top Row for Navigations-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="navbar-brand">Sales Dashboard</div>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <!-- Purchase Order Dropdown    -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="po_nav_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Purchase Orders
                        </a>
                        <div class="dropdown-menu" aria-labelledby="po_nav_dropdown">
                            <a class="dropdown-item" href="#"><i class="fa fa-plus"></i> New Purchase Order</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-clock-o"></i> See Purchase Order History</a>
                        </div>
                    </li>
                    <!-- GRN Dropdown    -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="grn_nav_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Good Received Notes
                        </a>
                        <div class="dropdown-menu" aria-labelledby="grn_nav_dropdown">
                            <a class="dropdown-item" href="#"><i class="fa fa-plus"></i> New GRN</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-clock-o"></i> See GRN History</a>
                        </div>
                    </li>

                    <!-- Return Notes   -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="rn_nav_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Return Notes
                        </a>
                        <div class="dropdown-menu" aria-labelledby="rn_nav_dropdown">
                            <a class="dropdown-item" href="#"><i class="fa fa-plus"></i> New Return Note</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-clock-o"></i> See Return Notes History</a>
                        </div>
                    </li>

                    <!-- Suppliers  -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="supplier_nav_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Suppliers
                        </a>
                        <div class="dropdown-menu" aria-labelledby="supplier_nav_dropdown_nav_dropdown">
                            <a class="dropdown-item" href="#"><i class="fa fa-user-plus"></i> New Supplier</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-file-text"></i> Manage Supplier</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="row">&nbsp;</div>
        <!-- First Row Dashboard cards  -->
        <div class="card">
            <div class="card-body">
                <!-- First Row  -->
                <div class="row">
                    <!-- Item Wise Purchases   -->
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fa fa-clock-o"></i> Item Wise Purchases </h5>
                                <div id="top_x_div" style="width: 600px; height: 200px;"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Completed Jobs -->
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fa fa-users"></i> Suppliers </h5>
                                <div id="donutchart" style="width: 600px; height: 200px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">&nbsp;</div>

        <!-- Sales and Expenses Card    -->
        <div class="card">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="card-header">Sales and Expenses</h5>
                </div>
                <div class="col-md-9">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card to express Sales, Expense and Profit   -->
                <div class="col-md-3 d-flex align-items-center justify-content-center">
                    <div class="card">
                        <div class="card-body">
                            <p id="tot_sale">Total Sale</p>
                            <p id="tot_expense">Total Expense</p>
                            <p id="tot_profit">Total Profit</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include '../includes/footer.php'; ?>