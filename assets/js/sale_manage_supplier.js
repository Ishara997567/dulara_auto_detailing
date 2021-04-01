$(document).ready(function (){
    $(".tbl-supplier tbody tr").on("click", "td a", function (){
        let x = $(this).data('id');

        let url = "../controller/salecontroller.php?status=manage_supplier";
        $.post(url, {supplierId:x}, function (data){
            $(".supplier-content").html(data);

            //Hiding All the Check Buttons
            $("#sup_name_check").hide();
            $("#sup_add_home_no_check").hide();
            $("#sup_add_street_check").hide();
            $("#sup_add_city_check").hide();
            $("#sup_add_state_check").hide();
            $("#sup_cn1_check").hide();
            $("#sup_cn2_check").hide();
            $("#sup_email_check").hide();


            //sup_name_change
            $("#sup_name_pencil").click(function () {
                $(this).hide();
                $('#sup_name_check').show();
                $("input[id='manage_sup_name']").prop("readonly", false);

                $("#sup_name_check").click(function () {
                    $("input[id='manage_sup_name']").prop("readonly", true);
                    $(this).hide();
                    $("#sup_name_pencil").show();
                });

            });

            //sup_add_home_change
            $("#sup_add_home_no_pencil").click(function () {
                $(this).hide();
                $('#sup_add_home_no_check').show();
                $("input[id='manage_sup_home_no']").prop("readonly", false);

                $("#sup_add_home_no_check").click(function () {
                    $("input[id='manage_sup_home_no']").prop("readonly", true);
                    $(this).hide();
                    $("#sup_add_home_no_pencil").show();
                });

            });

            //sup_add_steet_change
            $("#sup_add_street_pencil").click(function () {
                $(this).hide();
                $('#sup_add_street_check').show();
                $("input[id='manage_sup_s_name']").prop("readonly", false);

                $("#sup_add_street_check").click(function () {
                    $("input[id='manage_sup_s_name']").prop("readonly", true);
                    $(this).hide();
                    $("#sup_add_street_pencil").show();
                });

            });

            //sup_add_city_change
            $("#sup_add_city_pencil").click(function () {
                $(this).hide();
                $('#sup_add_city_check').show();
                $("input[id='manage_sup_city']").prop("readonly", false);

                $("#sup_add_city_check").click(function () {
                    $("input[id='manage_sup_city']").prop("readonly", true);
                    $(this).hide();
                    $("#sup_add_city_pencil").show();
                });

            });


            //sup_add_state_change
            $("#sup_add_state_pencil").click(function () {
                $(this).hide();
                $('#sup_add_state_check').show();
                $("input[id='manage_sup_state']").prop("readonly", false);

                $("#sup_add_state_check").click(function () {
                    $("input[id='manage_sup_state']").prop("readonly", true);
                    $(this).hide();
                    $("#sup_add_state_pencil").show();
                });

            });

            //sup cn1 change
            $("#sup_cn1_pencil").click(function () {
                $(this).hide();
                $('#sup_cn1_check').show();
                $("input[id='manage_sup_cn1']").prop("readonly", false);

                $("#sup_cn1_check").click(function () {
                    $("input[id='manage_sup_cn1']").prop("readonly", true);
                    $(this).hide();
                    $("#sup_cn1_pencil").show();
                });

            });

            //sup cn2 change
            $("#sup_cn2_pencil").click(function () {
                $(this).hide();
                $('#sup_cn2_check').show();
                $("input[id='manage_sup_cn2']").prop("readonly", false);

                $("#sup_cn2_check").click(function () {
                    $("input[id='manage_sup_cn2']").prop("readonly", true);
                    $(this).hide();
                    $("#sup_cn2_pencil").show();
                });

            });


            //sup email change
            $("#sup_email_pencil").click(function () {
                $(this).hide();
                $('#sup_email_check').show();
                $("input[id='manage_sup_email']").prop("readonly", false);

                $("#sup_email_check").click(function () {
                    $("input[id='manage_sup_email']").prop("readonly", true);
                    $(this).hide();
                    $("#sup_email_pencil").show();
                });

            });

            //Update Supplier Details
            const url = "../controller/salecontroller.php?status=update_supplier";

            //update sup name ajax call
            $("#sup_name_check").click(function(){
                let manageSupName = $("#manage_sup_name").val();
                $.post(url, {manageSupId:x, manageSupName:manageSupName}, function(data)
                {
                    if(data == "1")
                    {
                     $(".supplier-manage-box").html("Supplier Name Updated Successfully!").addClass("alert alert-success");
                    }
                    else{
                        $(".supplier-manage-box").html("Supplier Name Failed to Update!").addClass("alert alert-danger");
                    }
                });
            });


            //update sup add home ajax call
            $("#sup_add_home_no_check").click(function(){
                let manageSupHomeNo = $("#manage_sup_home_no").val();
                $.post(url, {manageSupId:x, manageSupHomeNo:manageSupHomeNo}, function(data)
                {
                    if(data == "1")
                    {
                        $(".supplier-manage-box").html("Supplier Address Updated Successfully!").addClass("alert alert-success");
                    }
                    else{
                        $(".supplier-manage-box").html("Supplier Address Failed to Update!").addClass("alert alert-danger");
                    }
                });
            });


            //update sup add street ajax call
            $("#sup_add_street_check").click(function(){
                let manageSupStreet = $("#manage_sup_s_name").val();
                $.post(url, {manageSupId:x, manageSupStreet:manageSupStreet}, function(data)
                {
                    if(data == "1")
                    {
                        $(".supplier-manage-box").html("Supplier Address Updated Successfully!").addClass("alert alert-success");
                    }
                    else{
                        $(".supplier-manage-box").html("Supplier Address Failed to Update!").addClass("alert alert-danger");
                    }
                });
            });


            //update sup add city ajax call
            $("#sup_add_city_check").click(function(){
                let manageSupCity = $("#manage_sup_city").val();
                $.post(url, {manageSupId:x, manageSupCity:manageSupCity}, function(data)
                {
                    if(data == "1")
                    {
                        $(".supplier-manage-box").html("Supplier Address Updated Successfully!").addClass("alert alert-success");
                    }
                    else{
                        $(".supplier-manage-box").html("Supplier Address Failed to Update!").addClass("alert alert-danger");
                    }
                });
            });


            //update sup add state ajax call
            $("#sup_add_state_check").click(function(){
                let manageSupState = $("#manage_sup_state").val();
                $.post(url, {manageSupId:x, manageSupState:manageSupState}, function(data)
                {
                    if(data == "1")
                    {
                        $(".supplier-manage-box").html("Supplier Address Updated Successfully!").addClass("alert alert-success");
                    }
                    else{
                        $(".supplier-manage-box").html("Supplier Address Failed to Update!").addClass("alert alert-danger");
                    }
                });
            });

            //update sup cn1 ajax call
            $("#sup_cn1_check").click(function(){
                let manageSupCN1 = $("#manage_sup_cn1").val();
                $.post(url, {manageSupId:x, manageSupCN1:manageSupCN1}, function(data)
                {
                    if(data == "1")
                    {
                        $(".supplier-manage-box").html("Supplier Contact Number 1 Updated Successfully!").addClass("alert alert-success");
                    }
                    else{
                        $(".supplier-manage-box").html("Supplier Contact Number 1 Failed to Update!").addClass("alert alert-danger");
                    }
                });
            });

            //update sup cn2 ajax call
            $("#sup_cn2_check").click(function(){
                let manageSupCN2 = $("#manage_sup_cn2").val();
                $.post(url, {manageSupId:x, manageSupCN2:manageSupCN2}, function(data)
                {
                    if(data == "1")
                    {
                        $(".supplier-manage-box").html("Supplier Contact Number 2 Updated Successfully!").addClass("alert alert-success");
                    }
                    else{
                        $(".supplier-manage-box").html("Supplier Contact Number 2 Failed to Update!").addClass("alert alert-danger");
                    }
                });
            });


            //update sup email ajax call
            $("#sup_email_check").click(function(){
                let manageSupEmail = $("#manage_sup_email").val();
                $.post(url, {manageSupId:x, manageSupEmail:manageSupEmail}, function(data)
                {
                    if(data == "1")
                    {
                        $(".supplier-manage-box").html("Supplier Email Updated Successfully!").addClass("alert alert-success");
                    }
                    else{
                        $(".supplier-manage-box").html("Supplier Email Failed to Update!").addClass("alert alert-danger");
                    }
                });
            });







        });
    });


});