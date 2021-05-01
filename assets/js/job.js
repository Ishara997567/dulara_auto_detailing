$(document).ready(function (){
    $("#vehicle_no").autocomplete({
        source: 'customer-autofill-results.php',
        change: function (event, ui){
            if(!ui.item)
            {
                $(".new-job-error").html("Please Select A Valid Vehicle Number from the list!").addClass("alert alert-danger");
                $("frm_new_job").submit(function (){
                    return false;
                });
            }
        }
    });

    let url = '../controller/jobcontroller.php?status=autofill_customer'
    $("#vehicle_no").on("change", function(){
        let vehicleNo = $("#vehicle_no").val();

        $.post(url, {vn: vehicleNo}, function(data){
            data = $.parseJSON(data);
            $("#customer_name").val(data.cus_name);
            $("#customer_id").val(data.cus_id);
        });

    });


    $("#vehicle_make").on("change", function (){
        let url = '../controller/jobcontroller.php?status=get_vehicle_make';
        let vehicle_make_id = this.value;
        $.post(url, {make_id:vehicle_make_id}, function (data){
            $("#vehicle_model").html(data);
        });
    });


    $(".pending-job-table").on("click", ".see-more", function (){
        let jobId = $(this).data('id');

        let url = '../controller/jobcontroller.php?status=manage_pending_jobs';

        $.post(url, {jobId:jobId}, function(data){
            $(".manage-pending-jobs").html(data);

            $("#p_status").change(function (){
                if(this.value === "1")
                    $(".pending-job-message").html("Job Status Changed!").addClass("text-warning");
                else
                {
                    $(".pending-job-message").html("");
                }
            });
        })
    });

    $(".completed-job-table").on("click", ".completed-see-more", function (){
        let jobId = $(this).data('id');

        let url = '../controller/jobcontroller.php?status=manage_completed_jobs';

        $.post(url, {jobId:jobId}, function(data){
            $(".manage-completed-jobs").html(data);

            $(".confirm-buttons").hide();

            $("#c_status").change(function (){
                if(this.value === "0") {
                    $(".confirm-buttons").show();

                    $(".confirm-pending").click(function () {
                        $(".confirm-buttons").hide();
                        $(".completed-job-message").html("Job Status Changed Back to 'Pending'!").addClass("text-warning");
                        let url = '../controller/jobcontroller.php?status=job_status_back_to_pending';
                        $.post(url, {changedStatusJobId:jobId}, function(){
                            window.setTimeout(function(){
                                location.reload(true);
                            },2000)
                        });
                    });

                    $(".decline-pending").click(function () {
                        $(".confirm-buttons").hide();
                        $(".completed-job-message").html("");
                    });
                }

            });
        });
    });

    const newVehicleMakeID = $("#new_vehicle_make_id").val();
    $("#preview_new_vehicle_make").hide();
    $("#new_vehicle_make_id").val("");
    $("input[name='new_create_vehicle_make']").change(function (){
        if($("#new_create_vehicle_make_yes").is(":checked")){
            $("#preview_new_select_vehicle_make").hide();
            $("#preview_new_vehicle_make").show();
            $("#new_vehicle_make_id").val(newVehicleMakeID);

            return false;
        }

        if($("#new_create_vehicle_make_no").is(":checked")){
            $("#preview_new_select_vehicle_make").show();
            $("#preview_new_vehicle_make").hide();
            $("#new_vehicle_make_id").val("");
            $("#new_vehicle_make_name").val("");
            return false;
        }
    });
});