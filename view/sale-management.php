<?php include '../includes/header.php';
include '../model/sale_model.php';
$saleObj = new Sale();
?>
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
            <?php
            $top_item_result = $saleObj->getGRNTopItems();
            while($i=$top_item_result->fetch_assoc())
            {
            ?>
            ["<?php echo $i["item_name"]; ?>", <?php echo $i["sgi_qty"]; ?>],
   <?php }  ?>
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
        <div class="navbar-brand"><i class="fa fa-shopping-cart"></i>&nbsp;Sales Dashboard</div>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <!-- Purchase Order Dropdown    -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="po_nav_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Purchase Orders
                    </a>
                    <div class="dropdown-menu" aria-labelledby="po_nav_dropdown">
                        <a class="dropdown-item" href="#po_modal" data-target="#po_modal" data-toggle="modal"><i class="fa fa-plus"></i> New Purchase Order</a>
                        <a class="dropdown-item" href="sale-purchase-order-history.php"><i class="fa fa-clock-o"></i> See Purchase Order History</a>
                    </div>
                </li>



                <!-- Modal for Purchase Order-->
                <div class="modal fade" id="po_modal" tabindex="-1" role="dialog" aria-labelledby="po_modal" aria-hidden="true">
                    <div class="modal-xl modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">New Purchase Order</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="sale-po-generate.php" method="post">
                                <div class="modal-body">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-6 text-center po-danger-alert">

                                        </div>
                                    </div>
                                    <!-- Form -->
                                    <?php
                                    $po_id = $saleObj->getPOId();
                                    ?>
                                    <!-- PO ID  -->
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="po_id">Purchase Order ID</label>
                                            <input class="form-control" type="text" id="po_id" readonly name="po_id" value="<?php echo $po_id; ?>"/>
                                        </div>


                                        <!-- Supplier   -->
                                        <div class="form-group col-md-6">
                                            <label for="supplier">Supplier</label>
                                            <select class="custom-select form-control" name="supplier" id="po_supplier">
                                                <option value="choose" selected>Choose...</option>
                                                <?php
                                                $sup_result = $saleObj->getAllSuppliers();
                                                while($sup_row = $sup_result->fetch_assoc())
                                                {
                                                    ?>
                                                    <option value="<?php echo $sup_row['sup_id']; ?>"><?php echo $sup_row['sup_name']; ?></option>

                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- First Form Row    -->
                                    <div class="form-row purchase-order">
                                        <!-- Item Code  -->
                                        <div class="form-group col-md-2">
                                            <label for="item_code1">Item Code</label>
                                            <input type="text" class="form-control" id="item_code1" name="item_code[]" readonly placeholder="Item Code"/>
                                        </div>

                                        <!-- Item Name  -->
                                        <div class="form-group col-md-3 ui-widget ui-front">
                                            <label for="item_name1">Item Name</label>
                                            <input type="text" class="form-control" id="item_name1" name="item_name[]" placeholder="Item Name"/>
                                        </div>

                                        <!-- Unit Price  -->

                                        <div class="form-group col-md-2">
                                            <label for="unit_price1">Unit Price</label>
                                            <input type="text" class="form-control" id="unit_price1" name="unit_price[]" placeholder="Rs."/>
                                        </div>

                                        <!-- Quantity   -->
                                        <div class="form-group col-md-2">
                                            <label for="qty1">Quantity</label>
                                            <input type="text" class="form-control" id="qty1" name="qty[]" placeholder="Quantity"/>
                                        </div>

                                        <!-- Amount   -->
                                        <div class="form-group col-md-2">
                                            <label for="amount1">Amount</label>
                                            <input type="text" class="form-control" id="amount1" name="amount[]" readonly placeholder="Amount"/>
                                        </div>
                                        <!-- Remove Button  -->
                                        <div class="form-group col-md-1">
                                            <label for="item_name1">&nbsp;</label>
                                            <button type="button" class="form-control btn btn-outline-danger rounded-pill" id="btn_remove1" name="btn_remove[]">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>


                                    </div>


                                    <div class="po-record-container"></div>

                                    <button type="button" class="btn btn-outline-primary rounded-pill" id="new_po_record"><i class="fa fa-plus"></i> New Row</button>





                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" name="submit" id="po_submit" value="Generate"/>
                                </div>
                            </form>
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
                        <a class="dropdown-item" href="sale-grn-history.php"><i class="fa fa-clock-o"></i> See GRN History</a>
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
                            <form action="#" method="post" id="frm_grn_generate">
                                <div class="modal-body">

                                    <div class="row d-flex justify-content-center">
                                        <div class="col-6 text-center grn-danger-alert">

                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <!-- GRN ID  -->
                                        <label for="grn_id" class="col-form-label col-1">GRN ID</label>
                                        <div class="form-group col-md-4">
                                            <input class="form-control" type="text" id="grn_id" readonly name="grn_id" value="<?php echo $saleObj->getGRNId() ;?>"/>
                                        </div>
                                    </div>

                                    <!-- Purchase Order ID  -->
                                    <div class="form-row">
                                        <label for="grn_po_id" class="col-form-label col-1">PO ID</label>
                                        <div class="form-group col-md-4">
                                            <select class="form-control custom-select" name="grn_po_id" id="grn_po_id">
                                                <option value="choose" selected>Choose...</option>
                                                <?php
                                                $po_result = $saleObj->getPO();
                                                while($r = $po_result->fetch_assoc())
                                                {
                                                    ?>
                                                    <option value="<?php echo $r["po_id"]; ?>"><?php echo $r["po_id"]; ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>

                                    <!-- Supplier   -->
                                    <div class="form-row">
                                        <label for="grn_supplier" class="col-form-label col-1">Supplier</label>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="grn_supplier" id="grn_supplier" readonly>
                                        </div>
                                    </div>

                                    <!-- Grn PO Amount   -->
                                    <div class="form-row">
                                        <label for="grn_po_amount" class="col-form-label col-1">PO Amount</label>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control" name="grn_po_amount " id="grn_po_amount" readonly>
                                        </div>
                                    </div>




                                    <!-- Table    -->
                                    <table class="table table-bordered grn-table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Item Code</th>
                                            <th scope="col">Item Name</th>
                                            <th scope="col">Ordered Quantity</th>
                                            <th scope="col">Purchasing Unit Price</th>
                                            <th scope="col">PO Amount</th>
                                            <th scope="col">Received Quantity</th>
                                            <th scope="col">GRN Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody id="grn_po_filling_details"></tbody>
                                    </table>
                                    <button type="button" class="btn btn-outline-primary rounded-pill" id="new_grn_record"><i class="fa fa-plus"></i> New Row</button>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <input type="button" class="btn btn-primary" name="grn_submit" id="grn_submit" value="Generate"/>
                                </div>
                            </form>
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
                        <a class="dropdown-item" href="sale-rn-history.php"><i class="fa fa-clock-o"></i> See Return Notes History</a>
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
                                <div class="row">
                                    <!-- RN ID  -->
                                    <div class="form-group col-md-6">
                                        <label for="rn_id">Return Note ID</label>
                                        <input class="form-control" name="RN12494" type="text" id="rn_grn_id" readonly value="RN12494"/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <!-- GRN Order ID  -->
                                    <div class="form-group col-md-6">
                                        <label for="grn">GRN Order ID</label>
                                        <select class="form-control custom-select" name="grn" id="grn">
                                            <option selected>Choose...</option>
                                            <option value="GRN123696">GRN123696</option>
                                            <option value="GRN123392">GRN123392</option>
                                            <option value="GRN136944">GRN136944</option>
                                            <option value="GRN123498">GRN123498</option>
                                        </select>
                                    </div>

                                    <!-- Supplier   -->
                                    <div class="form-group col-md-6">
                                        <label for="supplier">Supplier</label>
                                        <input class="form-control" type="text" id="rn_supplier" name="S12" readonly value="Supplier Name"/>
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
                        <a class="dropdown-item" href="sale-manage-supplier.php"><i class="fa fa-file-text"></i> Manage Supplier</a>
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
                            <form action="../controller/salecontroller.php?status=add_supplier" method="post" class="form-supplier">

                                <div class="modal-body">
                                    <div class="row padding d-flex justify-content-center">
                                        <div class="col-6 text-center alert supplier-validation-box">

                                        </div>
                                    </div>


                                    <div class="form-row">
                                        <!-- Cus code  -->
                                        <div class="form-group col-3">
                                            <label for="sup_code">Supplier Code</label>
                                            <input type="text" class="form-control" readonly="readonly" id="sup_code" name="sup_code" placeholder="Supplier Code">
                                        </div>

                                        <!-- Cus Name  -->
                                        <div class="form-group col-9">
                                            <label for="sup_name">Supplier Name</label>
                                            <input type="text" class="form-control" id="sup_name" name="sup_name" placeholder="Supplier Name">
                                        </div>
                                    </div>

                                    <!-- Address Rows -->
                                    <div class="form-row">
                                        <div class="form-group col-3">
                                            <label for="sup_home_no">Address</label>
                                            <input type="text" class="form-control" id="sup_home_no" name="sup_home_no" placeholder="Home Number">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-3 ">
                                            <input type="text" class="form-control" id="sup_s_name" name="sup_s_name" placeholder="Street Name">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-3">
                                            <input type="text" class="form-control" id="sup_city" name="sup_city" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-3">
                                            <input type="text" class="form-control" id="sup_state" name="sup_state" placeholder="State" >
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <!-- contact no 1 -->
                                        <div class="form-group col-6">
                                            <label for="sup_cn1">Contact No 1</label>
                                            <input type="text" class="form-control" id="sup_cn1" name="sup_cn1" placeholder="Mobile Number">
                                        </div>

                                        <!-- contact no 2 -->
                                        <div class="form-group col-6">
                                            <label for="sup_cn2">Contact No 2</label>
                                            <input type="text" class="form-control" id="sup_cn2" name="sup_cn2" placeholder="Office Number">
                                        </div>
                                    </div>

                                    <!--    email   -->
                                    <div class="form-row">
                                        <div class="form-group col-6">
                                            <label for="sup_email">Email</label>
                                            <input type="email" class="form-control" id="sup_email" name="sup_email" placeholder="username@example.com" >
                                        </div>
                                    </div>

                                    <!-- description    -->
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="supplier_description">Supplier Description</label>
                                            <textarea class="form-control" id="supplier_description" name="sup_description"></textarea>
                                        </div>
                                    </div>



                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary form-supplier-submit">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </ul>
        </div>
    </nav>





    <!-- Success Message From the Controller    -->
    <?php
    if(isset($_GET['success_message']))
    {
        ?>
        <div class="row">&nbsp;</div>
        <div class="row padding d-flex justify-content-center">
            <div class="col-11 display-4 text-center alert alert-success">
                <?php
                echo base64_decode($_GET['success_message']);

                ?>
            </div>
        </div>

    <?php  } ?>
    <!-- End of Success Message From the Controller    -->


    <!-- Error Message From the Controller  -->
    <?php
    if(isset($_GET["error_message"]))
    {
        ?>
        <div class="row">&nbsp;</div>
        <div class="row padding d-flex justify-content-center">
            <div class="col-11 display-4 text-center alert alert-danger">

                <?php
                echo base64_decode($_GET['error_message']);
                ?>
            </div>
        </div>

    <?php  } ?>

    <!-- End of Error Message From the Controller  -->










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
<script src="../assets/js/sale_supplier_validation.js"></script>
<script src="../assets/js/sale_purchase_order.js"></script>
<script src="../assets/js/sale_po_validation.js"></script>
<script src="../assets/js/sale_grn.js"></script>
<script src="../assets/js/sale_grn_validation.js"></script>
