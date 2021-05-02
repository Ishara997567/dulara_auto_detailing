<?php include '../includes/header.php'; ?>
    <title>Notification Management 1</title>
    </head>
    <body>
    <!-- Navigation Bar -->
    <?php include '../includes/navbar.php'; ?>
    <div class="container-fluid">

        <div class="row">
            <div class="col-6">
                <div class="navbar-brand ml-5"><i class="fa fa-tasks"></i>&nbsp;Notification Management</div>
            </div>
            <div class="h5 col-6 d-flex justify-content-sm-end">

                <div class="btn-group mt-1">
                    <button type="button" class="rounded-pill btn btn-primary mr-3" id="btn_mark_all_read">Mark All As Read</button>
                    <button type="button" class="rounded-pill btn btn-success mr-3" id="btn_mark_all_unread">Mark All As Unread</button>
                </div>

                <p class="mt-1">Do not disturb</p> &nbsp;&nbsp;
                <label class="switch mb-3">
                    <input type="checkbox" id="checkbox_disturb">
                    <span class="slider round"></span>
                </label>
            </div>
        </div>

        <div class="row d-flex justify-content-center p-3">
            <!-- Notification Side Pane -->
            <div class="col-md-12 text-center">
                <!-- Side Pane Header   -->

                <div id="notification-menu" class="pl-3" style="height: 500px; overflow-y: scroll;">
                    <?php
                    $a = $notificationObj->getAllNotifications();
                    while($row = $a->fetch_assoc())
                    {
                        $is_read = $row['not_is_read'] == 1;
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
                        <div class="row" id="notification_row">
                            <div class="col-12" id="notification_col">
                                <a href="#" class="notification-link" data-id="<?php echo $row['not_id']; ?>">
                                    <?php
                                    if($is_read){
                                        ?>
                                        <h6 class="text-left"><?php echo $row['not_message']; ?></h6>
                                    <?php }  else { ?>
                                        <h6 class="text-left"><b><?php echo $row['not_message']; ?></b></h6>
                                    <?php   }?>
                                </a>
                                <hr>
                            </div>
                        </div>



                    <?php } ?>
                </div>


                <!-- Message Menu -->

            </div>

            <hr>

            <!-- Notification Content Section -->

        </div>
    </div>

    </body>
<?php include '../includes/footer.php'; ?>