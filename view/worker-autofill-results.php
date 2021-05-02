<?php include '../model/employee_model.php';

$employeeObj = new Employee();



$searchTerm = $_GET['term'];
$emp_result = $employeeObj->getEmployeeName($searchTerm);

$data = array();
while ($emp_row = $emp_result->fetch_assoc())
{
    $data[] = $emp_row['emp_name'];
}
echo json_encode($data);
