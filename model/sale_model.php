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
        $sql = "SELECT poi.poi_item_id, i.item_name, poi.poi_item_price, poi.poi_item_qty, poi.poi_item_amount FROM sale_purchase_order_item poi, item i WHERE poi.poi_po_id = '$po_id' AND poi.poi_item_id = i.item_id;";
        return $con->query($sql);
    }

    public function getPOByDateRange($d_start, $d_end)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT po.*, s.sup_name FROM sale_purchase_order po, supplier s WHERE po.po_supplier_id = s.sup_id AND po.po_created_at BETWEEN '$d_start' AND '$d_end';";
        return $con->query($sql);
    }

    public function getGRN()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT g.sgrn_id, p.po_id, g.sgrn_total_amount, p.po_amount, s.sup_name, g.sgrn_created_at FROM sale_grn g, sale_purchase_order p, supplier s WHERE g.sgrn_po_id = p.po_id AND p.po_supplier_id = s.sup_id;";
        return $con->query($sql);
    }

    public function getGRNById($grn_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT g.sgrn_id, p.po_id, g.sgrn_total_amount, p.po_amount, s.sup_name, g.sgrn_created_at FROM sale_grn g, sale_purchase_order p, supplier s WHERE g.sgrn_po_id = p.po_id AND p.po_supplier_id = s.sup_id AND g.sgrn_id = '$grn_id';";
        return $con->query($sql);
    }

    public function getGRNItemsByGRNId($grn_id)
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT gi.sgi_item_id, i.item_name, pi.poi_item_qty, pi.poi_item_price, pi.poi_item_amount, gi.sgi_qty, gi.sgi_p_price, gi.sgi_amount FROM  sale_purchase_order p, sale_purchase_order_item pi, sale_grn g, sale_grn_item gi, item i WHERE g.sgrn_id = gi.sgi_grn_id AND p.po_id = pi.poi_po_id AND gi.sgi_item_id = pi.poi_item_id AND g.sgrn_po_id = p.po_id AND i.item_id = gi.sgi_item_id AND g.sgrn_id = '$grn_id';";
        return $con->query($sql);
    }

    public function getGRNByDateRange($d_start, $d_end)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT g.sgrn_id, p.po_id, g.sgrn_total_amount, p.po_amount, s.sup_name, g.sgrn_created_at FROM sale_grn g, sale_purchase_order p, supplier s WHERE g.sgrn_po_id = p.po_id AND p.po_supplier_id = s.sup_id AND g.sgrn_created_at BETWEEN '$d_start' AND '$d_end';";
        return $con->query($sql);
    }

    public function getGRNTopItems()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT g.sgi_item_id, i.item_name, g.sgi_qty FROM sale_grn_item g, item i WHERE g.sgi_item_id = i.item_id ORDER BY sgi_qty DESC LIMIT 5;";
        return $con->query($sql);
    }

    public function getTotalPurchaseAmount()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT SUM(po_amount) as tot FROM sale_purchase_order;";
        $result = $con->query($sql);
        $row =  $result->fetch_assoc();
        return $row["tot"];
    }

    public function getTotalGRNAmount()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT SUM(sgrn_total_amount) as tot FROM sale_grn;";
        $result = $con->query($sql);
        $row =  $result->fetch_assoc();
        return $row["tot"];
    }

    public function getSupplierById($sup_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM supplier WHERE sup_id = '$sup_id';";
        return $con->query($sql);
    }

    //Updating Supplier details
    public function updateSupplierName($sup_id, $sup_name)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE supplier SET sup_name = '$sup_name' WHERE sup_id = '$sup_id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    //Updating Supplier Home No
    public function updateSupplierHomeNo($sup_id, $home_no)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE supplier SET sup_address_home = '$home_no' WHERE sup_id = '$sup_id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    //Updating Supplier Street
    public function updateSupplierStreet($sup_id, $street)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE supplier SET sup_address_street = '$street' WHERE sup_id = '$sup_id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    //Updating Supplier City
    public function updateSupplierCity($sup_id, $city)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE supplier SET sup_address_city = '$city' WHERE sup_id = '$sup_id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    //Updating Supplier State
    public function updateSupplierState($sup_id, $state)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE supplier SET sup_address_state = '$state' WHERE sup_id = '$sup_id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    //Updating Supplier Contact No 1
    public function updateSupplierCN1($sup_id, $cn1)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE supplier SET sup_cn1 = '$cn1' WHERE sup_id = '$sup_id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    //Updating Supplier Contact No 2
    public function updateSupplierCN2($sup_id, $cn2)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE supplier SET sup_cn2 = '$cn2' WHERE sup_id = '$sup_id';";
        $con->query($sql);
        return $con->affected_rows;
    }


    //Updating Supplier Email
    public function updateSupplierEmail($sup_id, $email)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE supplier SET sup_email = '$email' WHERE sup_id = '$sup_id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function getTotalSale()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT MONTHNAME(invoice_created_at) as smonth, SUM(invoice_amount) as sale, YEAR(invoice_created_at) as year FROM invoice WHERE YEAR(invoice_created_at) = YEAR(CURDATE()) GROUP BY smonth ORDER BY smonth DESC;";
        return $con->query($sql);
    }

    public function getTotalExpense()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT MONTHNAME(sgrn_created_at) as emonth, SUM(sgrn_total_amount) as expense, YEAR(sgrn_created_at) as year FROM sale_grn WHERE YEAR(sgrn_created_at) = YEAR(CURDATE()) GROUP BY emonth ORDER BY emonth DESC;";
        return $con->query($sql);
    }

    public function getSupplierCount()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT COUNT(sup_id) as c FROM supplier;";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        return $row['c'];
    }

}