<!-- Include bootstrap js files at the end of the body  -->
<?php include '../includes/bootstrap_includes_js.php'; ?>
</body>
</html>

<!-- Confirm Password Validation    -->
<script>
    $("#btn-change-password").click(function (){
        const url = "../controller/usercontroller.php?status=check_current_password";

        let flag1 = false;
        let flag2 = false;

        let user_id = $("#logged_user_id").val();
        let current_password = $("#current_password").val();
        let new_password = $("#new_password").val();
        let confirm_password = $("#confirm_password").val();

        $.post(url, {user_id:user_id, current_password: current_password}, function (data){
            if(data === "0") {
                $("#current_password").addClass("border-danger");
                $("#current_password").focus();
                $("#current_password_validation").html("Please check your current password!").addClass("text-danger");
            } else {
                flag1 = true;
            }


            if(new_password !== confirm_password) {
                $("#confirm_password").addClass("border-danger");
                $("#new_password").addClass("border-danger").focus();
                $("#password_validation").html("New password does not match!").addClass("text-danger");
            } else {
                flag2 = true;
            }

            if(flag1 && flag2) {
                const  u = "../controller/usercontroller.php?status=change_password";
                $.post(u, {user_id:user_id, new_password:new_password}, function (data){

                    if(data === "1"){
                        $("#alert-change-password").html("Password updated successfully!").addClass("alert alert-success");
                        window.setTimeout(function (){
                            window.location = "../controller/logincontroller.php?status=logout";
                        }, 3000);
                    }
                })
            }
        });
    });

</script>