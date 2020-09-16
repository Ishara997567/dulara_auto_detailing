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

        if(sUnitPrice < pUnitPrice)
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
})