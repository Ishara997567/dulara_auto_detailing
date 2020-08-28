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
                            <a class="dropdown-item" href="#po_modal" data-target="#po_modal" data-toggle="modal"><i class="fa fa-plus"></i> New Purchase Order</a>
                            <a class="dropdown-item" href="sales-purchase-order-history.php"><i class="fa fa-clock-o"></i> See Purchase Order History</a>
                        </div>
                    </li>



                    <!-- Modal for Purchase Order-->
                    <div class="modal fade" id="po_modal" tabindex="-1" role="dialog" aria-labelledby="po_modal_modal" aria-hidden="true">
                        <div class="modal-xl modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">New Purchase Order</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form -->
                                    <form action="#" method="post">
                                        <!-- PO ID  -->
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="po_id">Purchase Order ID</label>
                                                <input class="form-control" type="text" id="po_id" readonly name="PO12494" value="PO12494"/>
                                            </div>


                                            <!-- Supplier   -->
                                            <div class="form-group col-md-6">
                                                <label for="supplier">Supplier</label>
                                                <select name="supplier" id="supplier" class="form-control">
                                                    <option value="s125">Supplier Name</option>
                                                    <option value="s523">Supplier Name</option>
                                                    <option value="s153">Supplier Name</option>
                                                    <option value="s173">Supplier Name</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- First Form Row    -->
                                        <div class="form-row">
                                            <!-- Item Code  -->
                                            <div class="form-group col-md-3">
                                                <label for="item_code">Item Code</label>
                                                <input type="text" class="form-control" id="item_code" readonly value="Item Code"/>
                                            </div>

                                            <!-- Item Name  -->
                                            <div class="form-group col-md-3">
                                                <label for="item_name">Item Name</label>
                                                <input type="text" class="form-control" id="item_name" placeholder="Item Name"/>
                                            </div>

                                            <!-- Unit Price  -->

                                            <div class="form-group col-md-3">
                                                <label for="unit_price">Unit Price</label>
                                                <input type="text" class="form-control" id="unit_price" placeholder="Rs."/>
                                            </div>

                                            <!-- Quantity   -->
                                            <div class="form-group col-md-3">
                                                <label for="qty">Quantity</label>
                                                <input type="text" class="form-control" id="qty" placeholder="Quantity"/>
                                            </div>

                                        </div>

                                        <!-- Second Form Row    -->
                                        <div class="form-row">
                                            <!-- Item Code  -->
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" id="item_code" readonly value="Item Code"/>
                                            </div>

                                            <!-- Item Name  -->
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" id="item_name" placeholder="Item Name"/>
                                            </div>

                                            <!-- Unit Price  -->

                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" id="unit_price" placeholder="Rs."/>
                                            </div>

                                            <!-- Quantity   -->
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" id="qty" placeholder="Quantity"/>
                                            </div>
                                        </div>
                                        <!-- Third Form Row    -->
                                        <div class="form-row">
                                            <!-- Item Code  -->
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" id="item_code" readonly value="Item Code"/>
                                            </div>

                                            <!-- Item Name  -->
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" id="item_name" placeholder="Item Name"/>
                                            </div>

                                            <!-- Unit Price  -->

                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" id="unit_price" placeholder="Rs."/>
                                            </div>

                                            <!-- Quantity   -->
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" id="qty" placeholder="Quantity"/>
                                            </div>
                                        </div>
                                        <!-- Forth Form Row    -->
                                        <div class="form-row">
                                            <!-- Item Code  -->
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" id="item_code" readonly value="Item Code"/>
                                            </div>

                                            <!-- Item Name  -->
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" id="item_name" placeholder="Item Name"/>
                                            </div>

                                            <!-- Unit Price  -->

                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" id="unit_price" placeholder="Rs."/>
                                            </div>

                                            <!-- Quantity   -->
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" id="qty" placeholder="Quantity"/>
                                            </div>
                                        </div>
                                        <!-- Fifth Form Row    -->
                                        <div class="form-row">
                                            <!-- Item Code  -->
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" id="item_code" readonly value="Item Code"/>
                                            </div>

                                            <!-- Item Name  -->
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" id="item_name" placeholder="Item Name"/>
                                            </div>

                                            <!-- Unit Price  -->

                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" id="unit_price" placeholder="Rs."/>
                                            </div>

                                            <!-- Quantity   -->
                                            <div class="form-group col-md-3">
                                                <input type="text" class="form-control" id="qty" placeholder="Quantity"/>
                                            </div>
                                        </div>

                                        <div id="container"></div>

                                        <button type="button" class="btn btn-outline-primary rounded-pill" id="new_po_record"><i class="fa fa-plus"></i> New Row</button>

                                        <script>
                                            $(document).ready(function()
                                            {
                                                $("#new_record").click(function () {
                                                    $("#container").append('<input type="text"/>');
                                                });
                                            )};
                                        </script>

                                    </form>



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Generate</button>
                                </div>
                            </div>
                        </div>
                    </div>




                    <!-- GRN Dropdown    -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="grn_nav_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Good Received Notes
                        </a>
                        <div class="dropdown-menu" aria-labelledby="grn_nav_dropdown">
                            <a class="dropdown-item" href="#grn_modal" data-target="#grn_modal" data-toggle="modal"><i class="fa fa-plus"></i> New GRN</a>
                            <a class="dropdown-item" href="sales-grn-history.php"><i class="fa fa-clock-o"></i> See GRN History</a>
                        </div>
                    </li>




                    <!-- Modal for GRN-->
                    <div class="modal fade" id="grn_modal" tabindex="-1" role="dialog" aria-labelledby="grn_modal_modal" aria-hidden="true">
                        <div class="modal-xl modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">New Good Received Note</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="#" method="post">

                                        <div class="form-row">
                                            <!-- GRN ID  -->
                                            <div class="form-group col-md-4">
                                                <label for="grn_id">GRN ID</label>
                                                <input class="form-control" type="text" id="grn_id" readonly name="GRN12494" value="GRN12494"/>
                                            </div>
                                            <!-- Purchase Order ID  -->
                                            <div class="form-group col-md-4">
                                                <label for="po">Purchase Order ID</label>
                                                <select name="po" id="po" class="form-control">
                                                    <option value="PO123696">PO123696</option>
                                                    <option value="PO123392">PO123392</option>
                                                    <option value="PO136944">PO136944</option>
                                                    <option value="PO123498">PO123498</option>
                                                </select>
                                            </div>

                                            <!-- Supplier   -->
                                            <div class="form-group col-md-4">
                                                <label for="supplier">Supplier</label>
                                                <select name="supplier" id="supplier" class="form-control">
                                                    <option value="s125">Supplier Name</option>
                                                    <option value="s523">Supplier Name</option>
                                                    <option value="s153">Supplier Name</option>
                                                    <option value="s173">Supplier Name</option>
                                                </select>
                                            </div>



                                        </div>


                                        <!-- Table    -->
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Item Code</th>
                                                <th scope="col">Item Name</th>
                                                <th scope="col">Ordered Quantity</th>
                                                <th scope="col" width="30px">Received Quantity</th>
                                                <th scope="col">Purchasing Unit Price</th>
                                                <th scope="col">Amount</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                                <td><input type="text" class="form-control"/></td>
                                                <td>@mdo</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                                <td><input type="text" class="form-control"/></td>
                                                <td>@fat</td>
                                                <td>@fat</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                                <td><input type="text" class="form-control"/></td>
                                                <td>@fat</td>
                                                <td>@fat</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-outline-primary rounded-pill" id="new_grn_record"><i class="fa fa-plus"></i> New Row</button>
                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Generate</button>
                                </div>
                            </div>
                        </div>
                    </div>






                    <!-- Return Notes   -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="rn_nav_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Return Notes
                        </a>
                        <div class="dropdown-menu" aria-labelledby="rn_nav_dropdown">
                            <a class="dropdown-item" href="#supplier_modal" data-target="#rn_modal" data-toggle="modal"><i class="fa fa-plus"></i> New Return Note</a>
                            <a class="dropdown-item" href="sales-rn-history.php"><i class="fa fa-clock-o"></i> See Return Notes History</a>
                        </div>
                    </li>




                    <!-- Modal for Return Notes-->
                    <div class="modal fade" id="rn_modal" tabindex="-1" role="dialog" aria-labelledby="rn_modal_modal" aria-hidden="true">
                        <div class="modal-xl modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">New Return Note</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="#" method="post"></form>
                                    <for class="row">
                                        <!-- RN ID  -->
                                        <div class="form-group col-md-6">
                                            <label for="rn_id">Return Note ID</label>
                                            <input class="form-control" name="RN12494" type="text" id="grn_id" readonly value="RN12494"/>
                                        </div>
                                    </for>
                                    <div class="form-row">
                                        <!-- GRN Order ID  -->
                                        <div class="form-group col-md-6">
                                            <label for="grn">GRN Order ID</label>
                                            <select name="grn" id="grn" class="form-control">
                                                <option value="GRN123696">GRN123696</option>
                                                <option value="GRN123392">GRN123392</option>
                                                <option value="GRN136944">GRN136944</option>
                                                <option value="GRN123498">GRN123498</option>
                                            </select>
                                        </div>

                                        <!-- Supplier   -->
                                        <div class="form-group col-md-6">
                                            <label for="supplier">Supplier</label>
                                            <input class="form-control" type="text" id="supplier" name="S12" readonly value="Supplier Name"/>
                                        </div>



                                    </div>
                                    <!-- Table    -->
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Item Code</th>
                                            <th scope="col">Item Name</th>
                                            <th scope="col" width="30px">Received Quantity</th>
                                            <th scope="col" width="30px">Return Quantity</th>
                                            <th scope="col" >Return Type</th>
                                            <th scope="col">Purchasing Unit Price</th>
                                            <th scope="col">Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td><input type="text" class="form-control"/></td>
                                            <td><input type="text" class="form-control"/></td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                            <td><input type="text" class="form-control"/></td>
                                            <td><input type="text" class="form-control"/></td>
                                            <td>@fat</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                            <td><input type="text" class="form-control"/></td>
                                            <td><input type="text" class="form-control"/></td>
                                            <td>@fat</td>
                                            <td>@fat</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-outline-primary rounded-pill" id="new_grn_record"><i class="fa fa-plus"></i> New Row</button>



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Generate</button>
                                </div>
                            </div>
                        </div>
                    </div>






                    <!-- Suppliers  -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="supplier_nav_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Suppliers
                        </a>
                        <div class="dropdown-menu" aria-labelledby="supplier_nav_dropdown_nav_dropdown">
                            <a class="dropdown-item" href="#supplier_modal" data-target="#supplier_modal" data-toggle="modal"><i class="fa fa-user-plus"></i> New Supplier</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-file-text"></i> Manage Supplier</a>
                        </div>
                    </li>


                    <!-- Modal for Supplier-->
                    <div class="modal fade" id="supplier_modal" tabindex="-1" role="dialog" aria-labelledby="supplier_modal" aria-hidden="true">
                        <div class="modal-lg modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">New Supplier</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">


                                    <form action="#" method="post">
                                        <div class="form-row">
                                            <!-- Cus code  -->
                                            <div class="form-group col-3">
                                                <label for="sup_code">Supplier Code</label>
                                                <input type="text" class="form-control" readonly="readonly" id="sup_code" placeholder="Supplier Code">
                                            </div>

                                            <!-- Cus Name  -->
                                            <div class="form-group col-9">
                                                <label for="cus_name">Supplier Name</label>
                                                <input type="text" class="form-control" id="cus_name" placeholder="Supplier Name">
                                            </div>
                                        </div>

                                        <!-- Address Rows -->
                                        <div class="form-row">
                                            <div class="form-group col-3">
                                                <label for="home_no">Address</label>
                                                <input type="text" class="form-control" id="home_no" placeholder="Home Number">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-3 ">
                                                <input type="text" class="form-control" id="s_name" placeholder="Street Name">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-3">
                                                <input type="text" class="form-control" id="city" placeholder="City">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-3">
                                                <input type="text" class="form-control" id="state" placeholder="State" >
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <!-- contact no 1 -->
                                            <div class="form-group col-6">
                                                <label for="cn1">Contact No 1</label>
                                                <input type="text" class="form-control" id="cn1" placeholder="Mobile Number">
                                            </div>

                                            <!-- contact no 2 -->
                                            <div class="form-group col-6">
                                                <label for="cn2">Contact No 2</label>
                                                <input type="text" class="form-control" id="cn2" placeholder="Office Number">
                                            </div>
                                        </div>

                                        <!--    email   -->
                                        <div class="form-row">
                                            <div class="form-group col-6">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" placeholder="username@example.com" >
                                            </div>
                                        </div>

                                        <!-- description    -->
                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label for="supplier_description">Supplier Description</label>
                                                <textarea class="form-control" name="supplier_description" id="supplier_description"></textarea>
                                            </div>
                                        </div>
                                    </form>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>




                </ul>
            </div>
        </nav>

        <div class="row">&nbsp;</div>
        <!-- First Row Dashboard cards  -->
        <div class="card bg-dark">
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