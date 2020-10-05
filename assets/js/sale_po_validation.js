$(document).ready(function (){
    $("#po_submit").click(function (){
        let supId = $("#po_supplier").val();
        let firstItemAmount = $("#amount1").val();


        if(supId == "choose")
        {
            $(".po-danger-alert").html("Please Choose A Supplier!").addClass("alert alert-danger");
            $("#po_supplier").focus();
            return false;
        }

        if(firstItemAmount == "")
        {
            $(".po-danger-alert").html("Please Select At Least 1 Item To Order!").addClass("alert alert-danger");
            $("#amount1").focus();
            return false;
        }



    })
})