<?php include '../model/job_model.php';
include '../model/inventory_model.php';
include '../model/service_model.php';

$jobObj = new Job();
$inventoryObj = new Inventory();
$serviceObj = new Service();


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

            echo "Hello! Are you getting me?";

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
                echo 1;

            }
            else
            {
                echo 0;
            }


    }
}

