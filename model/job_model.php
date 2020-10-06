<?php include_once '../commons/DbConnection.php';

$dbConnnection = new DbConnection();

class Job
{
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

    public function createJob($job_vehicle_id, $job_cus_id, $job_vehicle_make_id, $job_vehicle_model_id, $job_vehicle_odo, $job_vehicle_mileage, $job_description)
    {
        $con = $GLOBALS["conn"];
        $sql = "INSERT INTO job (job_vehicle_id, job_cus_id, job_vehicle_make_id, job_vehicle_model_id, job_vehicle_odo, job_vehicle_mileage, job_description) VALUES ('$job_vehicle_id', '$job_cus_id', '$job_vehicle_make_id', '$job_vehicle_model_id','$job_vehicle_odo',  '$job_vehicle_mileage','$job_description');";
        $con->query($sql);
        return $con->insert_id;

    }

    public function getAllPendingJobs()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT j.job_id, j.job_vehicle_id, j.job_vehicle_odo, j.job_vehicle_mileage, c.cus_name, c.cus_cn1, c.cus_cn2,vmodel.vehicle_model_name, vmake.vehicle_make_name FROM job j, customer c, vehicle_model vmodel, vehicle_make vmake WHERE j.job_status = 0 AND j.job_cus_id=c.cus_id AND j.job_vehicle_model_id=vmodel.vehicle_model_id AND j.job_vehicle_make_id=vmake.vehicle_make_id;";
        return $con->query($sql);

    }

    public function getAllCompletedJobs()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT j.job_id, j.job_vehicle_id, j.job_vehicle_odo, j.job_vehicle_mileage, c.cus_name, c.cus_cn1, c.cus_cn2,vmodel.vehicle_model_name, vmake.vehicle_make_name FROM job j, customer c, vehicle_model vmodel, vehicle_make vmake WHERE j.job_status = 1 AND j.job_cus_id=c.cus_id AND j.job_vehicle_model_id=vmodel.vehicle_model_id AND j.job_vehicle_make_id=vmake.vehicle_make_id;";
        return $con->query($sql);

    }

    public function getPendingJobsById($job_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT j.job_id, j.job_vehicle_id, j.job_vehicle_odo, j.job_vehicle_mileage, j.job_start_time,c.cus_name, c.cus_cn1, c.cus_cn2,vmodel.vehicle_model_name, vmake.vehicle_make_name FROM job j, customer c, vehicle_model vmodel, vehicle_make vmake WHERE j.job_status = 0 AND j.job_cus_id=c.cus_id AND j.job_vehicle_model_id=vmodel.vehicle_model_id AND j.job_vehicle_make_id=vmake.vehicle_make_id AND j.job_id='$job_id';";
        return $con->query($sql);
    }

    public function changeJobStatus($job_id, $job_status)
    {
        $now = new DateTime(null, new DateTimeZone('Asia/Colombo'));
        $mysql_timestamp = $now->format('Y-m-d H:i:s');

        $con = $GLOBALS["conn"];
        $sql = "UPDATE job SET job_status='$job_status', job_finish_time='$mysql_timestamp' WHERE job_id='$job_id'";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function changeJobStatusToPendingAgain($job_id)
    {

        $con = $GLOBALS["conn"];
        $sql = "UPDATE job SET job_status=0, job_finish_time=null WHERE job_id='$job_id'";
        $con->query($sql);
    }


    public function getCompletedJobsById($job_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT j.job_id, j.job_vehicle_id, j.job_vehicle_odo, j.job_vehicle_mileage, j.job_start_time, j.job_finish_time, c.cus_name, c.cus_cn1, c.cus_cn2,vmodel.vehicle_model_name, vmake.vehicle_make_name FROM job j, customer c, vehicle_model vmodel, vehicle_make vmake WHERE j.job_status = 1 AND j.job_cus_id=c.cus_id AND j.job_vehicle_model_id=vmodel.vehicle_model_id AND j.job_vehicle_make_id=vmake.vehicle_make_id AND j.job_id='$job_id';";
        return $con->query($sql);
    }

    //Making the Invoice
        //adding to invoice table
    public function addInvoice($job_id, $tot_item_amount, $tot_service_amount, $invoice_amount)
    {
        $con = $GLOBALS["conn"];
        $sql = "INSERT INTO invoice (job_id, invoice_item_total_amount, invoice_service_total_amount, invoice_amount) VALUES ('$job_id', '$tot_item_amount', '$tot_service_amount', '$invoice_amount');";
        $con->query($sql);
        return $con->insert_id;
    }

    //adding to invoice_item table
    public function addInvoiceItems($item_id, $item_qty, $item_price, $item_amount, $invoice_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "INSERT INTO invoice_item (invoice_item_id, invoice_item_qty, invoice_item_price, invoice_item_amount, invoice_id) VALUES ('$item_id','$item_qty','$item_price','$item_amount','$invoice_id');";
        $con->query($sql);
    }

    //adding to invoice_service table
    public function addInvoiceServices($s_id, $s_price, $invoice_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "INSERT INTO invoice_service (invoice_service_id, invoice_service_price, invoice_id) VALUES ('$s_id','$s_price','$invoice_id');";
        $con->query($sql);
    }

    public function getInvoicedJobs()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT i.invoice_id, i.invoice_amount, i.job_id, j.job_vehicle_id, c.cus_name, mk.vehicle_make_name, ml.vehicle_model_name, j.job_vehicle_odo, j.job_vehicle_mileage FROM invoice i, job j, customer c, vehicle_make mk, vehicle_model ml WHERE i.job_id = j.job_id AND j.job_cus_id=c.cus_id AND j.job_vehicle_model_id=ml.vehicle_model_id AND j.job_vehicle_make_id = mk.vehicle_make_id;";
        return $con->query($sql);
    }

    public function changeJobStatusToInvoiced($job_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE job SET job_status=10 WHERE job_id='$job_id'";
        $con->query($sql);
    }

    public function getJobByInvoiceId($invoice_id)
    {
        $con = $GLOBALS['conn'];

        $sql = "SELECT i.invoice_amount, i.invoice_item_total_amount, i.invoice_service_total_amount, i.job_id, i.invoice_created_at, j.job_vehicle_id, j.job_start_time, j.job_finish_time, c.cus_name, c.cus_cn1, c.cus_cn2 ,mk.vehicle_make_name, ml.vehicle_model_name, j.job_vehicle_odo, j.job_vehicle_mileage FROM invoice i, job j, customer c, vehicle_make mk, vehicle_model ml WHERE i.invoice_id='$invoice_id' AND i.job_id = j.job_id AND j.job_cus_id=c.cus_id AND j.job_vehicle_model_id=ml.vehicle_model_id AND j.job_vehicle_make_id = mk.vehicle_make_id;";

        return $con->query($sql);
    }

    public function getInvoiceItemsByInvoiceId($invoice_id)
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT iitem.invoice_item_id, i.item_name, iitem.invoice_item_price, iitem.invoice_item_qty, iitem.invoice_item_amount FROM invoice_item iitem, item i WHERE invoice_id = '$invoice_id' AND iitem.invoice_item_id = i.item_id;;";
        return $con->query($sql);

    }

    public function getInvoiceServicesByInvoiceId($invoice_id)
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT iserv.invoice_service_id, s.service_name, iserv.invoice_service_price FROM invoice_service iserv, service s WHERE invoice_id = '$invoice_id' AND iserv.invoice_service_id = s.service_id;";
        return $con->query($sql);

    }

    public function getAllCompletedJobCount()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT COUNT(job_id) AS c FROM job WHERE job_status = 10;";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        return $row["c"];
    }
    public function getTodayCompletedJobCount()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT COUNT(job_id) AS c FROM job WHERE job_status = 10 AND DATE(job_finish_time) = CURDATE();";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        return $row["c"];
    }


}
