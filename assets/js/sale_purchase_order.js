$(document).ready(function (){

    $("#item_name1").autocomplete({
        source: "sale_item_autofill_results.php"
    });

    let url = "../controller/salecontroller.php?status=autofill_item_details";
    $(".purchase-order").on("change", "#item_name1", function (){
        let itemName = $("#item_name1").val();
        $.post(url, {itemName:itemName}, function(data){
            data = $.parseJSON(data);
            $("#item_code1").val(data.item_id);
            $("#unit_price1").val(data.price);

        });

    });

    //Calculating the total amount of items
    $("#qty1").keyup(function (){
        let price = $("#unit_price1").val();
        let qty = $("#qty1").val();
        let amount = (price * qty);
        $("#amount1").val(amount);

    });

    $("#btn_remove1").click(function (){

        $("#item_code1").val("");
        $("#item_name1").val("");
        $("#unit_price1").val("");
        $("#qty1").val("");
        $("#amount1").val("");

    });

    let c=1
    $("#new_po_record").click(function (){
        c++;
        $(".po-record-container").append("<div class='form-row'><div class='form-group col-md-2'><input type='text' class='form-control' id='item_code"+c+"' name='item_code[]' readonly placeholder='Item Code'/></div><div class='form-group col-md-3 ui-widget ui-front'><input type='text' class='form-control' id='item_name"+c+"' name='item_name[]' placeholder='Item Name'/></div><div class='form-group col-md-2'><input type='text' class='form-control' id='unit_price"+c+"' name='unit_price[]' placeholder='Rs.'/></div><div class='form-group col-md-2'><input type='text' class='form-control' id='qty"+c+"' name='qty[]' placeholder='Quantity'/></div><div class='form-group col-md-2'><input type='text' class='form-control' id='amount"+c+"' name='amount[]' readonly placeholder='Amount'/></div><div class='form-group col-md-1'><button type='button' class='form-control btn btn-outline-danger rounded-pill' name='btn_remove[]'><i class='fa fa-minus'></i></button></div>");

        $("button[name='btn_remove[]']").click(function (){
            $(this).parent().parent('div').remove();
        })

        $("#item_name"+c).autocomplete({
            source: "sale_item_autofill_results.php"
        });


        $("#item_name"+c).change(function (){
            let itemName = this.value;
            let url = "../controller/salecontroller.php?status=autofill_item_details";
            $.post(url, {itemName:itemName}, function(data){
                data = $.parseJSON(data);
                $("#item_code"+c).val(data.item_id);
                $("#unit_price"+c).val(data.price);

            });

        });


        //Calculating the total amount of items
        $("#qty"+c).keyup(function (){

            let price = $("#unit_price"+c).val();
            let qty = $("#qty"+c).val();
            let amount = (price * qty);
            $("#amount"+c).val(amount);

        });
    });


    $("#po_submit").click(function (){
        let supId = $("#po_supplier").val();
        let itemCodeSet = $("input[name='item_code[]']").map(function(){
            return this.value;
        }).get();


        let itemPriceSet = $("input[name='unit_price[]']").map(function(){
            return this.value;
        }).get();

        let itemQtySet = $("input[name='qty[]']").map(function(){
            return this.value;
        }).get();

        let itemAmountSet = $("input[name='amount[]']").map(function(){
            return this.value;
        }).get();

        let url = "../controller/salecontroller.php?status=add_po";

        $.post(url,
            {
                supId:supId,
                itemCodeSet:itemCodeSet,
                itemPriceSet:itemPriceSet,
                itemQtySet:itemQtySet,
                itemAmountSet:itemAmountSet
            });

    });
});