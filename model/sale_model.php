<?php include_once '../commons/DbConnection.php';

$dbConnection = new DbConnection();

class Sale{
    public function addSupplier($sup_name, $sup_home_no, $sup_s_name, $sup_city, $sup_state, $sup_cn1, $sup_cn2, $sup_email, $sup_description){
        $con = $GLOBALS['conn'];
        $sql = "INSERT INTO supplier (sup_name, sup_address_home, sup_address_street, sup_address_city, sup_address_state, sup_cn1, sup_cn2, sup_email, sup_description) VALUES ('$sup_name', '$sup_home_no', '$sup_s_name', '$sup_city', '$sup_state', '$sup_cn1', '$sup_cn2', '$sup_email', '$sup_description');";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function getAllSuppliers()
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT * FROM supplier;";
        return $con->query($sql);
    }

    public function getAllItems($term)
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT * FROM item WHERE item_name LIKE '%$term%';";
        return $con->query($sql);
    }

    public  function getItemDetailsByName($item_name)
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT * FROM item WHERE item_name = '$item_name';";
        return $con->query($sql);
    }

    public function addPO($sup_id, $po_amount)
    {
        $con = $GLOBALS['conn'];
        $sql = "INSERT INTO sale_purchase_order (po_amount, po_supplier_id) VALUES ('$po_amount', '$sup_id');";
        $con->query($sql);
        return $con->insert_id;
    }

    public function addPOItems($poi_item_id, $poi_item_price, $poi_item_qty, $poi_item_amount, $poi_po_id)
    {
        $con = $GLOBALS['conn'];
        $sql = "INSERT INTO sale_purchase_order_item (poi_item_id, poi_item_price, poi_item_qty, poi_item_amount, poi_po_id) VALUES ('$poi_item_id','$poi_item_price','$poi_item_qty','$poi_item_amount','$poi_po_id');";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function getPOId()
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT MAX(po_id) as pid FROM sale_purchase_order;";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        return $row["pid"]+1;
    }

    public function getPO()
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT po.*, s.sup_name FROM sale_purchase_order po, supplier s WHERE po.po_supplier_id = s.sup_id ORDER BY po_id DESC;";
        return $con->query($sql);
    }

    public function getPOSupplier($grn_po_id)
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT po.*, s.sup_name FROM sale_purchase_order po, supplier s WHERE po.po_supplier_id = s.sup_id AND po.po_id = '$grn_po_id';";
        return $con->query($sql);

    }

    public function grnPOItems($po_id)
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT * FROM sale_purchase_order_item, item WHERE poi_po_id = '$po_id' AND sale_purchase_order_item.poi_item_id = item_id;";
        return $con->query($sql);
    }

    public function addGRN($po_id, $grn_total_amount)
    {
        $con = $GLOBALS['conn'];
        $sql = "INSERT INTO sale_grn (sgrn_po_id, sgrn_total_amount) VALUES ('$po_id','$grn_total_amount');";
        $con->query($sql);
        return $con->insert_id;
    }

    public function addGRNItems($item_id, $p_price, $qty, $amount, $grn_id)
    {
        $con = $GLOBALS['conn'];
        $sql = "INSERT INTO sale_grn_item (sgi_item_id, sgi_p_price, sgi_qty, sgi_amount, sgi_grn_id) VALUES ('$item_id', '$p_price', '$qty', '$amount', '$grn_id');";
        $con->query($sql);

    }
    public function getGRNId()
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT MAX(sgrn_id) as grn_id FROM sale_grn;";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        return $row["grn_id"]+1;
    }

    public function getPOById($po_id)
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT p.po_id, s.sup_name, p.po_amount, p.po_created_at FROM sale_purchase_order p, supplier s WHERE p.po_id = '$po_id' AND p.po_supplier_id = s.sup_id;";
        return $con->query($sql);
    }

    public function getPOItemsByPOId($po_id)
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT poi.poi_item_id, i.item_name, poi_item_price, poi.poi_item_qty, poi.poi_item_amount FROM sale_purchase_order_item poi, item i WHERE poi.poi_po_id = '$po_id' AND poi.poi_item_id = i.item_id;";
        return $con->query($sql);
    }

    public function getPOByDateRange($d_start, $d_end)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT po.*, s.sup_name FROM sale_purchase_order po, supplier s WHERE po.po_supplier_id = s.sup_id AND po.po_created_at BETWEEN '$d_start' AND '$d_end';";
        return $con->query($sql);
    }
}