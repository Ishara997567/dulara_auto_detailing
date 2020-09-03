<?php include '../includes/header.php'; ?>

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
        /* for effects */
        /*
        div{
        display:none;
        }
        */
    </style>

    <script>

/*

$(document).ready(function(){
    $("div").fadeIn(3000);
    $("#button_sign_in").click(function(){

    });

});

*/
    </script>

    </head>
    <body>
    <div class="container-fluid">


        <div class="row padding jumbotron welcome">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="display-1">DULARA AUTO DETAILING</div>
            </div>

            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <div class="display-4">The finest automobile service center in area</div>
                </div>
            </div>

        </div>





        <div class="row padding">
            <div class="col-md-4 d-flex justify-content-center">
                <div class="display-4">Create Account</div>
            </div>
            <div class="col-md-8 d-flex justify-content-center">
                <div class="display-4">Welcome Back</div>

                <?php
                //Login failed message

                if(isset($_GET['msg'])){
                    $msg = base64_decode($_GET['msg']);


                    ?>



                    <div class="alert alert-danger text-center">
                        <?php echo $msg; ?>

                    </div>
                    <?php

                }

                ?>
            </div>
        </div>
        <!--
<div class="row">
<div class="col-md-12">&nbsp;</div>
</div> 
-->


        <div class="row padding">
            <div class="col-md-4 text-center" id="div_left_side">


                <div id="div_image" class="img-fluid">
                    <img src="../includes/images/dulara_logo.jpg" class="rounded-circle" alt="Cinque Terre" width="304" height="236">
                </div>
                <div class="row">&nbsp;</div>
                <p>Welcome to the finest set of auto-mobile service<br>in the area</p>


                    <form id="form_create_account">
                        <div class="form-group">
                            <button id="button_sign_up" class="btn btn-primary">Sign up</button>
                        </div>
                    </form>


                <div class="row col-md-12">
                    <h1 id="h1Height" class="h6"><span class="fa fa-phone"></span>+9477 229 9007</h1>
                    <h1 class="h6"><span class="fa fa-envelope-o"></span>dulara.imports@yahoo.com</h1>
                </div>
            </div>


            <!--        <div class="col-md-1">&nbsp;</div> -->

            <div class="col-md-8" id="div_right_side">
                <form method="POST" id="form_welcome_back" action="../controller/logincontroller.php?status=login">
                    <div class="row">
                        <h1 class="h4">
                            <i class="fa fa-user"></i>&nbsp;
                        </h1>
                        <div class="form-group col-md-8">
                            <input class="rounded-pill form-control" type="email" placeholder="Username" name="username" id="input_id"  required="required">
                        </div>
                    </div>

                    <div class="row">
                        <h1 class="h3">
                            <i class="fa fa-key"></i>
                        </h1>
                        <div class="form-group col-md-8">
                            <input class="rounded-pill form-control" type="password" placeholder="Password" name="password" id="input_password" required="required">
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
                        <input id="button_sign_in" type="submit" class="btn btn-primary col-md-4" value="Sign in"/>
                    </div>
                </form>

                <div class ="row">
                    <div class="col-md-6 text-center">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="https://www.facebook.com/dularaimport" class="fas fa-facebook" target="_blank"></a>
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

<?php include '../includes/footer.php'; ?>