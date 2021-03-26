<?php include '../model/job_model.php';
include '../model/inventory_model.php';
include '../model/service_model.php';
include '../model/notification_model.php';

$jobObj = new Job();
$inventoryObj = new Inventory();
$serviceObj = new Service();
$notificationObj = new Notification();


if($_REQUEST['status']) {
    $status = $_REQUEST['status'];

    switch ($status)
    {
        case 'autofill_customer':
            $vehicle_no = $_POST['vn'];

            $results = $jobObj->selectByVehicleNo($vehicle_no);
            $data = array();
            while($r=$results->fetch_assoc())
            {
                $data['cus_name'] = $r['cus_name'];
                $data['cus_id'] = $r['cus_id'];
            }

            echo json_encode($data);

            break;

        case "get_vehicle_make":
            $vehicle_make_id = $_POST['make_id'];
            $model_result = $jobObj->getAllVehicleModelByMake($vehicle_make_id);
            ?>
            <option value="choose" selected>Select Vehicle Model</option>
            <?php
            while($row = $model_result->fetch_assoc())
            {
                ?>
                <option value="<?php echo $row['vehicle_model_id'];?>"><?php echo $row['vehicle_model_name'];?></option>
                <?php
            }

            break;

        case 'create_job':
            if(isset($_POST['job_submit']))
            {
                $job_vehicle_id = $_POST['vehicle_no'];
                $job_cus_id = $_POST['customer_id'];
                $job_vehicle_make_id = $_POST['vehicle_make'];
                $job_vehicle_model_id = $_POST['vehicle_model'];
                $job_vehicle_mileage = $_POST['vehicle_mileage'];
                $job_vehicle_odo = $_POST['vehicle_odo'];
                $job_description = $_POST['description'];

                $last_job_id = $jobObj->createJob($job_vehicle_id, $job_cus_id, $job_vehicle_make_id, $job_vehicle_model_id, $job_vehicle_odo, $job_vehicle_mileage, $job_description);

                if($last_job_id > 0)
                {
                    $msg = base64_encode("New Job Added Successfully!");
                    ?>
                    <script>window.location = "../view/job-management.php?success_message=<?php echo $msg; ?>"</script>
                    <?php

                    $not_message = "A new job <i><b>" .$last_job_id. "</b></i>, for vehicle number <b><i>". $job_vehicle_id ."</i></b> has been created";
                    $notificationObj->addNotification(3, $not_message);
                }
                else
                {
                    $msg = base64_encode("New Job Failed to Add!");
                    ?>
                    <script>window.location = "../view/job-management.php?error_message=<?php echo $msg; ?>"</script>
                    <?php

                }

            }
            break;

        case "manage_pending_jobs";
            $pending_job_id = $_POST['jobId'];
            $pending_jobs = $jobObj->getPendingJobsById($pending_job_id);
            while($r = $pending_jobs->fetch_assoc())
            {
                ?>
                <div class="form-group row">
                    <label for="p_job_id" class="col-2 col-form-label">Job ID</label>
                    <div class="col-2">
                        <input type="text" class="form-control" value="<?php echo $r['job_id']; ?>" id="p_job_id" name="p_job_id" readonly/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="p_vehicle_no" class="col-2 col-form-label">Vehicle Number</label>
                    <div class="col-3">
                        <input type="text" class="form-control" value="<?php echo $r['job_vehicle_id']; ?>" id="p_vehicle_no" readonly/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="p_vehicle_make" class="col-2 col-form-label">Vehicle Make</label>
                    <div class="col-3">
                        <input type="text" class="form-control" value="<?php echo $r['vehicle_make_name']; ?>" id="p_vehicle_make" readonly/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="p_vehicle_model" class="col-2 col-form-label">Vehicle Model</label>
                    <div class="col-3">
                        <input type="text" class="form-control" value="<?php echo $r['vehicle_model_name']; ?>" id="p_vehicle_model" readonly/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="p_vehicle_odo" class="col-2 col-form-label">Vehicle ODO</label>
                    <div class="col-3">
                        <input type="text" class="form-control" value="<?php echo $r['job_vehicle_odo']; ?>" id="p_vehicle_odo" readonly/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="p_vehicle_mileage" class="col-2 col-form-label">Vehicle Mileage</label>
                    <div class="col-3">
                        <input type="text" class="form-control" value="<?php echo $r['job_vehicle_mileage']; ?>" id="p_vehicle_mileage" readonly/>
                    </div>
                </div>

                <hr>

                <div class="form-group row">
                    <label for="p_cus_name" class="col-2 col-form-label">Customer Name</label>
                    <div class="col-3">
                        <input type="text" class="form-control" value="<?php echo $r['cus_name']; ?>" id="p_cus_name" readonly/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="p_cus_cn1" class="col-2 col-form-label">Contact No 1</label>
                    <div class="col-3">
                        <input type="text" class="form-control" value="<?php echo $r['cus_cn1']; ?>" id="p_cus_cn1" readonly/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="p_cus_cn2" class="col-2 col-form-label">Contact No 2</label>
                    <div class="col-3">
                        <input type="text" class="form-control" value="<?php echo $r['cus_cn2']; ?>" id="p_cus_cn2" readonly/>
                    </div>
                </div>

                <hr>

                <div class="form-group row">
                    <label for="p_job_start_time" class="col-2 col-form-label">Start Time</label>
                    <div class="col-3">
                        <input type="text" class="form-control" value="<?php echo $r['job_start_time']; ?>" id="p_job_start_time" readonly/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="p_status" class="col-2 col-form-label">Status</label>
                    <div class="col-3">
                        <select name="p_status" id="p_status" class="custom-select">
                            <option value="0" selected>Pending</option>
                            <option value="1" class="text-success">Completed</option>
                        </select>
                    </div>

                    <div class="col-5 pending-job-message text-left mt-2"></div>

                </div>



                <?php
            }
            break;

        case "job_status_change":
            if(isset($_POST['pending_job_submit']))
            {
                $job_id = $_POST['p_job_id'];
                $job_status = $_POST['p_status'];
                $rows_affected = $jobObj->changeJobStatus($job_id, $job_status);

                if($rows_affected > 0)
                {
                    $msg = base64_encode("Job Status Changed!");
                    ?>
                    <script>window.location = "../view/job-management.php?success_message=<?php echo $msg; ?>"</script>
                    <?php

                    $not_message = "Job status has been changed to <i><b>completed, </b></i> of <i><b>" .$job_id. "</b></i>";
                    $notificationObj->addNotification(3, $not_message);
                }
                else
                {
                    $msg = base64_encode("Job Status Failed To Change!");
                    ?>
                    <script>window.location = "../view/job-management.php?error_message=<?php echo $msg; ?>"</script>
                    <?php

                }

            }
            break;

        case "job_status_back_to_pending":
            $changed_status_job_id = $_POST['changedStatusJobId'];
            $jobObj->changeJobStatusToPendingAgain($changed_status_job_id);

            $not_message = "Job satatus has been changed back to <i><b>pending, </b></i> of <i><b>". $changed_status_job_id."</b></i>";
            break;

        case "manage_completed_jobs":

            $completed_job_id = $_POST['jobId'];
            $completed_jobs = $jobObj->getCompletedJobsById($completed_job_id);
            while($r = $completed_jobs->fetch_assoc())
            {
                ?>
                <div class="form-group row">
                    <label for="c_job_id" class="col-2 col-form-label">Job ID</label>
                    <div class="col-2">
                        <input type="text" class="form-control" value="<?php echo $r['job_id']; ?>" id="c_job_id" name="c_job_id" readonly/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="c_vehicle_no" class="col-2 col-form-label">Vehicle Number</label>
                    <div class="col-3">
                        <input type="text" class="form-control" value="<?php echo $r['job_vehicle_id']; ?>" id="c_vehicle_no" readonly/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="c_vehicle_make" class="col-2 col-form-label">Vehicle Make</label>
                    <div class="col-3">
                        <input type="text" class="form-control" value="<?php echo $r['vehicle_make_name']; ?>" id="c_vehicle_make" readonly/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="c_vehicle_model" class="col-2 col-form-label">Vehicle Model</label>
                    <div class="col-3">
                        <input type="text" class="form-control" value="<?php echo $r['vehicle_model_name']; ?>" id="c_vehicle_model" readonly/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="c_vehicle_odo" class="col-2 col-form-label">Vehicle ODO</label>
                    <div class="col-3">
                        <input type="text" class="form-control" value="<?php echo $r['job_vehicle_odo']; ?>" id="c_vehicle_odo" readonly/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="c_vehicle_mileage" class="col-2 col-form-label">Vehicle Mileage</label>
                    <div class="col-3">
                        <input type="text" class="form-control" value="<?php echo $r['job_vehicle_mileage']; ?>" id="c_vehicle_mileage" readonly/>
                    </div>
                </div>

                <hr>

                <div class="form-group row">
                    <label for="c_cus_name" class="col-2 col-form-label">Customer Name</label>
                    <div class="col-3">
                        <input type="text" class="form-control" value="<?php echo $r['cus_name']; ?>" id="c_cus_name" readonly/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="c_cus_cn1" class="col-2 col-form-label">Contact No 1</label>
                    <div class="col-3">
                        <input type="text" class="form-control" value="<?php echo $r['cus_cn1']; ?>" id="c_cus_cn1" readonly/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="c_cus_cn2" class="col-2 col-form-label">Contact No 2</label>
                    <div class="col-3">
                        <input type="text" class="form-control" value="<?php echo $r['cus_cn2']; ?>" id="c_cus_cn2" readonly/>
                    </div>
                </div>

                <hr>

                <div class="form-group row">
                    <label for="c_job_start_time" class="col-2 col-form-label">Start Time</label>
                    <div class="col-3">
                        <input type="text" class="form-control" value="<?php echo $r['job_start_time']; ?>" id="c_job_start_time" readonly/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="c_job_start_time" class="col-2 col-form-label">Finished Time</label>
                    <div class="col-3">
                        <input type="text" class="form-control" value="<?php echo $r['job_finish_time']; ?>" id="c_job_start_time" readonly/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="c_status" class="col-2 col-form-label">Status</label>
                    <div class="col-3">
                        <select name="c_status" id="c_status" class="custom-select">
                            <option value="1" selected>Completed</option>
                            <option value="0" class="text-danger">Pending</option>
                        </select>
                    </div>

                    <div class="input-group col-5 confirm-buttons">
                        <button type="button" class="btn btn-outline-success mr-2 confirm-pending"><i class="fa fa-check"></i></button>
                        <button type="button" class="btn btn-outline-danger decline-pending"><i class="fa fa-times"></i></button>
                    </div>
                    <div class="col-5 completed-job-message text-left mt-2"></div>

                </div>



                <?php
            }
            break;

        case "fill_item_row":
            $service_name = $_POST['itemName'];
            $service_result = $inventoryObj->getItemByName($service_name);

            $data = array();
            while ($service_row = $service_result->fetch_assoc()) {
                $data['item_id'] = $service_row['item_id'];
                $data['item_price'] = $service_row['item_sale_uprice'];
            }

            echo json_encode($data);


            break;

        case "fill_service_row":
            $service_name = $_POST['serviceName'];
            $service_result = $serviceObj->getServiceByName($service_name);

            $data = array();
            while ($service_row = $service_result->fetch_assoc())
            {
                $data['s_id'] = $service_row['service_id'];
                $data['s_charge'] = $service_row['service_price'];
            }

            echo json_encode($data);


            break;

        case "make_invoice":

            //getting post job id value
            $invoice_job_id = $_POST['jobId'];

            //getting post item values
            $invoice_item_id = $_POST['invoiceItemId'];
            $invoice_item_price = $_POST['invoiceItemPrice'];
            $invoice_item_qty = $_POST['invoiceItemQty'];
            $invoice_item_amount = $_POST['invoiceItemAmount'];

            //getting post service values


            $invoice_service_id = $_POST['invoiceServiceId'];
            $invoice_service_charge = $_POST['invoiceServiceCharge'];

            //Finding the total amount of amount
            $invoice_item_total_amount = array_sum($invoice_item_amount);
            $invoice_service_total_amount = array_sum($invoice_service_charge);
            //Invoice Total Amount
            $invoice_total_amount = $invoice_item_total_amount + $invoice_service_total_amount;

            //Inserting Data to Invoice Table
            $invoice_id = $jobObj->addInvoice($invoice_job_id,$invoice_item_total_amount,$invoice_service_total_amount,$invoice_total_amount);

            //Inserting Data into invoice_item table
            for($i=0; $i < sizeof($invoice_item_id); $i++)
            {
                $jobObj->addInvoiceItems($invoice_item_id[$i],$invoice_item_qty[$i], $invoice_item_price[$i], $invoice_item_amount[$i], $invoice_id);
            }

            for($j=0; $j<sizeof($invoice_service_id); $j++)
            {
                $jobObj->addInvoiceServices($invoice_service_id[$j], $invoice_service_charge[$j], $invoice_id);
            }

            if($invoice_id > 0)
            {
                $jobObj->changeJobStatusToInvoiced($invoice_job_id);
                echo 1;

            }
            else
            {
                echo 0;
            }

        case "show_invoice_details":
            $invoice_id = $_POST['invoiceId'];
            $job_result = $jobObj->getJobByInvoiceId($invoice_id);
            while($row=$job_result->fetch_assoc())
            {
            ?>




                <!-- Invoice Id -->
                <div class="form-group row">
                    <label for="modal_invoice_id" class="text-left col-2 col-form-label">Invoice ID</label>
                    <div class="col-3">
                        <input type="text" class="form-control" id="modal_invoice_id" name="modal_invoice_id" value="<?php echo $invoice_id; ;?>" readonly/>
                    </div>

                    <div class="col-3">&nbsp;</div>
                    <!-- Invoice Date -->
                    <label for="modal_invoice_date" class="text-right col-1 col-form-label">Date</label>
                    <div class="col-3">
                        <?php
                        $new_datetime = DateTime::createFromFormat ( "Y-m-d H:i:s", $row["invoice_created_at"] );

                        ?>
                        <input type="text" class="form-control" id="modal_invoice_date" name="modal_invoice_date" value="<?php echo $new_datetime->format('jS \of F Y'); ?>" readonly>
                    </div>
                </div>

                <hr>

                <!-- Job ID -->
                <div class="form-group row">
                    <label for="modal_invoice_job_id" class="text-left col-2 col-form-label">Job ID</label>
                    <div class="col-3">
                        <input type="text" class="form-control" id="modal_invoice_job_id" name="modal_invoice_job_id" value="<?php echo $row['job_id']; ?>" readonly/>
                    </div>
                </div>

                <!-- Vehicle No -->
                <div class="form-group row">
                    <label for="modal_invoice_vehicle_no" class="text-left col-2 col-form-label">Vehicle No</label>
                    <div class="col-3">
                        <input type="text" class="form-control" id="modal_invoice_vehicle_no" name="modal_invoice_vehicle_no" value="<?php echo $row['job_vehicle_id']; ?>" readonly/>
                    </div>
                </div>

                <!-- Vehicle Make and Model -->
                <div class="form-group row">
                    <label for="modal_invoice_vehicle" class="text-left col-2 col-form-label">Vehicle</label>
                    <div class="col-3">
                        <input type="text" class="form-control" id="modal_invoice_vehicle" name="modal_invoice_vehicle" value="<?php echo $row['vehicle_make_name']." ".$row['vehicle_model_name']; ; ?>" readonly/>
                    </div>
                </div>

                <!-- Vehicle ODO -->
                <div class="form-group row">
                    <label for="modal_invoice_vehicle_odo" class="text-left col-2 col-form-label">ODO</label>
                    <div class="col-3">
                        <input type="text" class="form-control" id="modal_invoice_vehicle_odo" name="modal_invoice_vehicle_odo" value="<?php echo $row['job_vehicle_odo']; ?>" readonly/>
                    </div>
                </div>

                <!-- Vehicle Mileage -->
                <div class="form-group row">
                    <label for="modal_invoice_vehicle_mileage" class="text-left col-2 col-form-label">Vehicle Mileage</label>
                    <div class="col-3">
                        <input type="text" class="form-control" id="modal_invoice_vehicle_mileage" name="modal_invoice_vehicle_mileage" value="<?php echo $row['job_vehicle_mileage']; ?>" readonly/>
                    </div>
                </div>
                <hr>
                <!-- Customer Name -->
                <div class="form-group row">
                    <label for="modal_invoice_cus_name" class="text-left col-2 col-form-label">Customer Name</label>
                    <div class="col-3">
                        <input type="text" class="form-control" id="modal_invoice_cus_name" name="modal_invoice_cus_name" value="<?php echo $row['cus_name']; ?>" readonly/>
                    </div>
                </div>
                <!-- Customer CN1 -->
                <div class="form-group row">
                    <label for="modal_invoice_cus_cn1" class="text-left col-2 col-form-label">Contact No 1</label>
                    <div class="col-3">
                        <input type="text" class="form-control" id="modal_invoice_cus_cn1" name="modal_invoice_cus_cn1" value="<?php echo $row['cus_cn1']; ?>" readonly/>
                    </div>
                </div>

                <!-- Customer CN2 -->
                <div class="form-group row">
                    <label for="modal_invoice_cus_cn2" class="text-left col-2 col-form-label">Contact No 2</label>
                    <div class="col-3">
                        <input type="text" class="form-control" id="modal_invoice_cus_cn2" name="modal_invoice_cus_cn2" value="<?php echo $row['cus_cn2']; ?>" readonly/>
                    </div>
                </div>

                <hr>

                <!-- Start Time -->
                <div class="form-group row">
                    <label for="modal_start_time" class="text-left col-2 col-form-label">Start Time</label>
                    <div class="col-3">
                        <input type="text" class="form-control" id="modal_start_time" name="modal_start_time" value="<?php echo $row['job_start_time']; ?>" readonly/>
                    </div>
                </div>

                <!-- Finished Time -->
                <div class="form-group row">
                    <label for="modal_finished_time" class="text-left col-2 col-form-label">Finished Time</label>
                    <div class="col-3">
                        <input type="text" class="form-control" id="modal_finished_time" name="modal_finished_time" value="<?php echo $row['job_finish_time']; ?>" readonly/>
                    </div>
                </div>

                <hr>

                <h3 class="card-text">Item Replacements</h3>
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th scope="col">Item ID</th>
                        <th>Item Name</th>
                        <th>Item Price</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $invoice_item_result = $jobObj->getInvoiceItemsByInvoiceId($invoice_id);
                    while($iirow = $invoice_item_result->fetch_assoc())
                    {
                    ?>
                    <tr>
                        <td scope="row"><?php echo $iirow['invoice_item_id'];?></td>
                        <td><?php echo $iirow['item_name'];?></td>
                        <td><?php echo $iirow['invoice_item_price'];?></td>
                        <td><?php echo $iirow['invoice_item_qty'];?></td>
                        <td><?php echo $iirow['invoice_item_amount']; ?></td>
                    </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <h3 class="card-text">Services</h3>
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th scope="col">Service ID</th>
                        <th>Service Name</th>
                        <th>Service Price</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $invoice_service_result = $jobObj->getInvoiceServicesByInvoiceId($invoice_id);
                    while($r=$invoice_service_result->fetch_assoc())
                    {
                    ?>
                    <tr>
                        <td scope="row"><?php echo $r['invoice_service_id']; ?></td>
                        <td><?php echo $r['service_name']; ?></td>
                        <td><?php echo $r['invoice_service_price']; ?></td>
                    </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <hr>

                <!-- Total Item Amount -->
                <div class="form-group row">
                    <label for="modal_tot_item_amount" class="text-left col-2 col-form-label">Total Item Amount</label>
                    <div class="col-3">
                        <input type="text" class="form-control" id="modal_tot_item_amount" name="modal_tot_item_amount" value="<?php echo $row['invoice_item_total_amount']; ?>" readonly/>
                    </div>
                </div>

                <!-- Total Service Amount -->
                <div class="form-group row">
                    <label for="modal_tot_service_amount" class="text-left col-2 col-form-label">Total Service Amount</label>
                    <div class="col-3">
                        <input type="text" class="form-control" id="modal_tot_service_amount" name="modal_tot_service_amount" value="<?php echo $row['invoice_service_total_amount']; ?>" readonly/>
                    </div>
                </div>

                <!-- Total Invoice Amount -->
                <div class="form-group row">
                    <label for="modal_tot_invoice_amount" class="text-left col-2 col-form-label">Total Invoice Amount</label>
                    <div class="col-3">
                        <input type="text" class="form-control" id="modal_tot_invoice_amount" name="modal_tot_invoice_amount" value="<?php echo $row['invoice_amount']; ?>" readonly/>
                    </div>
                </div>







<?php
            }
            break;
    }
}

