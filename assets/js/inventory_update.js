$(document).ready(function (){
    const url = "../controller/inventorycontroller.php?status=update_item";
    //update item name ajax call

    $("#btn_item_name_check").click(function(){
        let manageItemId = $("#manage_item_code").val();
        let manageItemName = $("#manage_item_name").val();

        $.post(url, {manageItemId:manageItemId, manageItemName:manageItemName}, function(success)
        {
            if(success) {
                $(".my-message").html("Item Updated Successfully!").addClass("alert alert-success");
            }
            else{
                $(".my-message").html("Item Failed to Update!").addClass("alert alert-danger");
            }
        })
    })

    //update manu code ajax call
    $("#btn_manufacturer_code_check").click(function(){
        let manageItemId = $("#manage_item_code").val();
        let manageManuCode = $("#manage_manufacturer_code").val();

        $.post(url, {manageItemId:manageItemId, manageManuCode:manageManuCode}, function(success)
        {
            if(success) {
                $(".my-message").html("Manufacturer Code Updated Successfully!").addClass("alert alert-success");
            }
            else{
                $(".my-message").html("Manufacturer Code Failed to Update!").addClass("alert alert-danger");
            }
        })
    })



    //update manu name ajax call
    $("#btn_manufacturer_name_check").click(function(){
        let manageItemId = $("#manage_item_code").val();
        let manageManuName = $("#manage_manufacturer_name").val();

        $.post(url, {manageItemId:manageItemId, manageManuName:manageManuName}, function(success)
        {
            if(success) {
                $(".my-message").html("Manufacturer Name Updated Successfully!").addClass("alert alert-success");
            }
            else{
                $(".my-message").html("Manufacturer Name Failed to Update!").addClass("alert alert-danger");
            }
        })
    })

    //update Supplier ajax call
    $("#btn_supplier_check").click(function(){
        let manageItemId = $("#manage_item_code").val();
        let manageSupId = $("#select_supplier").val();

        $.post(url, {manageItemId:manageItemId, manageSupId:manageSupId}, function(success)
        {
            if(success) {
                $(".my-message").html("Supplier Updated Successfully!").addClass("alert alert-success");
            }
            else{
                $(".my-message").html("Supplier Failed to Update!").addClass("alert alert-danger");
            }
        })
    })

    //update Item Cat Id ajax call
    $("#btn_item_category_check").click(function(){
        let manageItemId = $("#manage_item_code").val();
        let manageCatId = $("#select_item_category").val();

        $.post(url, {manageItemId:manageItemId, manageCatId:manageCatId}, function(success)
        {
            if(success) {
                $(".my-message").html("Category Updated Successfully!").addClass("alert alert-success");
            }
            else{
                $(".my-message").html("Category Failed to Update!").addClass("alert alert-danger");
            }
        })
    })

    //update Item Size Id ajax call
    $("#btn_item_size_check").click(function(){
        let manageItemId = $("#manage_item_code").val();
        let manageSizeId = $("#select_item_size").val();

        $.post(url, {manageItemId:manageItemId, manageSizeId:manageSizeId}, function(success)
        {
            if(success) {
                $(".my-message").html("Item Size Updated Successfully!").addClass("alert alert-success");
            }
            else{
                $(".my-message").html("Item Size Failed to Update!").addClass("alert alert-danger");
            }
        })
    })

    //update Purchase UPrice ajax call
    $("#btn_p_unit_price_check").click(function(){
        let manageItemId = $("#manage_item_code").val();
        let managePUprice = $("#manage_p_unit_price").val();

        $.post(url, {manageItemId:manageItemId, managePUprice:managePUprice}, function(success)
        {
            if(success) {
                $(".my-message").html("Purchase Unit Price Updated Successfully!").addClass("alert alert-success");
            }
            else{
                $(".my-message").html("Purchase Unit Price Failed to Update!").addClass("alert alert-danger");
            }
        })
    })

    //update Sale UPrice ajax call
    $("#btn_s_unit_price_check").click(function(){
        let manageItemId = $("#manage_item_code").val();
        let manageSUprice = $("#manage_s_unit_price").val();

        $.post(url, {manageItemId:manageItemId, manageSUprice:manageSUprice}, function(success)
        {
            if(success) {
                $(".my-message").html("Sale Unit Price Updated Successfully!").addClass("alert alert-success");
            }
            else{
                $(".my-message").html("Sale Unit Price Failed to Update!").addClass("alert alert-danger");
            }
        })
    })


    //update Discount ajax call
    $("#btn_discount_check").click(function(){
        let manageItemId = $("#manage_item_code").val();
        let manageDiscount = $("#manage_discount").val();

        $.post(url, {manageItemId:manageItemId, manageDiscount:manageDiscount}, function(success)
        {
            if(success) {
                $(".my-message").html("Discount Price Updated Successfully!").addClass("alert alert-success");
            }
            else{
                $(".my-message").html("Discount  Price Failed to Update!").addClass("alert alert-danger");
            }
        })
    })



//update Handling ajax call
    $("#btn_handling_charges_check").click(function(){
        let manageItemId = $("#manage_item_code").val();
        let manageHandling = $("#manage_handling_charges").val();

        $.post(url, {manageItemId:manageItemId, manageHandling:manageHandling}, function(success)
        {
            if(success) {
                $(".my-message").html("Handling Charge Updated Successfully!").addClass("alert alert-success");
            }
            else{
                $(".my-message").html("Handling Charge to Update!").addClass("alert alert-danger");
            }
        })
    })

    //update Vat

    $("#btn_vat_rate_check").click(function(){
        let manageItemId = $("#manage_item_code").val();
        let manageVat = $("#manage_vat_rate").val();

        $.post(url, {manageItemId:manageItemId, manageVat:manageVat}, function(success)
        {
            if(success) {
                $(".my-message").html("Vat Rate Updated Successfully!").addClass("alert alert-success");
            }
            else{
                $(".my-message").html("Vat Rate to Update!").addClass("alert alert-danger");
            }
        })
    })

    //update Location

    $("#btn_location_check").click(function(){
        let manageItemId = $("#manage_item_code").val();
        let manageLocation = $("#manage_location").val();

        $.post(url, {manageItemId:manageItemId, manageLocation:manageLocation}, function(success)
        {
            if(success) {
                $(".my-message").html("Location Updated Successfully!").addClass("alert alert-success");
            }
            else{
                $(".my-message").html("Location to Update!").addClass("alert alert-danger");
            }
        })
    })

    $(".btn-manage-save").click(function(){
        window.setTimeout(function () {
            location.reload()
        }, 2000);
    })


})