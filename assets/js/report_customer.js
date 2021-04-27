$(document).ready(function (){
    $("#lbl_vno").hide();
    $("#vno").hide();

    $("#customer_report_type").change(function () {
        let status = this.value;
        let url = "../controller/reportcontroller.php?status="+status;

        if(status === "customer_all" || status === "customer_feedback" || status === "customer_loyalty")
        {
            $("#lbl_vno").hide();
            $("#vno").hide();

            $("#btn-generate-customer-report").click(function (){
                $.get(url,function (data){
                    $(".split-customer-data").html(data);
                    $("#result-table").DataTable({
                        "destroy": true,
                    });
                });
            });
        } else if (status === "customer_vehicle_no_wise") {
            $("#lbl_vno").show();
            $("#vno").show();


            $("#vno").autocomplete({
                source: 'customer-autofill-results.php',
            });

            $("#btn-generate-customer-report").click(function (){
                let vno = $("#vno").val();
                if(vno !== "") {
                    $.ajax({
                        url: url,
                        type: "POST",
                        cache: false,
                        data: {vno: vno},
                        success: function (data) {
                            if (data === "") {
                                $(".customer-report-error").html("<button type='button' class='close' data-dismiss='alert'>&times;</button> Please select a valid vehicle number!").addClass("alert alert-danger alert-dismissible");
                                return false;
                            } else {
                                $(".split-customer-data").html(data);
                                $("#result-table").DataTable({
                                    "destroy": true,
                                });
                            }
                        }
                    });
                } else {
                    $(".customer-report-error").html("<button type='button' class='close' data-dismiss='alert'>&times;</button> Please select a vehicle number!").addClass("alert alert-danger alert-dismissible");
                    return false;
                }
            });
        }
    });
})