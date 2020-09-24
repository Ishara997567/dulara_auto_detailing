<?php include '../model/service_model.php';

$serviceObj = new Service();

$search_term = $_GET['term'];
$service_name_result = $serviceObj->getServiceBySearch($search_term);

$data = array();
while($service_name_row = $service_name_result->fetch_assoc())
{
    $data[] = $service_name_row['service_name'];
}

echo json_encode($data);
