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
        <li class="breadcrumb-item active" aria-current="page">Inventory Reports</li>
    </ol>
</nav>

<!--    Page Content    -->
<div class="container-fluid m-3">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4 text-center">Inventory Reports</h1>
        </div>
    </div>
    <form class="form">
        <div class="row form-group mt-4">
            <label for="inventory_report_type" class="mt-1">Report Type : </label>

            <div class="input-group col-md-3">
                <select name="inventory_report_type" id="inventory_report_type" class="form-control custom-select">
                    <option value="choose" selected>Select A Report Type</option>
                    <option value="item_list">Item Detail Report</option>
                    <option value="item_category_list">Category Wise Item Detail Report</option>
                    <option value="stock_level_list">Stock Level Report</option>
                    <option value="item_qty_list">Item Quantity Report</option>
                    <option value="supplier_item_list">Supplier Wise Item Report</option>
                </select>
            </div>

            <div class="input-group col-md-8">
                <div id="item_category_select" class="mr-4">
                    <select name="inventory_item_category" id="inventory_item_category" class="form-control custom-select">
                        <option value="choose" selected>Select Item Category</option>
                        <?php
                        $result = $reportObj->getAllItemCategories();
                        while($r = $result->fetch_assoc())
                        {
                            ?>
                            <option value="<?php echo $r['item_cat_id']; ?>"><?php echo $r['item_cat_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>


                <div class="input-group col-md-8">
                    <div id="supplier_select" class="mr-4">
                        <select name="inventory_supplier" id="inventory_supplier" class="form-control custom-select">
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


                <div id="item_select" class="mr-4">


                </div>

                <button type="button" class="btn btn-success mr-5" id="btn-generate-inventory-report"><i class="fa fa-file-text-o"></i> Generate</button>
                <button type="button" class="btn btn-primary mr-2 justify-content-end"><i class="fa fa-download"></i> Download</button>
                <button type="button" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
            </div>
        </div>
    </form>
    <div class="split-inventory-data mt-3 table-responsive">

    </div>
</div>
</body>
<?php include '../includes/footer.php'; ?>
<script src="../assets/js/report_inventory.js"></script>