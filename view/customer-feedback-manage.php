<?php include '../includes/header.php'; ?>
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

    <!-- Modal for New Message   -->

    <div class="modal fade" id="new_message_modal" tabindex="-1" role="dialog" aria-labelledby="new_message_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="new_message_modal_label">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Modal form -->
                    <form>
                        <!-- Modal Write Message textarea   -->
                        <div class="form-group">
                            <input type="text" class="form-control" id="m-heading" placeholder="Message Heading">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="message-text" placeholder="Write the message. . ."></textarea>
                        </div>
                        <hr/>
                        <!-- Modal Message Type checkboxes  -->
                        <div class="form-group row">
                            <div class="col-md-4">Message Type</div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="sms" name="message-type" value="sms">
                                    <label class="form-check-label" for="sms">SMS</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="email" name="message-type" value="email">
                                    <label class="form-check-label" for="email">Email</label>
                                </div>
                            </div>
                        </div>

                        <!-- Modal To Whom checkboxes   -->
                        <div class="form-group row">
                            <div class="col-md-4">To Whom</div>
                            <div class="col-md-8">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="new_customers" name="to-whom" value="new-customers">
                                    <label for="new_customers" class="form-check-label">New Customers</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="loyal_customers" name="to-whom" value="loyal-customers"/>
                                    <label for="loyal_customers" class="form-check-label">Loyal Customers</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="specific_customer" name="to-whom" value="specific-customers"/>
                                    <label class="form-check-label" for="specific_customer">Specific Customers</label>
                                </div>

                                <div class="specific-customers-container">
                                    <div class="specific-customers form-row mb-1">
                                        <div class='col-md-11 ui-widget ui-front'>
                                            <input type='text' class='form-control rounded-pill' id='txt_specific_customer1' name='txt_specific_customer[]'/>
                                        </div>
                                    </div>
                                </div>
                                <div class="specific-customer-append"></div>
                                <button type="button" class="btn btn-sm btn-outline-primary rounded-pill" id="add_customer"><i class="fa fa-plus"></i> Add Customer</button>
                            </div>
                        </div>

                        <!-- Modal When checkboxes   -->
                        <div class="form-group row">
                            <div class="col-md-4">When</div>
                            <div class="col-md-8">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="on_arrival" name="when" value="on-arrival"/>
                                    <label for="on_arrival" class="form-check-label">On Arrival</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="on_leave" name="when" value="on-leave">
                                    <label for="on_leave" class="form-check-label">On Leave</label>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-send-message">Send message</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row padding mb-2">
        <div class="col-12">
            <button class="rounded-pill btn btn-outline-primary" type="button" data-toggle="modal" data-target="#new_message_modal" data-whatever="@mdo"><i class="fa fa-plus"></i> New Message</button>
        </div>
    </div>
    <!-- View Message   -->
    <div class="card my-2 border-dark">
        <div class="card-header">
            <h3 class="card-title">Messages</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-danger table-hover table-sm feedback-message">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Message Heading</th>
                        <th scope="col">Message</th>
                        <th scope="col">Recipients</th>
                        <th scope="col">Delivery</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>On Arrival</td>
                        <td><a href="#"><i class="fa fa-edit fa-lg"></i></a></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>On Arrival</td>
                        <td><a href="#"><i class="fa fa-edit fa-lg"></i></a></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>On Arrival</td>
                        <td><a href="#"><i class="fa fa-edit fa-lg"></i></a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Feedback Table -->
    <div class="card border-info">
        <div class="card-header">
            <h3 class="card-title">Feedbacks</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-info feedback-history">
                    <thead>
                    <tr>
                        <th scope="col">Feedback ID</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Star Rating</th>
                        <th scope="col">Review</th>
                        <th scope="col">Like</th>
                        <th scope="col">Reply</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td><a href="#" class="btn-sm btn-outline-danger"><i class="fa fa-heart fa-lg"></i></a></td>
                        <td><a href="#" class="btn-sm btn-outline-success"><i class="fa fa-comment fa-lg"></i></a></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td><a href="#" class="btn-sm btn-outline-dark"><i class="fa fa-heart-o fa-lg"></i></a></td>
                        <td><a href="#" class="btn-sm btn-outline-dark"><i class="fa fa-comment-o fa-lg"></i></a></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry the Bird</td>
                        <td>@twitter</td>
                        <td>@twitter</td>
                        <td><a href="#" class="btn-sm btn-outline-danger"><i class="fa fa-heart fa-lg"></i></a></td>
                        <td><a href="#" class="btn-sm btn-outline-dark"><i class="fa fa-comment-o fa-lg"></i></a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?php include '../includes/footer.php'; ?>
<script src="../assets/js/customer_feedback.js"></script>
<script>
    $(".feedback-message").DataTable();
    $(".feedback-history").DataTable();
</script>
