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
        <li class="breadcrumb-item active" aria-current="page">Sale Reports</li>
    </ol>
</nav>

<!--    Page Content    -->
<div class="container-fluid m-3">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4 text-center">Sale Reports</h1>
        </div>
    </div>
    <form class="form">
        <div class="row form-group mt-4">
            <label for="sale_report_type" class="mt-1">Report Type : </label>
            <div class="input-group col-md-2">
                <select name="sale_report_type" id="sale_report_type" class="form-control custom-select">
                    <option value="choose" selected>Select A Report Type</option>
                    <option value="sale_daily_income_list">Daily Income Report</option>
                    <option value="sale_period_list">Periodical Sale Report</option>
                    <option value="sale_supplier_list">Supplier Detail Report</option>
                </select>
            </div>

            <div class="input-group col-md-9">


                    <div id="sale-supplier-select" class="mr-4">
                        <select name="sale_supplier" id="sale_supplier" class="form-control custom-select">
                            <option value="choose" selected>Select Supplier</option>
                            <?php
                            $result = $reportObj->getAllSuppliers();
                            while($r = $result->fetch_assoc())
                            {
                                ?>
                                <option value="<?php echo $r['sup_id']; ?>"><?php echo $r['sup_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <label for="sale_start_period" class="mt-1" id="lbl_sale_start_period">From : </label>
                    <input type="date" name="sale_start_period" id="sale_start_period" class="form-control mr-2">
                    <label for="sale_end_period" class="mt-1" id="lbl_sale_end_period">To : </label>
                    <input type="date" name="sale_end_period" id="sale_end_period" class="form-control mr-1">


                <button type="button" class="btn btn-success mr-5" id="btn-generate-sale-report"><i class="fa fa-file-text-o"></i> Generate</button>
                <button type="button" class="btn btn-primary mr-2 justify-content-end"><i class="fa fa-download"></i> Download</button>
                <button type="button" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
            </div>
    </form>
</div>

    <div class="split-sale-data">

    </div>

</div>
</body>
<?php include '../includes/footer.php'; ?>
<script src="../assets/js/report_sale.js"></script>
