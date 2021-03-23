<?php include_once '../commons/DbConnection.php';

$dbConnection = new DbConnection();

class Customer
{
    public function storeCustomerMessage($m_heading, $message, $m_type_s, $m_to_whom_s, $specific_customer_names_s, $when_s)
    {
        $con = $GLOBALS["conn"];
        $sql = "INSERT INTO customer_feedback_message (cfm_heading, cfm_message, cfm_type, cfm_to_whom, cfm_specific_customers, cfm_when) VALUES ('$m_heading', '$message', '$m_type_s', '$m_to_whom_s', '$specific_customer_names_s', '$when_s');";

        $con->query($sql);
        return $con->insert_id;
    }

    public function getCustomerName($term)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM customer WHERE cus_name LIKE '%{$term}%';";
        return $con->query($sql);
    }

    public function addCustomer($cus_name,$cus_vehicle, $cus_add_l1, $cus_add_l2, $cus_add_l3, $cus_add_l4, $cus_cn1, $cus_cn2, $cus_email)
    {
        $con = $GLOBALS["conn"];
        $sql = "INSERT INTO customer (cus_name, cus_vehicle_no, cus_add_l1, cus_add_l2, cus_add_l3, cus_add_l4, cus_cn1, cus_cn2, cus_email) VALUES ('$cus_name', '$cus_vehicle','$cus_add_l1', '$cus_add_l2', '$cus_add_l3', '$cus_add_l4', '$cus_cn1', '$cus_cn2', '$cus_email')";
        $con->query($sql);
        return $con->insert_id;
    }

    public function getAllCustomerInfo()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM customer;";
        return $con->query($sql);
    }

    public function getCustomerById($cus_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM customer WHERE cus_id='$cus_id';";
        return $con->query($sql);
    }

    //Updating Customer Information
        //cus name
    public function updateCusName($cus_id, $cus_name)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE customer SET cus_name= '$cus_name' WHERE cus_id='$cus_id';";
        $con->query($sql);
    }
        //cus home
    public function updateHomeNo($cus_id, $home_no)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE customer SET cus_add_l1= '$home_no' WHERE cus_id='$cus_id';";
        $con->query($sql);
    }

    //cus street
    public function updateStreet($cus_id, $street)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE customer SET cus_add_l2= '$street' WHERE cus_id='$cus_id';";
        $con->query($sql);
    }

    //city
    public function updateCity($cus_id, $city)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE customer SET cus_add_l3= '$city' WHERE cus_id='$cus_id';";
        $con->query($sql);
    }

    //state
    public function updateState($cus_id, $state)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE customer SET cus_add_l4= '$state' WHERE cus_id='$cus_id';";
        $con->query($sql);
    }

    //cn1
    public function updateCN1($cus_id, $cn1)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE customer SET cus_cn1= '$cn1' WHERE cus_id='$cus_id';";
        $con->query($sql);
    }

    //cn2
    public function updateCN2($cus_id, $cn2)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE customer SET cus_cn2= '$cn2' WHERE cus_id='$cus_id';";
        $con->query($sql);
    }

    //email
    public function updateEmail($cus_id, $email)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE customer SET cus_email= '$email' WHERE cus_id='$cus_id';";
        $con->query($sql);
    }

    //vehicle make
    public function updateVehicleMake($cus_id, $vm)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE job SET job_vehicle_make_id= '$vm' WHERE job_cus_id='$cus_id';";
        $con->query($sql);
    }

    //vehicle model
    public function updateVehicleModel($cus_id, $vm)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE job SET job_vehicle_model_id= '$vm' WHERE job_cus_id='$cus_id';";
        $con->query($sql);
    }

    //vehicle odo
    public function updateVehicleODO($cus_id, $odo)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE job SET job_vehicle_odo= '$odo' WHERE job_cus_id='$cus_id';";
        $con->query($sql);
    }

    //vehicle mileage
    public function updateVehicleMileage($cus_id, $mileage)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE job SET job_vehicle_mileage= '$mileage' WHERE job_cus_id='$cus_id';";
        $con->query($sql);
    }

    public function selectByVehicleNo($vehicle_no)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM customer WHERE cus_vehicle_no = '$vehicle_no';";
        return $con->query($sql);
    }

    public function getAllCustomerRelatedData($cus_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT c.*, vmake.vehicle_make_name, vmodel.vehicle_model_name, j.job_vehicle_mileage, j.job_vehicle_odo FROM customer c, vehicle_make vmake, vehicle_model vmodel, job j WHERE c.cus_id = '$cus_id' AND c.cus_id = j.job_cus_id AND j.job_vehicle_make_id = vmake.vehicle_make_id AND j.job_vehicle_model_id = vmodel.vehicle_model_id LIMIT 1;";
        return $con->query($sql);
    }

    public function getCustomerServices($cus_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT s.service_id, s.service_name, sc.service_cat_name, j.job_finish_time FROM customer c, service s, job j, invoice i, invoice_service iserv, service_category sc WHERE c.cus_id = '$cus_id' AND j.job_cus_id = c.cus_id AND j.job_id = i.job_id AND i.invoice_id = iserv.invoice_id AND s.service_id = iserv.invoice_service_id AND s.service_cat_id = sc.service_cat_id;";
        return $con->query($sql);
    }

}
