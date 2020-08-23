<?php include '../includes/header.php'; ?>
<title>Feedback Management</title>
</head>
<body>
<!-- Navigation Bar -->
<?php include '../includes/navbar.php'; ?>

<!-- Content    -->
<div class="container-fluid">
    <!-- Top Row    -->
    <div class="row bg-light d-flex justify-content-between">
        <div class="h2">Feedback Management</div>
        <!-- New Message    -->
        <div class="my-1 mr-3">
            <button class="rounded-pill btn btn-outline-primary" type="button" data-toggle="modal" data-target="#new_message_modal" data-whatever="@mdo"><i class="fa fa-plus"></i> New Message</button>
        </div>
    </div>

    <!-- Modal for New Message   -->

    <div class="modal fade" id="new_message_modal" tabindex="-1" role="dialog" aria-labelledby="new_message_modal_label" aria-hidden="true">
        <div class="modal-dialog" role="document">
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
                            <input type="text" class="form-control" placeholder="Message Heading">
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
                                    <input type="checkbox" class="form-check-input" id="sms">
                                    <label class="form-check-label" for="sms">SMS</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="email">
                                    <label class="form-check-label" for="email">Email</label>
                                </div>
                            </div>
                        </div>

                        <!-- Modal To Whom checkboxes   -->
                        <div class="form-group row">
                            <div class="col-md-4">To Whom</div>
                            <div class="col-md-8">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="new_customers">
                                    <label for="new_customers" class="form-check-label">New Customers</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="loyal_customers">
                                    <label for="loyal_customers" class="form-check-label">Loyal Customers</label>
                                </div>
                            </div>
                        </div>

                        <!-- Modal When checkboxes   -->
                        <div class="form-group row">
                            <div class="col-md-4">When</div>
                            <div class="col-md-8">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="on_arrival">
                                    <label for="on_arrival" class="form-check-label">On Arrival</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="on_leave">
                                    <label for="on_leave" class="form-check-label">On Leave</label>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>


    <!-- View Message   -->
    <div class="table-responsive">
        <table class="table table-sm">
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

    <!-- Search Bar -->
    <form class="form-inline d-flex justify-content-end mr-4">
        <input class="form-control rounded-pill my-1 mr-sm-2 w-75" type="search" placeholder="Search . . ." aria-label="Search">
        <button class="btn btn-outline-primary rounded-pill my-xl-1" type="button"><i class="fa fa-search"></i> Search</button>
    </form>

    <!-- Feedback Table -->
    <div class="table-responsive">
        <table class="table table-hover">
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
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
                <td><a href="#" class="btn-sm btn-outline-danger"><i class="fa fa-heart fa-lg"></i></a></td>
                <td><a href="#" class="btn-sm btn-outline-dark"><i class="fa fa-comment-o fa-lg"></i></a></td>
            </tr>
            </tbody>
        </table>
    </div>

</div>

<?php include '../includes/footer.php'; ?>
