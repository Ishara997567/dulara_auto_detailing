$(document).ready(function (){

    const firstNamePencil = $("#btn-manage-fn-pencil");
    const firstNameCheck = $("#btn-manage-fn-check");
    const firstNameText = $("#first_name");

    const lastNamePencil = $("#btn-manage-ln-pencil");
    const lastNameCheck = $("#btn-manage-ln-check");
    const lastNameText = $("#last_name");


    const emailPencil = $("#btn-manage-email-pencil");
    const emailCheck = $("#btn-manage-email-check");
    const emailText = $("#email");


    const genderPencil = $("#btn-manage-gender-pencil");
    const genderCheck = $("#btn-manage-gender-check");
    const genderText = $("#gender");


    const dobPencil = $("#btn-manage-dob-pencil");
    const dobCheck = $("#btn-manage-dob-check");
    const dobText = $("#dob");

    const NICPencil = $("#btn-manage-nic-pencil");
    const NICCheck = $("#btn-manage-nic-check");
    const NICText = $("#nic");


    const ContactNo1Pencil = $("#btn-manage-cn1-pencil");
    const ContactNo1Check = $("#btn-manage-cn1-check");
    const ContactNo1Text = $("#cn1");


    const ContactNo2Pencil = $("#btn-manage-cn2-pencil");
    const ContactNo2Check = $("#btn-manage-cn2-check");
    const ContactNo2Text = $("#cn2");


    const UserRolePencil = $("#btn-manage-user-role-pencil");
    const UserRoleCheck = $("#btn-manage-user-role-check");
    const UserRoleText = $("#user_role");



    firstNameCheck.hide();
    lastNameCheck.hide();
    emailCheck.hide();
    genderCheck.hide();
    dobCheck.hide();
    NICCheck.hide();
    ContactNo1Check.hide();
    ContactNo2Check.hide();
    UserRoleCheck.hide();

    changeButtons(firstNamePencil, firstNameCheck, firstNameText);
    changeButtons(lastNamePencil, lastNameCheck, lastNameText);
    changeButtons(emailPencil, emailCheck, emailText);
    changeButtonsInSelect(genderPencil, genderCheck, genderText);
    changeButtons(dobPencil, dobCheck, dobText);
    changeButtons(NICPencil, NICCheck, NICText);
    changeButtons(ContactNo1Pencil, ContactNo1Check, ContactNo1Text);
    changeButtons(ContactNo2Pencil, ContactNo2Check, ContactNo2Text);
    changeButtonsInSelect(UserRolePencil, UserRoleCheck, UserRoleText);


    function changeButtons(pencil, check, textbox) {
        pencil.click(function () {
            $(this).hide();
            check.show();
            textbox.prop("readonly", false);

            check.click(function () {
                textbox.prop("readonly", true);
                $(this).hide();
                pencil.show();
            });

        });
    }

    function changeButtonsInSelect(pencil, check, textbox) {
        pencil.click(function () {
            $(this).hide();
            check.show();
            textbox.prop("disabled", false);

            check.click(function () {
                textbox.prop("disabled", true);
                $(this).hide();
                pencil.show();
            });

        });
    }

    //updating the database asynchronously
    let url = "../controller/usercontroller.php?status=update_user";
    const userIDToUpdate = $("#session_user_id").val();
    const messageDiv = $("#alert_manage_user");

    const email_pat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;
    const nic_pat = /^([0-9]{9}[x|X|v|V]|[0-9]{12})$/;
    const phone_pat = /^07[0-9]{8}$/;

    //update first name
    firstNameCheck.click(function (){
        let firstName = firstNameText.val();
        //validation
        if(firstName === ""){
            messageDiv.html("First Name cannot be empty!").addClass("alert alert-danger");
            firstNameText.focus();
            return false;
        }
        $.post(url, {userIDToUpdate : userIDToUpdate, firstName: firstName}, function (data){
            if(data === "1") {
                messageDiv.html("Your First Name has been updated successfully! <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span></button>").addClass("alert alert-success alert-dismissible fade show");
                messageDiv.focus();
            } else {
                messageDiv.html("Your First Name failed to update... Try again! <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span></button>").addClass("alert alert-danger alert-dismissible fade show");
                messageDiv.focus();
            }
        })
    });

    //update last name
    lastNameCheck.click(function (){
        let lastName = lastNameText.val();

        //validation
        if(lastName === ""){
            messageDiv.html("Last Name cannot be empty!").addClass("alert alert-danger");
            lastNameText.focus();
            return false;
        }


        $.post(url, {userIDToUpdate : userIDToUpdate, lastName: lastName}, function (data){
            if(data === "1") {
                messageDiv.html("Your Last Name has been updated successfully! <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span></button>").addClass("alert alert-success alert-dismissible fade show");
                messageDiv.focus();
            } else {
                messageDiv.html("Your Last Name failed to update... Try again! <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span></button>").addClass("alert alert-danger alert-dismissible fade show");
                messageDiv.focus();
            }
        })
    });


    //update email
    emailCheck.click(function (){
        let email = emailText.val();

        //validation
        if(email === ""){
            messageDiv.html("Email cannot be empty!").addClass("alert alert-danger");
            emailText.focus();
            return false;
        }

        if(!email.match(email_pat)){
            messageDiv.html("Please enter an valid Email address!").addClass("alert alert-danger");
            emailText.focus();
            return false;
        }

        $.post(url, {userIDToUpdate : userIDToUpdate, email: email}, function (data){
            if(data === "1") {
                messageDiv.html("Your Email has been updated successfully! <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span></button>").addClass("alert alert-success alert-dismissible fade show");
                messageDiv.focus();
            } else {
                messageDiv.html("Your Email failed to update... Try again! <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span></button>").addClass("alert alert-danger alert-dismissible fade show");
                messageDiv.focus();
            }
        })
    });


    //update dob
    dobCheck.click(function (){
        let dob = dobText.val();
        //validation
        if(dob === ""){
            messageDiv.html("Date of Birth cannot be empty!").addClass("alert alert-danger");
            dobText.focus();
            return false;
        }
        $.post(url, {userIDToUpdate : userIDToUpdate, dob: dob}, function (data){
            if(data === "1") {
                messageDiv.html("Your Date of Birth has been updated successfully! <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span></button>").addClass("alert alert-success alert-dismissible fade show");
                messageDiv.focus();
            } else {
                messageDiv.html("Your Date of Birth failed to update... Try again! <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span></button>").addClass("alert alert-danger alert-dismissible fade show");
                messageDiv.focus();
            }
        })
    });


    //update gender
    genderCheck.click(function (){
        let gender = genderText.val();
        $.post(url, {userIDToUpdate : userIDToUpdate, gender: gender}, function (data){
            if(data === "1") {
                messageDiv.html("Your Gender has been updated successfully! <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span></button>").addClass("alert alert-success alert-dismissible fade show");
                messageDiv.focus();
            } else {
                messageDiv.html("Your Gender failed to update... Try again! <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span></button>").addClass("alert alert-danger alert-dismissible fade show");
                messageDiv.focus();
            }
        })
    });

    //update nic
    NICCheck.click(function (){
        let nic = NICText.val();

        //validation
        if(nic === ""){
            messageDiv.html("NIC cannot be empty!").addClass("alert alert-danger");
            NICText.focus();
            return false;
        }

        if(!nic.match(nic_pat)){
            messageDiv.html("Please enter a valid NIC number of you!").addClass("alert alert-danger");
            NICText.focus();
            return false;
        }

        $.post(url, {userIDToUpdate : userIDToUpdate, nic: nic}, function (data){
            if(data === "1") {
                messageDiv.html("Your NIC has been updated successfully! <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span></button>").addClass("alert alert-success alert-dismissible fade show");
                messageDiv.focus();
            } else {
                messageDiv.html("Your NIC failed to update... Try again! <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span></button>").addClass("alert alert-danger alert-dismissible fade show");
                messageDiv.focus();
            }
        })
    });


    //update CN1
    ContactNo1Check.click(function (){
        let cn1 = ContactNo1Text.val();

        //validation
        if(cn1 === ""){
            messageDiv.html("Contact Number cannot be empty!").addClass("alert alert-danger");
            ContactNo1Text.focus();
            return false;
        }

        if(!cn1.match(phone_pat)){
            messageDiv.html("Please enter a valid Contact Number!").addClass("alert alert-danger");
            ContactNo1Text.focus();
            return false;
        }

        $.post(url, {userIDToUpdate : userIDToUpdate, cn1: cn1}, function (data){
            if(data === "1") {
                messageDiv.html("Your Contact Number has been updated successfully! <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span></button>").addClass("alert alert-success alert-dismissible fade show");
                messageDiv.focus();
            } else {
                messageDiv.html("Your Contact Number failed to update... Try again! <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span></button>").addClass("alert alert-danger alert-dismissible fade show");
                messageDiv.focus();
            }
        })
    });

    //update CN2
    ContactNo2Check.click(function (){
        let cn2 = ContactNo2Text.val();

        //validation
        if(cn2 === ""){
            messageDiv.html("Contact Number cannot be empty!").addClass("alert alert-danger");
            ContactNo2Text.focus();
            return false;
        }

        if(!cn2.match(phone_pat)){
            messageDiv.html("Please enter a valid Contact Number!").addClass("alert alert-danger");
            ContactNo2Text.focus();
            return false;
        }

        $.post(url, {userIDToUpdate : userIDToUpdate, cn2: cn2}, function (data){
            if(data === "1") {
                messageDiv.html("Your Contact Number has been updated successfully! <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span></button>").addClass("alert alert-success alert-dismissible fade show");
                messageDiv.focus();
            } else {
                messageDiv.html("Your Contact Number failed to update... Try again! <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span></button>").addClass("alert alert-danger alert-dismissible fade show");
                messageDiv.focus();
            }
        })
    });



//update user role
    UserRoleCheck.click(function (){
        let userRole = UserRoleText.val();
        $.post(url, {userIDToUpdate : userIDToUpdate, userRole: userRole}, function (data){
            if(data === "1") {
                messageDiv.html("Your Role has been updated successfully! <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span></button>").addClass("alert alert-success alert-dismissible fade show");
                messageDiv.focus();
            } else {
                messageDiv.html("Your Role failed to update... Try again! <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span></button>").addClass("alert alert-danger alert-dismissible fade show");
                messageDiv.focus();
            }
        })
    });
    $("#input_photo").change(function (){
        const url = "../controller/usercontroller.php?status=upload_photo";
        let formData = new FormData();
        let files = $("#input_photo")[0].files;

        if(files.length > 0){
            formData.append('file', files[0]);
            $.ajax({
                url: url,
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response != 0){
                        $(".preview").append("<img src='"+response+"' id='img' width='200' height='200' alt='Please Upload an image!'/>")
                        $("#btn-upload-profile-photo").click(function (){
                            const u = "../controller/usercontroller.php?status=change_photo";
                            $.post(u, {filename:response, userIDToUpdate:userIDToUpdate},function (){
                                window.setTimeout(function (){
                                    location.reload(true);
                                });
                            });
                        })
                    } else{
                        alert('file not uploaded');
                    }
                },
            });
        }else{
            alert("Please select a file.");
        }
        });

    $("#btn-remove-profile-photo").click(function (){
        const url = "../controller/usercontroller.php?status=remove_photo";
        $.get(url,{userIDToUpdate:userIDToUpdate},function (){
            window.setTimeout(function (){
                location.reload(true);
            });
        });
    })
});