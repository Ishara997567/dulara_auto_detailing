$(document).ready(function (){
    $("#lbl_wname").hide();
    $("#worker_name").hide();

    $("#worker_from").hide();
    $("#lbl_worker_from").hide();

    $("#worker_to").hide();
    $("#lbl_worker_to").hide();

    $("#worker_report_type").change(function () {
        let status = this.value;
        let url = "../controller/reportcontroller.php?status="+status;

        if(status === "worker_all")
        {
            $("#lbl_wname").hide();
            $("#worker_name").hide();

            $("#worker_from").hide();
            $("#lbl_worker_from").hide();

            $("#worker_to").hide();
            $("#lbl_worker_to").hide();


            $("#btn-generate-worker-report").click(function (){
                $.post(url,function (data){
                    $(".split-worker-data").html(data);
                    $("#result-table").DataTable({
                        "destroy": true,
                    });
                    $("#print_data").val(data);

                });
            });
        } else if (status === "worker_wise") {
            $("#lbl_wname").show();
            $("#worker_name").show();

            $("#worker_from").hide();
            $("#lbl_worker_from").hide();

            $("#worker_to").hide();
            $("#lbl_worker_to").hide();


            $("#worker_name").autocomplete({
                source: 'worker-autofill-results.php',
            });

            $("#btn-generate-worker-report").click(function (){
                let workerName = $("#worker_name").val();
                if(workerName !== "") {
                    $.ajax({
                        url: url,
                        type: "POST",
                        cache: false,
                        data: {workerName: workerName},
                        success: function (data) {
                            if (data === "") {
                                $(".worker-report-error").html("<button type='button' class='close' data-dismiss='alert'>&times;</button> Please enter a valid employee name!").addClass("alert alert-danger alert-dismissible");
                                return false;
                            } else {
                                $(".split-worker-data").html(data);
                                $("#result-table").DataTable({
                                    "destroy": true,
                                });
                                $("#print_data").val(data);
                            }
                        }
                    });
                } else {
                    $(".worker-report-error").html("<button type='button' class='close' data-dismiss='alert'>&times;</button> Please enter a employee name!").addClass("alert alert-danger alert-dismissible");
                    return false;
                }
            });
        } else if(status === "worker_attendance"){

            $("#lbl_wname").hide();
            $("#worker_name").hide();


            $("#worker_from").show();
            $("#lbl_worker_from").show();

            $("#worker_to").show();
            $("#lbl_worker_to").show();


            $("#btn-generate-worker-report").click(function (){
                let from = $("#worker_from").val();
                let to = $("#worker_to").val();

                $.post(url, {from:from, to:to}, function (data){
                    $(".split-worker-data").html(data);
                    $("#result-table").DataTable({
                        "destroy": true,
                    });
                    $("#print_data").val(data);
                });
            });
        } else if (status === "worker_wise_attendance"){
            $("#lbl_wname").show();
            $("#worker_name").show();


            $("#worker_from").show();
            $("#lbl_worker_from").show();

            $("#worker_to").show();
            $("#lbl_worker_to").show();

            $("#worker_name").autocomplete({
                source: 'worker-autofill-results.php',
            });

            $("#btn-generate-worker-report").click(function (){
                let workerName = $("#worker_name").val();
                let from = $("#worker_from").val();
                let to = $("#worker_to").val();

                $.post(url, {workerName:workerName, from:from, to:to}, function (data){
                    $(".split-worker-data").html(data);
                    $("#result-table").DataTable({
                        "destroy": true,
                    });
                    $("#print_data").val(data);
                });

            });
        }

    });
})