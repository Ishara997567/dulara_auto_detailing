$(document).ready(function (){
    $("#btn_illness").click(function (){
        $("#tbody_illness").append(
            "<tr>" +
                "<td>" +
                    "<input type='text' class='form-control' name='txt_illnessName[]'/>" +
                "</td>" +
                "<td>" +
                    "<input type='checkbox' class='form-control' name='check_isGoing[]' value='1'/>" +
                "</td>" +
                "<td>" +
                    "<button type='button' class='btn btn-danger' name='btn_removeIllness[]'>" +
                        "<i class='fa fa-minus'></i>" +
                    "</button>" +
                "</td>" +
            "</tr>");

        $("button[name='btn_removeIllness[]']").click(function (){
            $(this).closest('tr').remove();
        });
    });


    $("#btn_addContactNo").click(function (){
        $("#tbody_contactNumbers").append(
            "<tr>" +
                "<td>" +
                    "<select name='select_numberType[]' class='form-control'>" +
                        "<option value='Home'>Home</option>" +
                        "<option value='Mobile'>Mobile</option>" +
            "</select>" +
                "</td>" +
                "<td>" +
                    "<input type='text' class='form-control' name='text_number[]'/>" +
                "</td>" +
                "<td>" +
                    "<button type='button' class='btn btn-danger' name='btn_removeContactNumber[]'>" +
                        "<i class='fa fa-minus'></i>" +
                    "</button>" +
                "</td>" +
            "</tr>");

        $("button[name='btn_removeContactNumber[]']").click(function (){
            $(this).closest('tr').remove();
        });
    });

});

