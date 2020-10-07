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







        });
    });
});