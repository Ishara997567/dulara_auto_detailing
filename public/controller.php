<?php include 'Feedback.php';

$feedbackObj = new Feedback();

if(isset($_REQUEST['status']))
{
    $status = $_REQUEST["status"];

    switch ($status)
    {
        case "insert_feedback":
            $customer_name = $_POST['name'];
            $customer_vno = strtoupper($_POST['vno']);
            $customer_invoice_no = $_POST['invoice'];
            $customer_rating = $_POST['rating'];
            $customer_review = $_POST['review'];

            $affected_rows = $feedbackObj->insertFeedback($customer_name, $customer_vno, $customer_invoice_no, $customer_rating, $customer_review);

            if($affected_rows > 0)
                echo 1;
            else
                echo 0;

            break;
    }
}