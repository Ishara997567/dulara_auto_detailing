$(document).ready(function(){
    let sName = $("#service_name").val();


    $("#frm_new_category").on("submit", function(){

        let catName = $("#cat_name").val();
        if(catName === "") {
            $("#error_new_category").html("Category Name can not be Empty!").addClass("alert alert-danger");
            $("#cat_name").focus();
            return false;
        }
    })

    $("#frm_new_sub_category").on("submit", function(){
        let subCatName = $("#sub_cat_name").val();
        let selectedCatName = $("#select_sub_cat option:selected").val();

        if(subCatName === ""){
            $("#error_new_sub_category").html("Sub Category Name Can Not be Empty!").addClass("alert alert-danger");
            $("#sub_cat_name").focus();
            return false;
        }

        if(selectedCatName === "choose")
        {
            $("#error_new_sub_category").html("Please Select a Category!").addClass("alert alert-danger");
            $("#select_sub_cat").focus();
            return false;
        }



    })

    $("#frm_new_service").on("submit", function(){
        let serviceName = $("#service_name").val();
        let serviceCategory = $("#service_category option:selected").val();
        let serviceSubCategory = $("#service_sub_cat_id option:selected").val();
        let servicePrice = $("#service_price").val();

        let ri1 = $("#service_required_item_1 option:selected").val();
        let ri2 = $("#service_required_item_2 option:selected").val();
        let ri3 = $("#service_required_item_3 option:selected").val();
        let ri4 = $("#service_required_item_4 option:selected").val();
        let ri5 = $("#service_required_item_5 option:selected").val();
        let ri6 = $("#service_required_item_6 option:selected").val();

        let w1 = $("#assigned_worker_1 option:selected").val();
        let w2 = $("#assigned_worker_2 option:selected").val();
        let w3 = $("#assigned_worker_3 option:selected").val();
        let w4 = $("#assigned_worker_4 option:selected").val();

        if(serviceName === ""){
            $("#error_new_service").html("Service Name can not be Empty!").addClass("alert alert-danger");
            $("#service_name").focus();
            return false;
        }

        if(serviceCategory === "choose"){
            $("#error_new_service").html("Please Select Service Category!").addClass("alert alert-danger");
            $("#service_category").focus();
            return false;
        }

        if(serviceSubCategory === "choose"){
            $("#error_new_service").html("Please Select Service Sub Category!").addClass("alert alert-danger");
            $("#service_sub_cat_id").focus();
            return false;
        }



        if(servicePrice === ""){
            $("#error_new_service").html("Please Enter the Price of the Service!").addClass("alert alert-danger");
            $("#service_price").focus();
            return false;
        }
        

        if(ri1 === "choose"){
            $("#error_new_service").html("Please Select at least One Required Item for the Service!").addClass("alert alert-danger");
            $("#service_required_item_1").focus();
            return false;
        }

        if(w1 === "choose"){
            $("#error_new_service").html("Please Select at least One Worker for the Service!").addClass("alert alert-danger");
            $("#assigned_worker_1").focus();
            return false;
        }

    })
})