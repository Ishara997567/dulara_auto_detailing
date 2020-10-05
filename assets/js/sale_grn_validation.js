$(document).ready(function (){
    $("#grn_submit").click(function (e){
        e.preventDefault();

        let grnPOId = $("#grn_po_id").val();

        if(grnPOId == "choose")
        {
            $(".grn-danger-alert").html("Please Select A Purchase Order").addClass("alert alert-danger")
            $("#grn_po_id").focus();
            return false;

        }
    });

    $("#grn_po_id").click(function (){
        $(".grn-danger-alert").fadeOut(3000);
    });
});