<?php include '../includes/header.php';
include '../model/service_model.php';

$serviceObj = new Service();

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
        };

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
        };
    </script>
    </head>
    <body>
    <!-- Navigation Bar -->
    <?php include '../includes/navbar.php'; ?>

    <!-- Content    -->
    <div class="container-fluid">

        <div class="row padding welcome bg-light mb-3 py-2 mr-n5">
            <!-- Module Name    -->
            <div class="col-8">
                <div class="navbar-brand ml-5"><i class="fa fa-car"></i>&nbsp;Service Management</div>
            </div>

            <!-- New -->
            <div class="col-3 d-flex justify-content-end">
                <button class="btn btn-outline-primary rounded-pill my-xl-1" data-toggle="modal" data-target="#modal_service_new_item"><i class="fa fa-plus"></i> New</button>
            </div>
        </div>



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
                    <button class="btn btn-outline-primary rounded-pill my-xl-1" type="submit"><i class="fa fa-search"></i> Search</button>
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


                                        <!-- New Service Form  -->

                                        <form action="#" method="post">
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
                                                    <input type="text" class="form-control" id="service_name" placeholder="Service Name">
                                                </div>
                                            </div>

                                            <!-- Second Row -->
                                            <div class="form-row">
                                                <!-- Category Dropdown  -->
                                                <!-- Getting Category names from Database   -->
                                                <?php

                                                $results = $serviceObj->selectCategories();


                                                ?>
                                                <!-- End of Getting -->

                                                <div class="form-group col-6">
                                                    <label for="service_category">Service Category</label>
                                                    <select class="custom-select" name="service_category" id="service_category" class="form-control">

                                                        <option value="choose" selected>Choose...</option>

                                                        <?php

                                                        while($row_result = $results->fetch_assoc()){
                                                            ?>

                                                            <option value="<?php echo $row_result['service_cat_id']; ?>"><?php echo $row_result['service_cat_name']; ?></option>

                                                        <?php } ?>

                                                    </select>
                                                </div>

                                                <!-- Sub Category Dropdown -->
                                                <div class="form-group col-6">
                                                    <label for="service_required_item_1">Service Sub Category</label>
                                                    <select class="custom-select" name="item_category" id="service_required_item_1" class="form-control">
                                                        <option value="choose" selected>Choose...</option>
                                                        <option value="">Service Sub Category 1</option>
                                                        <option value="">Service Sub Category 2</option>
                                                        <option value="">Service Sub Category 3</option>
                                                        <option value="">Service Sub Category 4</option>
                                                        <option value="">Service Sub Category 5</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Third row  -->
                                            <div class="form-row">
                                                <!-- Service Price    -->
                                                <div class="form-group col-4">
                                                    <label for="service_price">Service Price Rs.</label>
                                                    <input type="text" class="form-control" id="service_price" placeholder="Service Price">
                                                </div>

                                            </div>

                                            <!-- Fourth row -->
                                            <div class="form-row">
                                                <!-- Service Item #1 Dropdown -->
                                                <div class="form-group col-6">
                                                    <label for="service_required_item_1">Service Required Item #1</label>
                                                    <select class="custom-select" name="service_required_item_1" id="service_required_item_1" class="form-control">
                                                        <option value="choose" selected>Choose...</option>
                                                        <option value="">i1 - Item 1</option>
                                                        <option value="">i2 - Item 2</option>
                                                        <option value="">i3 - Item 3</option>
                                                        <option value="">i4 - Item 4</option>
                                                        <option value="">i5 - Item 5</option>
                                                    </select>
                                                </div>

                                                <!-- Service Item #2 Dropdown -->
                                                <div class="form-group col-6">
                                                    <label for="service_required_item_2">Service Required Item #2</label>
                                                    <select class="custom-select" name="service_required_item_2" id="service_required_item_2" class="form-control">
                                                        <option value="choose" selected>Choose...</option>
                                                        <option value="">i1 - Item 1</option>
                                                        <option value="">i2 - Item 2</option>
                                                        <option value="">i3 - Item 3</option>
                                                        <option value="">i4 - Item 4</option>
                                                        <option value="">i5 - Item 5</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Fifth Row  -->
                                            <div class="form-row">
                                                <!-- Service Item #3 Dropdown -->
                                                <div class="form-group col-6">
                                                    <label for="service_required_item_3">Service Required Item #3</label>
                                                    <select class="custom-select" name="service_required_item_3" id="service_required_item_3" class="form-control">
                                                        <option value="choose" selected>Choose...</option>
                                                        <option value="">i1 - Item 1</option>
                                                        <option value="">i2 - Item 2</option>
                                                        <option value="">i3 - Item 3</option>
                                                        <option value="">i4 - Item 4</option>
                                                        <option value="">i5 - Item 5</option>
                                                    </select>
                                                </div>

                                                <!-- Service Item #4 Dropdown -->
                                                <div class="form-group col-6">
                                                    <label for="service_required_item_4">Service Required Item #4</label>
                                                    <select class="custom-select" name="service_required_item_4" id="service_required_item_4" class="form-control">
                                                        <option value="choose" selected>Choose...</option>
                                                        <option value="">i1 - Item 1</option>
                                                        <option value="">i2 - Item 2</option>
                                                        <option value="">i3 - Item 3</option>
                                                        <option value="">i4 - Item 4</option>
                                                        <option value="">i5 - Item 5</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Sixth Row  -->
                                            <div class="form-row">
                                                <!-- Service Item #5 Dropdown -->
                                                <div class="form-group col-6">
                                                    <label for="service_required_item_5">Service Required Item #5</label>
                                                    <select class="custom-select" name="service_required_item_5" id="service_required_item_5" class="form-control">
                                                        <option value="choose" selected>Choose...</option>
                                                        <option value="">i1 - Item 1</option>
                                                        <option value="">i2 - Item 2</option>
                                                        <option value="">i3 - Item 3</option>
                                                        <option value="">i4 - Item 4</option>
                                                        <option value="">i5 - Item 5</option>
                                                    </select>
                                                </div>

                                                <!-- Service Item #6 Dropdown -->
                                                <div class="form-group col-6">
                                                    <label for="service_required_item_6">Service Required Item #6</label>
                                                    <select class="custom-select" name="service_required_item_6" id="service_required_item_6" class="form-control">
                                                        <option value="choose" selected>Choose...</option>
                                                        <option value="">i1 - Item 1</option>
                                                        <option value="">i2 - Item 2</option>
                                                        <option value="">i3 - Item 3</option>
                                                        <option value="">i4 - Item 4</option>
                                                        <option value="">i5 - Item 5</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Seventh Row  -->
                                            <div class="form-row">
                                                <!-- Remarks   -->
                                                <div class="form-group col-10">
                                                    <label for="remarks">Remarks</label>
                                                    <input type="text" class="form-control" id="remarks" placeholder="Remarks">
                                                </div>
                                            </div>

                                            <!-- Eight Row  -->
                                            <div class="form-row">
                                                <!-- Assigned Worker #1 Dropdown    -->
                                                <div class="form-group col-6">
                                                    <label for="assigned_worker_1">Assigned Worker #1</label>
                                                    <select class="custom-select" name="assigned_worker_1" id="assigned_worker_1" class="form-control">
                                                        <option value="choose" selected>Choose...</option>
                                                        <option value="">w1 - Worker 1</option>
                                                        <option value="">w2 - Worker 2</option>
                                                        <option value="">w3 - Worker 3</option>
                                                        <option value="">w4 - Worker 4</option>
                                                        <option value="">w5 - Worker 5</option>
                                                    </select>
                                                </div>

                                                <!-- Assigned Worker #2 Dropdown    -->
                                                <div class="form-group col-6">
                                                    <label for="assigned_worker_2">Assigned Worker #2</label>
                                                    <select class="custom-select" name="assigned_worker_2" id="assigned_worker_2" class="form-control">
                                                        <option value="choose" selected>Choose...</option>
                                                        <option value="">w1 - Worker 1</option>
                                                        <option value="">w2 - Worker 2</option>
                                                        <option value="">w3 - Worker 3</option>
                                                        <option value="">w4 - Worker 4</option>
                                                        <option value="">w5 - Worker 5</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Ninth Row  -->
                                            <div class="form-row">
                                                <!-- Assigned Worker #3 Dropdown    -->
                                                <div class="form-group col-6">
                                                    <label for="assigned_worker_3">Assigned Worker #3</label>
                                                    <select class="custom-select" name="assigned_worker_3" id="assigned_worker_3" class="form-control">
                                                        <option value="choose" selected>Choose...</option>
                                                        <option value="">w1 - Worker 1</option>
                                                        <option value="">w2 - Worker 2</option>
                                                        <option value="">w3 - Worker 3</option>
                                                        <option value="">w4 - Worker 4</option>
                                                        <option value="">w5 - Worker 5</option>
                                                    </select>
                                                </div>

                                                <!-- Assigned Worker #4 Dropdown    -->
                                                <div class="form-group col-6">
                                                    <label for="assigned_worker_4">Assigned Worker #4</label>
                                                    <select class="custom-select" name="assigned_worker_4" id="assigned_worker_4" class="form-control">
                                                        <option value="choose" selected>Choose...</option>
                                                        <option value="">w1 - Worker 1</option>
                                                        <option value="">w2 - Worker 2</option>
                                                        <option value="">w3 - Worker 3</option>
                                                        <option value="">w4 - Worker 4</option>
                                                        <option value="">w5 - Worker 5</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Tenth Row  -->
                                            <div class="form-row">
                                                <!-- Description    -->
                                                <div class="form-group col-6">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control" id="description" rows="3"></textarea>
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
                                        <!-- New Sub Category Form  -->
                                        <form action="../controller/servicecontroller.php?status=create_sub_category" method="post">
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

                                            <!-- Getting Category names from Database   -->
                                            <?php

                                            $results = $serviceObj->selectCategories();


                                            ?>
                                            <!-- End of Getting -->

                                            <div class="form-row">
                                                <label for="sub_cat_cat_id" class="col-form-label col-2">Category Name</label>
                                                <div class="form-group col-8">
                                                    <select name="sub_cat_cat_id" id="sub_cat_cat_id" class="custom-select">

                                                        <option value="choose" selected>Choose...</option>
                                                        <?php

                                                        while($row_result = $results->fetch_assoc()){
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

                                        <form action="../controller/servicecontroller.php?status=create_category" method="post">
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
            <div class="modal-xl modal-dialog"role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Manage Services</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <!-- Manage Form    -->


                        <form action="#" method="post">
                            <!-- First Row  -->
                            <div class="form-group row">
                                <!-- Service code  -->
                                <label for="service_code" class="col-2 col-form-label">Service Code</label>
                                <div class="col-2">
                                    <input type="text" readonly class="form-control" id="service_code" value="S000001">
                                </div>
                            </div>

                            <!-- Second Row  -->
                            <div class="form-group row">
                                <!-- Service name  -->
                                <label for="service_name" class="col-2 col-form-label">Service Name</label>
                                <div class="input-group col-5">
                                    <input type="text" readonly class="form-control mr-2" id="service_name" value="PHP echo Value">
                                    <button type="button" class="btn btn-outline-primary" id="btn_service_name_pencil"><i class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-outline-primary" id="btn_service_name_check"><i class="fa fa-check"></i></button>
                                </div>
                            </div>

                            <!-- Third Row  -->
                            <div class="form-group row">
                                <!-- Service category  -->
                                <label for="service_category" class="col-2 col-form-label">Service Category</label>
                                <div class="input-group col-5">
                                    <input type="text" readonly class="form-control mr-2" id="service_category" value="PHP echo Value Change to dropdown">
                                    <button type="button" class="btn btn-outline-primary" id="btn_service_category_pencil"><i class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-outline-primary" id="btn_service_category_check"><i class="fa fa-check"></i></button>
                                </div>
                            </div>

                            <!-- Forth Row  -->
                            <div class="form-group row">
                                <!-- Service sub category  -->
                                <label for="service_sub_category" class="col-2 col-form-label">Service Sub Category</label>
                                <div class="input-group col-5">
                                    <input type="text" readonly class="form-control mr-2" id="service_sub_category" value="PHP echo Value Change to dropdown">
                                    <p class="span2">
                                    <p><button type="button" class="btn btn-outline-primary" id="btn_service_sub_category_pencil"><i class="fa fa-pencil"></i></button></p>
                                    <p><button type="button" class="btn btn-outline-primary" id="btn_service_sub_category_check"><i class="fa fa-check"></i></button></p>
                                </div>
                            </div>

                            <!-- Sixth Row -->
                            <div class="form-row">
                                <div class="form-group col-5">
                                    <label><b>Service Required Item List</b></label>
                                </div>
                            </div>

                            <!--Seventh Row -->
                            <div class="form-group row">
                                <!-- Item 1 -->
                                <div class="input-group col-6 mb-2">
                                    <input type="text" readonly class="col-2 form-control mr-2" value="Item Code 1">
                                    <input type="text" readonly class="form-control mr-2" id="editable_item_1" value="PHP echo Value">
                                    <button type="button" class="btn btn-outline-primary" id="btn_editable_item_1_pencil"><i class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-outline-primary" id="btn_editable_item_1_check"><i class="fa fa-check"></i></button>
                                </div>

                                <!-- Item 2 -->
                                <div class="input-group col-6 mb-2">
                                    <input type="text" readonly class="col-2 form-control mr-2" value="Item Code 2">
                                    <input type="text" readonly class="form-control mr-2" id="editable_item_2" value="PHP echo Value">
                                    <button type="button" class="btn btn-outline-primary" id="btn_editable_item_2_pencil"><i class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-outline-primary" id="btn_editable_item_2_check"><i class="fa fa-check"></i></button>
                                </div>

                                <!-- Item 3 -->
                                <div class="input-group col-6 mb-2">
                                    <input type="text" readonly class="col-2 form-control mr-2" value="Item Code 3">
                                    <input type="text" readonly class="form-control mr-2" id="editable_item_3" value="PHP echo Value">
                                    <button type="button" class="btn btn-outline-primary" id="btn_editable_item_3_pencil"><i class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-outline-primary" id="btn_editable_item_3_check"><i class="fa fa-check"></i></button>
                                </div>

                                <!-- Item 4 -->
                                <div class="input-group col-6 mb-2">
                                    <input type="text" readonly class="col-2 form-control mr-2" value="Item Code 4">
                                    <input type="text" readonly class="form-control mr-2" id="editable_item_4" value="PHP echo Value">
                                    <button type="button" class="btn btn-outline-primary" id="btn_editable_item_4_pencil"><i class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-outline-primary" id="btn_editable_item_4_check"><i class="fa fa-check"></i></button>
                                </div>

                                <!-- Item 5 -->
                                <div class="input-group col-6 mb-2">
                                    <input type="text" readonly class="col-2 form-control mr-2" value="Item Code 5">
                                    <input type="text" readonly class="form-control mr-2" id="editable_item_5" value="PHP echo Value">
                                    <button type="button" class="btn btn-outline-primary" id="btn_editable_item_5_pencil"><i class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-outline-primary" id="btn_editable_item_5_check"><i class="fa fa-check"></i></button>
                                </div>

                                <!-- Item 6 -->
                                <div class="input-group col-6 mb-2">
                                    <input type="text" readonly class="col-2 form-control mr-2" value="Item Code 6">
                                    <input type="text" readonly class="form-control mr-2" id="editable_item_6" value="PHP echo Value">
                                    <button type="button" class="btn btn-outline-primary" id="btn_editable_item_6_pencil"> <i class="fa fa-pencil"></i> </button>
                                    <button type="button" class="btn btn-outline-primary" id="btn_editable_item_6_check"><i class="fa fa-check"></i></button>
                                </div>
                            </div>

                            <!-- Eight Row -->
                            <div class="form-row">
                                <div class="form-group col-5">
                                    <label><b>Worker Assignment List</b></label>
                                </div>
                            </div>

                            <!--Ninth Row -->
                            <div class="form-group row">
                                <!-- Worker 1 -->
                                <div class="input-group col-6 mb-2">
                                    <input type="text" readonly class="col-2 form-control mr-2" value="Worker Code 1">
                                    <input type="text" readonly class="form-control mr-2" id="editable_worker_1" value="PHP echo Value">
                                    <button type="button" class="btn btn-outline-primary" id="btn_editable_worker_1_pencil"> <i class="fa fa-pencil"></i> </button>
                                    <button type="button" class="btn btn-outline-primary" id="btn_editable_worker_1_check"><i class="fa fa-check"></i></button>
                                </div>

                                <!-- Worker 2 -->
                                <div class="input-group col-6 mb-2">
                                    <input type="text" readonly class="col-2 form-control mr-2" value="Worker Code 2">
                                    <input type="text" readonly class="form-control mr-2" id="editable_worker_2" value="PHP echo Value">
                                    <button type="button" class="btn btn-outline-primary" id="btn_editable_worker_2_pencil"> <i class="fa fa-pencil"></i> </button>
                                    <button type="button" class="btn btn-outline-primary" id="btn_editable_worker_2_check"><i class="fa fa-check"></i></button>
                                </div>

                                <!-- Worker 3 -->
                                <div class="input-group col-6 mb-2">
                                    <input type="text" readonly class="col-2 form-control mr-2" value="Worker Code 3">
                                    <input type="text" readonly class="form-control mr-2" id="editable_worker_1" value="PHP echo Value">
                                    <button type="button" class="btn btn-outline-primary" id="btn_editable_worker_3_pencil"> <i class="fa fa-pencil"></i> </button>
                                    <button type="button" class="btn btn-outline-primary" id="btn_editable_worker_3_check"><i class="fa fa-check"></i></button>
                                </div>

                                <!-- Worker 4 -->
                                <div class="input-group col-6 mb-2">
                                    <input type="text" readonly class="col-2 form-control mr-2" value="Worker Code 4">
                                    <input type="text" readonly class="form-control mr-2" id="editable_worker_4" value="PHP echo Value">
                                    <button type="button" class="btn btn-outline-primary" id="btn_editable_worker_4_pencil"> <i class="fa fa-pencil"></i> </button>
                                    <button type="button" class="btn btn-outline-primary" id="btn_editable_worker_4_check"><i class="fa fa-check"></i></button>
                                </div>
                            </div>
                        </form>
                        <!-- End of Manage Form -->
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- End of Manage Service Modal   -->

        <!-- End of Modals  -->

        <!-- Item Table -->
        <div class="table-responsive mt-2">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    <!--                <th scope="col">Manage</th>-->
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td><a href="#modal_service_manage" data-toggle="modal"><i class="fa fa-file-text-o fa-lg"></i></a></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td><a href="#modal_service_manage" data-toggle="modal"><i class="fa fa-file-text-o fa-lg"></i></a></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                    <td><a href="#modal_service_manage" data-toggle="modal"><i class="fa fa-file-text-o fa-lg"></i></a></td>
                </tr>
                </tbody>
            </table>
        </div>








    </div>
    </body>
<?php include '../includes/footer.php'; ?>