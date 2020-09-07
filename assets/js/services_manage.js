$(document).ready(function() {
    $("#table_manage").on("click", "#table_data_manage_service_id a", function () {
        const sid = $(this).data('id');

        const url = "../controller/servicecontroller.php?status=manage_service";

        $.post(url, {service_id:sid}, function(data, status){
            $("#body_modal_manage").html(data).show();
        })
    })
})