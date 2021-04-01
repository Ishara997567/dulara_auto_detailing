<?php
include '../model/customer_model.php';
$cusObj = new Customer();

$customer_name = $_GET["term"];
$result =  $cusObj->getCustomerName($customer_name);

$data = array();

while($r = $result->fetch_assoc())
{
    $data[] = $r["cus_name"];
}

echo json_encode($data);
