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
}