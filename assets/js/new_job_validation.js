$(document).ready(function (){
    $("#frm_new_job").submit(function (){
        let customer_id = $("#customer_id").val();
        let customer_name = $("#customer_name").val();
        let vehicle_no = $("#vehicle_no").val();
        let vehicle_make = $("#vehicle_make").val();
        let vehicle_model = $("#vehicle_model").val();
        let vehicle_odo = $("#vehicle_odo").val();
        let vehicle_mileage = $("#vehicle_mileage").val();

        if(vehicle_no === "")
        {
            $(".new-job-error").html("Please Choose A Valid Vehicle Number First!").addClass("alert alert-danger ");
            return false;
        }

        if(customer_id === "" || customer_name === "")
        {
            $(".new-job-error").html("Please Check whether You have selected a Valid Vehicle Number!").addClass("alert alert-danger ");
            return false;
        }

        if(vehicle_make === "choose")
        {
            $(".new-job-error").html("Please Choose A Vehicle Make!").addClass("alert alert-danger ");
            return false;
        }

        if(vehicle_model === "choose")
        {
            $(".new-job-error").html("Please Choose A Vehicle Model!").addClass("alert alert-danger ");
            return false;
        }

        if(vehicle_odo === "")
        {
            $(".new-job-error").html("Please Enter Vehicle ODO!").addClass("alert alert-danger ");
            return false;
        }

        if(vehicle_mileage === "")
        {
            $(".new-job-error").html("Please Enter Vehicle Mileage!").addClass("alert alert-danger ");
            return false;
        }

    });
});