$(document).ready(function (){
    $(".table-employee tbody tr").on("click", "td a", function (){
        let empID = $(this).data('id');

        let url = "../controller/employeecontroller.php?status=manage_employee";
        $.post(url, {empID: empID}, function (data){
            $(".employee-manage-content").html(data);

            //Hiding the Check Buttons
            $("#btn_emp_fn_check").hide();
            $("#btn_emp_license_type_check").hide();
            $("#btn_emp_license_no_check").hide();
            $("#btn_emp_ln_check").hide();
            $("#btn_emp_blood_group_check").hide();
            $("#btn_emp_dob_check").hide();
            $("#btn_emp_email_check").hide();
            $("#btn_emp_nic_check").hide();
            $("#btn_emp_address_check").hide();

            $("#btn_emp_epf_check").hide();
            $("#btn_emp_etf_check").hide();
            $("#btn_emp_des_check").hide();
            $("#btn_emp_app_date_check").hide();

            $("#btn_emp_in_time_check").hide();
            $("#btn_emp_out_time_check").hide();
            $("#btn_emp_off_day_check").hide();
            $("#btn_emp_half_day_check").hide();


            $("#select_manage_emp_license_type").hide();
            $("#select_emp_blood_group").hide();
            $("#select_emp_off_day").hide();
            $("#select_emp_half_day").hide();

            let messageDiv = $("#manage_employee_message");


            //Sub Array Check Hiding - Illness
            let i;
            let empIllnessNameArray = $("input[name='manage_emp_illness_name[]']");
            for(i=1; i<=empIllnessNameArray.length; i++)
            {
                $("#btn_emp_illness_name_check_"+i).hide();
                $("#manage_emp_check_is_going_"+i).hide();
            }

            //Sub Array Check Hiding - Contact No
            let j;
            let empContactNoArray = $("input[name='manage_emp_contact_no[]']");
            for(j=1; j<=empContactNoArray.length; j++)
            {
                $("#btn_emp_contact_check_"+j).hide();
                $("#select_emp_contact_type_"+j).hide();
            }



            //Employee First Name
            $("#btn_emp_fn_pencil").click(function () {
                $(this).hide();
                $('#btn_emp_fn_check').show();
                $("#manage_emp_fn").prop("readonly", false);

                $("#btn_emp_fn_check").click(function () {
                    $("#manage_emp_fn").prop("readonly", true);
                    $(this).hide();
                    $("#btn_emp_fn_pencil").show();
                });

            });


            //Employee License Type
            $("#btn_emp_license_type_pencil").click(function (){
                $(this).hide();
                $('#btn_emp_license_type_check').show();
                $("input[id='manage_emp_license_type']").hide();
                $("#select_manage_emp_license_type").show();

                $("#btn_emp_license_type_check").click(function(){
                    $(this).hide();
                    $("#btn_emp_license_type_pencil").show();
                    let selectedValue = $("#select_manage_emp_license_type option:selected").text();
                    $("#select_manage_emp_license_type").hide();
                    $("input[id='manage_emp_license_type']").show().val(selectedValue);
                });
            });

            //Employee License Number
            $("#btn_emp_license_no_pencil").click(function () {
                $(this).hide();
                $('#btn_emp_license_no_check').show();
                $("#manage_emp_license_number").prop("readonly", false);

                $("#btn_emp_license_no_check").click(function () {
                    $("#manage_emp_license_number").prop("readonly", true);
                    $(this).hide();
                    $("#btn_emp_license_no_pencil").show();
                });

            });

            //Employee Last name
            $("#btn_emp_ln_pencil").click(function () {
                $(this).hide();
                $('#btn_emp_ln_check').show();
                $("#manage_emp_ln").prop("readonly", false);

                $("#btn_emp_ln_check").click(function () {
                    $("#manage_emp_ln").prop("readonly", true);
                    $(this).hide();
                    $("#btn_emp_ln_pencil").show();
                });

            });

            //Emp Blood Group
            $("#btn_emp_blood_group_pencil").click(function (){
                $(this).hide();
                $('#btn_emp_blood_group_check').show();
                $("input[id='manage_emp_blood_group']").hide();
                $("#select_emp_blood_group").show();

                $("#btn_emp_blood_group_check").click(function(){
                    $(this).hide();
                    $("#btn_emp_blood_group_pencil").show();
                    let selectedValue = $("#select_emp_blood_group option:selected").text();
                    $("#select_emp_blood_group").hide();
                    $("input[id='manage_emp_blood_group']").show().val(selectedValue);
                });
            });

            //Employee Date of Birth
            $("#btn_emp_dob_pencil").click(function () {
                $(this).hide();
                $('#btn_emp_dob_check').show();
                $("#manage_emp_dob").prop("readonly", false);

                $("#btn_emp_dob_check").click(function () {
                    $("#manage_emp_dob").prop("readonly", true);
                    $(this).hide();
                    $("#btn_emp_dob_pencil").show();
                });

            });

            //Employee Email
            $("#btn_emp_email_pencil").click(function () {
                $(this).hide();
                $('#btn_emp_email_check').show();
                $("#manage_emp_email").prop("readonly", false);

                $("#btn_emp_email_check").click(function () {
                    $("#manage_emp_email").prop("readonly", true);
                    $(this).hide();
                    $("#btn_emp_email_pencil").show();
                });

            });

            //Employee NIC
            $("#btn_emp_nic_pencil").click(function () {
                $(this).hide();
                $('#btn_emp_nic_check').show();
                $("#manage_emp_nic").prop("readonly", false);

                $("#btn_emp_nic_check").click(function () {
                    $("#manage_emp_nic").prop("readonly", true);
                    $(this).hide();
                    $("#btn_emp_nic_pencil").show();
                });

            });

            //Employee Address
            $("#btn_emp_address_pencil").click(function () {
                $(this).hide();
                $('#btn_emp_address_check').show();
                $("#manage_emp_address").prop("readonly", false);

                $("#btn_emp_address_check").click(function () {
                    $("#manage_emp_address").prop("readonly", true);
                    $(this).hide();
                    $("#btn_emp_address_pencil").show();
                });

            });

            //Employee EPF
            $("#btn_emp_epf_pencil").click(function () {
                $(this).hide();
                $('#btn_emp_epf_check').show();
                $("#manage_emp_epf_no").prop("readonly", false);

                $("#btn_emp_epf_check").click(function () {
                    $("#manage_emp_epf_no").prop("readonly", true);
                    $(this).hide();
                    $("#btn_emp_epf_pencil").show();
                });

            });

            //Employee ETF
            $("#btn_emp_etf_pencil").click(function () {
                $(this).hide();
                $('#btn_emp_etf_check').show();
                $("#manage_emp_etf_no").prop("readonly", false);

                $("#btn_emp_etf_check").click(function () {
                    $("#manage_emp_etf_no").prop("readonly", true);
                    $(this).hide();
                    $("#btn_emp_etf_pencil").show();
                });

            });

            //Employee Designation
            $("#btn_emp_des_pencil").click(function () {
                $(this).hide();
                $('#btn_emp_des_check').show();
                $("#manage_emp_designation").prop("readonly", false);

                $("#btn_emp_des_check").click(function () {
                    $("#manage_emp_designation").prop("readonly", true);
                    $(this).hide();
                    $("#btn_emp_des_pencil").show();
                });

            });

            //Employee Appointed Date
            $("#btn_emp_app_date_pencil").click(function () {
                $(this).hide();
                $('#btn_emp_app_date_check').show();
                $("#manage_emp_app_date").prop("readonly", false);

                $("#btn_emp_app_date_check").click(function () {
                    $("#manage_emp_app_date").prop("readonly", true);
                    $(this).hide();
                    $("#btn_emp_app_date_pencil").show();
                });

            });

            //Employee In Time
            $("#btn_emp_in_time_pencil").click(function () {
                $(this).hide();
                $('#btn_emp_in_time_check').show();
                $("#manage_emp_in_time").prop("readonly", false);

                $("#btn_emp_in_time_check").click(function () {
                    $("#manage_emp_in_time").prop("readonly", true);
                    $(this).hide();
                    $("#btn_emp_in_time_pencil").show();
                });

            });

            //Employee out Time
            $("#btn_emp_out_time_pencil").click(function () {
                $(this).hide();
                $('#btn_emp_out_time_check').show();
                $("#manage_emp_out_time").prop("readonly", false);

                $("#btn_emp_out_time_check").click(function () {
                    $("#manage_emp_out_time").prop("readonly", true);
                    $(this).hide();
                    $("#btn_emp_out_time_pencil").show();
                });

            });

            //Employee Off Day
            $("#btn_emp_off_day_pencil").click(function (){
                $(this).hide();
                $('#btn_emp_off_day_check').show();
                $("input[id='manage_emp_off_day']").hide();
                $("#select_emp_off_day").show();

                $("#btn_emp_off_day_check").click(function(){
                    $(this).hide();
                    $("#btn_emp_off_day_pencil").show();
                    let selectedValue = $("#select_emp_off_day option:selected").text();
                    $("#select_emp_off_day").hide();
                    $("input[id='manage_emp_off_day']").show().val(selectedValue);
                });
            });

            //Employee half Day
            $("#btn_emp_half_day_pencil").click(function (){
                $(this).hide();
                $('#btn_emp_half_day_check').show();
                $("input[id='manage_emp_half_day']").hide();
                $("#select_emp_half_day").show();

                $("#btn_emp_half_day_check").click(function(){
                    $(this).hide();
                    $("#btn_emp_half_day_pencil").show();
                    let selectedValue = $("#select_emp_half_day option:selected").text();
                    $("#select_emp_half_day").hide();
                    $("input[id='manage_emp_half_day']").show().val(selectedValue);
                });
            });

            let u = "../controller/employeecontroller.php?status=update_employee";

            //Employee Illness Name
            $("button[name='btn_emp_illness_name_pencil[]']").click(function (){
                let index = $(this).data('id');

                $(this).hide();
                $("#btn_emp_illness_name_check_"+index).show();
                $("#manage_emp_check_is_going_"+index).prop("disabled", false);
                $("#manage_emp_illness_name_"+index).prop("readonly", false);

                $("#manage_emp_is_going_"+index).hide();
                $("#manage_emp_check_is_going_"+index).show();


                $("#btn_emp_illness_name_check_"+index).click(function () {
                    $("#manage_emp_illness_name_"+index).prop("readonly", true);
                    $("#manage_emp_check_is_going_"+index).prop("disabled", true);
                    $(this).hide();
                    $("#btn_emp_illness_name_pencil_"+index).show();
                });
            });

            //Updating Employee Illness Database
            $("button[name='btn_emp_illness_name_check[]']").click(function (){
                let id = $(this).data('id');


                let illnessID = $("#hidden_emp_illness_id_"+id).val();
                let illnessName = $("#manage_emp_illness_name_"+id).val();
                let isGoing = $("#manage_emp_check_is_going_"+id).prop("checked") ? 1 : 0;

                $.post(u, {empID:empID, illnessID:illnessID, illnessName:illnessName, isGoing:isGoing}, function (data){

                    if(data === "1")
                        messageDiv.html("Employee Illness Details Updated Successfully!").addClass("alert alert-success");
                    else
                        messageDiv.html("Employee Illness Details Failed To Updated!").addClass("alert alert-danger");
                });

            });


            //Employee Contact
            $("button[name='btn_emp_contact_pencil[]']").click(function (){
                let index = $(this).data('id');

                $(this).hide();
                $('#select_emp_contact_type_'+index).show();
                $("#manage_emp_contact_type_"+index).hide();
                $("#manage_emp_contact_no_"+index).prop("readonly",false);
                $("#btn_emp_contact_check_"+index).show();

                $("#btn_emp_contact_check_"+index).click(function(){
                    $(this).hide();
                    $("#btn_emp_contact_pencil_"+index).show();
                    $("#manage_emp_contact_no_"+index).prop("readonly",true);
                    let selectedValue = $("select[id='select_emp_contact_type_"+index+"'] option:selected").text();
                    $("#select_emp_contact_type_"+index).hide();
                    $("#manage_emp_contact_type_"+index).show().val(selectedValue);

                });
            });

            //Updating Database
            $("button[name='btn_emp_contact_check[]']").click(function (){
                let id = $(this).data('id');
                let contactID = $("#hidden_emp_contact_id_"+id).val();
                let contactType = $("select[id='select_emp_contact_type_"+id+"'] option:selected").text()
                let contactNo = $("#manage_emp_contact_no_"+id).val();


                $.post(u, {empID:empID, contactID:contactID, contactType:contactType, contactNo:contactNo}, function (data) {

                    if(data == "1")
                        messageDiv.html("Employee Contact Details Updated Successfully!").addClass("alert alert-success");
                    else
                        messageDiv.html("Employee Contact Details Failed To Updated!").addClass("alert alert-danger");
                });
            });

            //Employee First Name
            $("#btn_emp_fn_check").click(function (){
                let firstName = $("#manage_emp_fn").val();
                $.post(u, {empID:empID, firstName:firstName}, function (data){
                    if(data == "1")
                        messageDiv.html("Employee First Name Updated Successfully!").addClass("alert alert-success");
                    else
                        messageDiv.html("Employee First Name Failed To Updated!").addClass("alert alert-danger");
                });
            });

            //Employee Last Name
            $("#btn_emp_ln_check").click(function (){
                let lastName = $("#manage_emp_ln").val();
                $.post(u, {empID:empID, lastName:lastName}, function (data){
                    if(data == "1")
                        messageDiv.html("Employee Last Name Updated Successfully!").addClass("alert alert-success");
                    else
                        messageDiv.html("Employee Last Name Failed To Updated!").addClass("alert alert-danger");
                });
            });

            //Employee DOB
            $("#btn_emp_dob_check").click(function (){
                let dob = $("#manage_emp_dob").val();
                $.post(u, {empID:empID, dob:dob}, function (data){
                    if(data == "1")
                        messageDiv.html("Employee Date of Birth Updated Successfully!").addClass("alert alert-success");
                    else
                        messageDiv.html("Employee Date of Birth Failed To Updated!").addClass("alert alert-danger");
                });
            });

            //Employee NIC
            $("#btn_emp_nic_check").click(function (){
                let nic = $("#manage_emp_nic").val();
                $.post(u, {empID:empID, nic:nic}, function (data){
                    if(data == "1")
                        messageDiv.html("Employee NIC Updated Successfully!").addClass("alert alert-success");
                    else
                        messageDiv.html("Employee NIC Failed To Updated!").addClass("alert alert-danger");
                });
            });

            //Employee LicenseType
            $("#btn_emp_license_type_check").click(function (){
                let licenseType = $("#select_manage_emp_license_type").val();
                $.post(u, {empID:empID, licenseType:licenseType}, function (data){
                    if(data == "1")
                        messageDiv.html("Employee License Type Updated Successfully!").addClass("alert alert-success");
                    else
                        messageDiv.html("Employee License Type Failed To Updated!").addClass("alert alert-danger");
                });
            });

            //Employee License No
            $("#btn_emp_license_no_check").click(function (){
                let licenseNO = $("#manage_emp_license_number").val();
                $.post(u, {empID:empID, licenseNO:licenseNO}, function (data){
                    if(data == "1")
                        messageDiv.html("Employee License Number Updated Successfully!").addClass("alert alert-success");
                    else
                        messageDiv.html("Employee License Number Failed To Updated!").addClass("alert alert-danger");
                });
            });

            //Employee Blood Group
            $("#btn_emp_blood_group_check").click(function (){
                let bg = $("#select_emp_blood_group").val();
                $.post(u, {empID:empID, bg:bg}, function (data){
                    if(data == "1")
                        messageDiv.html("Employee Blood Group Updated Successfully!").addClass("alert alert-success");
                    else
                        messageDiv.html("Employee Blood Group Failed To Updated!").addClass("alert alert-danger");
                });
            });

            //Employee Email
            $("#btn_emp_email_check").click(function (){
                let email = $("#manage_emp_email").val();
                $.post(u, {empID:empID, email:email}, function (data){
                    if(data == "1")
                        messageDiv.html("Employee Email Updated Successfully!").addClass("alert alert-success");
                    else
                        messageDiv.html("Employee Email Failed To Updated!").addClass("alert alert-danger");
                });
            });

            //Employee Address
            $("#btn_emp_address_check").click(function (){
                let address = $("#manage_emp_address").val();
                $.post(u, {empID:empID, address:address}, function (data){
                    if(data == "1")
                        messageDiv.html("Employee Address Updated Successfully!").addClass("alert alert-success");
                    else
                        messageDiv.html("Employee Address Failed To Updated!").addClass("alert alert-danger");
                });
            });

            //Employee ETF Number
            $("#btn_emp_etf_check").click(function (){
                let etfNo = $("#manage_emp_etf_no").val();
                $.post(u, {empID:empID, etfNo:etfNo}, function (data){
                    if(data == "1")
                        messageDiv.html("Employee ETF No Updated Successfully!").addClass("alert alert-success");
                    else
                        messageDiv.html("Employee ETF No Failed To Updated!").addClass("alert alert-danger");
                });
            });

            //Employee EPF Number
            $("#btn_emp_epf_check").click(function (){
                let epfNo = $("#manage_emp_epf_no").val();
                $.post(u, {empID:empID, epfNo:epfNo}, function (data){
                    if(data == "1")
                        messageDiv.html("Employee EPF No Updated Successfully!").addClass("alert alert-success");
                    else
                        messageDiv.html("Employee EPF No Failed To Updated!").addClass("alert alert-danger");
                });
            });

            //Employee Designation
            $("#btn_emp_des_check").click(function (){
                let designation = $("#manage_emp_designation").val();
                $.post(u, {empID:empID, designation:designation}, function (data){
                    if(data == "1")
                        messageDiv.html("Employee Designation Updated Successfully!").addClass("alert alert-success");
                    else
                        messageDiv.html("Employee Designation Failed To Updated!").addClass("alert alert-danger");
                });
            });

            //Employee Appointed Date
            $("#btn_emp_app_date_check").click(function (){
                let appDate = $("#manage_emp_app_date").val();
                $.post(u, {empID:empID, appDate:appDate}, function (data){
                    if(data == "1")
                        messageDiv.html("Employee Appointed Date Updated Successfully!").addClass("alert alert-success");
                    else
                        messageDiv.html("Employee Appointed Date Failed To Updated!").addClass("alert alert-danger");
                });
            });

            //Employee Roster In Time
            $("#btn_emp_in_time_check").click(function (){
                let inTime = $("#manage_emp_in_time").val();
                $.post(u, {empID:empID, inTime:inTime}, function (data){
                    if(data == "1")
                        messageDiv.html("Employee Roster In Time Updated Successfully!").addClass("alert alert-success");
                    else
                        messageDiv.html("Employee Roster In Time Failed To Updated!").addClass("alert alert-danger");
                });
            });

            //Employee Roster out Time
            $("#btn_emp_out_time_check").click(function (){
                let outTime = $("#manage_emp_out_time").val();
                $.post(u, {empID:empID, outTime:outTime}, function (data){
                    if(data == "1")
                        messageDiv.html("Employee Roster Out Time Updated Successfully!").addClass("alert alert-success");
                    else
                        messageDiv.html("Employee Roster Out Time Failed To Updated!").addClass("alert alert-danger");
                });
            });

            //Employee Roster Off Day
            $("#btn_emp_off_day_check").click(function (){
                let offDay = $("#select_emp_off_day").val();
                $.post(u, {empID:empID, offDay:offDay}, function (data){
                    if(data == "1")
                        messageDiv.html("Employee Roster Off Day Updated Successfully!").addClass("alert alert-success");
                    else
                        messageDiv.html("Employee Roster Off Day Failed To Updated!").addClass("alert alert-danger");
                });
            });

            //Employee Roster half Day
            $("#btn_emp_half_day_check").click(function (){
                let halfDay = $("#select_emp_half_day").val();
                $.post(u, {empID:empID, halfDay:halfDay}, function (data){
                    if(data == "1")
                        messageDiv.html("Employee Roster Half Day Updated Successfully!").addClass("alert alert-success");
                    else
                        messageDiv.html("Employee Roster Half Day Failed To Updated!").addClass("alert alert-danger");
                });
            });


        });
    });

});