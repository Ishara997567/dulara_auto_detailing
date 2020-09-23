<?php include '../model/job_model.php';

$jobObj = new Job();


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
                $job_description = $_POST['description'];

                $last_job_id = $jobObj->createJob($job_vehicle_id, $job_cus_id, $job_vehicle_make_id, $job_vehicle_model_id, $job_vehicle_mileage, $job_description);

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

    }
}
