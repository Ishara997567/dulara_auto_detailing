$(document).ready(function (){
    $("#emp_submit").click(function (e){

        const contactNoPat = /^0[0-9]{9}$/;
        const emailPat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;
        var nicPat = /^([0-9]{9}[x|X|v|V]|[0-9]{12})$/;


        let empFirstName = $("#emp_fn").val();
        let empLastName = $("#emp_ln").val();
        let empDOB = $("#emp_dob").val();
        let empNIC = $("#emp_nic").val();
        let empLicenseType = $("#emp_licenseType").val();
        let empLicenseNumber = $("#emp_licenseNo").val();
        let empBloodGroup = $("#emp_bloodGroup").val();
        let empEmail = $("#emp_email").val();

        let empContactNoTypeArr = $("select[name='select_numberType[]']").map(function (){
            return this.value;
        }).get();

        let empContactNoArr = $("input[name='text_number[]']").map(function (){
            return this.value;
        }).get();


        let empDesignation = $("#emp_des").val();


        if(empFirstName == "")
        {
            $("#employee_validation").html("Please Enter Employee First Name").addClass("alert alert-danger");
            $("#emp_fn").focus();
            return false;
        }

        if(empLastName == "")
        {
            $("#employee_validation").html("Please Enter Employee Last Name").addClass("alert alert-danger");
            $("#emp_ln").focus();
            return false;
        }

        if(empDOB == "")
        {
            $("#employee_validation").html("Please Enter Employee Date of Birth").addClass("alert alert-danger");
            $("#emp_dob").focus();
            return false;
        }

        if(empNIC == "")
        {
            $("#employee_validation").html("Please Enter Employee NIC").addClass("alert alert-danger");
            $("#emp_nic").focus();
            return false;
        }

        if(!empNIC.match(nicPat))
        {
            $("#employee_validation").html("Please A Valid Employee NIC").addClass("alert alert-danger");
            $("#emp_nic").focus();
            return false;
        }


        if(empBloodGroup == "choose")
        {
            $("#employee_validation").html("Please Select Employee Blood Group").addClass("alert alert-danger");
            $("#emp_bloodGroup").focus();
            return false;
        }

        if(!(empEmail == ""))
        {
            if(!empEmail.match(emailPat)) {
                $("#employee_validation").html("Please Enter A Valid Employee Email").addClass("alert alert-danger");
                $("#emp_email").focus();
                return false;
            }
        }

        if(empDesignation == "")
        {
            $("#employee_validation").html("Please Enter Employee Designation").addClass("alert alert-danger");
            $("#emp_des").focus();
            return false;
        }

        if(empContactNoTypeArr.length === 0)
        {
            $("#employee_validation").html("Please Select At Least One Employee Contact Number Type").addClass("alert alert-danger");
            $("#btn_addContactNo").focus();
            return false;
        }

        let errorNumEmpty = 0 ;
        let errorNumPat = 0;

        $.each(empContactNoArr, function (i,e){
                errorNumEmpty = e === "" ? 1 : 0;
                errorNumPat = !e.match(contactNoPat) ? 1 : 0;
        });

        if(errorNumEmpty !== 0) {
            $("#employee_validation").html("Please Enter The Employee Contact Number").addClass("alert alert-danger");
            $("input[name='text_number[]']").focus();
            return false;
        }

        if(errorNumPat !== 0) {
            $("#employee_validation").html("Please Enter A Valid Employee Contact Number").addClass("alert alert-danger");
            $("input[name='text_number[]']").focus();
            return false;
        }
    });
});