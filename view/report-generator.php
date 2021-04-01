<?php
require_once '../commons/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

if(isset($_POST['print_data'])) {

    $data = $_POST["print_data"];
    $html2pdf = new Html2Pdf();
    $html2pdf->writeHTML('<h1>Hello Ireland!</h1>');
    $html2pdf->output('myPdf.pdf');
} else {
    echo "POST variable is not set yet!";
}
