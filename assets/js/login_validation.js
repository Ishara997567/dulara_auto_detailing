$(document).ready(function (){

    $("#loginform").submit(function (){

        var username=$("#username").val();
        var password=$("#password").val();


        if(username == "" && password== "")
        {
            $("#alertmsg").html("Username and Password Cannot be Empty!!!");
            $("#alertmsg").addClass("alert alert-danger");
            return false;
        }
        else
        {
            if(username=="")
            {

                $("#alertmsg").html("Username Cannot be Empty!!!");
                $("#alertmsg").addClass("alert alert-danger");
                $("#username").focus();
                return false;
            }
            if(password==""){
                $("#alertmsg").html("Password Cannot be Empty!!!");
                $("#alertmsg").addClass("alert alert-danger");
                $("#password").focus();

                return false;
            }
            else{
                return true;
            }
        }



    });


});
