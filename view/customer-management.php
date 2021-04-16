<?php include '../includes/header.php';
include '../model/customer_model.php';

$cusObj = new Customer();

?>
<title>Customer Management</title>
<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

    // Load the Visualization API and the corechart package.
    google.charts.load('current', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(
        function(){
            drawChart1();
            drawChart2();
        }
    );

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart1() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
            ['Mushrooms', 3],
            ['Onions', 1],
            ['Olives', 1],
            ['Zucchini', 1],
            ['Pepperoni', 2]
        ]);

        // Set chart options
        var options = {'title':'How Much Pizza I Ate Last Night',
            'width':350,
            'height':200};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }

    function drawChart2() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
            ['5', 10],
            ['4', 8],
            ['3', 5],
            ['2', 3],
            ['1', 1]
        ]);

        // Set chart options
        var options = {'title':'How Much Pizza I Ate Last Night',
            'width':300,
            'height':200};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('chart2_div'));
        chart.draw(data, options);
    }
</script>
</head>
<body>
<?php include '../includes/navbar.php'; ?>
<!--    Page Content    -->
<div class="container-fluid">
    <!--    <div class="row padding jumbotron welcome display-3">-->
    <!--        <p><i class="fa fa-users"></i>&nbsp;Customer Dashboard</p>-->
    <!---->
    <!--    </div>-->


    <!-- Top Row    -->
    <div class="row padding welcome bg-light mb-3 py-2">
        <!-- Module Name    -->
        <div class="col-8">
            <div class="navbar-brand ml-5"><i class="fa fa-users"></i>&nbsp;Customer Management</div>
        </div>

        <!-- New Job    -->
        <div class="col-4 d-flex justify-content-end">
            <button class="rounded-pill btn btn-outline-primary" data-toggle="modal" data-target="#modal_new_customer" type="button"><i class="fa fa-plus"></i> New Customer</button>
            <button class="rounded-pill btn btn-outline-primary ml-2" onclick="window.location='customer-manage.php';" type="button"><i class="fa fa-file-text-o"></i> Manage Customer Details</button>
        </div>
    </div>





    <!-- End of Manage Categories Modal -->



    <!-- Success Message From the Controller    -->
    <?php
    if(isset($_GET['success_message']))
    {
        ?>

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
        <div class="row padding d-flex justify-content-center">
            <div class="col-11 display-4 text-center alert alert-danger">

                <?php
                echo base64_decode($_GET['error_message']);
                ?>
            </div>
        </div>

    <?php  } ?>

    <!-- End of Error Message From the Controller  -->


    <?php
    $result = $cusObj->getNewCustomerID();
    $r = $result->fetch_assoc();
    ?>



    <!-- Modal New Customer-->
    <div class="modal fade" id="modal_new_customer" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-xl modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="../controller/customercontroller.php?status=add_customer" method="post" id="frm_customer">
                    <div class="modal-body">
                        <div class="row padding d-flex justify-content-center">
                            <div class="col-6 text-center" id="error_new_customer">

                            </div>
                        </div>

                        <div class="form-row">
                            <!-- Cus code  -->
                            <div class="form-group col-2">
                                <label for="cus_code">Customer Code</label>
                                <input type="text" class="form-control" readonly="readonly" id="cus_code" name="cus_code" value="<?php echo $r['NewCusID']; ?>">
                            </div>

                        </div>




                        <div class="form-row">
                            <!-- Cus Vehicle No  -->
                            <div class="form-group col-4">
                                <label for="cus_vehicle_no">Vehicle Number</label>
                                <input type="text" class="form-control" id="cus_vehicle_no" name="cus_vehicle_no" placeholder="Vehicle Number">
                            </div>

                            <!-- Cus Name  -->
                            <div class="form-group col-8">
                                <label for="cus_name">Customer Name</label>
                                <input type="text" class="form-control" id="cus_name" name="cus_name" placeholder="Customer Name">
                            </div>
                        </div>







                        <!-- Address Rows -->
                        <div class="form-row">
                            <div class="form-group col-2">
                                <label for="home_no">Address</label>
                                <input type="text" class="form-control" id="home_no" name="cus_add_l1" placeholder="Home Number">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-4 ">
                                <input type="text" class="form-control" id="s_name" name="cus_add_l2" placeholder="Street Name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-3">
                                <input type="text" class="form-control" id="city" name="cus_add_l3" placeholder="City">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-3">
                                <input type="text" class="form-control" id="state" name="cus_add_l4" placeholder="State" >
                            </div>
                        </div>

                        <div class="form-row">
                            <!-- contact no 1 -->
                            <div class="form-group col-6">
                                <label for="cn1">Contact No 1</label>
                                <input type="text" class="form-control" id="cn1" name="cus_cn1" placeholder="Mobile Number">
                            </div>

                            <!-- contact no 2 -->
                            <div class="form-group col-6">
                                <label for="cn2">Contact No 2</label>
                                <input type="text" class="form-control" id="cn2" name="cus_cn2" placeholder="Office Number">
                            </div>
                        </div>

                        <!--    email   -->
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="cus_email">Customer Email</label>
                                <input type="email" class="form-control" id="cus_email" name="cus_email" placeholder="username@example.com" >
                            </div>
                        </div>

            <!-- Customer Referral Radio Buttons  -->
                        <div class="row">
                            <legend class="col-form-label col-md-2 pt-0">Customer Referral</legend>
                            <div class="col-md-1">
                                <div class="form-check text-left">
                                    <input class="form-check-input" type="radio" name="cus_referral" id="cus_referral_yes" value="1">
                                    <label class="form-check-label" for="cus_referral_yes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check text-left">
                                    <input class="form-check-input" type="radio" name="cus_referral" id="cus_referral_no" value="0" checked>
                                    <label class="form-check-label" for="cus_referral_no">
                                        No
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-3 text-left">
                                <input type="text" id="cus_referral_invoice_id" name="cus_referral_invoice_id" class="form-control" placeholder="Enter Invoice ID">
                            </div>

                            <div class="col-md-6 text-left">
                                <textarea name="cus_referral_description" id="cus_referral_description" class="form-control"></textarea>
                            </div>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="cus_submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--    Loyalty and Feedback Card Row   -->
    <div class="row">
        <!--    Loyalty Programs    -->
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Loyalty Programs & Packages</h4>
                    <!-- First row 2 Loyalty Packages -->
                    <div class="row">
                        <?php
                        $loyalty_result = $cusObj->getLoyaltyToShowcase();
                        while($r = $loyalty_result->fetch_assoc())
                        {
                        ?>
                        <div class="col-sm-6 p-2">
                            <div class="card bg-<?php echo $r['color']; ?>">
                                <div class="card-body">
                                    <h5 class="card-title h2"><?php echo $r['loyalty_name']; ?></h5>
                                    <table class="table table-sm">
                                        <thead>
                                        <tr>
                                            <th scope="col">Loyalty Reward</th>
                                            <td><?php echo $r['loyalty_reward']; ?></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Points</th>
                                                <td><?php echo $r['loyalty_points']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-12 d-flex justify-content-end mt-2">
                        <a href="customer-loyalty-manage.php" class="btn btn-outline-primary rounded-pill">Manage Loyalty</a>
                    </div>
                </div>
            </div>
        </div>

        <!--    Feedbacks from the Customer    -->
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Feedback from Customers</h4>
                    <!--Div that will hold the pie chart-->
                    <div class="row">
                        <div id="chart_div" class="col-md-6"></div>
                        <div id="chart2_div" class="col-md-6"></div>
                        <!--                    <a href="#" class="btn btn-outline-primary">Go somewhere</a>-->
                    </div>
                    <!-- Review Viewing -->
                    <div class="row mt-2">
                        <div class="col-md-12 h5">Top Reviews</div>
                        <!-- Review 1   -->
                        <div class="col-md-6">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <div class="col-md-12 d-flex justify-content-end">
                                        <a href="#" class="card-link btn btn-outline-dark border-0"><i class="fa fa-heart"></i></a>
                                        <a href="#" class="card-link btn btn-outline-dark border-0"><i class="fa fa-comment"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Review 2   -->
                        <div class="col-md-6">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <div class="col-md-12 d-flex justify-content-end">
                                        <a href="#" class="card-link btn btn-outline-danger border-0"><i class="fa fa-heart"></i></a>
                                        <a href="#" class="card-link btn btn-outline-success border-0"><i class="fa fa-comment"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-12 d-flex justify-content-end mt-2">
                        <a href="customer-feedback-manage.php" class="btn btn-outline-primary rounded-pill">Manage Feedbacks</a>
                    </div>
                </div>
            </div>
        </div>
        <?php include '../includes/footer.php'; ?>

        <script src="../assets/js/customer_validations.js"></script>
