$(document).ready(function (){
    $("#vehicle_no").autocomplete({
        source: 'customer-autofill-results.php',
    });

    let url = '../controller/jobcontroller.php?status=autofill_customer'
    $("#vehicle_no").on("change", function(){
        let vehicleNo = $("#vehicle_no").val();

        $.post(url, {vn: vehicleNo}, function(data){
            data = $.parseJSON(data);
            $("#customer_name").val(data.cus_name);
            $("#customer_id").val(data.cus_id);
        });

    });


    $("#vehicle_make").on("change", function (){
        let url = '../controller/jobcontroller.php?status=get_vehicle_make';
        let vehicle_make_id = this.value;
        $.post(url, {make_id:vehicle_make_id}, function (data){
            $("#vehicle_model").html(data);
        });
    });

    $(".pending-job-table").on("click", ".see-more", function (){
        let jobId = $(this).data('id');
        alert(jobId);
    });

});