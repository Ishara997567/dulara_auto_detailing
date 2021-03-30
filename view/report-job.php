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
        <li class="breadcrumb-item active" aria-current="page">Job Reports</li>
    </ol>
</nav>

<!--    Page Content    -->
<div class="container-fluid m-3">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4 text-center">Job Reports</h1>
        </div>
    </div>
    <form class="form">
        <div class="row form-group mt-4">
            <label for="job_report_type" class="mt-1">Report Type : </label>
            <div class="input-group col-md-4">
                <select name="job_report_type" id="job_report_type" class="form-control custom-select">
                    <option value="choose" selected>Select A Report Type</option>
                    <option value="job_completed_list">Completed Job Report</option>
                    <option value="job_customer_list">Customer Wise Job Report</option>
                </select>
            </div>

            <div class="input-group col-md-7">
                <label for="job_start_period" class="mt-1" id="lbl_job_start_period">From : </label>
                <input type="date" name="job_start_period" id="job_start_period" class="form-control mr-2">
                <label for="job_end_period" class="mt-1" id="lbl_job_end_period">To : </label>
                <input type="date" name="job_end_period" id="job_end_period" class="form-control mr-1">

                <button type="button" class="btn btn-success mr-5" id="btn-generate-job-report"><i class="fa fa-file-text-o"></i> Generate</button>
                <button type="button" class="btn btn-primary mr-2 justify-content-end"><i class="fa fa-download"></i> Download</button>
                <button type="button" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
            </div>
        </div>
    </form>

    <div class="split-job-data table-responsive">

    </div>

</div>
</body>

<?php include '../includes/footer.php'; ?>
<script src="../assets/js/report_job.js"></script>
