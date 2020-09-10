$(document).ready(function() {
    $("#table_manage").on("click", "#table_data_manage_service_id a", function () {
        const sid = $(this).data('id');

        const url = "../controller/servicecontroller.php?status=manage_service";

        $.post(url, {service_id:sid}, function(data){
            $("#body_modal_manage").html(data).show();

            $("#btn_service_name_check").hide();
            $("#btn_service_price_check").hide();
            $("#btn_service_category_check").hide();
            $("#btn_service_sub_category_check").hide();

            $("#select_service_category").hide();
            $("#select_service_sub_category").hide();


            $("#btn_service_name_pencil").click(function (){
                $(this).hide();
                $('#btn_service_name_check').show();
                $("input[id='manage_service_name']").prop("readonly",false);

                $("#btn_service_name_check").click(function(){
                    $("input[id='manage_service_name']").prop("readonly",true);
                    $(this).hide();
                    $("#btn_service_name_pencil").show();
                })

            })



            $("#btn_service_price_pencil").click(function (){
                $(this).hide();
                $('#btn_service_price_check').show();
                $("input[id='service_price']").prop("readonly",false);

                $("#btn_service_price_check").click(function(){
                    $("input[id='service_price']").prop("readonly",true);
                    $(this).hide();
                    $("#btn_service_price_pencil").show();
                })

            })

            //Category Edit
            $("#btn_service_category_pencil").click(function (){
                $(this).hide();
                $('#btn_service_category_check').show();
                $("input[id='service_category']").hide();
                $("#select_service_category").show();

                $("#btn_service_category_check").click(function(){
                    $(this).hide();
                    $("#btn_service_category_pencil").show();
                    let selectedValue = $("#select_service_category option:selected").text();
                    $("#select_service_category").hide();
                    $("input[id='service_category']").show().val(selectedValue);
                })
            })




            //Sub Cat Edit
            $("#btn_service_sub_category_pencil").click(function (){
                $(this).hide();
                $('#btn_service_sub_category_check').show();
                $("input[id='service_sub_category']").hide();
                $("#select_service_sub_category").show();

                $("#btn_service_sub_category_check").click(function(){
                    $(this).hide();
                    $("#btn_service_sub_category_pencil").show();
                    let selectedValue = $("#select_service_sub_category option:selected").text();
                    $("#select_service_sub_category").hide();
                    $("input[id='service_sub_category']").show().val(selectedValue);
                })
            })






        })
    })

    $("#table_manage_categories").on("click", "a", function(){
        $("#td_service_name input[id='txt_change_sub_cat_name']").prop("readonly", false);
        const subCatId = $(this).data('id');
        $(".modal-footer #btn_save").click(function(){
            const changedSubCatName = $("#td_service_name input[id='txt_change_sub_cat_name']").val();

            const url = "../controller/servicecontroller.php?status=manage_sub_category";

            $.post(url, {changed_sub_cat_id:subCatId, changed_sub_cat_name:changedSubCatName}, function(data, success){
                if(data === "1") {
                    $("#msg_category_update").html("Sub Category Updated Successfully!").addClass("alert alert-success");
                } else {
                    $("#msg_category_update").html("Sub Category could not be Updated!").addClass("alert alert-danger");
                }
            })

            $("#td_service_name input[id='txt_change_sub_cat_name']").prop("readonly", true);

        })

    })
})

