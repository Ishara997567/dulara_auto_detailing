<?php include '../includes/header.php';
include '../model/login_model.php';

$loginObj = new Login();

?>
<title>User Management</title>
<link rel="stylesheet" href="../assets/css/style-notification.css">
</head>
<body>
<!-- Navigation Bar -->
<?php include '../includes/navbar.php'; ?>
<div class="container-fluid">

    <div class="row">
        <div class="col-9">
            <div class="navbar-brand ml-5"><i class="fa fa-user"></i>&nbsp;User Management</div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-4">&nbsp;</div>
        <div class="col-4 d-flex justify-content-center">
            <img src="../uploads/user_images/<?php echo $image; ?>" width="200" height="200" style="border: #007fff double 5px;" alt="" class="rounded-circle">
        </div>
        <div class="col-4">&nbsp;</div>
    </div>

    <div class="row p-3">
        <div class="col-4">&nbsp;</div>
        <div class="col-4 d-flex justify-content-around">
            <button type="button" class="btn btn-primary"><i class="fa fa-pencil"></i> Change</button>
            <button type="button" class="btn btn-danger"><i class="fa fa-minus"></i> Remove</button>
        </div>
        <div class="col-4">&nbsp;</div>
    </div>

    <form action="#" method="post" enctype="multipart/form-data" id="frm_new_user" class="px-5">
            <div class="row padding d-flex justify-content-center">
                <div class="col-8 text-center">
                    <div id="alert_new_user">

                    </div>
                </div>
            </div>
            <!-- First Name -->
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name"/>
                </div>
                <!-- Last Name -->
                <div class="form-group col-6">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name"/>
                </div>
            </div>

            <!-- Email -->
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email"/>
                </div>
            </div>


            <!-- Gender -->
            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender_male" value="Male" checked>
                            <label class="form-check-label" for="gender_male">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender_female" value="Female">
                            <label class="form-check-label" for="gender_female">
                                Female
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>

            <!-- Date of Birth  -->


            <div class="form-row">
                <div class="form-group col-6">
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" id="dob" class="form-control" />
                </div>


                <!-- NIC    -->

                <div class="form-group col-6">
                    <label for="nic">NIC</label>
                    <input type="text" name="nic" id="nic" class="form-control"/>
                </div>
            </div>


            <!-- Contact No 1   -->

            <div class="form-row">
                <div class="form-group col-6">
                    <label for="cn1">Contact Number 1</label>
                    <input type="text" name="cn1" id="cn1" class="form-control">
                </div>

                <!-- Contact No 1   -->


                <div class="form-group col-6">
                    <label for="cn2">Contact Number 2</label>
                    <input type="text" name="cn2" id="cn2" class="form-control">
                </div>
            </div>

            <!-- User Access Level  -->


            <div class="form-row">
                <div class="form-group col-6">
                    <label for="user_role">User Role</label>
                    <select name="user_role" id="user_role" class="custom-select">
                        <option value="choose" selected>Choose...</option>
                        <?php

                        //Fetching all the User Access Levels

                        $r=$loginObj->getAllUserAccessLevels();
                        while($row = $r->fetch_assoc()){
                            ?>
                            <option value="<?php echo $row['user_access_level_id']; ?>"><?php echo $row['user_access_level_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
    </form>


</div>

</body>
<?php include '../includes/footer.php'; ?>
<script src="../assets/js/notification.js"></script>