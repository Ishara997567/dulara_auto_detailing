$(document).ready(function (){
    let rating = 0;
    $('.stars a').on('click', function(){
        $('.stars span, .stars a').removeClass('active');

        $(this).addClass('active');
        $('.stars span').addClass('active');

        rating = $(this).data('id');

    });

    $(".btn-submit-feedback").click(function (){
        let name = $("#feedback_cus_name").val();
        let vno = $("#feedback_cus_vno").val();
        let invoice = $("#feedback_invoice_no").val();
        let review = $("#feedback_message").val();

        let feedbackMessage = $(".feedback_message");


        if(name === "")
        {
            feedbackMessage.html("Please Enter Your Name!").addClass("alert alert-danger");
            $("#feedback_cus_name").focus();
            return false;
        }

        if(vno === "")
        {
            feedbackMessage.html("Please Enter Customer Vehicle Number!").addClass("alert alert-danger");
            $("#feedback_cus_vno").focus();
            return false;
        }
        const vehicleNoPat = /^([a-zA-Z]{1,3}|((?!0*-)[0-9]{1,3}))-[0-9]{4}(?<!0{4})$/;

        if(!(vno.match(vehicleNoPat)))
        {
            feedbackMessage.html("Please A Valid Vehicle Number").addClass("alert alert-danger");
            $("#feedback_cus_vno").focus();
            return false;
        }

        if(invoice === "")
        {
            feedbackMessage.html("Please Enter Service Invoice Number!").addClass("alert alert-danger");
            $("#feedback_invoice_no").focus();
            return false;
        }

        if(rating === 0)
        {
            feedbackMessage.html("Please Give Your Star Rating Below!").addClass("alert alert-danger");
            return false;
        }

        if(review === "")
        {
            feedbackMessage.html("Please Give Your Review on behalf of our Service!").addClass("alert alert-danger");
            $("#feedback_message").focus();
            return false;
        }


        const url = "controller.php?status=insert_feedback";
        $.post(url, {name:name, vno:vno, invoice:invoice, rating:rating, review:review}, function (data){
            if(data === "1")
            {
                feedbackMessage.html("Thank You for Giving your feedback!").addClass("alert alert-success");
                feedbackMessage.focus();
            } else {
                feedbackMessage.html("Something went wrong! Please try again").addClass("alert alert-danger");
                feedbackMessage.focus();
            }

            window.setTimeout(function(){location.reload()},2000)
        });


    });

    $(".public-links button").click(function (e){
        e.preventDefault();
    });
})