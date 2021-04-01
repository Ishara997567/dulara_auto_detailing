<?php include '../includes/header.php';
include '../model/report_model.php';
$reportObj = new Report();
?>
<title>Report Management</title>
<link rel="stylesheet" href="../assets/css/style-report.css">
</head>
<body>
<?php include '../includes/navbar.php'; ?>
<!--    Page Content    -->
<div class="container-fluid">
    <div class="row padding welcome bg-light mb-3 py-2">
        <!-- Module Name    -->
        <div class="col-8">
            <div class="navbar-brand ml-5"><i class="fa fa-bar-chart"></i>&nbsp;Report Management</div>
        </div>
        <div class="col-4 d-flex justify-content-end">
            &nbsp;
        </div>
    </div>

    <div class="container">

        <div class="row">
            <div class="col-md-6 mt-5">
                <?php
                $result = $reportObj->getOddReportModules();
                while($r = $result->fetch_assoc())
                {
                    ?>
                    <a href="report-<?php echo $r['rm_url']; ?>" class="custom-card">
                        <div class="card w-100 mt-3 btn-outline-<?php echo $r["rm_color"]; ?> border-<?php echo $r["rm_color"]; ?>">
                            <div class="card-body">
                                <h1 class="card-text text-center"><i class="fa fa-<?php echo $r["rm_icon"]; ?>"></i> <?php echo $r["rm_name"]; ?></h1>
                            </div>
                        </div>
                    </a>
                <?php  } ?>
            </div>
            <div class="col-md-6 mt-5">
                <?php
                $result = $reportObj->getEvenReportModules();
                while($r = $result->fetch_assoc())
                {
                    ?>
                    <a href="report-<?php echo $r['rm_url']; ?>" class="custom-card">
                        <div class="card w-100 mt-3 btn-outline-<?php echo $r["rm_color"]; ?> border-<?php echo $r["rm_color"]; ?>">
                            <div class="card-body">
                                <h1 class="card-text text-center"><i class="fa fa-<?php echo $r["rm_icon"]; ?>"></i> <?php echo $r["rm_name"]; ?></h1>
                            </div>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>



</div>
<?php include '../includes/footer.php'; ?>
