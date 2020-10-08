<?php include '../includes/header.php';
include '../model/sale_model.php';

$saleObj = new Sale();

?>
<title>Manage Suppliers</title>
</head>
<body>
<?php include '../includes/navbar.php'; ?>
<div class="container-fluid">
    <div class="row padding">
        <div class="col-12 display-1 jumbotron welcome">
            Manage Suppliers
        </div>
    </div>


    <div class="row mt-2">&nbsp;</div>

    <div class="table-responsive">
        <table class="table table-hover table-sm tbl-supplier">
            <thead>
            <tr>
                <th scope="col">Supplier ID</th>
                <th>Supplier Name</th>
                <th>Contact No 1</th>
                <th>Contact No 2</th>
                <th>Supplier Email</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sup_result = $saleObj->getAllSuppliers();
            while($r=$sup_result->fetch_assoc())
            {
                ?>
                <tr>
                    <th scope="row"><?php echo $r["sup_id"]; ?></th>
                    <td><?php echo $r["sup_name"]; ?></td>
                    <td><?php echo $r["sup_cn1"]; ?></td>
                    <td><?php echo $r["sup_cn2"]; ?></td>
                    <td><?php echo $r["sup_email"];; ?></td>
                    <td><a href="#modal_manage_supplier" data-toggle="modal" data-id="<?php echo $r["sup_id"] ?>"><i class="fa fa-lg fa-file-text-o"></i></a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>



    <!-- Modal for Managing Supplier    -->




    <div class="modal fade" tabindex="-1" role="dialog" id="modal_manage_supplier" aria-labelledby="modal_manage_supplier" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Manage Suppliers</h3>
                    <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">
                        &times;
                    </span>
                    </button>
                </div>

                <form action="sale-manage-supplier.php" method="post" class="form-supplier">
                    <div class="row padding d-flex justify-content-center mt-2">
                        <div class="col-6 text-center alert supplier-manage-box">

                        </div>
                    </div>
                    <div class="modal-body supplier-content">


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary form-supplier-submit">Save changes</button>
                    </div>
                </form>
            </div>
        </div>

    </div>








    <!-- End of Modal for Managing Supplier    -->


</div>
<?php include '../includes/footer.php'; ?>
<script src="../assets/js/sale-po-history.js"></script>
<script src="../assets/js/sale_manage_supplier.js"></script>
<script>
    $(".tbl-supplier").DataTable();
</script>
