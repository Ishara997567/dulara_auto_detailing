<?php include 'DbConnection.php';

$dbConnection = new DbConnection();

class Feedback
{
    public function insertFeedback($customer_name, $customer_vno, $customer_invoice_no, $customer_rating, $customer_review)
    {
        $con = $GLOBALS['conn'];
        $sql = "INSERT INTO customer_feedback (feedback_cus_name, feedback_cus_vno, feedback_invoice, feedback_star_rating, feedback_review) VALUES ('$customer_name', '$customer_vno', '$customer_invoice_no', '$customer_rating', '$customer_review');";
        $con->query($sql);
        return $con->affected_rows;
    }

    public function getAllFeedbacks()
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT f.feedback_id, c.cus_name, c.cus_vehicle_no, i.invoice_id, f.feedback_star_rating, f.feedback_review, f.feedback_is_liked, f.feedback_is_replied, f.feedback_reply, f.feedback_created_at FROM customer_feedback f, customer c, job j, invoice i WHERE f.feedback_cus_vno = c.cus_vehicle_no AND j.job_vehicle_id = f.feedback_cus_vno AND i.job_id = j.job_id AND feedback_is_liked = 1 GROUP BY feedback_id ORDER BY feedback_id DESC LIMIT 6;";
        return $con->query($sql);
    }



    public function getCustomerIDByVehicleNo($vno)
    {
        $con = $GLOBALS["conn"];
        $sql = "SELECT cus_id FROM customer WHERE cus_vehicle_no = '$vno';";
        return $con->query($sql);
    }

    public function allocateCustomerPointsForSiteReview($cus_id)
    {
        $con = $GLOBALS["conn"];
        $sql = "INSERT INTO customer_point_allocation (cpa_cus_id, cpa_point_id) VALUES ('$cus_id', 4);";
        return $con->query($sql);
    }


}