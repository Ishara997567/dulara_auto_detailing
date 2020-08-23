<?php include '../includes/header.php'; ?>
    <title>Job Management</title>
    </head>
    <body>
<!-- Navigation Bar -->
<?php include '../includes/navbar.php'; ?>
<!-- Content    -->
<div class="container-fluid">
    <!-- Top Row    -->
    <div class="row bg-light">
        <div class="h2 col-10">Job Dashboard</div>
        <!-- New Job    -->
        <div class="col-2 d-flex justify-content-sm-center my-1">
            <button class="rounded-pill btn btn-outline-primary" type="button" data-toggle="modal" data-target="#new_job_modal" data-whatever="@mdo"><i class="fa fa-plus"></i> New Job</button>
        </div>
    </div>

    <!-- Modal for New Job   -->

    <div class="modal fade" id="new_job_modal" tabindex="-1" role="dialog" aria-labelledby="new_job_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="new_job_modal_label">New Job</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Modal form -->
                    <form>
                        <!-- Job ID -->
                        <div class="form-group row">
                            <label for="job_id" class="col-sm-4 col-form-label">Job ID</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext" id="job_id" value="JI04567">
                            </div>
                        </div>
<hr/>
                        <!-- Customer ID    -->
                        <div class="form-group row">
                            <label for="customer_id" class="col-sm-4 col-form-label">Customer ID</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="customer_id" placeholder="Customer ID">
                            </div>
                        </div>

                        <!-- Customer Name -->
                        <div class="form-group row">
                            <label for="customer_id" class="col-sm-4 col-form-label">Customer Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="customer_name" placeholder="Customer Name">
                            </div>
                        </div>
<hr/>
                        <!-- Vehicle Number -->
                        <div class="form-group row">
                            <label for="vehicle_no" class="col-sm-4 col-form-label">Vehicle Number</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="vehicle_no" placeholder="Vehicle Number">
                            </div>
                        </div>

                        <!-- Vehicle Model -->
                        <div class="form-group row">
                            <label for="vehicle_model" class="col-sm-4 col-form-label">Vehicle Model</label>
                            <div class="col-sm-8">
                                <select class="custom-select" id="vehicle_model">
                                    <option selected>Select Vehicle Model</option>
                                    <option value="1">Mercedez</option>
                                    <option value="2">Gollardo</option>
                                    <option value="3">Rx-8</option>
                                </select>
                            </div>
                        </div>

                        <!-- Vehicle Make -->
                        <div class="form-group row">
                            <label for="vehicle_make" class="col-sm-4 col-form-label">Vehicle Make</label>
                            <div class="col-sm-8">
                                <select class="custom-select" id="vehicle_make">
                                    <option selected>Select Vehicle Make</option>
                                    <option value="1">Benz</option>
                                    <option value="2">Lamborghini</option>
                                    <option value="3">Mazda</option>
                                </select>
                            </div>
                        </div>

                        <!-- Vehicle Mileage -->
                        <div class="form-group row">
                            <label for="vehicle_mileage" class="col-sm-4 col-form-label">Vehicle Mileage</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="vehicle_mileage" placeholder="In Kilometers">
                            </div>
                        </div>
<hr/>
                        <!-- Service Category -->
                        <div class="form-group row">
                            <label for="job_service_category" class="col-sm-4 col-form-label">Service Category</label>
                            <div class="col-sm-8">
                                <select class="custom-select" id="job_service_category">
                                    <option selected>Select Service Category</option>
                                    <option value="1">Full Body Wash</option>
                                    <option value="2">Leather Treatment</option>
                                    <option value="3">Half Service</option>
                                </select>
                            </div>
                        </div>

                        <!-- Service Sub Category 1-->
                        <div class="form-group row">
                            <label for="job_service_sub_category_1" class="col-sm-4 col-form-label">Service Sub Category 1</label>
                            <div class="col-sm-8">
                                <select class="custom-select" id="job_service_category_1">
                                    <option selected>Select Service Sub Category 1</option>
                                    <option value="1">Full Body Wash</option>
                                    <option value="2">Leather Treatment</option>
                                    <option value="3">Half Service</option>
                                </select>
                            </div>
                        </div>

                        <!-- Service Sub Category 2-->
                        <div class="form-group row">
                            <label for="job_service_sub_category_2" class="col-sm-4 col-form-label">Service Sub Category 2</label>
                            <div class="col-sm-8">
                                <select class="custom-select" id="job_service_category_2">
                                    <option selected>Select Service Sub Category 2</option>
                                    <option value="1">Full Body Wash</option>
                                    <option value="2">Leather Treatment</option>
                                    <option value="3">Half Service</option>
                                </select>
                            </div>
                        </div>

                        <!-- Service Sub Category 3-->
                        <div class="form-group row">
                            <label for="job_service_sub_category_3" class="col-sm-4 col-form-label">Service Sub Category 3</label>
                            <div class="col-sm-8">
                                <select class="custom-select" id="job_service_category_3">
                                    <option selected>Select Service Sub Category 3</option>
                                    <option value="1">Full Body Wash</option>
                                    <option value="2">Leather Treatment</option>
                                    <option value="3">Half Service</option>
                                </select>
                            </div>
                        </div>
<hr/>
                        <!-- Description -->
                        <div class="form-group row">
                            <label for="description" class="col-sm-4 col-form-label">Description</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="description" placeholder="Write something to remember . . ."></textarea>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="button" class="btn btn-primary"><i class="fa fa-check"></i> Done</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">&nbsp;</div>

    <!-- Today Jobs -->
    <div class="card">
        <h5 class="card-header">Today's Jobs at a Glance...</h5>
        <div class="card-body">
            <!-- First Row  -->
            <div class="row">
                <!-- Pending Jobs   -->
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa fa-clock-o"></i> Pending Jobs</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <!-- Completed Jobs -->
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa fa-check"></i> Completed Jobs</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">&nbsp;</div>

    <!-- Second Row -->
    <div class="card">
        <h5 class="card-header">Job History</h5>
        <div class="card-body">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>