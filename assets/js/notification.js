$(document).ready(function(){
    $("#notification_row #notification_col a").on('click', function (){
        const url = "../controller/notificationcontroller.php?status=change_is_read";
        const notID = $(this).data('id');

        $.post(url, {notID:notID});

    });

    $("#btn_mark_all_read").click(function (){
        const url = "../controller/notificationcontroller.php?status=mark_read";
        $.post(url, function (){
            location.reload(true);
        });
    });

    $("#btn_mark_all_unread").click(function (){
        const url = "../controller/notificationcontroller.php?status=mark_unread";
        $.post(url, function () {
            location.reload(true);
        });
    });

    $("#checkbox_disturb").change(function (){
        if($(this).is(":checked")){
            $("#span_not_count").hide();
        } else {
            $("#span_not_count").show();
        }
    })
});