<?php include '../includes/header.php'; ?>
<title>Notification Management 1</title>
<link rel="stylesheet" href="../assets/css/style-notification.css">
</head>
<body>
<!-- Navigation Bar -->
<?php include '../includes/navbar.php'; ?>
<div class="container-fluid">

    <div class="row">
        <div class="col-9">
            <div class="navbar-brand ml-5"><i class="fa fa-tasks"></i>&nbsp;Notification Management</div>
        </div>
        <div class="h5 col-3 d-flex justify-content-sm-end">
            <p class="mt-1">Do not disturb</p> &nbsp;&nbsp;
            <label class="switch mb-3">
                <input type="checkbox">
                <span class="slider round"></span>
            </label>
        </div>
    </div>

    <div class="row">
        <!-- Notification Side Pane -->
        <div class="col-md-4 n-side-pane">
            <!-- Side Pane Header   -->
            <div class="row">
                <div class="col-6 text-left" id="bell-icon-container">
                    <button class="btn btn-outline-primary rounded-pill" id="bell-icon">
                        <a href="#">
                            <i class="fa fa-lg fa-bell"></i>
                        </a>
                    </button>
                </div>
                <div class="col-6 text-center" id="message-icon-container">
                    <button class="btn btn-outline-primary rounded-pill" id="message-icon">
                        <a href="#">
                            <i class="fa fa-lg fa-envelope"></i>
                        </a>
                    </button>
                </div>
            </div>

            <div id="notification-menu">
                <?php
                $a = $notificationObj->getAllNotifications();
                while($row = $a->fetch_assoc())
                {
                ?>
                <!-- Notification 1  -->
                    <!-- Notification Header    -->
                    <div class="row mt-3 ml-n2">
                        <div class="col-2 text-left ml-n3">
                            <h5><span class="badge badge-<?php echo $row['nt_color']; ?>"><?php echo $row['nt_type']; ?></span></h5>
                        </div>

                        <div class="col-10 text-right">
                            <?php echo $row['not_sent_datetime']; ?>
                        </div>
                    </div>
                    <!-- Notification Body  -->
                    <div class="row">
                        <div class="col-12">
                            <a href="#" class="notification-link">
                                <p class="h6 text-left">
                                    <?php echo $row['not_message']; ?>
                                </p>
                            </a>
                            <hr>
                        </div>
                    </div>



                <?php } ?>
            </div>


            <!-- Message Menu -->
            <div id="message-menu">

                <!-- Notification 1  -->
                <div class="row mt-2 ml-n2">
                    <!-- Notification Header    -->
                    <div class="row">
                        <div class="col-3 text-left">
                            <h5><span class="badge badge-primary">Customer</span></h5>
                        </div>
                        <div class="col-6">
                            &nbsp;
                        </div>
                        <div class="col-3 text-right">10/09/2020</div>
                    </div>
                    <!-- Notification Body  -->
                    <div class="row">
                        <div class="col-1">&nbsp;</div>
                        <div class="col-10 d-flex justify-content-start">
                            <a href="#" class="notification-link">
                                <h6>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the</h6>
                            </a>
                            <hr>
                        </div>
                        <div class="col-1">&nbsp;</div>
                    </div>

                </div>
            </div>
        </div>

        <hr>

        <!-- Notification Content Section -->
        <div class="col-md-8">
            <!-- Date and Time  row -->
            <div class="row">
                <div class="col-md-3">
                    Date and Time
                </div>

                <div class="col-md-9 text-right">
                    23/03/2021
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <!-- Sender  row -->
            <div class="row">
                <div class="col-md-3">
                    Sender
                </div>

                <div class="col-md-9 text-right">
                    Ishara Perera
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <!-- Message Content    -->
            <div class="row">
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-10">
                    <p>
                        Writing Challenge
                        Another writing challenge can be to take the individual sentences in the random paragraph and incorporate a single sentence from that into a new paragraph to create a short story. Unlike the random sentence generator, the sentences from the random paragraph will have some connection to one another so it will be a bit different. You also won't know exactly how many sentences will appear in the random paragraph.
                    </p>
                </div>
                <div class="col-md-1">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-10 Reply">
                    <button type="button" class="btn btn-outline-primary btn-block">Reply</button>
                </div>
                <div class="col-md-1">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-10 d-flex justify-content-between">
                    <button type="button" class="btn btn-info rounded-pill">Mark As Read</button>
                    <button type="button" class="btn btn-danger rounded-pill">Delete</button>
                </div>
                <div class="col-md-1">&nbsp;</div>

            </div>

        </div>
    </div>
</div>

</body>
<?php include '../includes/footer.php'; ?>
<script src="../assets/js/notification.js"></script>