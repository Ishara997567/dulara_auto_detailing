<?php include_once '../commons/DbConnection.php';


    $dbConnection = new DbConnection();

class Service{

    public function changeServiceStatus($service_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE service SET service_status = 0 WHERE service_id = '$service_id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function createCategory($cat_name, $description){
        $con = $GLOBALS["conn"];
        $sql = "INSERT INTO service_category (service_cat_name, service_cat_description) VALUES ('$cat_name','$description');";
        $con->query($sql);
        return $con->insert_id;
    }

    public function getServiceRequestCount()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT i.invoice_service_id, s.service_name, COUNT(*) service_count FROM invoice_service i, service s WHERE i.invoice_service_id = s.service_id AND service_status = 1 GROUP BY invoice_service_id LIMIT 5;";
        return $con->query($sql);

    }

    public function getServiceUtilization()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT DAYNAME(invoice_created_at) as day, COUNT(DAYOFWEEK(invoice_created_at)) as services_per_day FROM invoice GROUP BY (DAYOFWEEK(invoice_created_at));";
        return $con->query($sql);
    }

    public function selectCategories(){
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM service_category;";
        return $con->query($sql);
    }

    public function selectCategoryById($cat_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM service_category WHERE service_cat_id='$cat_id';";
        return $con->query($sql);
    }

    public function createSubCategory($sub_cat_name,$sub_cat_cat_id,$sub_cat_description){
        $con = $GLOBALS["conn"];
        $sql = "INSERT INTO service_sub_category (service_sub_cat_name, category_id, service_sub_cat_description) VALUES ('$sub_cat_name','$sub_cat_cat_id','$sub_cat_description');";
        $con->query($sql);
        return $con->insert_id;
    }

    public function selectSubCategories()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM service_sub_category;";
        return $con->query($sql);
    }

    public function selectSubCategoriesById($sub_cat_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM service_sub_category WHERE service_sub_cat_id='$sub_cat_id';";
        return $con->query($sql);
    }

    public function createService($service_name, $service_price, $service_ri1, $service_ri2, $service_ri3, $service_ri4, $service_ri5, $service_ri6, $service_ass_w1, $service_ass_w2, $service_ass_w3,$service_ass_w4, $service_cat_id, $service_sub_cat_id, $service_description)
    {

        $con = $GLOBALS["conn"];
        $sql = "INSERT INTO service (service_name, service_price, service_required_item_id_1, service_required_item_id_2, service_required_item_id_3, service_required_item_id_4, service_required_item_id_5, service_required_item_id_6, service_worker_id_1, service_worker_id_2, service_worker_id_3, service_worker_id_4, service_cat_id, service_sub_cat_id, service_description) VALUES ('$service_name', '$service_price', '$service_ri1', '$service_ri2', '$service_ri3', '$service_ri4', '$service_ri5', '$service_ri6', '$service_ass_w1', '$service_ass_w2', '$service_ass_w3', '$service_ass_w4','$service_cat_id', '$service_sub_cat_id', '$service_description');";

        $con->query($sql);
        return $con->insert_id;
    }

    public function selectService()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM service WHERE service_status = 1;";
        return $con->query($sql);
    }

    public function selectToManageService($service_id){
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM service WHERE service_id = '$service_id' AND service_status = 1;";
        return $con->query($sql);
    }

    public function changeSubCategory($sub_cat_id, $sub_cat_name)
    {

        $now = new DateTime(null, new DateTimeZone('Asia/Colombo'));
        $mysql_timestamp = $now->format('Y-m-d H:i:s');

        $con = $GLOBALS["conn"];
        $sql = "UPDATE service_sub_category SET service_sub_cat_name = '$sub_cat_name', service_sub_cat_created_at = '$mysql_timestamp' WHERE service_sub_cat_id = '$sub_cat_id'; ";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function changeCategory($cat_id, $cat_name)
    {
        $now = new DateTime(null, new DateTimeZone('Asia/Colombo'));
        $mysql_timestamp = $now->format('Y-m-d H:i:s');

        $con = $GLOBALS["conn"];
        $sql = "UPDATE service_category SET service_cat_name = '$cat_name', service_cat_created_at = '$mysql_timestamp' WHERE service_cat_id = '$cat_id'; ";
        $con->query($sql);
        return $con->affected_rows;
    }

    //Get Service Name to Auto-Fill the Invoice
    public function getServiceBySearch($term)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM service WHERE service_name LIKE '%{$term}%' AND service_status = 1;";
        return $con->query($sql);
    }

    public function getServiceByName($service_name)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM service WHERE service_name = '$service_name' AND service_status = 1";
        return $con->query($sql);
    }
    //Update Service Details
        //Service Name
    public function updateServiceName($id, $name)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE service SET service_name = '$name' WHERE service_id = '$id';";
        $con->query($sql);
        return $con->affected_rows;
    }

//Service Price
    public function updateServicePrice($id, $price)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE service SET service_price = '$price' WHERE service_id = '$id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    //Service Cat ID
    public function updateServiceCategoryId($id, $cat_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE service SET service_cat_id = '$cat_id' WHERE service_id = '$id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    //Service Sub Cat ID
    public function updateServiceSubCategoryId($id, $sub_cat_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE service SET service_sub_cat_id = '$sub_cat_id' WHERE service_id = '$id';";
        $con->query($sql);
        return $con->affected_rows;
    }
}