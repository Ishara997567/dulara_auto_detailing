$(document).ready(function (){

    $("#btn_dr_view").click(function (){
        let startDate = $("#from_date").val();
        let endDate = $("#to_date").val();

        let url = "../controller/salecontroller.php?status=grn_history_date_range";
        $.post(url, {startDate:startDate, endDate:endDate}, function (data){
            $("#grn_history_ranged").html(data);



            $(".grn-history tbody tr td").on("click", "a", function (){
                let grnId = $(this).data('id');

                let url = "../controller/salecontroller.php?status=manage_grn_history";
                $.post(url, {grnId:grnId}, function (data){
                    $("#grn_content").html(data);
                });

            });




        });
    });



    $(".grn-history tbody tr td").on("click", "a", function (){
        let grnId = $(this).data('id');

        let url = "../controller/salecontroller.php?status=manage_grn_history";
        $.post(url, {grnId:grnId}, function (data){
            $("#grn_content").html(data);
        });

    });




})