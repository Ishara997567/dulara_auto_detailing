<?php include '../model/job_model.php';

$jobObj = new Job();



$searchTerm = $_GET['term'];
$vn_result = $jobObj->getVehicleName($searchTerm);

$data = array();
while ($vn_row = $vn_result->fetch_assoc())
{
    $data[] = $vn_row['cus_vehicle_no'];
}
echo json_encode($data);
