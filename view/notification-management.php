<?php include '../includes/header.php'; ?>
    <title>Notification Management</title>
    </head>
    <body>
<!-- Navigation Bar -->
<?php include '../includes/navbar.php'; ?>
<!-- Content    -->
<div class="container-fluid">
    <!-- Top Row    -->
    <div class="row bg-light">
<!--        <div class="h2 col-9">Notifications</div>-->
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

    <!--    Body  -->
    <!-- Top Row of Body    -->
    <div class="row mt-2">
        <!-- Side Panel top row -->
        <div class="col-3 d-flex justify-content-center" style="border-right: 2px solid black;">
            <div class="col-6">
                <button class="btn btn-outline-primary rounded-pill" onclick="hideMenu('message_menu'); showMenu('notification_menu')">
                <a href="#">
                    <i class="fa fa-lg fa-bell"></i>
                </a>
                </button>
            </div>
            <div class="col-6">
                <button class="btn btn-outline-primary rounded-pill" onclick="showMenu('message_menu'); hideMenu('notification_menu')">
                <a href="#">
                    <i class="fa fa-lg fa-envelope"></i>
                </a>
                </button>
            </div>
        </div>

        <div class="col-9">&nbsp;</div>

    </div>

    <!-- Rest of the body   -->
    <div class="row mt-3" id="notification_menu">
        <div class="col-3">
            <!-- Notification 1  -->
            <div class="row">
                <!-- Notification Header    -->
                <div class="row d-flex justify-content-around">
                    <div class="col-3">
                        <h5><span class="badge badge-primary">Customer</span></h5>
                    </div>
                    <div class="col-6">
                        &nbsp;
                    </div>
                    <div class="col-3">10/09/2020</div>
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

            <!-- Notification 2  -->
            <div class="row">
                <!-- Notification Header    -->

                <div class="row  d-flex justify-content-around">
                    <div class="col-3">
                        <h5><span class="badge badge-danger">Inventory</span></h5>
                    </div>
                    <div class="col-6">
                        &nbsp;
                    </div>
                    <div class="col-3">Yesterday</div>
                </div>
                <!-- Notification Body  -->
                <div class="row">
                    <div class="col-1">&nbsp;</div>
                    <div class="col-10 d-flex justify-content-start">
                        <a href="#" class="notification-link"><h6>In publishing and graphic design, Lorem ipsum is a placeholder text</h6></a>
                        <hr>
                    </div>
                    <div class="col-1">&nbsp;</div>
                </div>
                <hr>
            </div>
        </div>
        <div class="col-9">&nbsp;</div>
    </div>

    <div class="row mt-3" id="message_menu">
        <div class="col-3">
            <!-- Message 1  -->
            <p>
                This is a sample message written by me in order to display the correct view of the menus of notifiation and messages
            <hr>
            </p>

            <!-- Message 2  -->
            <p>
                This is a sample message written by me in order to display the correct view of the menus of notifiation and messages
            <hr>
            </p>

            <!-- Message 3  -->
            <p>
                This is a sample message written by me in order to display the correct view of the menus of notifiation and messages
            <hr>
            </p>
        </div>
        <div class="col-9">&nbsp;</div>
    </div>
</div>

<script>
    function hideMenu(id){
        document.getElementById(id).style.display = "none";
    }

    function showMenu(id){
        document.getElementById(id).style.display = "block";
    }
</script>

<?php include '../includes/footer.php'; ?>