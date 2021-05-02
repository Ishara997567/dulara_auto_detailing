$(document).ready(function (){
    $("#sale_start_period").hide();
    $("#lbl_sale_start_period").hide();
    $("#sale_end_period").hide();
    $("#lbl_sale_end_period").hide();

    $("#sale-supplier-select").hide();

    $("#sale_report_type").change(function(){
        let status = this.value;
        let url = "../controller/reportcontroller.php?status="+status;

        if(status === "sale_daily_income_list")
        {

            $("#sale_start_period").hide();
            $("#lbl_sale_start_period").hide();
            $("#sale_end_period").hide();
            $("#lbl_sale_end_period").hide();

            $("#sale-supplier-select").hide();

            $("#btn-generate-sale-report").click(function (){
                $.post(url, function(data){
                    $(".split-sale-data").html(data);
                    $("#result-table").DataTable({
                        "destroy": true,
                    });
                    $("#print_data").val(data);
                });
            });
        }

        else if(status === "sale_period_list") {
            $("#sale_start_period").show();
            $("#lbl_sale_start_period").show();
            $("#sale_end_period").show();
            $("#lbl_sale_end_period").show();

            $("#sale-supplier-select").hide();

            $("#btn-generate-sale-report").click(function () {
                let start_date = $("#sale_start_period").val();
                let to_date = $("#sale_end_period").val();

                $.post(url, {from: start_date, to: to_date}, function (data) {
                    $(".split-sale-data").html(data);
                    $("#result_table").DataTable({
                        "destroy": true,
                    });
                    alert(data);
                    $("#print_data").val(data);
                });
            });
        }

        else if(status === "sale_supplier_list")
        {
            $("#sale_start_period").hide();
            $("#lbl_sale_start_period").hide();
            $("#sale_end_period").hide();
            $("#lbl_sale_end_period").hide();

            $("#sale-supplier-select").show();

            $("#btn-generate-sale-report").click(function (){
               let sale_sup_id = $("#sale_supplier").val();
               $.post(url, {sale_sup_id:sale_sup_id}, function (data){
                    $(".split-sale-data").html(data);
                   $("#result_table").DataTable({
                       "destroy": true,
                   });
                   $("#print_data").val(data);
               });
            });

        }
    });
});