<?php include '../includes/header.php';
include '../model/login_model.php';

$loginObj = new Login();

?>

<title>Login Page</title>
<style>



    .fas {
        padding: 20px;
        font-size: 30px;
        width: 70px;
        text-align: center;
        text-decoration: none;
        margin: 5px 2px;
        border-radius: 50%;
    }

    .fas:hover {
        opacity: 0.7;
        text-decoration: none;
    }

    .fa-facebook {
        background: #3B5998;
        color: white;
    }

    .fa-google-plus {
        background: #dd4b39;
        color: white;
    }

    .fa-whatsapp {
        background: #25d366;
        color: white;
    }
    #h1Height{
        height: 40px;
    }

    body{
        background-image: url("../includes/images/carousel/background1.png");
        background-size: cover;

    }

    .jumbotron{
        opacity: 0.5;
    }



</style>
</head>

<body>

<div class="container-fluid text-white">

    <!-- Brand Name -->
    <div class="row d-flex justify-content-center jumbotron text-dark">
        <h1 class="display-1">DULARA AUTO DETAILING</h1>
        <h2 class="text-center display-4">The finest automobile service center in the area</h2>
    </div>
<!-- Success Message    -->
    <?php
    if(isset($_GET['m'])){
        $success_message = $_GET['m'];
        $success_message = base64_decode($success_message);
        ?>
        <!-- Success Message -->
        <div class="row padding d-flex justify-content-center">
            <div class="col-10 text-center alert alert-success display-4">
                <?php echo $success_message; ?>
            </div>
        </div>
        <!-- End of Success Message    -->
    <?php } ?>




    <!-- Fatal Message    -->
    <?php
    if(isset($_GET['fatal'])){
        $fatal_message = $_GET['fatal'];
        $fatal_message = base64_decode($fatal_message);
        ?>
        <!-- Success Message -->
        <div class="row padding d-flex justify-content-center">
            <div class="col-10 text-center alert alert-danger display-4">
                <?php echo $fatal_message; ?>
            </div>
        </div>
        <!-- End of Fatal Message    -->
    <?php } ?>



    <!--Create Account  -->
    <div class="row padding welcome">
        <div class="col-4 d-flex justify-content-center">
            <p class="h2">Create Account</p>
        </div>
        <!-- Welcome Back   -->
        <div class="col-6 d-flex justify-content-center">
            <p class="h2">Welcome Back</p>
        </div>
    </div>

    <?php

    if(isset($_GET['msg'])){

        $msg = $_GET['msg'];
        $msg = base64_decode($msg);

        ?>

        <!-- Error Message  -->
        <div class="row padding">
            <div class="col-md-4">&nbsp;</div>
            <div class="col-md-6 d-flex justify-content-center alert alert-danger text-center">
                <?php echo $msg; ?>
            </div>
        </div>


    <?php } ?>

    <!-- jQuery Error Message   -->


    <div class="row padding">
        <div class="col-md-4">&nbsp;</div>
        <div class="col-md-6 d-flex justify-content-center text-center" id="alertmsg">

        </div>
    </div>



    <!-- Content    -->

    <div class="row padding">
        <div class="col-md-4 text-center" id="div_left_side">

            <div id="div_image" class="img-fluid">
                <img src="../includes/images/dulara_logo.jpg" class="rounded-circle" alt="Cinque Terre" width="304" height="236">
            </div>
            <div class="row">&nbsp;</div>
            <p>Welcome to the finest set of automobile service<br>in the area</p>

            <button id="button_sign_up" data-toggle="modal" data-target="#modal_new_user_signup" class="btn btn-primary rounded-pill">Sign Up</button>




            <!-- Modal -->
            <div class="modal fade" id="modal_new_user_signup" tabindex="-1" role="dialog" aria-labelledby="my_modal" aria-hidden="true">
                <div class="text-left text-dark modal-lg modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">New User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="../controller/logincontroller.php?status=add_user" method="post" enctype="multipart/form-data" id="frm_new_user">
                            <div class="modal-body">

                                <!--   Modal Form-->
                                <!-- jQuery Error Message   -->


                                <div class="row padding d-flex justify-content-center">
                                    <div class="col-8 text-center">
                                        <div id="alert_new_user">

                                        </div>
                                    </div>
                                </div>

                                <!-- End of jQuery Error Message   -->


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

                                    <!-- User Image -->

                                    <div class="form-group col-6">
                                        <label for="user_img">User Image</label>
                                        <input type="file" name="user_img" id="user_img" class="form-control"/>
                                    </div>
                                </div>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="btn_submit" name="submit">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




            <!--End of the Modal    -->





            <div class="row col-md-12 d-flex justify-content-center mt-3">
                <div class="h6">
                    <span class="fa fa-phone"></span>&nbsp;
                    (077) 229 9007
                </div>
            </div>
            <div class="row col-md-12 d-flex justify-content-center">
                <div class="h6">
                    <span class="fa fa-envelope-o"></span>&nbsp;
                    dulara.imports@yahoo.com
                </div>
            </div>
        </div>




        <div class="col-md-8" id="div_right_side">
            <!-- Form for Login -->

            <form method="POST" id="loginform" action="../controller/logincontroller.php?status=login">
                <div class="row">
                    <h1 class="h4">
                        <i class="fa fa-user"></i>&nbsp;
                    </h1>
                    <div class="form-group col-md-8">
                        <input class="rounded-pill form-control" type="email" placeholder="Username" name="username" id="username">
                    </div>
                </div>

                <div class="row">
                    <h1 class="h3">
                        <i class="fa fa-key"></i>
                    </h1>
                    <div class="form-group col-md-8">
                        <input class="rounded-pill form-control" type="password" placeholder="Password" name="password" id="password">
                    </div>
                    <h1 class="h4">
                        <i class="fa fa-eye-slash"></i>&nbsp;
                    </h1>
                </div>
                <div class="col-md-12">&nbsp;</div>
                <div class="form-group">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input id="button_sign_in" type="submit" class="btn btn-primary col-md-4 rounded-pill" value="Sign in"/>
                </div>
            </form>





            <div class ="row">
                <div class="col-md-6 text-center">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="https://www.facebook.com/dularaimport" class="fas fa fa-facebook" target="_blank"></a>
                    <a href="#" class="fas fa fa-google-plus"></a>
                    <a href="#" class="fas fa fa-whatsapp"></a>;

                </div>
                <div class="col-md-6" id="div_map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.026758556394!2d80.02515131426962!3d7.4622913136088656!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afca7ceaf6334a7%3A0x41bd4e0b3f865cdb!2sDulara%20Auto%20Detailing!5e0!3m2!1sen!2slk!4v1593065098544!5m2!1sen!2slk" width="350" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>

        </div>

    </div>







</div>

<?php include '../includes/bootstrap_includes_js.php'; ?>
<!--    <script src="../assets/js/user_validation.js"></script>-->
<script src="../assets/js/user_validation.js"></script>
<script src="../assets/js/login_validation.js"></script>
</body>
</html>