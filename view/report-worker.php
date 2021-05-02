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
        <li class="breadcrumb-item active" aria-current="page">Worker Reports</li>
    </ol>
</nav>

<!--    Page Content    -->
<div class="container-fluid m-3">
    <div class="row m-2 d-flex justify-content-center">
        <div class="col-md-10 text-center worker-report-error">

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4 text-center">Worker Reports</h1>
        </div>
    </div>
    <form class="form" method="post" action="report-generator1.php">
        <div class="row form-group mt-4">
            <label for="worker_report_type" class="mt-1">Report Type : </label>
            <div class="input-group col-md-2">
                <select name="worker_report_type" id="worker_report_type" class="form-control custom-select">
                    <option value="choose" selected>Select A Report Type</option>
                    <option value="worker_all">Worker Details</option>
                    <option value="worker_wise">Worker wise Details</option>
                    <option value="worker_attendance">Attendance Report</option>
                    <option value="worker_wise_attendance">Worker wise Attendance Report</option>
                    <option value="worker_wise_payroll">Worker wise Payroll</option>
                </select>
            </div>

            <input type="hidden" name="print_data" id="print_data">


            <div class="input-group col-md-9">
                <label for="worker_name" class="mt-1 mr-1" id="lbl_wname">Worker Name: </label>
                <div class="ui-widget ui-front mr-2">
                    <input type="text" name="worker_name" id="worker_name" class="form-control">
                </div>


                <label for="worker_from" class="mt-1" id="lbl_worker_from">From : </label>
                <input type="date" name="worker_from" id="worker_from" class="form-control mr-2">
                <label for="worker_to" class="mt-1" id="lbl_worker_to">To : </label>
                <input type="date" name="worker_to" id="worker_to" class="form-control mr-1">


                <button type="button" class="btn btn-success mr-2" id="btn-generate-worker-report"><i class="fa fa-file-text-o"></i> Generate</button>
                <button type="submit" class="btn btn-primary justify-content-end"><i class="fa fa-download"></i> Download</button>
            </div>
        </div>
    </form>

    <div class="split-worker-data table-responsive">

    </div>

</div>
</body>

<?php include '../includes/footer.php'; ?>
<script src="../assets/js/report_worker.js"></script>
