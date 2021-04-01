$(document).ready(function (){
    $("#grn_po_id").change(function (){
        let grnPOId = this.value;

        let url = "../controller/salecontroller.php?status=grn_fill_supplier_and_amount";
        $.post(url, {grnPOId:grnPOId}, function (data){
            data = $.parseJSON(data);
            $("#grn_supplier").val(data.sup_name);
            $("#grn_po_amount").val(data.po_amount);
        });

        let u = "../controller/salecontroller.php?status=grn_fill_po_info";
        $.post(u, {grnPOId:grnPOId}, function (data){
            $("#grn_po_filling_details").html(data);


            let arrLen = $("input[name='grn_amount[]']").length;

            for(let i=1; i<=arrLen; i++){
                $("#grn_qty"+i).keyup(function (){
                    let qty = $("#grn_qty"+i).val();
                    let price = $("#grn_purchase_price"+i).val();
                    $("#grn_amount"+i).val(qty * price);
                });
            }

        });
    });

    $("#grn_submit").click(function (){

        let poID = $("#grn_po_id").val();

        let grnItemId = [];
        $(".grn-table").find("td[id='grn_item_id']").map(function (){
            grnItemId.push($(this).text());
        });


        let grnPurchasingUnitPrice = $("input[name='grn_purchase_price[]']").map(function (){
            return this.value;
        }).get();


        let grnQty = $("input[name='grn_qty[]']").map(function (){
            return this.value;
        }).get();

        let grnAmount = $("input[name='grn_amount[]']").map(function (){
            return this.value;
        }).get();

        let u = "../controller/salecontroller.php?status=generate_grn";

        $.post(u,
            {
                poID:poID,
                grnItemId:grnItemId,
                grnPurchasingUnitPrice:grnPurchasingUnitPrice,
                grnQty:grnQty,
                grnAmount:grnAmount
            },function (data, success){
                if(data == "0")
                {
                    alert("Purchase Order Has Already Been Processed!");
                    $("#grn_po_id").focus();
                }
                else if(data == "1")
                {
                    window.location.replace("http://localhost:8080/dulara_auto_detailing/view/sale-grn-generate.php");
                }
            });


    });

});