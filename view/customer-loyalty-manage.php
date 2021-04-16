<?php include '../includes/header.php';
include '../model/customer_model.php';
$cusObj = new Customer();
?>
<title>Customer Loyalty Management</title>
</head>
<body>
<?php include '../includes/navbar.php'; ?>
<div class="container-fluid padding">
    <div class="row padding jumbotron welcome display-4">
        <p>
            <i class="fa fa-trophy"></i>
            Customer Loyalty Management
        </p>
    </div>


    <!-- Success Message From the Controller    -->
    <?php
    if(isset($_GET['success_message']))
    {
        ?>

        <div class="row padding d-flex justify-content-center">
            <div class="col-11 display-4 text-center alert alert-success">
                <?php
                echo base64_decode($_GET['success_message']);

                ?>
            </div>
        </div>

    <?php  } ?>
    <!-- End of Success Message From the Controller    -->


    <!-- Error Message From the Controller  -->
    <?php
    if(isset($_GET["error_message"]))
    {
        ?>
        <div class="row padding d-flex justify-content-center">
            <div class="col-11 display-4 text-center alert alert-danger">

                <?php
                echo base64_decode($_GET['error_message']);
                ?>
            </div>
        </div>

    <?php  } ?>

    <!-- End of Error Message From the Controller  -->


    <div class="modal fade" id="modal_new_loyalty" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Loyalty Program</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="../controller/customercontroller.php?status=create_loyalty" method="post">
                    <div class="modal-body">
                        <div class="form-row">
                            <!-- Loyalty Program ID  -->
                            <?php
                            $result = $cusObj->getNextLoyaltyID();
                            $r = $result->fetch_assoc();
                            ?>
                            <div class="form-group col-3">
                                <label for="loyalty_code">Loyalty Program ID</label>
                                <input type="text" class="form-control" readonly="readonly" id="loyalty_code" value="<?php echo $r['NewLoyaltyID']; ?>">
                            </div>

                            <!-- Loyalty Program Name  -->
                            <div class="form-group col-9">
                                <label for="loyalty_name">Loyalty Program Name</label>
                                <input type="text" class="form-control" name="loyalty_name" id="loyalty_name" placeholder="Loyalty Program Name">
                            </div>
                        </div>

                        <!--    Loyalty Points and Loyalty Reward   -->
                        <div class="form-row">

                            <div class="form-group col-3">
                                <label for="loyalty_points">Loyalty Points</label>
                                <input type="number" class="form-control" name="loyalty_points" id="loyalty_points" placeholder="Loyalty Points">
                            </div>

                            <div class="form-group col-9">
                                <label for="loyalty_reward">Loyalty Reward</label>
                                <input type="text" class="form-control" name="loyalty_reward" id="loyalty_reward" placeholder="Loyalty Rewards">
                            </div>

                        </div>
                        <!-- Description    -->
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="loyalty_description">Description</label>
                                <textarea name="loyalty_description" id="loyalty_description" class="form-control"></textarea>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>






    <!-- Delete Modal   -->
    <div class="modal fade alert" id="modal_delete_loyalty" tabindex="-1" role="dialog" aria-labelledby="modal_delete_service" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Delete Loyalty Program</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Do you want to delete the loyalty program?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" id="btn_modal_delete_loyalty_confirm">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Delete Modal   -->


    <!-- New Point Modal    -->
    <div class="modal fade" id="modal_new_point" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Loyalty Point Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="../controller/customercontroller.php?status=create_loyalty_point_category" method="post">
                    <div class="modal-body">
                        <div class="form-row">
                            <?php
                            $result = $cusObj->getNextPointID();
                            $r = $result->fetch_assoc();
                            ?>
                            <div class="form-group col-3">
                                <label for="loyalty_point_id">Loyalty Point ID</label>
                                <input type="text" class="form-control" readonly="readonly" id="loyalty_point_id" name="loyalty_point_id" value="<?php echo $r['NewPointID']; ?>">
                            </div>

                            <div class="form-group col-9">
                                <label for="loyalty_point_cat_name">Point Category Name</label>
                                <input type="text" class="form-control" id="loyalty_point_cat_name" name="loyalty_point_cat_name" placeholder="Point Category Name">
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-3">
                                <label for="loyalty_points">Points Assigned</label>
                                <input type="number" class="form-control" name="loyalty_points" id="loyalty_points" placeholder="Points to Assign">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="loyalty_point_description">Description</label>
                                <textarea name="loyalty_point_description" id="loyalty_point_description" class="form-control"></textarea>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- End of New Point Modal    -->






    <!-- Customer Info Manage  -->

    <div class="row padding">
        <div class="col-md-12 d-flex justify-content-start">
            <button class="rounded-pill btn btn-outline-primary" data-toggle="modal" data-target="#modal_new_loyalty" type="button"><i class="fa fa-plus"></i> New Loyalty Program</button>
        </div>
    </div>

    <?php
    $result = $cusObj->getAllLoyaltyPrograms();
    ?>

    <!-- Delete Message -->
    <div class="row padding d-flex justify-content-center p-2">
        <div class="col-11 display-4 text-center div-delete-message">

        </div>
    </div>
    <!-- End of Delete Message -->

    <div class="card">
        <div class="card-header">
            <div class="h3">Loyalty Programs</div>
        </div>
        <div class="card-body d-flex justify-content-center">
            <!-- Loyalty Program Table -->
            <div class="table-responsive p-3">
                <table class="table table-sm tbl-loyalty-manage">
                    <thead>
                    <tr>
                        <th scope="col">Loyalty Program ID</th>
                        <th scope="col">Loyalty Program Name</th>
                        <th scope="col">Loyalty Points</th>
                        <th scope="col">Loyalty Reward</th>
                        <th scope="col">&nbsp;</th>
                        <th scope="col">&nbsp;</th>
                        <!--                <th scope="col">Manage</th>-->
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($r = $result->fetch_assoc())
                    {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $r['loyalty_id']; ?></th>
                            <td><?php echo $r['loyalty_name']; ?></td>
                            <td><?php echo $r['loyalty_points']; ?></td>
                            <td><?php echo $r['loyalty_reward']; ?></td>
                            <td class="text-right" id="modal_link"><a href="#manage_loy_info_modal" class="btn btn-outline-primary btn-sm" data-target="#manage_loy_info_modal" data-toggle="modal" data-id="<?php echo $r["loyalty_id"]; ?>"><i class="fa fa-file-text-o fa-lg"></i></a></td>
                            <td id="modal_delete_link"><a href="#modal_delete_loyalty" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-id="<?php echo $r["loyalty_id"]; ?>"><i class="fa fa-trash-o fa-lg"></i></a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <div class="row padding mt-5 mb-2">
        <div class="col-md-12 d-flex justify-content-start">
            <button class="rounded-pill btn btn-outline-primary" data-toggle="modal" data-target="#modal_new_point" type="button"><i class="fa fa-plus"></i> New Point Category</button>
        </div>
    </div>


    <!-- Delete Point Message -->
    <div class="row padding d-flex justify-content-center p-2">
        <div class="col-11 display-4 text-center div-delete-point-message">

        </div>
    </div>
    <!-- End of Delete Point Message -->


    <!-- Loyalty Point Table    -->
    <div class="card">
        <div class="card-header">
            <div class="h3">Customer Loyalty Points</div>
        </div>
        <div class="card-body d-flex justify-content-center">
            <div class="table-responsive p-3">
                <table class="table table-sm tbl-loyalty-point">
                    <thead>
                    <tr>
                        <th scope="col">Loyalty Point ID</th>
                        <th scope="col">Loyalty Point Category Name</th>
                        <th scope="col">Loyalty Points to Assign</th>
                        <th scope="col">Description</th>
                        <th scope="col">&nbsp;</th>
                        <!--                <th scope="col">Manage</th>-->
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $result = $cusObj->getLoyaltyPoint();
                    while($r = $result->fetch_assoc())
                    {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $r['cp_id']; ?></th>
                            <td><?php echo $r['cp_category_name']; ?></td>
                            <td><?php echo $r['cp_points']; ?></td>
                            <td><?php echo $r['cp_description']; ?></td>
                            <td id="modal_point_delete_link"><a href="#modal_delete_loyalty_points" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-id="<?php echo $r["cp_id"]; ?>"><i class="fa fa-trash-o fa-lg"></i></a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Delete Point Modal   -->
    <div class="modal fade alert" id="modal_delete_loyalty_points" tabindex="-1" role="dialog" aria-labelledby="modal_delete_service" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Delete Loyalty Point Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Do you want to delete the loyalty point category?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" id="btn_modal_delete_loyalty_point_confirm">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Delete Point Modal   -->


    <!-- Each Loyalty Program Info Modal    -->

    <div class="modal fade" id="manage_loy_info_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Manage Loyalty Programs</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="post">
                    <div class="row padding d-flex justify-content-center">
                        <div class="col-8 text-center update-message mt-2"></div>
                    </div>
                    <div class="modal-body customer-loyalty-modal">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</div>
</div>





</body>

<?php include '../includes/footer.php'; ?>
<script src="../assets/js/customer_loyalty.js"></script>
<script>
    $(".tbl-loyalty-manage").DataTable();
    $(".tbl-loyalty-point").DataTable();
</script>