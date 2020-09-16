$(document).ready(function(){


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

            const url = "../controller/inventorycontroller.php?status=manage_category";

            $.post(url, {changed_cat_id:catId, changed_cat_name:changedCatName}, function(data){
                if(data === "1") {
                    $("#msg_category_update").html("Category Updated Successfully!").addClass("alert alert-success");
                } else {
                    $("#msg_category_update").html("Category could not be Updated!").addClass("alert alert-danger");
                }
            })

            $("#td_category_name input[id='txt_change_cat_name"+catId+"']").prop("readonly", true);
            window.setTimeout(function (){location.reload()}, 2000);
        })

    })

    $("#table_manage_category_del a").click(function(){
        const delCatId = $(this).data('id');
        const inputField = $("#td_category_name input[id='txt_change_cat_name"+delCatId+"']");
        inputField.prop("readonly", true);
    })


    //Manage Item Size


    $("#table_item_size_manage").on("click", "#table_manage_size a", function(){
        const itemSizeId = $(this).data('id');
        const itemSizeInputField = $("#td_item_size_name input[id='txt_change_item_size_name"+itemSizeId+"']");
        itemSizeInputField.prop("readonly", false);

        itemSizeInputField.focus();
        let tmpStr = itemSizeInputField.val();
        itemSizeInputField.val('');
        itemSizeInputField.val(tmpStr);


        $(".modal-footer #btn_save").click(function(){
            const changedItemSizeName = itemSizeInputField.val();

            const url = "../controller/inventorycontroller.php?status=manage_item_size";

            $.post(url, {changed_item_size_id:itemSizeId, changed_item_size_name:changedItemSizeName}, function(data){
                if(data === "1") {
                    $("#msg_item_size_update").html("Item Size Updated Successfully!").addClass("alert alert-success");
                } else {
                    $("#msg_item_size_update").html("Item Size could not be Updated!").addClass("alert alert-danger");
                }
            })

            $("#td_item_size_name input[id='txt_change_item_size_name"+itemSizeId+"']").prop("readonly", true);
            window.setTimeout(function (){location.reload()}, 2000);
        })

    })
    $("#table_manage_size_del a").click(function(){
        const delItemSizeId = $(this).data('id');
        $("#td_item_size_name input[id='txt_change_item_size_name"+delItemSizeId+"']").prop("readonly", true);
    })






    //Manage Items in the table
    $(".manage-item").click(function (){
        let manageItemId = $(this).data('id');

        const url = "../controller/inventorycontroller.php?status=manage_item";

        $.post(url, {manageItemId:manageItemId}, function(data){
            $("#manage_modal_body").html(data).show();
        })
    })

    //Add Stock Level
    $("#pane_stock_level_form").on("change", "#stock_lvl_item_category", function (){
    const itemCatId = $(this).val();
    $.ajax({
        method: "POST",
        url: "../controller/inventorycontroller.php?status=change_txt_select",
        data: {itemCatId:itemCatId},
        success: function(response){
            $("#change_to_select").html(response).show();
        }
    });
    });

    //Add Stock
    $(".mydatatable").on("click", ".add-stock", function (){
        let stockItemId = $(this).data('id');
            $.ajax({
                method: "post",
                url: "../controller/inventorycontroller.php?status=show_stock_data",
                data: {stockItemId:stockItemId},
                success: function (response){
                    $(".add-stock-form").html(response);
                }
            })

    })
    //barcode
    $("#btn_generate_stock_barcode").click(function (){
        const barcode = $("#stock_barcode").val();
        const url = "../controller/inventorycontroller.php?status=generate_barcode";
        $.post(url, {barcode:barcode}, function(data){
            $("#barcode_image").html(data).show();
        })
    })
})

