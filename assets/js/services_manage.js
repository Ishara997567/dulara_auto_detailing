$(document).ready(function() {
    $("#table_manage, #table_search_manage").on("click", "#table_data_manage_service_id a", function () {
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
                });

            });



            $("#btn_service_price_pencil").click(function (){
                $(this).hide();
                $('#btn_service_price_check').show();
                $("input[id='service_price']").prop("readonly",false);

                $("#btn_service_price_check").click(function(){
                    $("input[id='service_price']").prop("readonly",true);
                    $(this).hide();
                    $("#btn_service_price_pencil").show();
                });

            });

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
                });
            });




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
                });
            });


            // $("#btn_service_name_check").click(function (){
            //     alert("Hello World");
            // });



        });
    });

    //Manage Sub Categories
    $("#table_sub_cat_manage").on("click", "#table_manage_categories a", function(){
        const subCatId = $(this).data('id');
        const subCatInputField = $("#td_service_name input[id='txt_change_sub_cat_name"+subCatId+"']");
        subCatInputField.prop("readonly", false);

        subCatInputField.focus();
        let tmpStr = subCatInputField.val();
        subCatInputField.val('');
        subCatInputField.val(tmpStr);


        $(".modal-footer #btn_save").click(function(){
            const changedSubCatName = subCatInputField.val();

            const url = "../controller/servicecontroller.php?status=manage_sub_category";

            $.post(url, {changed_sub_cat_id:subCatId, changed_sub_cat_name:changedSubCatName}, function(data){
                if(data === "1") {
                    $("#msg_sub_category_update").html("Sub Category Updated Successfully!").addClass("alert alert-success");
                } else {
                    $("#msg_sub_category_update").html("Sub Category could not be Updated!").addClass("alert alert-danger");
                }
            });

            $("#td_service_name input[id='txt_change_sub_cat_name"+subCatId+"']").prop("readonly", true);
            window.setTimeout(function (){location.reload()}, 2000);
        });

    });
    $("#table_manage_categories_del a").click(function(){
        const delSubCatId = $(this).data('id');
       $("#td_service_name input[id='txt_change_sub_cat_name"+delSubCatId+"']").prop("readonly", true);
    });






    //Manage Categories
    $("#table_cat_manage").on("click", "#table_manage_category a", function(){
        const catId = $(this).data('id');
        const catInputField = $("#td_category_name input[id='txt_change_cat_name"+catId+"']");
        catInputField.prop("readonly", false);

        catInputField.focus();
        let tmpStr = catInputField.val();
        catInputField.val('');
        catInputField.val(tmpStr);

        $(".modal-footer #btn_save").click(function(){
            const changedCatName = catInputField.val();

            const url = "../controller/servicecontroller.php?status=manage_category";

            $.post(url, {changed_cat_id:catId, changed_cat_name:changedCatName}, function(data){
                if(data === "1") {
                    $("#msg_category_update").html("Category Updated Successfully!").addClass("alert alert-success");
                } else {
                    $("#msg_category_update").html("Category could not be Updated!").addClass("alert alert-danger");
                }
            });

            $("#td_category_name input[id='txt_change_cat_name"+catId+"']").prop("readonly", true);
            window.setTimeout(function (){location.reload()}, 2000);
        });

    });

    $("#table_manage_category_del a").click(function(){
        const delCatId = $(this).data('id');
        const inputField = $("#td_category_name input[id='txt_change_cat_name"+delCatId+"']");
        inputField.prop("readonly", true);
    });


    const u = "../controller/servicecontroller.php?status=change_service";

    changeServiceName = function (id){
      let serviceName = $("#manage_service_name").val();
      $.ajax({
          url: u,
          method: "post",
          data: {serviceId:id, serviceName:serviceName},
          dataType: "html",
          success: function(data){
              if(data == "1") {
                  $(".service-update-message").html("Service Name Updated Successfully!").addClass("alert alert-success");
              } else {
                  $(".service-update-message").html("Service Name Failed to Update!").addClass("alert alert-danger");

              }
          }
      })
    };

    changeServicePrice = function (id){
        let servicePrice = $(".txt-service-price").val();
        $.ajax({
            url: u,
            method: "post",
            data: {serviceId:id, servicePrice:servicePrice},
            dataType: "html",
            success: function(data){
                if(data == "1") {
                    $(".service-update-message").html("Service Price Updated Successfully!").addClass("alert alert-success");
                } else {
                    $(".service-update-message").html("Service Price Failed to Update!").addClass("alert alert-danger");

                }
            }
        })
    };

    changeServiceCategory = function (id){
        let serviceCatId = $("#select_service_category").val();
        alert(id);
        alert(serviceCatId);
        $.ajax({
            url: u,
            method: "post",
            data: {serviceId:id, serviceCatId:serviceCatId},
            dataType: "html",
            success: function(data){
                if(data == "1") {
                    $(".service-update-message").html("Service Category Updated Successfully!").addClass("alert alert-success");
                } else {
                    $(".service-update-message").html("Service Category Failed to Update!").addClass("alert alert-danger");

                }
            }
        })
    };

    changeServiceSubCategory = function (id){
        let serviceSubCatId = $("#select_service_sub_category").val();
        $.ajax({
            url: u,
            method: "post",
            data: {serviceId:id, serviceSubCatId:serviceSubCatId},
            dataType: "html",
            success: function(data){
                if(data == "1") {
                    $(".service-update-message").html("Service Sub Category Updated Successfully!").addClass("alert alert-success");
                } else {
                    $(".service-update-message").html("Service Sub Category Failed to Update!").addClass("alert alert-danger");

                }
            }
        })
    };


});

