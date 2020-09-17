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

    public function getItemByCategoryAndSearch($cat_id)
    {
        $con=$GLOBALS["conn"];
        $sql = "SELECT item_id, item_name FROM item WHERE item_category_id = '$cat_id'";
        return $con->query($sql);
    }

    public function addStockLevel($stk_lvl_item_id, $stk_lvl_rol, $stk_lvl_eoq, $stk_lvl_min, $stk_lvl_max, $stk_lvl_lt, $stk_lvl_danger, $stk_lvl_buffer)
    {
        $con=$GLOBALS["conn"];
        $sql = "INSERT INTO item_stock_level (stk_lvl_item_id, stk_lvl_rol, stk_lvl_eoq, stk_lvl_min, stk_lvl_max, stk_lvl_lt, stk_lvl_danger, stk_lvl_buffer) VALUES ('$stk_lvl_item_id','$stk_lvl_rol','$stk_lvl_eoq','$stk_lvl_min','$stk_lvl_max','$stk_lvl_lt','$stk_lvl_danger','$stk_lvl_buffer');";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function addStock($item_id, $item_stock_barcode, $item_stock_manu_date, $item_stock_date, $item_stock_exp_date, $item_stock_qty)
    {
        $con=$GLOBALS["conn"];
        $sql = "INSERT INTO item_stock (item_id, item_stock_barcode, item_stock_manu_date, item_stock_date, item_stock_exp_date, item_stock_qty) VALUES ('$item_id', '$item_stock_barcode', '$item_stock_manu_date', '$item_stock_date', '$item_stock_exp_date', '$item_stock_qty');";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function getStockQty($stock_item_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT SUM(item_stock_qty) as tot_stock FROM item_stock WHERE item_id = '$stock_item_id';";
        $tot_result = $con->query($sql);
        $tot_row = $tot_result->fetch_assoc();

        if($tot_row["tot_stock"] === null)
            $tot_row["tot_stock"]=0;
        return $tot_row["tot_stock"];
    }

    public function getStockLevel($stk_lvl_item_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM item_stock_level WHERE stk_lvl_item_id= '$stk_lvl_item_id';";
        return $con->query($sql);
    }

    //Update Item Details

        //Item Name
    public function updateItemName($item_id, $item_name)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE item SET item_name='$item_name' WHERE item_id='$item_id';";
        $con->query($sql);
    }
        //Item Manu Code
    public function updateItemManuCode($item_id, $item_manu_code)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE item SET item_manu_code='$item_manu_code' WHERE item_id='$item_id';";
        $con->query($sql);
    }

    //Item Manu Name
    public function updateItemManuName($item_id, $item_manu_name)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE item SET item_manu_name='$item_manu_name' WHERE item_id='$item_id';";
        $con->query($sql);
    }

    //sup id
    public function updateSupId($item_id, $sup_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE item SET item_supplier_id='$sup_id' WHERE item_id='$item_id';";
        $con->query($sql);
    }

    //cat id
    public function updateCatId($item_id, $cat_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE item SET item_category_id='$cat_id' WHERE item_id='$item_id';";
        $con->query($sql);
    }

    //size id
    public function updateSizeId($item_id, $size_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE item SET item_size_id='$size_id' WHERE item_id='$item_id';";
        $con->query($sql);
    }

    //p unit price
    public function updatePurchaseUPrice($item_id, $price)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE item SET item_purchase_uprice='$price' WHERE item_id='$item_id';";
        $con->query($sql);
    }

    //s unit price
    public function updateSaleUPrice($item_id, $price)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE item SET item_sale_uprice='$price' WHERE item_id='$item_id';";
        $con->query($sql);
    }

    //Item Discount
    public function updateDiscount($item_id, $price)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE item SET item_discount='$price' WHERE item_id='$item_id';";
        $con->query($sql);
    }



    //Item handling
    public function updateHandling($item_id, $price)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE item SET item_handling='$price' WHERE item_id='$item_id';";
        $con->query($sql);
    }



    //Item vat
    public function updateVat($item_id, $rate)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE item SET item_vat_rate='$rate' WHERE item_id='$item_id';";
        $con->query($sql);
    }


    //Item vat
    public function updateLocation($item_id, $location)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE item SET item_location='$location' WHERE item_id='$item_id';";
        $con->query($sql);
    }







    //End of Update Item Details


}