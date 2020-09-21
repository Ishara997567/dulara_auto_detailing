$(document).ready(function (){
    $("#modal_new_item #pane_new_item_form #submit").click(function (){

        const validationDiv = $("#pane_new_item_form #error_new_item");

        const itemName = $("#modal_new_item #pane_new_item_form #item_name").val();
        const supplier = $("#modal_new_item #pane_new_item_form #supplier").val();
        const itemCategory = $("#modal_new_item #pane_new_item_form #item_category").val();
        const pUnitPrice = $("#modal_new_item #pane_new_item_form #p_unit_price").val();
        const sUnitPrice = $("#modal_new_item #pane_new_item_form #s_unit_price").val();


        if(itemName === "")
        {
            validationDiv.html("New Item Name can not be Empty!").addClass("alert alert-danger");
            $("#modal_new_item #pane_new_item_form #item_name").focus();
            return false;
        }

        if(supplier === "choose")
        {
            validationDiv.html("Please Select a Supplier").addClass("alert alert-danger");
            $("#modal_new_item #pane_new_item_form #supplier").focus();
            return false;
        }

        if(itemCategory === "choose")
        {
            validationDiv.html("Please Select an Category").addClass("alert alert-danger");
            $("#modal_new_item #pane_new_item_form #item_category").focus();
            return false;
        }

        if(pUnitPrice === "")
        {
            validationDiv.html("Please Enter Purchasing Unit Price").addClass("alert alert-danger");
            $("#modal_new_item #pane_new_item_form #p_unit_price").focus();
            return false;
        }

        if(sUnitPrice === "")
        {
            validationDiv.html("Please Enter Sale Unit Price").addClass("alert alert-danger");
            $("#modal_new_item #pane_new_item_form #s_unit_price").focus();
            return false;
        }

        if(parseInt(sUnitPrice) < parseInt(pUnitPrice))
        {
            validationDiv.html("Sale Unit Price can not be Less than Purchasing Unit Price").addClass("alert alert-danger");
            $("#modal_new_item #pane_new_item_form #s_unit_price").focus();
            return false;
        }



    })
    //Category Validation
    $("#category_submit").click(function (){
        const itemCatName = $("#item_cat_name").val();

        if(itemCatName === "")
        {
            $("#error_new_category").html("Category Name can not be Empty!").addClass("alert alert-danger");
            $("#item_cat_name").focus();
            return false;
        }
    })

    //Item Size Validation
    $("#item_size_submit").click(function (){
        const itemSizeName = $("#item_size_name").val();

        if(itemSizeName === "")
        {
            $("#error_new_item_size").html("Item Size Name can not be Empty!").addClass("alert alert-danger");
            $("#item_size_name").focus();
            return false;
        }
    })


    $("#add_stock_submit").click(function (){
        const errorMessage = $(".error-stock-level");

        const stk_cat = $("#stock_lvl_item_category");
        const stk_item_name_select = $("#stock_lvl_select_item_name");
        const stk_min = $("#stock_level_min_lvl");
        const stk_max = $("#stock_level_max_lvl");

        if(stk_cat.val() === "choose")
        {
            errorMessage.html("Please Select A Item Category First").addClass("alert alert-danger");
            stk_cat.focus();
            return false;
        }

        if(stk_item_name_select.val() === "choose")
        {
            errorMessage.html("Please Select An Item Name").addClass("alert alert-danger");
            stk_item_name_select.focus();
            return false;
        }

        if(stk_min.val() === "")
        {
            errorMessage.html("Please Enter the Minimum Stock Level For This Item").addClass("alert alert-danger");
            stk_min.focus();
            return false;
        }

        if(stk_max.val() === "")
       {
           errorMessage.html("Please Enter the Maximum Stock Level For This Item").addClass("alert alert-danger");
           stk_max.focus();
           return false;
       }

        if(stk_min.val() > stk_max.val())
        {
            errorMessage.html("Maximum Stock Level Should Be Greater than Minimum Stock Level!!").addClass("alert alert-danger");
            stk_max.focus();
            return false;
        }

    })
})