<?php include_once '../commons/DbConnection.php';

$dbConnection = new DbConnection();

class Inventory
{
    public function addItem($item_name, $mfd_code, $mfd_name, $supplier, $item_category, $item_size ,$item_description, $p_unit_price, $s_unit_price, $item_discount, $handling_charges, $vat_rate, $location)
    {

        $con = $GLOBALS["conn"];

        $sql = "INSERT INTO item (item_name, item_manu_code, item_manu_name, item_supplier_id, item_sale_uprice, item_purchase_uprice, item_handling, item_discount, item_vat_rate, item_category_id, item_size_id, item_location, item_description) VALUES('$item_name', '$mfd_code', '$mfd_name', '$supplier', '$s_unit_price', '$p_unit_price','$handling_charges','$item_discount', '$vat_rate','$item_category','$item_size', '$location','$item_description');";


        $con->query($sql);
        return $con->affected_rows;


    }

    public function createItemSize($item_size_name, $item_size_description)
    {
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

    public function changeCategory($changed_cat_id, $changed_cat_name)
    {
        $now = new DateTime(null, new DateTimeZone('Asia/Colombo'));
        $mysql_timestamp = $now->format('Y-m-d H:i:s');

        $con = $GLOBALS["conn"];
        $sql = "UPDATE item_category SET item_cat_name = '$changed_cat_name', item_cat_created_at = '$mysql_timestamp' WHERE item_cat_id = '$changed_cat_id'; ";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function changeItemSize($item_size_id, $item_size_name)
    {

        $now = new DateTime(null, new DateTimeZone('Asia/Colombo'));
        $mysql_timestamp = $now->format('Y-m-d H:i:s');

        $con = $GLOBALS["conn"];
        $sql = "UPDATE item_size SET item_size_name = '$item_size_name', item_size_created_at = '$mysql_timestamp' WHERE item_size_id = '$item_size_id'; ";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function getSupplierById($sup_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM supplier WHERE sup_id = '$sup_id'";
        return $con->query($sql);
    }

    public function getAllSuppliers()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM supplier;";
        return $con->query($sql);
    }

    public function getCategoryById($cat_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM item_category WHERE item_cat_id = '$cat_id'";
        return $con->query($sql);
    }

    public function getAllItems()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM item;";
        return $con->query($sql);
    }

    public function getItemById($item_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM item WHERE item_id = '$item_id';";
        return $con->query($sql);
    }

    public function getItemSizeById($item_size_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM item_size WHERE item_size_id = '$item_size_id';";
        return $con->query($sql);
    }
}