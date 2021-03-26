$(document).ready(function(){
   $("#message-menu").hide();
   //$("#notification_menu").hide();

   $("#bell-icon").click(function (){
       $("#message-menu").hide();
       $("#notification-menu").show();
   });

    $("#message-icon").click(function (){
        $("#notification-menu").hide();
        $("#message-menu").show();
    });
});