<?php include '../model/inventory_model.php';

$inventoryObj = new Inventory();

if($_REQUEST["status"])
{
    $status = $_REQUEST["status"];

    switch($status)
    {
        case "add_item":

            $item_name = $_POST["item_name"];
            $mfd_code = $_POST["mfd_code"];
            $mfd_name = $_POST["mfd_name"];
            $supplier = $_POST["supplier"];
            $item_category = $_POST["item_category"];
            $item_size = $_POST["item_size"];
            $rop = $_POST["rop"];
            $order_qty = $_POST["order_qty"];
            $lt = $_POST["lt"];
            $item_description = $_POST["item_description"];
            $p_unit_price = $_POST["p_unit_price"];
            $s_unit_price = $_POST["s_unit_price"];
            $item_discount = $_POST["item_discount"];
            $handling_charges = $_POST["handling_charges"];
            $vat_rate = $_POST["vat_rate"];
            $location = $_POST["location"];

            $rows_affected = $inventoryObj->addItem($item_name, $mfd_code, $mfd_name, $supplier, $item_category, $item_size,$rop, $order_qty ,$lt ,$item_description, $p_unit_price, $s_unit_price, $item_discount, $handling_charges, $vat_rate, $location);


            if($rows_affected > 0)
            {
                $msg = base64_encode("New Item Created Successfully!");
                ?>
                <script>window.location = "../view/inventory-management.php?success_message=<?php echo $msg; ?>";</script>

                <?php

            }
            else
            {
                $msg = base64_encode("New Item Failed to Created!");
                ?>
                <script>window.location = "../view/inventory-management.php?error_message=<?php echo $msg; ?>";</script>

                <?php
            }

            break;

        case "create_item_size":

            $item_size_name = $_POST["item_size_name"];
            $item_size_description = $_POST["item_size_description"];

            $rows_affected = $inventoryObj->createItemSize($item_size_name, $item_size_description);

            if($rows_affected > 0)
            {
                $msg = base64_encode("New Item Size Created Successfully!");
                ?>
                <script>window.location = "../view/inventory-management.php?success_message=<?php echo $msg; ?>";</script>

                <?php

            }
        else
            {
                $msg = base64_encode("New Item Size Failed to Created!");
                ?>
                <script>window.location = "../view/inventory-management.php?error_message=<?php echo $msg; ?>";</script>

                <?php
            }

            break;

        case "create_category":
            $item_cat_name = $_POST["item_cat_name"];
            $item_cat_description = $_POST["item_cat_description"];

            $rows_affected = $inventoryObj->createCategory($item_cat_name, $item_cat_description);

            if($rows_affected > 0)
            {
                $msg = base64_encode("New Item Category Created Successfully!");
                ?>
                <script>window.location = "../view/inventory-management.php?success_message=<?php echo $msg; ?>";</script>

                <?php

            }
            else
            {
                $msg = base64_encode("New Item Category Failed to Created!");
                ?>
                <script>window.location = "../view/inventory-management.php?error_message=<?php echo $msg; ?>";</script>

                <?php
            }

            break;
    }
}