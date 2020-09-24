$(document).ready(function (){
    //Adding Rows to Item Table in Invoice
    let i = 0;
    $(".btn-add-item").click(function (){
        i++;
        $(".tbody-item").append("<tr>" +
            "<td><input type='text' class='form-control' id='invoice_item_id"+i+"' name='invoice_item_id[]' readonly></td>" +
            "<td class='ui-front ui-widget'><input type='text' class='form-control' id='invoice_item_name[]' name='invoice_item_name[]' placeholder='Enter Iem Name'></td>" +
            "<td><input type='text' class='form-control' id='invoice_item_price"+i+"' name='invoice_item_price[]'></td>" +
            "<td><input type='text' class='form-control' id='invoice_item_qty' name='invoice_item_qty[]'></td>" +
            "<td><input type='text' class='form-control' id='invoice_item_amount' name='invoice_item_amount[]' readonly></td>" +
            "<td><button type='button' class='btn btn-outline-danger rounded-circle' name='invoice_item_row_cancel[]'><i class='fa fa-minus'></i></button></td>" +

            "</tr>");

        $(".tbody-item").on("click", "button[name='invoice_item_row_cancel[]']", function (){
           $(this).closest('tr').remove();
        });

        //Autocomplete Item Name
        $("input[name='invoice_item_name[]']").autocomplete({
            source: 'job-invoice-item-name-autofill-results.php'
        });

        //Autofill Item Name and Price
        $("input[name='invoice_item_name[]']").change(function (){
            let itemName = this.value;
            let url = '../controller/jobcontroller.php?status=fill_item_row';
            $.post(url, {itemName:itemName}, function (data){
                data = $.parseJSON(data);
               $("#invoice_item_id"+i).val(data.item_id);
               $("#invoice_item_price"+i).val(data.item_price);

            });
        });
    });




    let j=0;
    //Adding Rows to Service Table in Invoice
    $(".btn-add-service").click(function () {
        j++;
        $(".tbody-services").append("<tr>" +
            "<td><input type='text' class='form-control' id='invoice_service_id"+j+"' name='invoice_service_id[]' readonly></td>" +
            "<td class='ui-front ui-widget'><input type='text' class='form-control' id='invoice_service_name[]' name='invoice_service_name[]' placeholder='Enter Service Name'></td>" +
            "<td><input type='text' class='form-control' id='invoice_service_charge"+j+"' name='invoice_service_charge[]'></td>" +
            "<td><button type='button' class='btn btn-outline-danger rounded-circle' name='invoice_service_row_cancel[]'><i class='fa fa-minus'></i></button></td>" +
            "</tr>");

        $(".tbody-services").on("click", "button[name='invoice_service_row_cancel[]']", function (){
            $(this).closest('tr').remove();
        });

        //Autocomplete Service Name
        $("input[name='invoice_service_name[]']").autocomplete({
            source: 'job-invoice-service-name-autofill-results.php'
        });

        $("input[name='invoice_service_name[]']").change(function (){
            let serviceName = this.value;
            let url = '../controller/jobcontroller.php?status=fill_service_row';
            $.post(url, {serviceName:serviceName}, function (data){
                data = $.parseJSON(data);
                $("#invoice_service_id"+j).val(data.s_id);
                $("#invoice_service_charge"+j).val(data.s_charge);

            });
        });

    });



});