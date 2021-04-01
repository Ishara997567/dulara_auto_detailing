$(document).ready(function (){
    $("#supplier_select").hide();
    $("#item_category_select").hide();
    $("#item_select").hide();
    $("#inventory_report_type").change(function (){
        let status = this.value;
        let url = "../controller/reportcontroller.php?status="+status;

        if(status === "item_list" || status === "item_qty_list")
        {
            $("#item_category_select").hide();
            $("#item_select").hide();
            $("#supplier_select").hide();
            $("#btn-generate-inventory-report").click(function (){
                $.get(url,function (data){
                    $(".split-inventory-data").html(data);
                    $("#result-table").DataTable({
                        "destroy": true,
                    });
                });
            });
        }
        else if(status === "supplier_item_list")
        {
            $("#supplier_select").show();
            $("#item_category_select").hide();
            $("#item_select").hide();


            $("#btn-generate-inventory-report").click(function() {
                let supplier_id = $("#inventory_supplier").val();
                $.post(url, {sup_id:supplier_id}, function(data){
                    $(".split-inventory-data").html(data);
                    $("#result-table").DataTable({
                        "destroy": true,
                    });
                });

            });
        }
        else if(status === "item_category_list")
        {
            $("#item_category_select").show();
            $("#item_select").hide();
            $("#supplier_select").hide();

            $("#btn-generate-inventory-report").click(function (){
                let item_cat_id = $("#inventory_item_category").val();
                $.post(url, {item_cat_id:item_cat_id}, function (data){
                    $(".split-inventory-data").html(data);
                    $("#result-table").DataTable({
                        "destroy": true,
                    });
                });
            });
        }
        else if(status === "stock_level_list")
        {
            $("#item_category_select").show();
            $("#item_select").show();
            $("#supplier_select").hide();

            $("#inventory_item_category").change(function (){
                let icat_id = this.value;
                let u = "../controller/reportcontroller.php?status=item_list_by_category";
                $.post(u, {icat_id:icat_id}, function (data){
                    $("#item_select").html(data);
                    $("#result-table").DataTable({
                        "destroy": true,
                    });
                });
            });
            $("#btn-generate-inventory-report").click(function (){
                let item_id = $("#inventory_item").val();
                $.post(url, {item_id:item_id}, function (data){
                    $(".split-inventory-data").html(data);
                    $("#result-table").DataTable({
                        "destroy": true,
                    });
                });
            })
        }
    });
})