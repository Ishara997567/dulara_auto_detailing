$(document).ready(function (){
    $("#btn_date_range_view").click(function (){
        let startDate = $("#from_date").val();
        let endDate = $("#to_date").val();
        let url = "../controller/salecontroller.php?status=po_history_date_range";
        $.post(url, {startDate:startDate, endDate:endDate}, function (data){
            $("#po_history_ranged").html(data);



            $(".po-history tbody tr").on("click", "a", function (){
                let poId = $(this).data('id');

                let url = "../controller/salecontroller.php?status=manage_po_history";
                $.post(url, {poId:poId}, function (data, success){
                    $("#po_content").html(data);
                });
            });




        });
    });

    $(".po-history tbody tr").on("click", "a", function (){
        let poId = $(this).data('id');

        let url = "../controller/salecontroller.php?status=manage_po_history";
        $.post(url, {poId:poId}, function (data, success){
            $("#po_content").html(data);
        });
    });



});