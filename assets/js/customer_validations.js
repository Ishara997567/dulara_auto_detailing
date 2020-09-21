$(document).ready(function (){
    $("button[name='cus_submit']").click(function (){

        //Getting Fields
        let cusName = $("#cus_name");
        let homeNo = $("#home_no");
        let streetNo = $("#s_name");
        let cn1 = $("#cn1");
        let email = $("#cus_email");

        let errorDiv = $("#error_new_customer");

        if(cusName.val() === "")
        {
            errorDiv.html("Please Enter Customer Name!").addClass("alert alert-danger");
            cusName.focus();
            return false;
        }

        if(homeNo.val() === "")
        {
            errorDiv.html("Please Enter Customer Address!").addClass("alert alert-danger");
            homeNo.focus();
            return false;
        }

        if(streetNo.val() === "")
        {
            errorDiv.html("Please Enter Customer Address!").addClass("alert alert-danger");
            streetNo.focus();
            return false;
        }

        if(cn1.val() === "")
        {
            errorDiv.html("Please Enter Customer Contact Number!").addClass("alert alert-danger");
            cn1.focus();
            return false;
        }


        const contactNoPat = /^07[0-9]{8}$/;
        const emailPat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;

        if(!(cn1.val().match(contactNoPat)))
        {
            errorDiv.html("Please A Valid Mobile Number").addClass("alert alert-danger");
            cn1.focus();
            return false;
        }

        if(!(email.val().match(emailPat)))
        {
            errorDiv.html("Please A Valid Email Address").addClass("alert alert-danger");
            email.focus();
            return false;
        }

    });
})