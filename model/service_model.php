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

    public function createSubCategory($sub_cat_name,$sub_cat_cat_id,$sub_cat_description){
        $con = $GLOBALS["conn"];
        $sql = "INSERT INTO service_sub_category (service_sub_cat_name, category_id, service_sub_cat_description) VALUES ('$sub_cat_name','$sub_cat_cat_id','$sub_cat_description');";
        $con->query($sql);
        return $con->insert_id;
    }
}