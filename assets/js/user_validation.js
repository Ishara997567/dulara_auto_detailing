$(document).ready(function(){
    $("#frm_new_user").submit(function(){

        var nic = $("#nic").val();
        var nic_pat = /^[0-9]{9}[VvXx]$/;

        if(!nic.match(nic_pat)) {

            $("#alert_new_user").html("Invalid NIC");
            $("#alert_new_user").addClass("alert alert-danger");
            $("#nic").focus();

            return false;
        }
    });
});