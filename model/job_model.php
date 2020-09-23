<?php include_once '../commons/DbConnection.php';

$dbConnnection = new DbConnection();

class Job{
    public function getVehicleName($term)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM customer WHERE cus_vehicle_no LIKE '%{$term}%';";
        return $con->query($sql);
    }

    public function selectByVehicleNo($vehicle_no)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM customer WHERE cus_vehicle_no = '$vehicle_no';";
        return $con->query($sql);
    }

    public function getAllVehicleMakes()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM vehicle_make;";
        return $con->query($sql);
    }

    public function getAllVehicleModelByMake($make_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM vehicle_model WHERE vehicle_model_make_id='$make_id';";
        return $con->query($sql);
    }

    public function createJob($job_vehicle_id, $job_cus_id, $job_vehicle_make_id, $job_vehicle_model_id, $job_vehicle_mileage, $job_description)
    {
        $con = $GLOBALS["conn"];
        $sql = "INSERT INTO job (job_vehicle_id, job_cus_id, job_vehicle_make_id, job_vehicle_model_id, job_vehicle_mileage, job_description) VALUES ('$job_vehicle_id', '$job_cus_id', '$job_vehicle_make_id', '$job_vehicle_model_id', '$job_vehicle_mileage','$job_description');";
        $con->query($sql);
        return $con->insert_id;

    }

    public function getAllPendingJobs()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT j.job_id, j.job_vehicle_id, c.cus_name, vmodel.vehicle_model_name, vmake.vehicle_make_name FROM job j, customer c, vehicle_model vmodel, vehicle_make vmake WHERE j.job_status = 0 AND j.job_cus_id=c.cus_id AND j.job_vehicle_model_id=vmodel.vehicle_model_id AND j.job_vehicle_make_id=vmake.vehicle_make_id;";
        return $con->query($sql);
    }
}
