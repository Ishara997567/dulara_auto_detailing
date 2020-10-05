<?php include '../model/sale_model.php';
$saleObj = new Sale();

if(isset($_GET["term"]))
{
    $term = $_GET["term"];

    $itemResult = $saleObj->getAllItems($term);
    $data = array();
    while($r=$itemResult->fetch_assoc()) {
        $data[] = $r['item_name'];
    }

    echo json_encode($data);
}