$(document).ready(function(){
    $("#td-feedback-like a").click(function (){
        let fid = $(this).data("fid");
        let current_status = $(this).data("cs");
        let url = "../controller/customercontroller.php?status=change_is_like";

        let change_is_like = current_status === 0 ? 1 : 0;

        $.get(url, {is_like: change_is_like, fid:fid});
        location.reload(true);
        return false;


    });

    $("#td-feedback-reply a").click(function (){
        let fid = $(this).data('fid');
        let current_status = $(this).data('replied');
        let reply = $(this).data('reply');

        if(current_status === 1)
        {
            $("#textarea-feedback-reply").val(reply);
        }

        $("#submit-feedback-reply").click(function (){
            let new_reply = $("#textarea-feedback-reply").val();
            current_status = new_reply !== "" ? 1 : 0;

            let url = "../controller/customercontroller.php?status=change_reply";
            $.post(url, {fid:fid, is_replied:current_status, reply:new_reply}, function (data){
                if(data === "1")
                {
                    $(".feedback-reply-message").html("<button type='button' class='close' data-dismiss='alert'>&times;</button> Reply Submitted Successfully!").addClass("alert alert-success alert-dismissible");
                } else {
                    $(".feedback-reply-message").html("<button type='button' class='close' data-dismiss='alert'>&times;</button> Something went wrong!").addClass("alert alert-danger alert-dismissible");
                }
            });

            setTimeout(function (){
                location.reload(true)
            }, 1800);

        });

    });

});