<?php include '../includes/header.php';
include "../model/sale_model.php";

$saleObj = new Sale();

?>
<title>GRN History</title>
</head>
<body>
<?php include '../includes/navbar.php'; ?>
<div class="container-fluid">
    <div class="row padding">
        <div class="col-12 display-1 jumbotron welcome">
            GRN History
        </div>
    </div>

    <!-- Form   -->
    <form action="#" method="post">
        <label for="">Date Range</label>
        <div class="form-row">
            <label for="from_date" class="col-form-label">From</label>
            <div class="col">
                <input type="date" id="from_date" class="form-control"/>
            </div>
            <label for="to_date" class="col-form-label">To</label>
            <div class="col">
                <input type="date" id="to_date" class="form-control"/>
            </div>
            <div class="col-1">
                <button type="button" class="btn btn-lg mt-n2 btn-outline-primary rounded-pill" id="btn_dr_view">View</button>
            </div>
        </div>
    </form>

    <div class="row mt-2">&nbsp;</div>

    <div class="table-responsive">
        <table class="table table-hover table-sm grn-history">
            <thead>
            <tr>
                <th scope="col">GRN ID</th>
                <th scope="col">PO ID</th>
                <th scope="col">Total GRN Amount</th>
                <th scope="col">Total PO Amount</th>
                <th scope="col">Supplier</th>
                <th scope="col">Date</th>
                <th scope="col">&nbsp;</th>
            </tr>
            </thead>
            <tbody id="grn_history_ranged">
            <?php
            $gresult = $saleObj->getGRN();
            while($r=$gresult->fetch_assoc())
            {
            ?>
            <tr>
                <th scope="row"><?php echo $r["sgrn_id"]; ?></th>
                <td><?php echo $r["po_id"]; ?></td>
                <td><?php echo $r["sgrn_total_amount"]; ?></td>
                <td><?php echo $r["po_amount"]; ?></td>
                <td><?php echo $r["sup_name"]; ?></td>
                <td><?php echo $r["sgrn_created_at"]; ?></td>
                <td><a href="#modal_manage_grn" data-toggle="modal" data-id="<?php echo $r["sgrn_id"]; ?>"><i class="fa fa-lg fa-file-text-o"></i></a></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>








    <!-- Modal for Managing GRN History    -->




    <div class="modal fade" tabindex="-1" role="dialog" id="modal_manage_grn" aria-labelledby="modal_manage_grn" aria-hidden="true">

        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Manage GRN History</h3>
                    <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">
                        &times;
                    </span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="#" id="grn_content">

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>

    </div>








    <!-- End of Modal for Managing GRN History    -->














</div>
<?php include '../includes/footer.php'; ?>
<script src="../assets/js/sale-grn-history.js"></script>
<script>
    $(".grn-history").DataTable();
</script>
