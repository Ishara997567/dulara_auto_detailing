<?php include_once '../commons/DbConnection.php';

$dbConnection = new DbConnection();

class Customer
{
    public function storeCustomerMessage($m_heading, $message, $m_type_s, $m_to_whom_s, $specific_customer_names_s, $when_s)
    {
        $con = $GLOBALS["conn"];
        $sql = "INSERT INTO customer_feedback_message (cfm_heading, cfm_message, cfm_type, cfm_to_whom, cfm_specific_customers, cfm_when) VALUES ('$m_heading', '$message', '$m_type_s', '$m_to_whom_s', '$specific_customer_names_s', '$when_s');";

        $con->query($sql);
        return $con->insert_id;
    }

    public function getCustomerName($term)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM customer WHERE cus_name LIKE '%{$term}%';";
        return $con->query($sql);
    }

    public function addCustomer($cus_name,$cus_vehicle, $cus_add_l1, $cus_add_l2, $cus_add_l3, $cus_add_l4, $cus_cn1, $cus_cn2, $cus_email)
    {
        $con = $GLOBALS["conn"];
        $sql = "INSERT INTO customer (cus_name, cus_vehicle_no, cus_add_l1, cus_add_l2, cus_add_l3, cus_add_l4, cus_cn1, cus_cn2, cus_email) VALUES ('$cus_name', '$cus_vehicle','$cus_add_l1', '$cus_add_l2', '$cus_add_l3', '$cus_add_l4', '$cus_cn1', '$cus_cn2', '$cus_email')";
        $con->query($sql);
        return $con->insert_id;
    }

    public function getAllCustomerInfo()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM customer;";
        return $con->query($sql);
    }

    public function getCustomerById($cus_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM customer WHERE cus_id='$cus_id';";
        return $con->query($sql);
    }

    //Updating Customer Information
    //cus name
    public function updateCusName($cus_id, $cus_name)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE customer SET cus_name= '$cus_name' WHERE cus_id='$cus_id';";
        $con->query($sql);
    }
    //cus home
    public function updateHomeNo($cus_id, $home_no)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE customer SET cus_add_l1= '$home_no' WHERE cus_id='$cus_id';";
        $con->query($sql);
    }

    //cus street
    public function updateStreet($cus_id, $street)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE customer SET cus_add_l2= '$street' WHERE cus_id='$cus_id';";
        $con->query($sql);
    }

    //city
    public function updateCity($cus_id, $city)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE customer SET cus_add_l3= '$city' WHERE cus_id='$cus_id';";
        $con->query($sql);
    }

    //state
    public function updateState($cus_id, $state)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE customer SET cus_add_l4= '$state' WHERE cus_id='$cus_id';";
        $con->query($sql);
    }

    //cn1
    public function updateCN1($cus_id, $cn1)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE customer SET cus_cn1= '$cn1' WHERE cus_id='$cus_id';";
        $con->query($sql);
    }

    //cn2
    public function updateCN2($cus_id, $cn2)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE customer SET cus_cn2= '$cn2' WHERE cus_id='$cus_id';";
        $con->query($sql);
    }

    //email
    public function updateEmail($cus_id, $email)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE customer SET cus_email= '$email' WHERE cus_id='$cus_id';";
        $con->query($sql);
    }

    //vehicle make
    public function updateVehicleMake($cus_id, $vm)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE job SET job_vehicle_make_id= '$vm' WHERE job_cus_id='$cus_id';";
        $con->query($sql);
    }

    //vehicle model
    public function updateVehicleModel($cus_id, $vm)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE job SET job_vehicle_model_id= '$vm' WHERE job_cus_id='$cus_id';";
        $con->query($sql);
    }

    //vehicle odo
    public function updateVehicleODO($cus_id, $odo)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE job SET job_vehicle_odo= '$odo' WHERE job_cus_id='$cus_id';";
        $con->query($sql);
    }

    //vehicle mileage
    public function updateVehicleMileage($cus_id, $mileage)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE job SET job_vehicle_mileage= '$mileage' WHERE job_cus_id='$cus_id';";
        $con->query($sql);
    }

    public function selectByVehicleNo($vehicle_no)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM customer WHERE cus_vehicle_no = '$vehicle_no';";
        return $con->query($sql);
    }

    public function getAllCustomerRelatedData($cus_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT c.*, vmake.vehicle_make_name, vmodel.vehicle_model_name, j.job_vehicle_mileage, j.job_vehicle_odo FROM customer c, vehicle_make vmake, vehicle_model vmodel, job j WHERE c.cus_id = '$cus_id' AND c.cus_id = j.job_cus_id AND j.job_vehicle_make_id = vmake.vehicle_make_id AND j.job_vehicle_model_id = vmodel.vehicle_model_id LIMIT 1;";
        return $con->query($sql);
    }

    public function getCustomerServices($cus_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT s.service_id, s.service_name, sc.service_cat_name, j.job_finish_time FROM customer c, service s, job j, invoice i, invoice_service iserv, service_category sc WHERE c.cus_id = '$cus_id' AND j.job_cus_id = c.cus_id AND j.job_id = i.job_id AND i.invoice_id = iserv.invoice_id AND s.service_id = iserv.invoice_service_id AND s.service_cat_id = sc.service_cat_id;";
        return $con->query($sql);
    }

    //Loyalty Management
    public function createLoyaltyProgram($loyalty_name, $loyalty_points, $loyalty_reward, $loyalty_description)
    {
        $con = $GLOBALS["conn"];
        $sql = "INSERT INTO customer_loyalty (loyalty_name, loyalty_points, loyalty_reward, loyalty_description) VALUES ('$loyalty_name', '$loyalty_points', '$loyalty_reward', '$loyalty_description');";
        return $con->query($sql);
    }

    public function getAllLoyaltyPrograms()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM customer_loyalty WHERE loyalty_status = 1;";
        return $con->query($sql);
    }

    public function getNewCustomerID()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT MAX(cus_id)+1 as NewCusID FROM customer;";
        return $con->query($sql);
    }

    public function getCustomerIDByInvoiceID($invoice_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT c.cus_id FROM invoice i, job j, customer c WHERE i.invoice_id = '$invoice_id' AND i.job_id = j.job_id AND j.job_cus_id = c.cus_id;";
        return $con->query($sql);
    }


    public function addCustomerReferral($referrer_id, $referee_id, $description)
    {
        $con = $GLOBALS["conn"];
        $sql = "INSERT INTO customer_referral (cr_referrer_id, cr_referee_id, cr_description) VALUES('$referrer_id', '$referee_id', '$description';";
        return $con->query($sql);
    }

    public function allocateCustomerPoints($cus_id, $points_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "INSERT INTO customer_point_allocation (cpa_cus_id, cpa_point_id) VALUES ('$cus_id', '$points_id');";
        return $con->query($sql);
    }

    public function getSumOfPointsByCustomerID($cus_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT SUM(cp.cp_points) as SumOfPoints FROM customer_point_allocation cpa, customer_points cp WHERE cpa.cpa_cus_id = '$cus_id' AND cp.cp_id = cpa.cpa_point_id AND cpa.cpa_status = 1;";
        return $con->query($sql);
    }

    public function getLoyaltyProgramBySumOfPoints($sum_of_points)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT loyalty_name FROM customer_loyalty WHERE loyalty_points <= '$sum_of_points' AND loyalty_status = 1 ORDER BY loyalty_points DESC LIMIT 1;";
        return $con->query($sql);
    }

    public function getLoyaltyByID($id)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM customer_loyalty WHERE loyalty_id = '$id' AND loyalty_status = 1;";
        return $con->query($sql);
    }

    //updating Customer Loyalty

    //Loyalty Name
    public function updateLoyaltyName($id, $name)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE customer_loyalty SET loyalty_name = '$name' WHERE loyalty_id = '$id';";
        $con->query($sql);
    }

    //Loyalty Points
    public function updateLoyaltyPoints($id, $p)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE customer_loyalty SET loyalty_points = '$p' WHERE loyalty_id = '$id';";
        $con->query($sql);
    }

    //Loyalty Reward
    public function updateLoyaltyReward($id, $reward)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE customer_loyalty SET loyalty_reward = '$reward' WHERE loyalty_id = '$id';";
        $con->query($sql);
    }

    //Delete Loyalty
    public function changeLoyaltyStatus($id)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE customer_loyalty SET loyalty_status = 0 WHERE loyalty_id = '$id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function getNextLoyaltyID()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT MAX(loyalty_id)+1 as NewLoyaltyID FROM customer_loyalty;";
        return $con->query($sql);
    }

    public function getLoyaltyToShowcase()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT l.loyalty_id, l.loyalty_name, l.loyalty_points, l.loyalty_reward, c.clc_color AS color FROM customer_loyalty l, customer_loyalty_color c WHERE l.loyalty_id = c.clc_loyalty_id AND loyalty_status = 1;";
        return $con->query($sql);
    }

    public function getNextPointID()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT MAX(cp_id)+1 as NewPointID FROM customer_points WHERE cp_status = 1;";
        return $con->query($sql);
    }

    public function addNewLoyaltyPointCategory($cat_name, $points, $description)
    {
        $con = $GLOBALS["conn"];
        $sql = "INSERT INTO customer_points (cp_category_name, cp_points, cp_description) VALUES ('$cat_name', '$points', '$description');";
        $con->query($sql);
        return $con->insert_id;
    }

    public function getLoyaltyPoint()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT * FROM customer_points where cp_status = 1;";
        return $con->query($sql);
    }

    //Delete Loyalty Points Category
    public function changeLoyaltyPointStatus($id)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE customer_points SET cp_status = 0 WHERE cp_id = '$id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    //Reset Loyalty Points
    public function resetLoyaltyPoints($cus_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE customer_point_allocation SET cpa_status = 0 WHERE cpa_cus_id = '$cus_id';";
        $con->query($sql);
        return $con->affected_rows;
    }

    //Customer Feedbacks

    public function getReviews()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT f.feedback_id, c.cus_name, c.cus_vehicle_no, i.invoice_id, f.feedback_star_rating, f.feedback_review, f.feedback_is_liked, f.feedback_is_replied, f.feedback_reply FROM customer_feedback f, customer c, job j, invoice i WHERE f.feedback_cus_vno = c.cus_vehicle_no AND j.job_vehicle_id = f.feedback_cus_vno AND i.job_id = j.job_id GROUP BY feedback_id ORDER BY feedback_id DESC LIMIT 4;";
        return $con->query($sql);
    }

    public function getAllFeedbacks()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT f.feedback_id, c.cus_name, c.cus_vehicle_no, i.invoice_id, f.feedback_star_rating, f.feedback_review, f.feedback_is_liked, f.feedback_is_replied, f.feedback_reply FROM customer_feedback f, customer c, job j, invoice i WHERE f.feedback_cus_vno = c.cus_vehicle_no AND j.job_vehicle_id = f.feedback_cus_vno AND i.job_id = j.job_id GROUP BY feedback_id;";
        return $con->query($sql);
    }

    public function changeIsLike($val, $fid)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE customer_feedback SET feedback_is_liked = '$val' WHERE feedback_id = '$fid';";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function replyFeedback($fid, $is_replied, $reply)
    {
        $con = $GLOBALS["conn"];
        $sql = "UPDATE customer_feedback SET feedback_is_replied = '$is_replied', feedback_reply = '$reply' WHERE feedback_id = '$fid';";
        $con->query($sql);
        return $con->affected_rows;
    }
}
