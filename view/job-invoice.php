<?php include '../includes/header.php'; ?>
<?php include '../model/job_model.php';

$jobObj = new Job(); ?>

<title>Job Management Invoice</title>
</head>
<body>
<!-- Navigation Bar -->
<?php include '../includes/navbar.php'; ?>
<!-- Content    -->
<div class="container-fluid padding my-2">

    <div class="row padding welcome d-flex justify-content-center">
        <div class="col-10 text-center display-4 invoice-success-message">

        </div>
    </div>

    <!-- Invoice Form   -->
    <form action="job-invoice-generate.php" method="post" name="form-invoice">
        <?php
        $invoice_job_id = base64_decode($_GET['invoice_job_id']);

        $invoice_job_result = $jobObj->getCompletedJobsById($invoice_job_id);

        while($r=$invoice_job_result->fetch_assoc())
        {

            $new_invoice_result = $jobObj->getNewInvoiceID();
            $new_invoice_r = $new_invoice_result->fetch_assoc();
            ?>
            <!-- Invoice Id -->
            <div class="form-group row">
                <label for="invoice_id" class="text-right col-1 col-form-label">Invoice ID</label>
                <div class="col-3">
                    <input type="text" class="form-control" id="invoice_id" name="invoice_id" value="<?php echo $new_invoice_r['NewInvoiceID']; ?>" readonly/>
                </div>

                <div class="col-4">&nbsp;</div>
                <!-- Invoice Date -->
                <label for="invoice_date" class="text-right col-1 col-form-label">Date</label>
                <div class="col-3">
                    <input type="text" class="form-control" id="invoice_date" name="invoice_date" value="<?php echo date("jS \of F Y")?>" readonly>
                </div>
            </div>

            <hr>

            <!-- Job ID -->
            <div class="form-group row">
                <label for="invoice_job_id" class="text-right col-1 col-form-label">Job ID</label>
                <div class="col-3">
                    <input type="text" class="form-control" id="invoice_job_id" name="invoice_job_id" value="<?php echo $r['job_id'] ?>" readonly/>
                </div>
            </div>

            <!-- Vehicle No -->
            <div class="form-group row">
                <label for="invoice_vehicle_no" class="text-right col-1 col-form-label">Vehicle No</label>
                <div class="col-3">
                    <input type="text" class="form-control" id="invoice_vehicle_no" name="invoice_vehicle_no" value="<?php echo $r['job_vehicle_id'] ?>" readonly/>
                </div>
            </div>

            <!-- Vehicle Make and Model -->
            <div class="form-group row">
                <label for="invoice_vehicle" class="text-right col-1 col-form-label">Vehicle</label>
                <div class="col-3">
                    <input type="text" class="form-control" id="invoice_vehicle" name="invoice_vehicle" value="<?php echo $r['vehicle_make_name']." ". $r['vehicle_model_name']; ?>" readonly/>
                </div>
            </div>

            <!-- Vehicle ODO -->
            <div class="form-group row">
                <label for="invoice_vehicle_odo" class="text-right col-1 col-form-label">ODO</label>
                <div class="col-3">
                    <input type="text" class="form-control" id="invoice_vehicle_odo" name="invoice_vehicle_odo" value="<?php echo $r['job_vehicle_odo'] ?>"" readonly/>
                </div>
            </div>

            <!-- Customer Name -->
            <div class="form-group row">
                <label for="invoice_cus_name" class="text-right col-1 col-form-label">Customer</label>
                <div class="col-3">
                    <input type="text" class="form-control" id="invoice_cus_name" name="invoice_cus_name" value="<?php echo $r['cus_name'] ?>"" readonly/>
                </div>
            </div>
        <?php } ?>
        <hr>
        <!-- Item Table -->
        <div class="table-responsive mx-3 my-3">
            <h1 class="h3">
                Item Replacements
                <button type="button" class="btn btn-outline-success btn-add-item">
                    <i class="fa fa-plus"></i>
                </button>
            </h1>
            <table class="table table-striped table-item">
                <thead>
                <tr>
                    <th scope="col">Item ID</th>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>&nbsp;</th>

                </tr>
                </thead>

                <tbody class="tbody-item">

                </tbody>
            </table>
        </div>

        <!-- Service Table  -->
        <div class="table-responsive mx-3 my-3">
            <h1 class="h3">
                Services
                <button type="button" class="btn btn-outline-success btn-add-service">
                    <i class="fa fa-plus"></i>
                </button>
            </h1>
            <table class="table table-striped table-services">
                <thead>
                <tr>
                    <th scope="col">Service ID</th>
                    <th>Service Name</th>
                    <th>Service Price</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>

                <tbody class="tbody-services">

                </tbody>
            </table>
        </div>
        <input type="submit" class="btn btn-primary invoice-data" name="submit" value="Submit"/>
    </form>
</div>
<?php include '../includes/footer.php'; ?>
<script src="../assets/js/job_invoice.js"></script>
