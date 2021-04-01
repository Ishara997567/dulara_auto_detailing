$(document).ready(function (){
    $("#service_category_select").hide();
    $("#service_report_type").change(function (){
        let status = $("#service_report_type").val();
        let url = "../controller/reportcontroller.php?status="+status;
        if(status === "service_list"){
            $("#service_category_select").hide();
            $("#btn-generate-service-report").click(function (){
                $.get(url, function (data){
                    $(".split-service-data").html(data);
                    $("#result-table").DataTable({
                        "destroy": true,
                    });

                    $("#print_data").val(data);
                    alert(data);
                });
            });
        } else if(status === "cat_service_list") {
            $("#service_category_select").show();
            $("#btn-generate-service-report").click(function () {
                let cat_id = $("#service_category").val();
                $.post(url, {cat_id:cat_id}, function(data){
                    $(".split-service-data").html(data);
                    $("#result-table").DataTable();
                });
            });
        }
    });

});