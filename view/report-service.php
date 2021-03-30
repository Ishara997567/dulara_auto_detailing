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
        <li class="breadcrumb-item active" aria-current="page">Service Reports</li>
    </ol>
</nav>

<!--    Page Content    -->
<div class="container-fluid m-3">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4 text-center">Service Reports</h1>
        </div>
    </div>
    <form class="form">
        <div class="row form-group mt-4">
            <label for="service_report_type" class="mt-1">Report Type : </label>
            <div class="input-group col-md-5">
                <select name="service_report_type" id="service_report_type" class="form-control custom-select">
                    <option value="choose" selected>Select A Report Type</option>
                    <option value="service_list">Service Detail Report</option>
                    <option value="cat_service_list">Category Wise Service Report</option>
                </select>
            </div>

            <div class="input-group col-md-6">
                <div id="service_category_select" class="mr-4">

                    <select name="service_category" id="service_category" class="form-control custom-select">
                        <option value="choose" selected>Select Service Category</option>
                        <?php
                        $result = $reportObj->getAllCategories();
                        while($r = $result->fetch_assoc())
                        {
                            ?>
                            <option value="<?php echo $r['service_cat_id']; ?>"><?php echo $r['service_cat_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button type="button" class="btn btn-success mr-5" id="btn-generate-service-report"><i class="fa fa-file-text-o"></i> Generate</button>
                <a href="report-generator.php" class="btn btn-primary mr-2 justify-content-end"><i class="fa fa-download"></i> Download</a>
                <button type="button" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
            </div>
        </div>
    </form>

    <div class="split-service-data table-responsive">

    </div>

</div>
</body>
<?php include '../includes/footer.php'; ?>
<script src="../assets/js/report_service.js"></script>
