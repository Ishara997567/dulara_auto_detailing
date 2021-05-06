<?php include '../includes/header.php';
include '../model/customer_model.php';

$cusObj = new Customer();
?>
<title>Feedback Management</title>
</head>
<body>
<!-- Navigation Bar -->
<?php include '../includes/navbar.php'; ?>

<!-- Content    -->
<div class="container-fluid">
    <!-- Top Row    -->
    <div class="row padding jumbotron welcome display-4">
        <p><i class="fa fa-smile-o"></i> Customer Feedback Management</p>
    </div>
    <div class="card border-info">
        <div class="card-header">
            <h3 class="card-title">Feedbacks</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-sm table-info feedback-history">
                    <thead>
                    <tr>
                        <th scope="col">Feedback ID</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Vehicle Number</th>
                        <th scope="col">Job Invoice ID</th>
                        <th scope="col">Star Rating</th>
                        <th scope="col">Review</th>
                        <th scope="col">Like</th>
                        <th scope="col">Reply</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $feedback = $cusObj->getAllFeedbacks();
                    while($r = $feedback->fetch_assoc())
                    {
                        $is_liked = $r['feedback_is_liked'];
                        $is_liked_class = $is_liked == 0 ? "secondary" : "danger";

                        $is_replied = $r['feedback_is_replied'];
                        $reply = $r['feedback_reply'];
                        $is_replied_class = $is_replied == 0 ? "secondary" : "success";

                        $no_of_starts = $r['feedback_star_rating'];

                        ?>
                        <tr>
                            <th scope="row"><?php echo $r['feedback_id']; ?></th>
                            <td><?php echo $r['cus_name']; ?></td>
                            <td><?php echo $r['cus_vehicle_no']; ?></td>
                            <td><?php echo $r['invoice_id']; ?></td>
                            <td>
                                <?php
                                for($i=0; $i < $no_of_starts; $i++)
                                {
                                    ?>
                                <i class="fa fa-star" style="color: orange"></i>
                       <?php    } ?>
                            </td>
                            <td><?php echo $r['feedback_review']; ?></td>
                            <td id="td-feedback-like"><a href="#" class="btn-sm btn-outline-<?php echo $is_liked_class; ?>" data-fid="<?php echo $r['feedback_id']; ?>" data-cs="<?php echo $is_liked; ?>"><i class="fa fa-heart fa-lg"></i></a></td>
                            <td id="td-feedback-reply"><a href="#modal_feedback_reply" data-toggle="modal" data-target="#modal_feedback_reply" class="btn-sm btn-outline-<?php echo $is_replied_class; ?>" data-id="<?php echo $r['feedback_id']; ?>" data-fid="<?php echo $r['feedback_id']; ?>" data-replied="<?php echo $is_replied; ?>" data-reply="<?php echo $reply; ?>"><i class="fa fa-comment fa-lg"></i></a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>






    <!-- Feedback Reply Modal -->


    <div class="modal fade" id="modal_feedback_reply" tabindex="-1" role="dialog" aria-labelledby="modal_feedback_reply" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_feedback_reply">Reply for the Feedback</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row padding d-flex justify-content-center">
                        <div class="col-md-11 text-center feedback-reply-message">

                        </div>
                    </div>
                    <textarea id="textarea-feedback-reply" class="form-control"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button id="submit-feedback-reply" type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>



    <!-- End ofFeedback Reply Modal -->







</div>

<?php include '../includes/footer.php'; ?>
<script src="../assets/js/customer_feedback.js"></script>
<script>
    $(".feedback-message").DataTable();
    $(".feedback-history").DataTable();
</script>
