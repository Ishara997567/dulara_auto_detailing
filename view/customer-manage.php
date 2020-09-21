<?php include '../includes/header.php';
include '../model/customer_model.php';

$cusObj = new Customer();
?>
<title>Manage Customer Details</title>
</head>
<body>
<?php include '../includes/navbar.php'; ?>
<div class="container-fluid">
    <!-- Heading    -->
    <div class="row padding">
        <div class="col-12 display-4 jumbotron welcome">
            <i class="fa fa-file-text-o"></i>
            Manage Customer Details
        </div>
    </div>


    <!-- Info Table -->
    <div class="row padding">
        <div class="table-responsive mt-3 table-sm">

            <table class="table table-sm table-dark table-hover customer-manage-table">
                <thead>
                <tr>
                    <th scope="col" width="10%" class="text-center">Customer ID</th>
                    <th scope="col" width="30%">Customer Name</th>
                    <th scope="col">City</th>
                    <th scope="col">Service</th>
                    <th scope="col">&nbsp;</th>
                    <!--                <th scope="col">Manage</th>-->
                </tr>
                </thead>
                <tbody>
                <?php
                $cus_result = $cusObj->getAllCustomerInfo();
                while($cus_row = $cus_result->fetch_assoc())
                {


                    ?>
                    <tr>
                        <th scope="row"><?php echo $cus_row["cus_id"]; ?></th>
                        <td><?php echo $cus_row["cus_name"]; ?></td>
                        <td><?php echo $cus_row["cus_add_l3"]; ?></td>
                        <td>Full Service</td>
                        <td id="modal_link"><a href="#cus_info_modal" data-target="#cus_info_modal" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-id="<?php echo $cus_row["cus_id"]; ?>"><i class="fa fa-file-text-o fa-lg"></i></a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>



    <!-- Modal for More Info    -->
    <div class="modal fade" id="cus_info_modal" tabindex="-1" role="dialog" aria-labelledby="cus_info_modal" aria-hidden="true">
        <div class="modal-xl modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Customer Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Read Only Form -->
                <form action="#" method="post">
                    <div class="row padding d-flex justify-content-center">
                        <div class="col-8 text-center update-message mt-2"></div>
                    </div>

                        <div class="modal-body customer-manage-modal"></div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-outline-success">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




</div>
<?php include '../includes/footer.php'; ?>
<script src="../assets/js/manage_customer.js"></script>
<script>
    $(".customer-manage-table").DataTable();
</script>
