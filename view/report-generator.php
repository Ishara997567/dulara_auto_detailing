<?php include '../includes/header.php';
require_once '../commons/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

if(isset($_POST['print_data'])) {
        $html2pdf = new Html2Pdf('P', 'A4', 'fr');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->pdf->SetFontSize(20);
        $html2pdf->writeHTML($_POST['print_data']);

        ob_end_clean();

        $html2pdf->output('myPdf.pdf');


} else {
    echo "POST variable is not set yet!";
}

include '../includes/footer.php';

