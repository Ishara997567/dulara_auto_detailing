<?php include '../model/inventory_model.php';

$inventoryObj = new Inventory();

$search_term = $_GET['term'];
$item_name_result = $inventoryObj->getItemBySearch($search_term);

$data = array();
while($item_name_row = $item_name_result->fetch_assoc())
{
    $data[] = $item_name_row['item_name'];
}

echo json_encode($data);

