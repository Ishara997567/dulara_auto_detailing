<?php include '../includes/header.php';
include '../model/service_model.php';

$serviceObj = new Service();
$all_service_results = $serviceObj->selectService();
$all_sub_category_results = $serviceObj->selectSubCategories();
$all_cat_results_results = $serviceObj->selectCategories();


?>


<title>Service Management</title>
<!-- Service Utilization Chart Script   -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(function(){
        drawStuff1();
        drawStuff2();
    });


    //Service Utilization Chart
    function drawStuff1() {
        var data = google.visualization.arrayToDataTable([
            ['Element', 'Density', { role: 'style' }],
            ['Copper', 8.94, '#b87333'],            // RGB value
            ['Silver', 10.49, 'silver'],            // English color name
            ['Gold', 19.30, 'gold'],

            ['Platinum', 21.45, 'color: #e5e4e2' ], // CSS-style declaration
        ]);

        var options = {
            width: 500,
            height: 400,
            legend: { position: 'none' },
            chart: {
                title: 'Chess opening moves',
                subtitle: 'popularity by percentage' },
            axes: {
                x: {
                    0: { side: 'top', label: 'White to move'} // Top x-axis.
                }
            },
            bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('service_utilization'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }

    //Service Request Chart
    function drawStuff2() {
        var data = google.visualization.arrayToDataTable([
            ['Element', 'Density', { role: 'style' }],
            ['Copper', 8.94, '#b87333'],            // RGB value
            ['Silver', 10.49, 'silver'],            // English color name
            ['Gold', 19.30, 'gold'],

            ['Platinum', 21.45, 'color: #e5e4e2' ], // CSS-style declaration
        ]);

        var options = {
            width: 500,
            height: 400,
            legend: { position: 'none' },
            chart: {
                title: 'Chess opening moves',
                subtitle: 'popularity by percentage' },
            axes: {
                x: {
                    0: { side: 'top', label: 'White to move'} // Top x-axis.
                }
            },
            bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('service_requests'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>
</head>
<body>
<!-- Navigation Bar -->
<?php include '../includes/navbar.php'; ?>

<!-- Content    -->
<div class="container-fluid">

    <div class="row padding welcome bg-light mb-3 py-2">
        <!-- Module Name    -->
        <div class="col-8">
            <div class="navbar-brand ml-5"><i class="fa fa-car"></i>&nbsp;Service Management</div>
        </div>

        <!-- New -->
        <div class="col-4 d-flex justify-content-end">
            <button class="btn btn-outline-primary rounded-pill my-xl-1" data-toggle="modal" data-target="#modal_service_new_item"><i class="fa fa-plus"></i> New</button>
            <button type="button" class="btn btn-outline-primary rounded-pill my-xl-1 mx-2" data-toggle="modal" data-target="#modal_manage_categories"><i class="fa fa-file-text-o"></i> Manage Categories</button>
        </div>
    </div>



    <!-- Manage Categories Modal -->
    <div class="modal fade" role="dialog" tabindex="-1" id="modal_manage_categories" aria-labelledby="modal_manage_categories" aria-hidden="true">
        <div class="modal-xl modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Manage Categories</h5>
                    <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">
                                &times;
                            </span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row padding d-flex justify-content-center">
                        <div class="col-8 text-center" id="msg_sub_category_update">

                        </div>
                    </div>

                    <div class="row padding d-flex justify-content-center">
                        <div class="col-8 text-center" id="msg_category_update">

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a href="#pane_manage_sub_categories" class="active nav-link" data-toggle="tab">
                                        Manage Sub Categories
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#pane_manage_categories" class="nav-link" data-toggle="tab">
                                        Manage Categories
                                    </a>
                                </li>

                            </ul>
                        </div>

                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="pane_manage_sub_categories">



                                    <!-- Manage Sub Category Table  -->
                                    <div class="table-responsive">
                                        <table class="table table-sm" id="table_sub_cat_manage">
                                            <thead>
                                            <tr class="d-flex">
                                                <th scope="col" class="col-2 text-center">Sub Category ID</th>
                                                <th scope="col" class="col-8 text-center">Sub Category Name</th>
                                                <th scope="col" class="col-1 text-center">&nbsp;</th>
                                                <th scope="col" class="col-1 text-center">&nbsp;</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php
                                            while($row_sub_categories = $all_sub_category_results->fetch_assoc()){

                                                ?>

                                                <tr class="d-flex">
                                                    <th scope="row" class="col-2 text-center"><?php echo $row_sub_categories["service_sub_cat_id"]; ?></th>
                                                    <td id="td_service_name" class="col-8"><input type="text" id="txt_change_sub_cat_name<?php echo $row_sub_categories["service_sub_cat_id"]; ?>" class="form-control text-center" value="<?php echo $row_sub_categories["service_sub_cat_name"]; ?>" readonly/></td>
                                                    <td id="table_manage_categories" class="col-1 text-center"><a href="#" data-id="<?php echo $row_sub_categories["service_sub_cat_id"]; ?>" class="btn btn-outline-primary mr-n5"><i class="fa fa-pencil"></i></a></td>
                                                    <td id="table_manage_categories_del" class="col-1 text-center"><a href="#" data-id="<?php echo $row_sub_categories["service_sub_cat_id"]; ?>" class="btn btn-outline-danger"><i class="fa fa-times"></i></a></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>




                                    <!-- End of Manage Sub Category Table  -->




                                </div>

                                <div class="tab-pane" id="pane_manage_categories">



                                    <!-- Manage Category Table  -->


                                    <div class="table-responsive">
                                        <table class="table table-sm" id="table_cat_manage">
                                            <thead>
                                            <tr class="d-flex">
                                                <th scope="col" class="col-2 text-center">Category ID</th>
                                                <th scope="col" class="col-8 text-center">Category Name</th>
                                                <th scope="col" class="col-1 text-center">&nbsp;</th>
                                                <th scope="col" class="col-1 text-center">&nbsp;</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php
                                            while($row__categories = $all_cat_results_results->fetch_assoc()){

                                                ?>

                                                <tr class="d-flex">
                                                    <th scope="row" class="col-2 text-center"><?php echo $row__categories["service_cat_id"]; ?></th>
                                                    <td id="td_category_name" class="col-8"><input type="text" id="txt_change_cat_name<?php echo $row__categories["service_cat_id"]; ?>" class="form-control text-center" value="<?php echo $row__categories["service_cat_name"]; ?>" readonly/></td>
                                                    <td id="table_manage_category" class="col-1 text-center"><a href="#" data-id="<?php echo $row__categories["service_cat_id"]; ?>" class="btn btn-outline-primary mr-n5"><i class="fa fa-pencil"></i></a></td>
                                                    <td id="table_manage_category_del" class="col-1 text-center"><a href="#" data-id="<?php echo $row__categories["service_cat_id"]; ?>" class="btn btn-outline-danger"><i class="fa fa-times"></i></a></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>





                                    <!-- End of Sub Category Table  -->




                                </div>
                            </div>
                        </div>

                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn_save">Save</button>
                </div>
            </div>
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


    <div class="row padding mb-2">



        <!-- Service Utilization Card   -->
        <div class="col-6 ">
            <div class="card">
                <div class="card-header">
                    <div class="h3">Service Utilization</div>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <div id="service_utilization"></div>
                </div>
            </div>
        </div>



        <!-- Service Requests Card   -->
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <div class="h3">Service Requests</div>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <div id="service_requests"></div>
                </div>
            </div>
        </div>

    </div>

    <!-- New and Search Item -->
    <div class="row">
        <div class="col-md-3 d-flex justify-content-md-start">&nbsp;</div>

        <!-- Search Bar -->
        <div class="col-md-9">
            <form class="form-inline" id="frm_item_search">
                <input class="rounded-pill form-control my-1 mr-sm-2 w-75" type="search" placeholder="Search . . ." aria-label="Search">
                <button class="btn btn-outline-primary rounded-pill my-xl-1" type="button"><i class="fa fa-search"></i> Search</button>
            </form>
        </div>
    </div>


    <!-- Modals -->
    <!-- New Service, Sub Category and Category Modal -->

    <div class="modal fade" id="modal_service_new_item" tabindex="-1" aria-labelledby="modal_service_new_item" role="dialog" aria-hidden="true">
        <div class="modal-xl modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Service, Sub Category and Category</h5>
                    <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">
                                        &times;
                                    </span>
                    </button>
                </div>


                <div class="modal-body">


                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">

                                <!-- New Service Link   -->
                                <li class="nav-item">
                                    <a href="#pane_new_service_form" data-toggle="tab" class="nav-link active">New Service</a>
                                </li>


                                <!-- New Sub Category Link   -->
                                <li class="nav-item">
                                    <a href="#pane_new_sub_category_form" data-toggle="tab" class="nav-link">New Sub Category</a>
                                </li>


                                <!-- New Category Link   -->
                                <li class="nav-item">
                                    <a href="#pane_new_category_pane" data-toggle="tab" class="nav-link">New Category</a>
                                </li>

                            </ul>

                        </div>

                        <div class="card-body">
                            <!-- Panes  -->
                            <div class="tab-content">

                                <!-- New Service Pane   -->
                                <div class="tab-pane active" id="pane_new_service_form">
                                    <div class="row padding d-flex justify-content-center">
                                        <div class="col-6 text-center" id="error_new_service">

                                        </div>
                                    </div>

                                    <!-- New Service Form  -->

                                    <form action="../controller/servicecontroller.php?status=create_service" method="post" id="frm_new_service">
                                        <!-- First Row  -->
                                        <div class="form-row">
                                            <!-- Service code  -->
                                            <div class="form-group col-4">
                                                <label for="service_code">Service Code</label>
                                                <input type="text" class="form-control" readonly="readonly" id="service_code" placeholder="Service Code">
                                            </div>
                                            <!-- Service Name  -->
                                            <div class="form-group col-8">
                                                <label for="service_name">Service Name</label>
                                                <input type="text" class="form-control" id="service_name" name="service_name" placeholder="Service Name">
                                            </div>
                                        </div>

                                        <!-- Second Row -->
                                        <div class="form-row">
                                            <!-- Category Dropdown  -->
                                            <!-- Getting Category names from Database   -->
                                            <!-- End of Getting -->

                                            <div class="form-group col-6">
                                                <label for="service_category">Service Category</label>
                                                <select class="custom-select"  name="service_cat_id" id="service_category" class="form-control">

                                                    <option value="choose" selected>Choose...</option>

                                                    <?php
                                                    $all_cat_results_results = $serviceObj->selectCategories();
                                                    while($row_result = $all_cat_results_results->fetch_assoc()){
                                                        ?>

                                                        <option value="<?php echo $row_result['service_cat_id']; ?>"><?php echo $row_result['service_cat_name']; ?></option>

                                                    <?php } ?>

                                                </select>
                                            </div>

                                            <!-- Sub Category Dropdown -->

                                            <?php

                                            ?>


                                            <div class="form-group col-6">
                                                <label for="service_sub_cat_id">Service Sub Category</label>
                                                <select class="custom-select" name="service_sub_cat_id" id="service_sub_cat_id" class="form-control">
                                                    <option value="choose" selected>Choose...</option>
                                                    <?php
                                                    $all_sub_category_results = $serviceObj->selectSubCategories();

                                                    while($row_result = $all_sub_category_results->fetch_assoc()){
                                                        ?>

                                                        <option value="<?php echo $row_result['service_sub_cat_id']; ?>"><?php echo $row_result['service_sub_cat_name']; ?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Third row  -->
                                        <div class="form-row">
                                            <!-- Service Price    -->
                                            <div class="form-group col-4">
                                                <label for="service_price">Service Price Rs.</label>
                                                <input type="number" min="1" step="any" class="form-control" id="service_price" name="service_price" placeholder="Service Price">
                                            </div>

                                        </div>

                                        <!-- Fourth row -->
                                        <div class="form-row">
                                            <!-- Service Item #1 Dropdown -->
                                            <div class="form-group col-6">
                                                <label for="service_required_item_1">Service Required Item #1</label>
                                                <select class="custom-select form-control" name="service_ri1" id="service_required_item_1">
                                                    <option value="choose" selected>Choose...</option>
                                                    <option value="10">i1 - Item 1</option>
                                                    <option value="20">i2 - Item 2</option>
                                                    <option value="30">i3 - Item 3</option>
                                                    <option value="40">i4 - Item 4</option>
                                                    <option value="50">i5 - Item 5</option>
                                                </select>
                                            </div>

                                            <!-- Service Item #2 Dropdown -->
                                            <div class="form-group col-6">
                                                <label for="service_required_item_2">Service Required Item #2</label>
                                                <select class="custom-select form-control" name="service_ri2" id="service_required_item_2">
                                                    <option value="choose" selected>Choose...</option>
                                                    <option value="10">i1 - Item 1</option>
                                                    <option value="20">i2 - Item 2</option>
                                                    <option value="30">i3 - Item 3</option>
                                                    <option value="40">i4 - Item 4</option>
                                                    <option value="5010">i5 - Item 5</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Fifth Row  -->
                                        <div class="form-row">
                                            <!-- Service Item #3 Dropdown -->
                                            <div class="form-group col-6">
                                                <label for="service_required_item_3">Service Required Item #3</label>
                                                <select class="custom-select form-control" name="service_ri3" id="service_required_item_3">
                                                    <option value="choose" selected>Choose...</option>
                                                    <option value="10">i1 - Item 1</option>
                                                    <option value="20">i2 - Item 2</option>
                                                    <option value="30">i3 - Item 3</option>
                                                    <option value="40">i4 - Item 4</option>
                                                    <option value="50">i5 - Item 5</option>
                                                </select>
                                            </div>

                                            <!-- Service Item #4 Dropdown -->
                                            <div class="form-group col-6">
                                                <label for="service_required_item_4">Service Required Item #4</label>
                                                <select class="custom-select form-control" name="service_ri4" id="service_required_item_4">
                                                    <option value="choose" selected>Choose...</option>
                                                    <option value="10">i1 - Item 1</option>
                                                    <option value="20">i2 - Item 2</option>
                                                    <option value="30">i3 - Item 3</option>
                                                    <option value="40">i4 - Item 4</option>
                                                    <option value="50">i5 - Item 5</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Sixth Row  -->
                                        <div class="form-row">
                                            <!-- Service Item #5 Dropdown -->
                                            <div class="form-group col-6">
                                                <label for="service_required_item_5">Service Required Item #5</label>
                                                <select class="custom-select form-control" name="service_ri5" id="service_required_item_5">
                                                    <option value="choose" selected>Choose...</option>
                                                    <option value="10">i1 - Item 1</option>
                                                    <option value="20">i2 - Item 2</option>
                                                    <option value="30">i3 - Item 3</option>
                                                    <option value="40">i4 - Item 4</option>
                                                    <option value="50">i5 - Item 5</option>
                                                </select>
                                            </div>

                                            <!-- Service Item #6 Dropdown -->
                                            <div class="form-group col-6">
                                                <label for="service_required_item_6">Service Required Item #6</label>
                                                <select class="custom-select form-control" name="service_ri6" id="service_required_item_6">
                                                    <option value="choose" selected>Choose...</option>
                                                    <option value="10">i1 - Item 1</option>
                                                    <option value="20">i2 - Item 2</option>
                                                    <option value="30">i3 - Item 3</option>
                                                    <option value="40">i4 - Item 4</option>
                                                    <option value="50">i5 - Item 5</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Seventh Row  -->
                                        <!--                                            <div class="form-row">-->
                                        <!-- Remarks   -->
                                        <!--                                                <div class="form-group col-10">-->
                                        <!--                                                    <label for="remarks">Remarks</label>-->
                                        <!--                                                    <input type="text" class="form-control" id="remarks" placeholder="Remarks">-->
                                        <!--                                                </div>-->
                                        <!--                                            </div>-->

                                        <!-- Eight Row  -->
                                        <div class="form-row">
                                            <!-- Assigned Worker #1 Dropdown    -->
                                            <div class="form-group col-6">
                                                <label for="assigned_worker_1">Assigned Worker #1</label>
                                                <select class="custom-select form-control" name="service_ass_w1" id="assigned_worker_1">
                                                    <option value="choose" selected>Choose...</option>
                                                    <option value="100">w1 - Worker 1</option>
                                                    <option value="200">w2 - Worker 2</option>
                                                    <option value="400">w3 - Worker 3</option>
                                                    <option value="">w4 - Worker 4</option>
                                                    <option value="">w5 - Worker 5</option>
                                                </select>
                                            </div>

                                            <!-- Assigned Worker #2 Dropdown    -->
                                            <div class="form-group col-6">
                                                <label for="assigned_worker_2">Assigned Worker #2</label>
                                                <select class="custom-select form-control" name="service_ass_w2" id="assigned_worker_2">
                                                    <option value="choose" selected>Choose...</option>
                                                    <option value="100">w1 - Worker 1</option>
                                                    <option value="200">w2 - Worker 2</option>
                                                    <option value="400">w3 - Worker 3</option>
                                                    <option value="500">w4 - Worker 4</option>
                                                    <option value="600">w5 - Worker 5</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Ninth Row  -->
                                        <div class="form-row">
                                            <!-- Assigned Worker #3 Dropdown    -->
                                            <div class="form-group col-6">
                                                <label for="assigned_worker_3">Assigned Worker #3</label>
                                                <select class="custom-select form-control" name="service_ass_w3" id="assigned_worker_3">
                                                    <option value="choose" selected>Choose...</option>
                                                    <option value="100">w1 - Worker 1</option>
                                                    <option value="200">w2 - Worker 2</option>
                                                    <option value="400">w3 - Worker 3</option>
                                                    <option value="500">w4 - Worker 4</option>
                                                    <option value="600">w5 - Worker 5</option>
                                                </select>
                                            </div>

                                            <!-- Assigned Worker #4 Dropdown    -->
                                            <div class="form-group col-6">
                                                <label for="assigned_worker_4">Assigned Worker #4</label>
                                                <select class="custom-select form-control" name="service_ass_w4" id="assigned_worker_4">
                                                    <option value="choose" selected>Choose...</option>
                                                    <option value="100">w1 - Worker 1</option>
                                                    <option value="200">w2 - Worker 2</option>
                                                    <option value="400">w3 - Worker 3</option>
                                                    <option value="500">w4 - Worker 4</option>
                                                    <option value="600">w5 - Worker 5</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Tenth Row  -->
                                        <div class="form-row">
                                            <!-- Description    -->
                                            <div class="form-group col-6">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" id="description" name="service_description" rows="3"></textarea>
                                            </div>
                                        </div>


                                        <!-- Service Save Button    -->
                                        <div class="form-row mt-3">
                                            <div class="form-group col-10">&nbsp;</div>
                                            <div class="form-group col-2 d-flex justify-content-center">
                                                <input type="submit" class="rounded-pill btn btn-primary" name="submit" id="submit" value="Save"/>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- End of New Service Form   -->





                                </div>

                                <!-- New Sub Category Pane   -->

                                <div class="tab-pane" id="pane_new_sub_category_form">
                                    <div class="row padding d-flex justify-content-center">
                                        <div class="col-6 text-center" id="error_new_sub_category">

                                        </div>
                                    </div>
                                    <!-- New Sub Category Form  -->
                                    <form action="../controller/servicecontroller.php?status=create_sub_category" method="post" id="frm_new_sub_category">
                                        <!-- Sub Category ID    -->



                                        <div class="form-row">
                                            <label for="sub_cat_id" class="col-form-label col-2">Sub Category ID</label>
                                            <div class="form-group col-4">
                                                <input type="text" id="sub_cat_id" name="sub_cat_id" class="form-control" placeholder="SSC00001" readonly/>
                                            </div>
                                        </div>

                                        <!-- Sub Category Name  -->

                                        <div class="form-row">
                                            <label for="sub_cat_name" class="col-form-label col-2">Sub Category Name</label>
                                            <div class="form-group col-8">
                                                <input type="text" id="sub_cat_name" name="sub_cat_name" class="form-control" placeholder="Sub Category Name"/>
                                            </div>
                                        </div>

                                        <!--  Sub Category -> Category Name -->
                                        <?php
                                        $all_cat_results_results = $serviceObj->selectCategories();
                                        ?>


                                        <div class="form-row">
                                            <label for="select_sub_cat" class="col-form-label col-2">Category Name</label>
                                            <div class="form-group col-8">
                                                <select name="select_sub_cat" id="select_sub_cat" class="custom-select">

                                                    <option value="choose" selected>Choose...</option>
                                                    <?php

                                                    while($row_result = $all_cat_results_results->fetch_assoc()){
                                                        ?>

                                                        <option value="<?php echo $row_result['service_cat_id']; ?>"><?php echo $row_result['service_cat_name']; ?></option>

                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>

                                        <!-- Sub Category Description   -->
                                        <div class="form-row">
                                            <label for="sub_cat_description" class="col-form-label col-2">Description</label>
                                            <div class="form-group col-8">
                                                <textarea name="sub_cat_description" id="sub_cat_description" class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>

                                        <!-- Sub Category Save Button    -->

                                        <div class="form-row mt-3">
                                            <div class="form-group col-8">&nbsp;</div>
                                            <div class="form-group col-4 d-flex justify-content-center">
                                                <input type="submit" class="rounded-pill btn btn-primary" name="submit" id="submit" value="Save"/>
                                            </div>
                                        </div>


                                    </form>
                                    <!-- End of New Sub Category Form  -->
                                </div>

                                <!-- New Category Pane   -->
                                <div class="tab-pane" id="pane_new_category_pane">
                                    <!-- New Category Form  -->
                                    <div class="row padding d-flex justify-content-center">
                                        <div class="col-6 text-center" id="error_new_category">

                                        </div>
                                    </div>
                                    <form action="../controller/servicecontroller.php?status=create_category" method="post" id="frm_new_category">
                                        <!-- Category ID    -->



                                        <div class="form-row">
                                            <label for="cat_id" class="col-form-label col-2">Category ID</label>
                                            <div class="form-group col-4">
                                                <input type="text" id="cat_id" name="cat_id" class="form-control" placeholder="SC00001" readonly/>
                                            </div>
                                        </div>

                                        <!-- Category Name  -->

                                        <div class="form-row">
                                            <label for="cat_name" class="col-form-label col-2">Category Name</label>
                                            <div class="form-group col-8">
                                                <input type="text" id="cat_name" name="cat_name" class="form-control" placeholder="Category Name"/>
                                            </div>
                                        </div>

                                        <!-- Category Description   -->
                                        <div class="form-row">
                                            <label for="cat_description" class="col-form-label col-2">Description</label>
                                            <div class="form-group col-8">
                                                <textarea name="cat_description" id="cat_description" class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>


                                        <!-- Category Save Button    -->
                                        <div class="form-row mt-3">
                                            <div class="form-group col-8">&nbsp;</div>
                                            <div class="form-group col-4 d-flex justify-content-center">
                                                <input type="submit" class="rounded-pill btn btn-primary" name="submit" id="submit" value="Save"/>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- End of New Category Form  -->

                                </div>
                            </div>

                        </div>
                    </div>



                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of New Service Modal -->

    <!-- Manage Service Modal   -->




    <div class="modal fade" role="dialog" id="modal_service_manage" tabindex="-1" aria-hidden="true" aria-labelledby="modal_service_manage">
        <div class="modal-xl modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Manage Services</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="post" id="frm_manage_service">
                    <div class="modal-body" id="body_modal_manage">
                        <!-- Manage Form    -->



                        <!-- End of Manage Form -->
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- End of Manage Service Modal   -->

    <!-- End of Modals  -->


    <!-- Item Table -->

        <div class="table-responsive mt-2">
            <table class="table table-sm" id="table_manage">
                <thead>
                <tr>

                    <th scope="col">Service ID</th>
                    <th scope="col">Service Name</th>
                    <th scope="col">Service Price</th>
                    <th scope="col">Service Category</th>
                    <th scope="col">Service Sub Category</th>
                    <!--                <th scope="col">Manage</th>-->
                </tr>
                </thead>
                <tbody>
                <?php
                $all_service_results = $serviceObj->selectService();
                while($row = $all_service_results->fetch_assoc()){
                    $service_id = $row["service_id"];

                    $category_result = $serviceObj->selectCategoryById($row["service_cat_id"]);
                    $category_row = $category_result->fetch_assoc();

                    $sub_cat_result = $serviceObj->selectSubCategoriesById($row["service_sub_cat_id"]);
                    $sub_cat_row = $sub_cat_result->fetch_assoc();
                    ?>
                    <tr>

                        <th scope="row"><?php echo $service_id; ?></th>
                        <td id="s_name" data-serviceName="<?php echo $row["service_name"]; ?>"><?php echo $row["service_name"]; ?></td>
                        <td><?php echo "Rs. ".$row["service_price"]; ?></td>
                        <td><?php echo $category_row["service_cat_name"]; ?></td>
                        <td><?php echo $sub_cat_row["service_sub_cat_name"]; ?></td>
                        <td id="table_data_manage_service_id"><a href="#modal_service_manage" data-toggle="modal" data-id="<?php echo $service_id;?>"><i class="fa fa-file-text-o fa-lg"></i></a></td>


                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>


    <hr>
<div id="search_results_table"></div>


</div>
</body>
<?php include '../includes/footer.php'; ?>
<script src="../assets/js/services_manage.js"></script>
<script src="../assets/js/new_service_validation.js"></script>
