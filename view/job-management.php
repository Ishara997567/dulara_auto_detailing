<?php include '../includes/header.php'; ?>
<?php include '../model/job_model.php';



$jobObj = new Job(); ?>

<title>Job Management</title>
</head>
<body>
<!-- Navigation Bar -->
<?php include '../includes/navbar.php'; ?>
<!-- Content    -->
<div class="container-fluid">



    <!-- Top Row    -->
    <div class="row padding welcome bg-light mb-3 py-2 mr-n5">
        <!-- Module Name    -->
        <div class="col-8">
            <div class="navbar-brand ml-5"><i class="fa fa-tasks"></i>&nbsp;Job Management</div>
        </div>

        <!-- New Job    -->
        <div class="col-3 d-flex justify-content-end">
            <button class="rounded-pill btn btn-outline-primary" type="button" data-toggle="modal" data-target="#new_job_modal"><i class="fa fa-plus"></i> New Job</button>
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
                <!-- Modal form -->

                <form action="../controller/jobcontroller.php?status=create_job" method="post" id="frm_new_job">

                    <div class="row padding d-flex justify-content-center pt-3">
                        <div class="col-8 text-center new-job-error">

                        </div>
                    </div>
                    <?php
                    $result = $jobObj->getLastJobID();
                    $last_job_id = $result->fetch_assoc();
                    ?>
                    <div class="modal-body">

                        <!-- Job ID -->
                        <div class="form-group row">
                            <label for="job_id" class="col-sm-4 col-form-label">Job ID</label>
                            <div class="col-sm-4">
                                <input type="text" readonly class="form-control" id="job_id" value="<?php echo $last_job_id['jobID']; ?>">
                            </div>
                        </div>
                        <hr/>
                        <!-- Vehicle Number -->

                        <div class="form-group row">
                            <label for="vehicle_no" class="col-sm-4 col-form-label">Vehicle Number</label>
                            <div class="col-sm-8 ui-widget ui-front">
                                <input type="text" class="form-control" id="vehicle_no" name="vehicle_no" placeholder="Vehicle Number">
                            </div>
                        </div>



                        <!-- End of Vehicle Number  -->

                        <!-- Customer ID    -->
                        <div class="form-group row">
                            <label for="customer_id" class="col-sm-4 col-form-label">Customer ID</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="customer_id" name="customer_id" placeholder="Customer ID" readonly>
                            </div>
                        </div>

                        <!-- Customer Name -->
                        <div class="form-group row">
                            <label for="customer_name" class="col-sm-4 col-form-label">Customer Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Customer Name" readonly>
                            </div>
                        </div>
                        <hr/>


                        <!-- Vehicle Make -->
                        <div class="form-group row">
                            <label for="vehicle_make" class="col-sm-4 col-form-label">Vehicle Make</label>
                            <div class="col-sm-8">
                                <select class="custom-select" id="vehicle_make" name="vehicle_make">
                                    <option value="choose" selected>Select Vehicle Make</option>
                                    <?php
                                    $vm_result = $jobObj->getAllVehicleMakes();
                                    while($r = $vm_result->fetch_assoc())
                                    {
                                        ?>
                                        <option value="<?php echo $r['vehicle_make_id']; ?>"><?php echo $r['vehicle_make_name']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <!-- Vehicle Model -->
                        <div class="form-group row">
                            <label for="vehicle_model" class="col-sm-4 col-form-label">Vehicle Model</label>
                            <div class="col-sm-8">
                                <select class="custom-select" id="vehicle_model" name="vehicle_model">
                                    <option value="choose" selected>Select Vehicle Model</option>

                                    <!-- Data is coming from the job controller    -->

                                </select>
                            </div>
                        </div>


                        <!-- Vehicle ODO -->
                        <div class="form-group row">
                            <label for="vehicle_odo" class="col-sm-4 col-form-label">Vehicle ODO</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="vehicle_odo" name="vehicle_odo" placeholder="In Kilometers">
                            </div>
                        </div>




                        <!-- Vehicle Mileage -->
                        <div class="form-group row">
                            <label for="vehicle_mileage" class="col-sm-4 col-form-label">Vehicle Mileage</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="vehicle_mileage" name="vehicle_mileage" placeholder="In Kilometers">
                            </div>
                        </div>
                        <hr/>
                        <!-- Description -->
                        <div class="form-group row">
                            <label for="description" class="col-sm-4 col-form-label">Description</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="description" name="description" placeholder="Write something to remember . . ."></textarea>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                        <button type="submit" class="btn btn-primary" name="job_submit" id="job_submit"><i class="fa fa-check"></i> Done</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="row">&nbsp;</div>

    <!-- Today Jobs -->
    <div class="card">
        <h5 class="card-header">Jobs at a Glance...</h5>
        <div class="card-body">
            <!-- First Row  -->
            <div class="row">
                <!-- Pending Jobs   -->
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa fa-clock-o"></i> Pending Jobs</h5>
                            <p class="card-text table-responsive">
                            <table class="table table-sm table-hover pending-job-table">
                                <thead>
                                <tr>
                                    <th scope="col">Job ID</th>
                                    <th scope="col">Vehicle No</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Vehicle Model</th>
                                    <th scope="col">&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $r = $jobObj->getAllPendingJobs();
                                while($row = $r->fetch_assoc())
                                {
                                    ?>
                                    <tr>

                                        <th scope="row"><?php echo $row['job_id'] ;?></th>
                                        <td><?php echo $row['job_vehicle_id'] ;?></td>
                                        <td><?php echo $row['cus_name'] ;?></td>
                                        <td><?php echo $row['vehicle_model_name'] ;?></td>
                                        <td><button type="button" class="btn btn-sm btn-outline-primary see-more rounded-pill" data-id="<?php echo $row['job_id'] ;?>" data-toggle="modal" data-target="#modal_pending_jobs">See More</button></td>


                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>

                            </p>
                        </div>
                    </div>
                </div>
                <!-- Completed Jobs -->
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa fa-check"></i> Completed Jobs</h5>
                            <p class="card-text table-responsive">
                            <table class="table table-sm table-hover completed-job-table">
                                <thead>
                                <tr>
                                    <th scope="col">Job ID</th>
                                    <th scope="col">Vehicle No</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Vehicle Model</th>
                                    <th scope="col">&nbsp;</th>
                                    <th scope="col">&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $r = $jobObj->getAllCompletedJobs();
                                while($row = $r->fetch_assoc())
                                {
                                    ?>
                                    <tr>

                                        <th scope="row"><?php echo $row['job_id'] ;?></th>
                                        <td><?php echo $row['job_vehicle_id'] ;?></td>
                                        <td><?php echo $row['cus_name'] ;?></td>
                                        <td width="20%" class="text-center"><?php echo $row['vehicle_model_name'] ;?></td>
                                        <td width="15%"><button type="button" class="btn btn-sm btn-outline-primary completed-see-more rounded-pill" data-id="<?php echo $row['job_id'] ;?>" data-toggle="modal" data-target="#modal_completed_jobs">See More</button></td>
                                        <td width="10%"><a href="job-invoice.php?invoice_job_id=<?php echo base64_encode($row['job_id']) ;?>" class="btn btn-sm btn-outline-primary link-invoice rounded-pill">Invoice</a></td>


                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modals -->
    <!-- Pending Jobs Modal -->

    <div class="modal fade" id="modal_pending_jobs" tabindex="-1" role="dialog" aria-labelledby="modal_pending_jobs" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">See More</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="../controller/jobcontroller.php?status=job_status_change" method="post">
                    <div class="modal-body manage-pending-jobs">

                        <!-- Data coming from the controller    -->

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="pending_job_submit">Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- End of Pending Jobs Modal  -->
    <!-- Completed Pending Job Modal    -->
    <div class="modal fade" id="modal_completed_jobs" tabindex="-1" role="dialog" aria-labelledby="modal_completed_jobs" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">See More</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="../controller/jobcontroller.php?status=generate_invoice" method="post">
                <div class="modal-body manage-completed-jobs">


                </div>
                </form>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary generate-invoice-button" name="submit_generate_invoice">Generate Invoice</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>




    <!-- End of Completed Jobs Modal    -->
    <!-- End of Modals  -->






    <!-- Second Row -->
    <div class="card">
        <h5 class="card-header">Job History</h5>
        <div class="card-body">
            <table class="table table-sm table-secondary table-hover my-job-datatable">
                <thead>
                <tr>
                    <th scope="col">Invoice ID</th>
                    <th scope="col">Job ID</th>
                    <th scope="col">Vehicle No</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Vehicle Make</th>
                    <th scope="col">Vehicle Model</th>
                    <th scope="col">Vehicle ODO</th>
                    <th scope="col">Vehicle Mileage</th>
                    <th scope="col">Total Invoice Amount</th>
                    <th scope="col">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $invoiced_result = $jobObj->getInvoicedJobs();
                while($invoiced_row = $invoiced_result->fetch_assoc())

                {
                ?>
                <tr>
                    <th scope="row"><?php echo $invoiced_row['invoice_id'];?></th>
                    <td><?php echo $invoiced_row['job_id']; ?></td>
                    <td><?php echo $invoiced_row['job_vehicle_id'];?></td>
                    <td><?php echo $invoiced_row['cus_name']; ?></td>
                    <td><?php echo $invoiced_row['vehicle_make_name']; ?></td>
                    <td><?php echo $invoiced_row['vehicle_model_name']; ?></td>
                    <td><?php echo $invoiced_row['job_vehicle_odo']; ?></td>
                    <td><?php echo $invoiced_row['job_vehicle_mileage']; ?></td>
                    <td><?php echo $invoiced_row['invoice_amount']; ?></td>
                    <td><a href="#modal_invoice" onclick="showInvoiceDetails(<?php echo $invoiced_row['invoice_id'];?>)" class="btn btn-sm btn-outline-primary" data-toggle="modal"><i class="fa fa-lg fa-file-text-o"></i></a></td>

                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Invoice Modal  -->
    <div class="modal fade" role="dialog" tabindex="-1" id="modal_invoice" aria-labelledby="modal_invoice" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Job History</h3>
                    <button type="button" data-dismiss="modal" class="close" aria-label="close">
                        <span aria-hidden="true">
                            &times;
                        </span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="#" id="form_invoice_details">



                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>



    <!-- End of Invoice Modal  -->


</div>
<?php include '../includes/footer.php'; ?>
<script src="../assets/js/job.js"></script>
<script src="../assets/js/new_job_validation.js"></script>
<script src="../assets/js/job_invoice.js"></script>
<script>
    $(".my-job-datatable").DataTable();
</script>


