$(document).ready(function (){
    $("button[name='cus_submit']").click(function (){


        //Getting Fields
        let cusName = $("#cus_name");
        let cn1 = $("#cn1");
        let email = $("#cus_email");
        let vehicleNo = $("#cus_vehicle_no");


        let errorDiv = $("#error_new_customer");

        if(vehicleNo.val() === "")
        {
            errorDiv.html("Please Enter Customer Vehicle Number!").addClass("alert alert-danger");
            vehicleNo.focus();
            return false;
        }
        const vehicleNoPat = /^([a-zA-Z]{1,3}|((?!0*-)[0-9]{1,3}))-[0-9]{4}(?<!0{4})$/;

        if(!(vehicleNo.val().match(vehicleNoPat)))
        {
            errorDiv.html("Please A Valid Vehicle Number").addClass("alert alert-danger");
            vehicleNo.focus();
            return false;
        }

        if(cusName.val() === "")
        {
            errorDiv.html("Please Enter Customer Name!").addClass("alert alert-danger");
            cusName.focus();
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


        if((email.val().length !== 0) && !(email.val().match(emailPat)))
        {
            errorDiv.html("Please A Valid Email Address").addClass("alert alert-danger");
            email.focus();
            return false;
        }

        let url = "../controller/customercontroller.php?status=check_vehicle_no";
        let vn = vehicleNo.val();

        $.post(url,{vn:vn}, function (data){
            if($.trim(data))
            {
                errorDiv.html(data).addClass("alert alert-danger");
                vehicleNo.focus();
                return false;
            }

        });


    });
})