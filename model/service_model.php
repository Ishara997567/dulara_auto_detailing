<?php include_once '../commons/DbConnection.php';

    $dbConnection = new DbConnection();

class Service{
    public function createCategory($cat_name, $description){
        $con = $GLOBALS["conn"];
        $sql = "INSERT INTO service_category (service_cat_name, service_cat_description) VALUES ('$cat_name','$description');";
        $con->query($sql);
        return $con->insert_id;
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
        $sql = "SELECT * FROM service;";
        return $con->query($sql);
    }

    public function selectToManageService($service_id){
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM service WHERE service_id = '$service_id';";
        return $con->query($sql);
    }

    public function changeSubCategory($sub_cat_id, $sub_cat_name)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE service_sub_category SET service_sub_cat_name = '$sub_cat_name' WHERE service_sub_cat_id = '$sub_cat_id'; ";
        $con->query($sql);
        return $con->affected_rows;
    }
}