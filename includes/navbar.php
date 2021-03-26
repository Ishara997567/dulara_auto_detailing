
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_toggler" aria-controls="navbar_toggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="../view/dashboard.php"><i class="fa fa-home"></i> DULARA AUTO DETAILING</a>

    <div class="collapse navbar-collapse" id="navbar_toggler">
        <ul class="navbar-nav ml-lg-auto">
            <li class="nav-item">
                <!-- Entire Dropdown    -->
                <div class="dropdown">
                    <button role="button" class="btn dropdown rounded-pill btn-outline-primary button-styles my-2 mr-1 my-sm-0" type="button" id="dropdown_notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-bell"></i>
                    </button>

                    <!-- Dropdown Menu  -->
                    <div class="dropdown-menu dropdown-menu-center pre-scrollable" id="dropdown_notification" aria-labelledby="dropdown_notification">
                        <div class="d-flex justify-content-center">
                            <div class="col-5">
                                <div class="h5 text-center">Notifications</div>
                                <a href="#"><hr id="notifications" class="switch-horizontal-line"></a>
                            </div>
                            <div class="col-5">
                                <div class="h5">Messages</div>
                                <a href="#"><hr id="messages" class="switch-horizontal-line"></a>
                            </div>
                        </div>

                        <?php include '../model/notification_model.php';
                        $notificationObj = new Notification();
                        $all_nots = $notificationObj->getAllNotifications();
                        while($row = $all_nots->fetch_assoc())
                        {
                            ?>
                                <div class="row d-flex flex-row">
                                    <div class="col-3">
                                        <h5><span class="text-left badge badge-<?php echo $row['nt_color']; ?>"><?php echo $row['nt_type']; ?></span></h5>
                                    </div>
                                    <div class="col-3">
                                        &nbsp;
                                    </div>
                                    <div class="col-6"><?php echo $row['not_sent_datetime']; ?></div>
                                </div>
                                <!-- Notification Body  -->
                                <div class="row">
                                    <div class="col-1">&nbsp;</div>
                                    <div class="col-10 d-flex justify-content-start">
                                        <a href="notification-management.php?not_id=<?php echo $row['not_id']; ?>" class="notification-link">
                                            <h6 class="text-left"><?php echo $row['not_message']; ?></h6>
                                        </a>
                                    </div>
                                    <div class="col-1">&nbsp;</div>
                                </div>
                            <hr>
                        <?php } ?>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <button class="btn btn-outline-primary mr-1 rounded-pill button-styles" type="button"><i class="fa fa-fw fa-cog"></i></button>
            </li>
        </ul>
    </div>
    <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-1" type="search" placeholder="Search">
        <button class="btn btn-outline-primary my-2 my-sm-0 rounded-pill button-styles" type="submit"><i class="fa fa-fw fa-search"></i></button>
    </form>
    <div class="dropdown">

        <a class="nav-link dropdown-toggle" href="#" id="navbar_user_dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Mikash Kumarasinghe
        </a>

        <div class="dropdown-menu" aria-labelledby="navbar_user_dropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
        </div>
    </div>
    </div>
</nav>