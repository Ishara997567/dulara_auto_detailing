$(document).ready(function (){
    $(".tbl-loyalty-manage").on("click", "#modal_link a", function () {
        let loyaltyID = $(this).data('id');
        let url = "../controller/customercontroller.php?status=manage_loyalty";

        $.post(url, {loyaltyID: loyaltyID}, function (data) {
            $(".customer-loyalty-modal").html(data).show();


            const loyaltyNamePencil = $("#btn_loyalty_name_pencil");
            const loyaltyPointsPencil = $("#btn_loyalty_points_pencil");
            const loyaltyRewardPencil = $("#btn_loyalty_reward_pencil");

            const loyaltyNameCheck = $("#btn_loyalty_name_check");
            const loyaltyPointsCheck = $("#btn_loyalty_points_check");
            const loyaltyRewardCheck = $("#btn_loyalty_reward_check");


            let loyaltyNameText = $("#manage_loy_name");
            let loyaltyPointsText = $("#manage_loy_points");
            let loyaltyRewardText = $("#manage_loy_reward");


            loyaltyNameCheck.hide();
            loyaltyPointsCheck.hide();
            loyaltyRewardCheck.hide();

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

            changeButtons(loyaltyNamePencil, loyaltyNameCheck, loyaltyNameText);
            changeButtons(loyaltyPointsPencil, loyaltyPointsCheck, loyaltyPointsText);
            changeButtons(loyaltyRewardPencil, loyaltyRewardCheck, loyaltyRewardText);


            //updating the database asynchronously
            let url = "../controller/customercontroller.php?status=loyalty_update";
            let messageDiv = $(".update-message");

            //loyalty name
            loyaltyNameCheck.on("click", function () {
                let loyaltyName = loyaltyNameText.val();
                $.post(url, {loyaltyID: loyaltyID, loyaltyName: loyaltyName}, function (data, success) {
                    if (success) {
                        messageDiv.html("Loyalty Program Name Updated Successfully!").addClass("alert alert-success");
                    } else {
                        messageDiv.html("Loyalty Program Name Failed to  Update!").addClass("alert alert-danger");

                    }
                });

            });

            //loyalty points
            loyaltyPointsCheck.on("click", function () {
                let loyaltyPoints = loyaltyPointsText.val();
                $.post(url, {loyaltyID: loyaltyID, loyaltyPoints: loyaltyPoints}, function (data, success) {
                    if (success) {
                        messageDiv.html("Loyalty Program Points Updated Successfully!").addClass("alert alert-success");
                    } else {
                        messageDiv.html("Loyalty Program Points Failed to  Update!").addClass("alert alert-danger");

                    }
                });

            });

            //loyalty reward
            loyaltyRewardCheck.on("click", function () {
                let loyaltyReward = loyaltyRewardText.val();
                $.post(url, {loyaltyID: loyaltyID, loyaltyReward: loyaltyReward}, function (data, success) {
                    if (success) {
                        messageDiv.html("Loyalty Program Reward Updated Successfully!").addClass("alert alert-success");
                    } else {
                        messageDiv.html("Loyalty Program Reward Failed to  Update!").addClass("alert alert-danger");

                    }
                });

            });

        });
    });

    $(".tbl-loyalty-manage").on("click", "#modal_delete_link a", function () {
        let loyaltyID = $(this).data('id');
        const url = "../controller/customercontroller.php?status=delete_loyalty";
        $("#btn_modal_delete_loyalty_confirm").click(function (){
            $.post(url, {delete_loyalty_id: loyaltyID}, function (data) {
                $(".div-delete-message").html(data).addClass("alert alert-danger");
                $("#modal_delete_loyalty").modal('hide');
                window.setTimeout(function(){location.reload()},3000)
            });
        });
    });

    $(".tbl-loyalty-point").on("click", "#modal_point_delete_link a", function () {
        let pointID = $(this).data('id');
        const url = "../controller/customercontroller.php?status=delete_loyalty_point";
        $("#btn_modal_delete_loyalty_point_confirm").click(function (){
            $.post(url, {pointID: pointID}, function (data) {
                $(".div-delete-point-message").html(data).addClass("alert alert-danger");
                $("#modal_delete_loyalty_points").modal('hide');
                window.setTimeout(function(){window.location.reload(true)},3000)
            });
        });
    });

})