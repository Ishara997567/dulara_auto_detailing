<?php include '../includes/header.php';


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

    <div class="row padding d-flex justify-content-center">
        <div class="col-8 text-center">
            <div id="alert_manage_user">

            </div>
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
            <button type="button" class="btn btn-primary" id="btn-change-profile-photo" data-target="#modal-change-profile-photo" data-toggle="modal"><i class="fa fa-pencil"></i> Change</button>
            <button type="button" class="btn btn-danger" data-target="#modal-remove-profile-photo" data-toggle="modal"><i class="fa fa-minus"></i> Remove</button>
        </div>
        <div class="col-4">&nbsp;</div>
    </div>

    <!-- Modal for Change Profile Photo -->
        <div class="modal fade" role="dialog" tabindex="-1" aria-labelledby="modal-change-profile-photo" id="modal-change-profile-photo" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Upload A New Photo</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="input_photo">Upload your new photo here: </label>
                                <input type="file" id="input_photo" name="input_photo" class="form-control"/>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <div class="col-4 preview text-center"></div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="btn-upload-profile-photo">Upload</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- End of Modal for Change Profile Photo -->





    <!-- Modal for Remove Profile Photo -->
    <div class="modal fade" role="dialog" tabindex="-1" aria-labelledby="modal-remove-profile-photo" id="modal-remove-profile-photo" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Alert!</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="lead"> Do you want to remove your profile photo? </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" id="btn-remove-profile-photo">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Modal for Remove Profile Photo -->















    <form action="#" method="post" enctype="multipart/form-data" id="frm_new_user" class="px-5">

        <!-- Session User ID  -->
        <input type="hidden" name="session_user_id" id="session_user_id" value="<?php echo $_SESSION['user']['user_id']; ?>" />
        <!-- End of Session User ID  -->
        <?php
        $r = $userObj->getUserByID($_SESSION['user']['user_id']);
        ?>
        <!-- First Name -->
        <div class="form-row">
            <div class="form-group col-6">

                <label for="first_name">First Name</label>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $r['user_first_name']; ?>" readonly>

                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="button" id="btn-manage-fn-pencil"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-outline-success" type="button" id="btn-manage-fn-check"><i class="fa fa-check"></i></button>
                    </div>
                </div>
            </div>

            <!-- Last Name -->
            <div class="form-group col-6">

                <label for="last_name">Last Name</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $r['user_last_name']; ?>" readonly/>

                    <div class="input-group-prepend">
                        <button class="btn btn-outline-primary" type="button" id="btn-manage-ln-pencil"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-outline-success" type="button" id="btn-manage-ln-check"><i class="fa fa-check"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Email -->
        <div class="form-row">


            <div class="form-group col-6">
                <label for="email">Email</label>

                <div class="input-group">
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $r['user_email']; ?>" readonly/>

                    <div class="input-group-prepend">
                        <button class="btn btn-outline-primary" type="button" id="btn-manage-email-pencil"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-outline-success" type="button" id="btn-manage-email-check"><i class="fa fa-check"></i></button>
                    </div>
                </div>
            </div>

            <div class="form-group col-6">
                <label for="gender">Gender</label>
                <div class="input-group">
                    <select name="gender" id="gender" class="custom-select" disabled>
                        <?php
                        $gender = $r['user_gender'];
                        if($gender === "Male"){
                            ?>
                        <option value="Male" selected>Male</option>
                        <option value="Female">Female</option>
                      <?php  } else{
                            ?>
                            <option value="Female" selected>Female</option>
                            <option value="Male">Male</option>
                        <?php } ?>
                    </select>

                    <div class="input-group-prepend">
                        <button class="btn btn-outline-primary" type="button" id="btn-manage-gender-pencil"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-outline-success" type="button" id="btn-manage-gender-check"><i class="fa fa-check"></i></button>
                    </div>
                </div>

            </div>
        </div>


        <!-- Date of Birth  -->


        <div class="form-row">
            <div class="form-group col-6">
                <label for="dob">Date of Birth</label>
                <div class="input-group">
                    <input type="date" name="dob" id="dob" class="form-control" value="<?php echo $r['user_dob']; ?>" readonly />
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-primary" type="button" id="btn-manage-dob-pencil"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-outline-success" type="button" id="btn-manage-dob-check"><i class="fa fa-check"></i></button>
                    </div>
                </div>
            </div>


            <!-- NIC    -->

            <div class="form-group col-6">
                <label for="nic">NIC</label>
                <div class="input-group">
                    <input type="text" name="nic" id="nic" class="form-control" value="<?php echo $r['user_nic']; ?>" readonly/>
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-primary" type="button" id="btn-manage-nic-pencil"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-outline-success" type="button" id="btn-manage-nic-check"><i class="fa fa-check"></i></button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Contact No 1   -->

        <div class="form-row">
            <div class="form-group col-6">
                <label for="cn1">Contact Number 1</label>
                <div class="input-group">
                    <input type="text" name="cn1" id="cn1" class="form-control" value="<?php echo $r['user_cn1']; ?>" readonly>

                    <div class="input-group-prepend">
                        <button class="btn btn-outline-primary" type="button" id="btn-manage-cn1-pencil"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-outline-success" type="button" id="btn-manage-cn1-check"><i class="fa fa-check"></i></button>
                    </div>
                </div>
            </div>

            <!-- Contact No 1   -->


            <div class="form-group col-6">
                <label for="cn2">Contact Number 2</label>
                <div class="input-group">
                    <input type="text" name="cn2" id="cn2" class="form-control" value="<?php echo $r['user_cn2']; ?>" readonly>

                    <div class="input-group-prepend">
                        <button class="btn btn-outline-primary" type="button" id="btn-manage-cn2-pencil"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-outline-success" type="button" id="btn-manage-cn2-check"><i class="fa fa-check"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Access Level  -->


        <div class="form-row">
            <div class="form-group col-6">
                <label for="user_role">User Role</label>
                <div class="input-group">
                    <select name="user_role" id="user_role" class="custom-select" disabled>
                        <?php
                        $user_access_level = $r['user_access_level'];
                        if($user_access_level == 1) {
                            ?>
                            <option value="1" selected>Administrator</option>
                            <option value="2">System Operator</option>
                       <?php } else {
                            ?>
                            <option value="2" selected>System Operator</option>
                            <option value="1">Administrator</option>

                       <?php }?>
                    </select>
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-primary" type="button" id="btn-manage-user-role-pencil"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-outline-success" type="button" id="btn-manage-user-role-check"><i class="fa fa-check"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>


</div>

</body>
<?php include '../includes/footer.php'; ?>
<script src="../assets/js/notification.js"></script>
<script src="../assets/js/user-manage.js"></script>