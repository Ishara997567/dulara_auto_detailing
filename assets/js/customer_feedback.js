$(document).ready(function(){
    $("#txt_specific_customer1").autocomplete({
        source: "customer-feedback-message-autofill-name.php"
    });

    $(".specific-customers-container").hide();
    $("#specific_customer").click(function (){
        if($(this).is(":checked")){
            $(".specific-customers-container").show();
            let c = 1;
            $("#add_customer").click(function (){
                c++;
                $(".specific-customer-append").append("" +
                    "<div class='form-row'>" +
                    "<div class='col-md-11 mt-1 mb-2 ui-widget ui-front'>" +
                    "<input type='text' class='form-control rounded-pill' id='txt_specific_customer"+c+"' name='txt_specific_customer[]'/>" +
                    "</div>" +
                    "<div class='col-md-1'>" +
                    "<button type='button' class='form-control btn btn-outline-danger rounded-pill' name='btn_remove[]'><i class='fa fa-minus'></i></button>" +
                    "</div>"+
                    "</div>"
                );

                $("button[name='btn_remove[]']").click(function (){
                    $(this).parent().parent('div').remove();
                });

                $("#txt_specific_customer"+c).autocomplete({
                    source: "customer-feedback-message-autofill-name.php"
                });

            });
        }
        else
        {
            $(".specific-customer-append").empty();
            $(".specific-customers-container").hide();
        }
    });

    $("#btn-send-message").click(function (){

        let m_type = [];
        let m_to_whom = [];
        let when = [];
        let specific_customer_names;

        let m_heading = $("#m-heading").val();
        let message = $("#message-text").val();
        $("input[name='message-type']:checked").each(function (){
            m_type.push(this.value);
        });



        $("input[name='to-whom']:checked").each(function (){
            m_to_whom.push(this.value);
        });



        $("input[name='when']:checked").each(function (){
            when.push(this.value);
        });



        if($("#specific_customer").prop("checked")) {

            specific_customer_names = $("input[name='txt_specific_customer[]']").map(function () {
                return this.value;
            }).get();
        }

        let url = "../controller/customercontroller.php?status=customer_feedback_send_message";

        $.post(url, {m_heading:m_heading, message:message, m_type:m_type, m_to_whom:m_to_whom, specific_customer_names:specific_customer_names, when:when}, function(data, success){
            alert(success);
            alert(data);
        });
    });

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
                    $(".feedback-reply-message").html("Reply Submitted Successfully!").addClass("alert alert-success");
                } else {
                    $(".feedback-reply-message").html("Something went wrong!").addClass("alert alert-danger");
                }
            });

            setTimeout(function (){
                location.reload(true)
            }, 1800);

        });

    });

});