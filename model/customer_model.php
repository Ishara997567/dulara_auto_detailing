<?php include_once '../commons/DbConnection.php';

$dbConnection = new DbConnection();

class Customer
{
    public function addCustomer($cus_name, $cus_add_l1, $cus_add_l2, $cus_add_l3, $cus_add_l4, $cus_cn1, $cus_cn2, $cus_email)
    {
        $con = $GLOBALS["conn"];
        $sql = "INSERT INTO customer (cus_name, cus_add_l1, cus_add_l2, cus_add_l3, cus_add_l4, cus_cn1, cus_cn2, cus_email) VALUES ('$cus_name', '$cus_add_l1', '$cus_add_l2', '$cus_add_l3', '$cus_add_l4', '$cus_cn1', '$cus_cn2', '$cus_email')";
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

}
