<?php include '../includes/header.php'; ?>
<title>Manage Customer Details</title>
</head>
<body>
<?php include '../includes/navbar.php'; ?>
<div class="container-fluid">
    <!-- Heading    -->
    <div class="row padding">
        <div class="col-12 display-4 jumbotron welcome">
            <i class="fa fa-file-text-o"></i>
            Manage Customer Details
        </div>
    </div>

    <!-- Search Bar -->
    <div class="row padding">
        <div class="col-md-3">&nbsp;</div>
        <div class="col-md-9">
            <form class="form-inline p-0" id="frm_item_search">
                <input class="rounded-pill form-control my-1 mr-sm-2 w-75" type="search" placeholder="Search . . ." aria-label="Search">
                <button class="btn btn-outline-primary rounded-pill my-xl-1" type="submit"><i class="fa fa-search"></i> Search</button>
            </form>
        </div>
    </div>

    <!-- Info Table -->
    <div class="row padding">
        <div class="table-responsive mt-3">
            <table class="table table-md">
                <thead>
                <tr>
                    <th scope="col">Customer ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">City</th>
                    <th scope="col">Service</th>
                    <!--                <th scope="col">Manage</th>-->
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">CX12389</th>
                    <td>Mark</td>
                    <td>Giriulla</td>
                    <td>Full Service</td>
                    <td><a href="#cus_info_modal" data-target="#cus_info_modal" data-toggle="modal"><i class="fa fa-file-text-o fa-lg"></i></a></td>
                </tr>
                <tr>
                    <th scope="row">CX12389</th>
                    <td>Jacob</td>
                    <td>Kuliyapitiya</td>
                    <td>T-Belt Change</td>
                    <td><a href="#cus_info_modal" data-target="#cus_info_modal" data-toggle="modal"><i class="fa fa-file-text-o fa-lg"></i></a></td>
                </tr>
                <tr>
                    <th scope="row">CX12334</th>
                    <td>Micheal</td>
                    <td>Radawana</td>
                    <td>Body Wash</td>
                    <td><a href="#cus_info_modal" data-target="#cus_info_modal" data-toggle="modal"><i class="fa fa-file-text-o fa-lg"></i></a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>



    <!-- Modal for More Info    -->
    <div class="modal fade" id="cus_info_modal" tabindex="-1" role="dialog" aria-labelledby="cus_info_modal" aria-hidden="true">
        <div class="modal-xl modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Customer Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Read Only Form -->
                    <form action="#" method="post">
                        <div class="form-row">
                            <!-- Cus code  -->
                            <div class="form-group col-2">
                                <label for="cus_code">Customer Code</label>
                                <input type="text" class="form-control" readonly id="cus_code" placeholder="Customer Code">
                            </div>

                            <!-- Cus Name  -->
                            <div class="form-group col-8">
                                <label for="cus_name">Customer Name</label>
                                <input type="text" class="form-control" id="cus_name" placeholder="Customer Name">
                            </div>
                        </div>

                        <!-- Address Rows -->
                        <div class="form-row">
                            <div class="form-group col-2">
                                <label for="home_no">Address</label>
                                <input type="text" class="form-control" id="home_no" placeholder="Home Number">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-4 ">
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
                                <label for="email">Customer Email</label>
                                <input type="email" class="form-control" id="email" placeholder="username@example.com" >
                            </div>
                        </div>

                        <hr>

            <!-- Vehicle and Service Details    -->
                        <div class="form-group row">
                            <label for="vehicle_no" class="col-sm-4 col-form-label">Vehicle Number</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" readonly id="vehicle_no" placeholder="Vehicle Number">
                            </div>
                        </div>

                        <!-- Vehicle Model -->
                        <div class="form-group row">
                            <label for="vehicle_model" class="col-sm-4 col-form-label">Vehicle Model</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" readonly id="vehicle_model" placeholder="Vehicle Model">
                            </div>
                        </div>

                        <!-- Vehicle Make -->
                        <div class="form-group row">
                            <label for="vehicle_make" class="col-sm-4 col-form-label">Vehicle Make</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" readonly id="vehicle_make" placeholder="Vehicle Make">
                            </div>
                        </div>

                        <!-- Vehicle Mileage -->
                        <div class="form-group row">
                            <label for="vehicle_mileage" class="col-sm-4 col-form-label">Vehicle Mileage</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" readonly id="vehicle_mileage" placeholder="In Kilometers">
                            </div>
                        </div>
                        <hr/>
                        <!-- Service Category -->
                        <div class="form-group row">
                            <label for="job_service_category" class="col-sm-4 col-form-label">Service Category</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" readonly id="job_service_category" placeholder="Service Category">
                            </div>
                        </div>



                        <hr>

                        <!-- Feedback Status    -->
                        <div class="form-group row">
                            <label for="vehicle_mileage" class="col-sm-4 col-form-label">Feedback</label>
                            <div class="col-sm-4">
                                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i>
                            </div>
                            <div class="col-sm-4">
                                <a href="customer-feedback-manage.php">
                                    <i class="fa fa-lg fa-info-circle"></i>
                                </a>
                            </div>
                        </div>



                        <!-- Royalty Enrollments    -->
                        <div class="form-group row">
                            <label for="loyalty" class="col-sm-4 col-form-label">Loyalty Enrollments</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" readonly id="loyalty" placeholder="Loyalty Package">
                            </div>
                            <div class="col-sm-4 mt-2">
                                <a href="customer-loyalty-manage.php">
                                    <i class="fa fa-lg fa-info-circle"></i>
                                </a>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-success">Save Changes</button>
                </div>
            </div>
        </div>
    </div>




</div>
<?php include '../includes/footer.php'; ?>
