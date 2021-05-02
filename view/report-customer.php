<?php include '../includes/header.php';
include '../model/report_model.php';

$reportObj = new Report();

?>
<title>Report Management</title>
<link rel="stylesheet" href="../assets/css/style-report.css">
</head>
<body>
<?php include '../includes/navbar.php'; ?>

<!-- Breadcum   -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="report-management.php">Reports</a></li>
        <li class="breadcrumb-item active" aria-current="page">Customer Reports</li>
    </ol>
</nav>

<!--    Page Content    -->
<div class="container-fluid m-3">
    <div class="row m-2 d-flex justify-content-center">
        <div class="col-md-10 text-center customer-report-error">

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4 text-center">Customer Reports</h1>
        </div>
    </div>
    <form class="form" method="post" action="report-generator1.php">
        <div class="row form-group mt-4">
            <label for="customer_report_type" class="mt-1">Report Type : </label>
            <div class="input-group col-md-4">
                <select name="customer_report_type" id="customer_report_type" class="form-control custom-select">
                    <option value="choose" selected>Select A Report Type</option>
                    <option value="customer_all">Registered Customer Report</option>
                    <option value="customer_vehicle_no_wise">Vehicle Number Wise Customer Report</option>
                    <option value="customer_feedback">Feedback Report</option>
                    <option value="customer_loyalty">Loyalty Package Report</option>
                </select>
            </div>

            <input type="hidden" name="print_data" id="print_data">


            <div class="input-group col-md-7">
                <label for="vno" class="mt-1 mr-1" id="lbl_vno">Vehicle Number: </label>
                <div class="ui-widget ui-front mr-2">
                    <input type="text" name="vno" id="vno" class="form-control">
                </div>

                <button type="button" class="btn btn-success mr-5" id="btn-generate-customer-report"><i class="fa fa-file-text-o"></i> Generate</button>
                <button type="submit" class="btn btn-primary mr-2 justify-content-end"><i class="fa fa-download"></i> Download</button>
            </div>
        </div>
    </form>

    <div class="split-customer-data table-responsive">

    </div>

</div>
</body>

<?php include '../includes/footer.php'; ?>
<script src="../assets/js/report_customer.js"></script>
