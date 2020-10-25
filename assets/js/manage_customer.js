$(document).ready(function () {
    $(".customer-manage-table").on("click", "#modal_link a", function () {
        let cusId = $(this).data('id');

        let url = "../controller/customercontroller.php?status=manage_customer";

        $.post(url, {cusId: cusId}, function (data) {
            $(".customer-manage-modal").html(data).show();

            //Edit Customer Details
            //Hiding Checks
            $("#btn_cus_name_check").hide();
            $("#btn_cus_add_home_no_check").hide();
            $("#btn_cus_add_street_check").hide();
            $("#btn_cus_add_city_check").hide();
            $("#btn_cus_add_state_check").hide();
            $("#btn_cus_add_cn1_check").hide();
            $("#btn_cus_add_cn2_check").hide();
            $("#btn_cus_email_check").hide();

            //Customer Name
            $("#btn_cus_name_pencil").click(function () {
                $(this).hide();
                $('#btn_cus_name_check').show();
                $("#cus_name").prop("readonly", false);

                $("#btn_cus_name_check").click(function () {
                    $("#cus_name").prop("readonly", true);
                    $(this).hide();
                    $("#btn_cus_name_pencil").show();
                });

            });

            //Customer Home No
            $("#btn_cus_add_home_no_pencil").click(function () {
                $(this).hide();
                $('#btn_cus_add_home_no_check').show();
                $("#home_no").prop("readonly", false);

                $("#btn_cus_add_home_no_check").click(function () {
                    $("#home_no").prop("readonly", true);
                    $(this).hide();
                    $("#btn_cus_add_home_no_pencil").show();
                });

            });

            //Customer Street
            $("#btn_cus_add_street_pencil").click(function () {
                $(this).hide();
                $('#btn_cus_add_street_check').show();
                $("#s_name").prop("readonly", false);

                $("#btn_cus_add_street_check").click(function () {
                    $("#s_name").prop("readonly", true);
                    $(this).hide();
                    $("#btn_cus_add_street_pencil").show();
                });

            });

            //Customer City
            $("#btn_cus_add_city_pencil").click(function () {
                $(this).hide();
                $('#btn_cus_add_city_check').show();
                $("#city").prop("readonly", false);

                $("#btn_cus_add_city_check").click(function () {
                    $("#city").prop("readonly", true);
                    $(this).hide();
                    $("#btn_cus_add_city_pencil").show();
                });

            });

            //Customer State
            $("#btn_cus_add_state_pencil").click(function () {
                $(this).hide();
                $('#btn_cus_add_state_check').show();
                $("#state").prop("readonly", false);

                $("#btn_cus_add_state_check").click(function () {
                    $("#state").prop("readonly", true);
                    $(this).hide();
                    $("#btn_cus_add_state_pencil").show();
                });

            });

            //Customer CN1
            $("#btn_cus_add_cn1_pencil").click(function () {
                $(this).hide();
                $('#btn_cus_add_cn1_check').show();
                $("#cn1").prop("readonly", false);

                $("#btn_cus_add_cn1_check").click(function () {
                    $("#cn1").prop("readonly", true);
                    $(this).hide();
                    $("#btn_cus_add_cn1_pencil").show();
                });

            });

            //Customer CN2
            $("#btn_cus_add_cn2_pencil").click(function () {
                $(this).hide();
                $('#btn_cus_add_cn2_check').show();
                $("#cn2").prop("readonly", false);

                $("#btn_cus_add_cn2_check").click(function () {
                    $("#cn2").prop("readonly", true);
                    $(this).hide();
                    $("#btn_cus_add_cn2_pencil").show();
                });

            });

            //Customer Email
            $("#btn_cus_email_pencil").click(function () {
                $(this).hide();
                $('#btn_cus_email_check').show();
                $("#email").prop("readonly", false);

                $("#btn_cus_email_check").click(function () {
                    $("#email").prop("readonly", true);
                    $(this).hide();
                    $("#btn_cus_email_pencil").show();
                });

            });

            //Updating Database
            let u = "../controller/customercontroller.php?status=update_customer";
            let messageDiv = $(".update-message");

            //cus name
            $("#btn_cus_name_check").on("click", function () {
                let cusName = $("#cus_name").val();
                $.post(u, {cusId: cusId, cusName: cusName}, function (data, success) {
                    if (success) {
                        messageDiv.html("Customer Name Updated Successfully!").addClass("alert alert-success");
                    } else {
                        messageDiv.html("Customer Name Failed to  Update!").addClass("alert alert-danger");

                    }
                })

            });

            //cus home
            $("#btn_cus_add_home_no_check").on("click", function () {
                let homeNo = $("#home_no").val();
                $.post(u, {cusId: cusId, homeNo: homeNo}, function (data, success) {
                    if (success) {
                        messageDiv.html("Customer Address Updated Successfully!").addClass("alert alert-success");
                    } else {
                        messageDiv.html("Customer Address Failed to  Update!").addClass("alert alert-danger");

                    }
                })

            });

            //cus street
            $("#btn_cus_add_street_check").on("click", function () {
                let street = $("#s_name").val();
                $.post(u, {cusId: cusId, street: street}, function (data, success) {
                    if (success) {
                        messageDiv.html("Customer Address Updated Successfully!").addClass("alert alert-success");
                    } else {
                        messageDiv.html("Customer Address Failed to  Update!").addClass("alert alert-danger");

                    }
                })

            });

            //cus city
            $("#btn_cus_add_city_check").on("click", function () {
                let city = $("#city").val();
                $.post(u, {cusId: cusId, city: city}, function (data, success) {
                    if (success) {
                        messageDiv.html("Customer Address Updated Successfully!").addClass("alert alert-success");
                    } else {
                        messageDiv.html("Customer Address Failed to  Update!").addClass("alert alert-danger");

                    }
                })

            });

            //cus state
            $("#btn_cus_add_state_check").on("click", function () {
                let state = $("#state").val();
                $.post(u, {cusId: cusId, state: state}, function (data, success) {
                    if (success) {
                        messageDiv.html("Customer Address Updated Successfully!").addClass("alert alert-success");
                    } else {
                        messageDiv.html("Customer Address Failed to  Update!").addClass("alert alert-danger");

                    }
                })

            });

            //cus cn1
            $("#btn_cus_add_cn1_check").on("click", function () {
                let cn1 = $("#cn1").val();
                $.post(u, {cusId: cusId, cn1: cn1}, function (data, success) {
                    if (success) {
                        messageDiv.html("Customer Contact No 1 Updated Successfully!").addClass("alert alert-success");
                    } else {
                        messageDiv.html("Customer Contact No 1 Failed to  Update!").addClass("alert alert-danger");

                    }
                })

            });

            //cus cn2
            $("#btn_cus_add_cn2_check").on("click", function () {
                let cn2 = $("#cn2").val();
                $.post(u, {cusId: cusId, cn2: cn2}, function (data, success) {
                    if (success) {
                        messageDiv.html("Customer Contact No 2 Updated Successfully!").addClass("alert alert-success");
                    } else {
                        messageDiv.html("Customer Contact No 2 Failed to  Update!").addClass("alert alert-danger");

                    }
                })

            });

            //cus email
            $("#btn_cus_email_check").on("click", function () {
                let email = $("#email").val();
                $.post(u, {cusId: cusId, email: email}, function (data, success) {
                    if (success) {
                        messageDiv.html("Customer Email Updated Successfully!").addClass("alert alert-success");
                    } else {
                        messageDiv.html("Customer Email Failed to  Update!").addClass("alert alert-danger");

                    }
                })

            });
            $(".save-changes").click(function () {
                window.location.reload();
            });

        });


    });
});