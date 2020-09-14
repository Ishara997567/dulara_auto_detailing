<?php include_once '../commons/DbConnection.php';

$dbConnection = new DbConnection();

class Inventory
{
    public function addItem($item_name, $mfd_code, $mfd_name, $supplier, $item_category, $item_size, $rop, $order_qty ,$lt ,$item_description, $p_unit_price, $s_unit_price, $item_discount, $handling_charges, $vat_rate, $location)
    {

        $con = $GLOBALS["conn"];

        $sql = "INSERT INTO item (item_name, item_manu_code, item_manu_name, item_supplier_id, item_reorder_level, item_order_qty, item_lead_time, item_sale_uprice, item_purchase_uprice, item_handling, item_discount, item_vat_rate, item_category_id, item_size_id, item_location, item_description) VALUES('$item_name', '$mfd_code', '$mfd_name', '$supplier','$rop', '$order_qty' ,'$lt' , '$s_unit_price', '$p_unit_price','$handling_charges','$item_discount', '$vat_rate','$item_category','$item_size', '$location','$item_description');";


        $con->query($sql);
        return $con->affected_rows;


    }

    public function createItemSize($item_size_name, $item_size_description){
        $con = $GLOBALS["conn"];
        $sql = "INSERT INTO item_size (item_size_name, item_size_description) VALUES ('$item_size_name','$item_size_description');";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function createCategory($item_cat_name, $item_cat_description)
    {
        $con = $GLOBALS["conn"];
        $sql = "INSERT INTO item_category (item_cat_name, item_cat_description) VALUES ('$item_cat_name','$item_cat_description');";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function getAllCategories(){
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM item_category;";
        return $con->query($sql);
    }

    public function getAllSizes(){
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM item_size;";
        return $con->query($sql);
    }
}