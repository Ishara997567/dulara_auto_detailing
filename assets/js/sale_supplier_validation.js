$(document).ready(function (){
   //Getting inputs fields
    let txtSupName = $('#sup_name');
    let txtSupCN1 = $('#sup_cn1');
    let txtSupCN2 = $('#sup_cn2');
    let supEmail = $('#sup_email');

    let validationBox = $('.supplier-validation-box');

    $(".form-supplier").on("click", ".form-supplier-submit", function (){

        if(txtSupName.val() == "")
        {
            validationBox.html("Supplier Name Cannot be Empty!!!");
            validationBox.addClass("alert alert-danger");
            txtSupName.focus();
            return false;
        }

        if(txtSupCN1.val() == "")
        {
            validationBox.html("Contact Number 1 Cannot be Empty!!!");
            validationBox.addClass("alert alert-danger");
            txtSupCN1.focus();
            return false;
        }

        const contactNoPat = /^0[0-9]{9}$/;
        const emailPat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z]{2,6})+$/;

        if(!(txtSupCN1.val().match(contactNoPat)))
        {
            validationBox.html("Contact Number 1 is not Valid!!!");
            validationBox.addClass("alert alert-danger");
            txtSupCN1.focus();
            return false;
        }

        if((txtSupCN2.val() != "") && !(txtSupCN2.val().match(contactNoPat)))
        {
            validationBox.html("Contact Number 2 is not Valid!!!");
            validationBox.addClass("alert alert-danger");
            txtSupCN2.focus();
            return false;
        }

        if((supEmail.val() != "") && !(supEmail.val().match(emailPat)))
        {
            validationBox.html("Supplier Email is not Valid!!!");
            validationBox.addClass("alert alert-danger");
            supEmail.focus();
            return false;
        }

    });

});