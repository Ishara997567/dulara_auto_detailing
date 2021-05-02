<?php include "../commons/DbConnection.php";
$dbConnection = new DbConnection();

class Report{
    //report management
    public function getEvenReportModules(){
        $con = $GLOBALS['conn'];
        $sql = "SELECT * FROM report_module WHERE rm_id % 2 = 0;";
        return $con->query($sql);
    }

    public function getOddReportModules(){
        $con = $GLOBALS['conn'];
        $sql = "SELECT * FROM report_module WHERE rm_id % 2 = 1;";
        return $con->query($sql);
    }

    //service_reports

    public function getServiceList(){
        $con = $GLOBALS['conn'];
        $sql = "SELECT s.service_id, s.service_name, s.service_price, sc.service_cat_name, ssc.service_sub_cat_name FROM service s, service_category sc, service_sub_category ssc WHERE s.service_cat_id = sc.service_cat_id AND s.service_sub_cat_id = ssc.service_sub_cat_id ORDER BY s.service_price DESC;";
        return $con->query($sql);

    }

    public function getAllCategories()
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT service_cat_id, service_cat_name FROM service_category;";
        return $con->query($sql);
    }

    public function getServiceByCategoryId($cat_id)
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT s.service_id, s.service_name, s.service_price, sc.service_cat_name, ssc.service_sub_cat_name FROM service s, service_category sc, service_sub_category ssc WHERE s.service_cat_id = sc.service_cat_id AND s.service_sub_cat_id = ssc.service_sub_cat_id AND sc.service_cat_id = '$cat_id' ORDER BY s.service_price DESC;";
        return $con->query($sql);
    }
    //inventory reports

    public function getAllItems()
    {
        $con = $GLOBALS['conn'];

        $sql = "SELECT i.item_id, i.item_name, ic.item_cat_name, isi.item_size_name, i.item_manu_code, i.item_manu_name, s.sup_name, i.item_sale_uprice, i.item_purchase_uprice, i.item_handling, i.item_discount, i.item_vat_rate, i.item_location, i.item_description FROM item i, supplier s, item_category ic, item_size isi WHERE i.item_supplier_id = s.sup_id AND i.item_category_id = ic.item_cat_id AND i.item_size_id = isi.item_size_id;";
        return $con->query($sql);

    }

    public function getAllItemCategories()
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT item_cat_id, item_cat_name FROM item_category;";
        return $con->query($sql);
    }

    public function getAllItemsByCategoryId($cat_id)
    {
        $con = $GLOBALS['conn'];

        $sql = "SELECT i.item_id, i.item_name, ic.item_cat_name, isi.item_size_name, i.item_manu_code, i.item_manu_name, s.sup_name, i.item_sale_uprice, i.item_purchase_uprice, i.item_handling, i.item_discount, i.item_vat_rate, i.item_location, i.item_description FROM item i, supplier s, item_category ic, item_size isi WHERE i.item_supplier_id = s.sup_id AND i.item_category_id = ic.item_cat_id AND i.item_size_id = isi.item_size_id AND i.item_category_id = '$cat_id';";
        return $con->query($sql);
    }

    public function getItemNameByCategoryId($cat_id)
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT item_id, item_name FROM item WHERE item_category_id = '$cat_id';";
        return $con->query($sql);
    }

    public function getStockLevelByItemId($item_id)
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT stk_lvl_rol as 'Re-order Level', stk_lvl_eoq as 'Re-order Quantity', stk_lvl_min as 'Minimum Stock Level', stk_lvl_max as 'Maximum Stock Level', stk_lvl_lt as 'Lead Time', stk_lvl_danger as 'Danger Stock Level', stk_lvl_buffer as 'Buffer Stock Level' FROM item_stock_level WHERE stk_lvl_item_id = '$item_id';";
        return $con->query($sql);
    }

    public function getItemStockQuantity()
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT i.item_id, i.item_name, SUM(stock.item_stock_qty) as quantity, MAX(stock.item_stock_created_at) as stock_last_updated, MAX(stock.item_stock_exp_date) as stock_expiry_date FROM item i, item_stock stock WHERE i.item_id = stock.item_id GROUP BY i.item_id ORDER BY stock_last_updated DESC;";
        return $con->query($sql);
    }

    public function getAllSuppliers()
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT sup_id, sup_name FROM supplier;";
        return $con->query($sql);
    }

    public function getItemBySupplierId($sup_id)
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT i.item_id, i.item_name, ic.item_cat_name, isi.item_size_name, i.item_manu_code, i.item_manu_name, s.sup_name, i.item_sale_uprice, i.item_purchase_uprice, i.item_handling, i.item_discount, i.item_vat_rate, i.item_location, i.item_description FROM item i, supplier s, item_category ic, item_size isi WHERE i.item_supplier_id = s.sup_id AND i.item_category_id = ic.item_cat_id AND i.item_size_id = isi.item_size_id AND i.item_supplier_id = '$sup_id';";
        return $con->query($sql);
    }

    //Job Reports

    public function getCompletedRangedJobs($from, $to)
    {
        $con = $GLOBALS['conn'];

        $sql = "SELECT j.job_id, j.job_vehicle_id, c.cus_name, vmake.vehicle_make_name, vmodel.vehicle_model_name, j.job_vehicle_odo, j.job_vehicle_mileage, j.job_start_time, j.job_finish_time, j.job_description FROM job j, customer c, vehicle_model vmodel, vehicle_make vmake WHERE j.job_cus_id = c.cus_id AND j.job_vehicle_make_id = vmake.vehicle_make_id AND j.job_vehicle_model_id = vmodel.vehicle_model_id AND job_status = 10 AND job_finish_time BETWEEN '$from T 00:00:00' AND '$to T 00:00:00';";

        return $con->query($sql);
    }

    //Sale Reports
    public function getDailyIncome()
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT invoice_id, job_id, invoice_item_total_amount, invoice_service_total_amount, invoice_amount, TIME(invoice_created_at) as created_at FROM invoice WHERE DATE(invoice_created_at) = CURDATE();";
        return $con->query($sql);
    }

    public function getPeriodicalIncome($from, $to)
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT invoice_id, job_id, invoice_item_total_amount, invoice_service_total_amount, invoice_amount, invoice_created_at FROM invoice WHERE DATE(invoice_created_at) BETWEEN '$from' AND '$to';";
        return $con->query($sql);
    }

    public function getSupplierById($sup_id)
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT sup_id as 'Supplier ID', sup_name as 'Supplier Name', sup_cn1 as 'Contact Number 1', sup_cn2 as 'Contact Number 2', sup_email as 'Email Address', CONCAT(sup_address_home,', ',sup_address_street,', ',sup_address_city,', ',sup_address_state) as 'Supplier Address', sup_description as 'Description' FROM supplier WHERE sup_id = '$sup_id';";
        return $con->query($sql);
    }

    //Customer Reports
    public function getAllCustomers()
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT * FROM customer;";
        return $con->query($sql);
    }

    public function getCustomerByVehicleNo($vno)
    {
        $con = $GLOBALS['conn'];
        $sql = "SELECT cus_id as 'Customer ID', cus_name as 'Customer Name', cus_vehicle_no as 'Vehicle Number', cus_add_l1 as 'Address Line 1', cus_add_l2 as 'Address Line 2',cus_add_l3 as 'Address Line 3',cus_add_l4 as 'Address Line 4', cus_cn1 as 'Contact No 1', cus_cn2 as 'Contact No 1', cus_email as 'Email' FROM customer WHERE cus_vehicle_no = '$vno' LIMIT 1;";
        return $con->query($sql);
    }

    public function getAllFeedbacks()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT f.feedback_id, c.cus_name, c.cus_vehicle_no, i.invoice_id, f.feedback_star_rating, f.feedback_review, f.feedback_is_liked, f.feedback_is_replied, f.feedback_reply FROM customer_feedback f, customer c, job j, invoice i WHERE f.feedback_cus_vno = c.cus_vehicle_no AND j.job_vehicle_id = f.feedback_cus_vno AND i.job_id = j.job_id GROUP BY feedback_id;";
        return $con->query($sql);
    }

    public function getLoyaltyNameByPoints($tot_points)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT loyalty_name FROM customer_loyalty WHERE loyalty_points <= '$tot_points' ORDER BY loyalty_points DESC LIMIT 1;";
        return $con->query($sql);
    }

    public function getAllLoyaltyEnrollments()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT c.cus_id, c.cus_name, SUM(cp.cp_points) as tot_points FROM customer_point_allocation cpa, customer c, customer_points cp WHERE cpa.cpa_cus_id = c.cus_id AND cpa.cpa_point_id = cp.cp_id GROUP BY cpa.cpa_cus_id;";
        return $con->query($sql);
    }

    public function getEmployeeAttendanceByRange($from, $to)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT a.att_id, e.emp_id, e.emp_fn, e.emp_ln, a.att_date, a.att_in_time, a.att_out_time FROM employee_attendance a, employee e WHERE a.att_emp_id = e.emp_id AND cast(a.att_in_time as date)  BETWEEN '$from' AND '$to';";
        return $con->query($sql);
    }

    public function getAllEmployee()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT emp_id, emp_fn, emp_ln, emp_dob, emp_nic, emp_email, emp_address, emp_designation FROM employee;";
        return $con->query($sql);
    }

    public function getAllEmployeeByName($name)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT emp_id as 'Employee ID', emp_fn as 'Employee First Name', emp_ln as 'Employee Last Name', emp_dob as 'Employee Date of Birth', emp_nic as 'Employee NIC', emp_email as 'Employee Email', emp_address as 'Employee Address', emp_designation as 'Employee Designation' FROM employee WHERE CONCAT(emp_fn,' ',emp_ln) = '$name' ;";
        return $con->query($sql);
    }


    public function getEmployeeAttendanceByNameAndRange($name, $from, $to)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT a.att_id, a.att_date, a.att_in_time, a.att_out_time FROM employee_attendance a, employee e WHERE a.att_emp_id = e.emp_id AND cast(a.att_in_time as date)  BETWEEN '$from' AND '$to' AND CONCAT(e.emp_fn,' ',e.emp_ln) = '$name';";
        return $con->query($sql);
    }

    public function getCustomerWiseCompletedJobs($vno)
{
    $con = $GLOBALS["conn"];
        $sql = "SELECT j.job_id, j.job_vehicle_id, c.cus_name, vmake.vehicle_make_name, vmodel.vehicle_model_name, j.job_vehicle_odo, j.job_vehicle_mileage, j.job_start_time, j.job_finish_time, i.invoice_amount  FROM job j, customer c, vehicle_model vmodel, vehicle_make vmake, invoice i WHERE j.job_cus_id = c.cus_id AND j.job_vehicle_make_id = vmake.vehicle_make_id AND j.job_vehicle_model_id = vmodel.vehicle_model_id AND job_status = 10 AND j.job_id = i.job_id AND cus_vehicle_no = '$vno' ORDER BY j.job_id;";
        return $con->query($sql);
}

}