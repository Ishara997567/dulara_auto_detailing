$(document).ready(function (){
    $("#job_start_period").hide();
    $("#lbl_job_start_period").hide();
    $("#job_end_period").hide();
    $("#lbl_job_end_period").hide();

    $("#lbl_vno").hide();
    $("#vno").hide();

    $("#job_report_type").change(function () {
        let status = this.value;
        let url = "../controller/reportcontroller.php?status="+status;

        if(status === "job_completed_list")
        {
            $("#job_start_period").show();
            $("#lbl_job_start_period").show();
            $("#job_end_period").show();
            $("#lbl_job_end_period").show();

            $("#lbl_vno").hide();
            $("#vno").hide();

            $("#btn-generate-job-report").click(function (){
                let from_date = $("#job_start_period").val();
                let to_date = $("#job_end_period").val();

                $.post(url, {from:from_date, to:to_date}, function(data){
                    $(".split-job-data").html(data);
                    $("#result_table").DataTable();
                    $("#print_data").val(data);
                });
            });
        } else if(status === "job_customer_list"){
            $("#job_start_period").hide();
            $("#lbl_job_start_period").hide();
            $("#job_end_period").hide();
            $("#lbl_job_end_period").hide();

            $("#lbl_vno").show();
            $("#vno").show();

            $("#vno").autocomplete({
                source: 'customer-autofill-results.php',
            });

            $("#btn-generate-job-report").click(function (){
                let vno = $("#vno").val();

                $.post(url, {vno:vno}, function(data){
                    $(".split-job-data").html(data);
                    $("#result_table").DataTable();
                    $("#print_data").val(data);
                });
            });
        }
    });
})