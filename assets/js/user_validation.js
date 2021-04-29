$(document).ready(function(){
    $("#frm_new_user").submit(function(){

        // Getting POST values into variables
        var fn = $("#first_name").val();
        var ln = $("#last_name").val();
        var email = $("#email").val();
        var dob = $("#dob").val();
        var nic = $("#nic").val();
        var cn1 = $("#cn1").val();
        var cn2 = $("#cn2").val();
        var $user_role = $("#user_role").val();


        //Regular Expression Patters
        var email_pat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;
        var nic_pat = /^([0-9]{9}[x|X|v|V]|[0-9]{12})$/;
        var phone_pat = /^07[0-9]{8}$/;


        //Validations


        //first name
        if(fn == ""){
            $("#alert_new_user").html("First Name Cannot Be Empty");
            $("#alert_new_user").addClass("alert alert-danger");
            $("#first_name").focus();

            return false;
        }
        //last name
        if(ln == ""){
            $("#alert_new_user").html("Last Name Cannot Be Empty");
            $("#alert_new_user").addClass("alert alert-danger");
            $("#last_name").focus();

            return false;
        }

        //email
        if(!email.match(email_pat)){
            $("#alert_new_user").html("Please Check Your Email!");
            $("#alert_new_user").addClass("alert alert-danger");
            $("#alert_new_user").focus();

            return false;
        }




        //dob
        if(dob == "") {
            $("#alert_new_user").html("Please Enter Your Date of Birth");
            $("#alert_new_user").addClass("alert alert-danger");
            $("#dob").focus();

            return false;
        }

        //nic
        if(!nic.match(nic_pat)) {

            $("#alert_new_user").html("Invalid NIC");
            $("#alert_new_user").addClass("alert alert-danger");
            $("#nic").focus();

            return false;
        }

        //contact no 1
        if(!cn1.match(phone_pat)){
            $("#alert_new_user").html("Contact Number 1 is invalid");
            $("#alert_new_user").addClass("alert alert-danger");
            $("#cn1").focus();

            return false;
        }

        //contact no 2
        if(!cn2.match(phone_pat)){
            $("#alert_new_user").html("Contact Number 2 is invalid");
            $("#alert_new_user").addClass("alert alert-danger");
            $("#cn2").focus();

            return false;
        }

        //Check to see whether a user role is selected

        if($user_role == "choose"){
            $("#alert_new_user").html("Please Select A User Access Level For The User!");
            $("#alert_new_user").addClass("alert alert-danger");
            $(this).focus();

            return false;
        }

        //End of Validations
    });
});