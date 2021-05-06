<?php
//include '../includes/header.php';
require_once ('../commons/vendor/tecnickcom/tcpdf/tcpdf.php');
include '../model/job_model.php';

$jobObj = new Job();

if(isset($_POST['modal_invoice_id'])) {

    $invoice_id = $_POST['modal_invoice_id'];
    $invoice_date = $_POST['modal_invoice_date'];
    $invoice_job_id = $_POST['modal_invoice_job_id'];
    $invoice_vehicle_no = $_POST['modal_invoice_vehicle_no'];
    $invoice_vehicle = $_POST['modal_invoice_vehicle'];
    $invoice_vehicle_odo = $_POST['modal_invoice_vehicle_odo'];
    $invoice_vehicle_mileage = $_POST['modal_invoice_vehicle_mileage'];
    $invoice_customer_name = $_POST['modal_invoice_cus_name'];

    $invoice_tot_item_amount = $_POST['modal_tot_item_amount'];
    $invoice_tot_service_amount = $_POST['modal_tot_service_amount'];

    $invoice_tax = $_POST['modal_invoice_tax'];
    $invoice_tot_amount = $_POST['modal_tot_invoice_amount'];

    $invoice_tot_amount *= ((100+$invoice_tax)/100);

//Creating the PDF

    class MYPDF extends TCPDF {

        //Page header
        public function Header() {
            // Logo
            $image_file = K_PATH_IMAGES.'logo.png';
            $this->Image($image_file, 5, 10, 30, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
            // Set font
            $this->SetFont('helvetica', 'B', 30);
            // Title
            $this->Cell(0, 15, 'DULARA AUTO DETAILING', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        }

        // Page footer
        public function Footer() {
            // Position at 15 mm from bottom
            $this->SetY(-15);
            // Set font
            $this->SetFont('helvetica', 'I', 8);
            // Page number
            $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        }
    }

    $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('DULARA AUTO DETAILING');
    $pdf->SetTitle('Invoice');
    $pdf->SetSubject('Invoice');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');



// set default header data
    //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 048', PDF_HEADER_STRING);


    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

// ---------------------------------------------------------


// add a page
    $pdf->AddPage();


    $pdf->SetFont('helvetica', 'B', 15);

    $pdf->Write(0, 'INVOICE', '', 0, 'C', true, 0, false, false, 0);

    $pdf->SetFont('helvetica', '', 12);
    $txt = <<<EOD
            <br>
            <br>
            <br>
        <table align="right" style="border: black solid 3px; background-color: #dee2e6; color: black;">
            <tr>
                <td style="text-align: left">Invoice No</td>
                <td style="text-align: left">{$invoice_id}</td>
            </tr>
            
            <tr>
                <td style="text-align: left">Date and Time</td>
                <td style="text-align: left">{$invoice_date}</td>
            </tr>
            
            <tr>
                <td style="text-align: left">Vehicle No</td>
                <td style="text-align: left">{$invoice_vehicle_no}</td>
            </tr>
            
            <tr>
                <td style="text-align: left">Vehicle Model and Make</td>
                <td style="text-align: left">{$invoice_vehicle}</td>
            </tr>
            
            <tr>
                <td style="text-align: left">Vehicle ODO</td>
                <td style="text-align: left">{$invoice_vehicle_odo}</td>
            </tr>
            
            <tr>
                <td style="text-align: left">Vehicle Mileage</td>
                <td style="text-align: left">{$invoice_vehicle_mileage}</td>
            </tr>
        </table>   

EOD;

    $pdf->writeHTML($txt, true, false, false, false, '');
// -----------------------------------------------------------------------------
    // set font
    $pdf->SetFont('helvetica', 'B', 20);

    $pdf->Write(0, 'Item Replacements', '', 0, 'C', true, 0, false, false, 0);
    $pdf->SetFont('helvetica', '', 13);

    $tbl1 = <<<EOD
<table class="table table-sm" border="1" align="center">
                    <thead>
                    <tr>
                        <th scope="col">Item ID</th>
                        <th>Item Name</th>
                        <th>Item Price</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                    </tr>
                    </thead>

                    <tbody>
EOD;
    $invoice_item_result = $jobObj->getInvoiceItemsByInvoiceId($invoice_id);
    while($iirow = $invoice_item_result->fetch_assoc()) {
        $tbl1 .= <<<EOD
                        <tr>
                            <td scope="row">{$iirow['invoice_item_id']}</td>
                            <td>{$iirow['item_name']}</td>
                            <td>{$iirow['invoice_item_price']}</td>
                            <td>{$iirow['invoice_item_qty']}</td>
                            <td style="text-align: right;">{$iirow['invoice_item_amount']}</td>
                        </tr>
                     EOD;
    }
        $tbl1 .= <<<EOD
                <tr>
                    <td colspan="4" style="text-align: center;">Total Item Replacement Amount</td>
                    <td style="text-align: right; font-weight: bold">{$invoice_tot_item_amount}</td>
                </tr>
                    </tbody>
                </table>
                EOD;

        $pdf->writeHTML($tbl1, true, false, false, false, '');
        $pdf->SetFont('helvetica', 'B', 20);

    $pdf->Write(0, 'Services', '', 0, 'C', true, 0, false, false, 0);
    $pdf->SetFont('helvetica', '', 13);

        $tbl = <<<EOD
        <table class="table table-sm" border="1" align="center">
                    <thead>
                    <tr>
                        <th style="text-align: center;">Service ID</th>
                        <th style="text-align: center;">Service Name</th>
                        <th style="text-align: center;">Service Price</th>
                    </tr>
                    </thead>

                    <tbody>
EOD;
        $invoice_service_result = $jobObj->getInvoiceServicesByInvoiceId($invoice_id);
        while($r=$invoice_service_result->fetch_assoc()) {
            $tbl .= <<<EOD
                        <tr>
                            <td scope="row">{$r['invoice_service_id']}</td>
                            <td>{$r['service_name']}</td>
                            <td style="text-align: right">{$r['invoice_service_price']}</td>
                        </tr>
                        EOD;
        }
        $tbl .= <<<EOD
                        <tr>
                            <td colspan="2" style="text-align: center;">Total Service Amount</td>
                            <td style="text-align: right; font-weight: bold">{$invoice_tot_service_amount}</td>
                        </tr>
                    </tbody>
                </table>
EOD;

            $pdf->writeHTML($tbl, true, false, false, false, '');


    $pdf->SetFont('helvetica', 'B', 15);
    $txt1 = <<<EOD
        <br>
        <br>
        <br>
        <table style="border: black double 3px;">
            <tr>
                <td style="text-align: center">Total Amount</td>
                <td style="text-align: right; text-decoration: underline">LKR {$invoice_tot_amount}</td>
            </tr>
            
            <tr>
                <td style="text-align: center">Tax</td>
                <td style="text-align: right;">{$invoice_tax}%</td>
            </tr>
        </table>   
        <br>
        <br>
        <br>

EOD;

    $pdf->writeHTML($txt1, true, false, false, false, '');

    $pdf->Write(0, '__________________', '', 0, 'R', true, 0, false, false, 0);
    $pdf->Write(0, 'Authorized by', '', 0, 'R', true, 0, false, false, 0);


//Close and output PDF document
            $pdf->Output('invoice.pdf', 'I');

        } else {
        echo "POST variable is not set yet!";
    }
//        include '../includes/footer.php';

