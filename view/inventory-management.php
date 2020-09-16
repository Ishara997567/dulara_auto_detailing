<?php include '../includes/header.php' ?>
<?php include '../model/inventory_model.php'; ?>
<?php $inventoryObj = new Inventory(); ?>
<title>Inventory Management</title>
</head>
<body>

<!-- Navigation Bar -->
<?php include '../includes/navbar.php'; ?>

<!-- Page Content   -->
<div class="container-fluid">

    <!-- Top Row    -->
    <div class="row padding welcome bg-light mb-3 py-2">
        <!-- Module Name    -->
        <div class="col-8">
            <div class="navbar-brand ml-5"><i class="fa fa-list"></i>&nbsp;Inventory Management</div>
        </div>

        <!-- New Item  -->
        <div class="col-4 d-flex justify-content-end">
            <button class="btn btn-outline-primary rounded-pill my-xl-1" data-toggle="modal" data-target="#modal_new_item"><i class="fa fa-plus"></i> New</button>
            <button type="button" class="btn btn-outline-primary rounded-pill my-xl-1 mx-2" data-toggle="modal" data-target="#modal_manage_categories"><i class="fa fa-file-text-o"></i> Manage Categories</button>
        </div>
    </div>





    <!-- Manage Categories Modal -->
    <div class="modal fade" role="dialog" tabindex="-1" id="modal_manage_categories" aria-labelledby="modal_manage_categories" aria-hidden="true">
        <div class="modal-xl modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Manage Categories</h5>
                    <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">
                                &times;
                            </span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row padding d-flex justify-content-center">
                        <div class="col-8 text-center" id="msg_item_size_update">

                        </div>
                    </div>

                    <div class="row padding d-flex justify-content-center">
                        <div class="col-8 text-center" id="msg_category_update">

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">

                                <li class="nav-item">
                                    <a href="#pane_manage_categories" class="active nav-link" data-toggle="tab">
                                        Manage Categories
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#pane_manage_item_size" class="nav-link" data-toggle="tab">
                                        Manage Item Size
                                    </a>
                                </li>

                            </ul>
                        </div>

                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane" id="pane_manage_item_size">



                                    <!-- Manage Item Size Table  -->
                                    <div class="table-responsive">
                                        <table class="table table-sm" id="table_item_size_manage">
                                            <thead>
                                            <tr class="d-flex">
                                                <th scope="col" class="col-2 text-center">Item Size ID</th>
                                                <th scope="col" class="col-8 text-center">Item Size Name</th>
                                                <th scope="col" class="col-1 text-center">&nbsp;</th>
                                                <th scope="col" class="col-1 text-center">&nbsp;</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php
                                            $item_size_result = $inventoryObj->getAllSizes();
                                            while($row_item_size = $item_size_result->fetch_assoc()){

                                                ?>

                                                <tr class="d-flex">
                                                    <th scope="row" class="col-2 text-center"><?php echo $row_item_size["item_size_id"]; ?></th>
                                                    <td id="td_item_size_name" class="col-8"><input type="text" id="txt_change_item_size_name<?php echo $row_item_size["item_size_id"]; ?>" class="form-control text-center" value="<?php echo $row_item_size["item_size_name"]; ?>" readonly/></td>
                                                    <td id="table_manage_size" class="col-1 text-center"><a href="#" data-id="<?php echo $row_item_size["item_size_id"]; ?>" class="btn btn-outline-primary mr-n5"><i class="fa fa-pencil"></i></a></td>
                                                    <td id="table_manage_size_del" class="col-1 text-center"><a href="#" data-id="<?php echo $row_item_size["item_size_id"]; ?>" class="btn btn-outline-danger"><i class="fa fa-times"></i></a></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>




                                    <!-- End of Manage Item Size Table  -->




                                </div>

                                <div class="active tab-pane" id="pane_manage_categories">



                                    <!-- Manage Category Table  -->


                                    <div class="table-responsive">
                                        <table class="table table-sm" id="table_cat_manage">
                                            <thead>
                                            <tr class="d-flex">
                                                <th scope="col" class="col-2 text-center">Category ID</th>
                                                <th scope="col" class="col-8 text-center">Category Name</th>
                                                <th scope="col" class="col-1 text-center">&nbsp;</th>
                                                <th scope="col" class="col-1 text-center">&nbsp;</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <?php
                                            $item_cat_result = $inventoryObj->getAllCategories();
                                            while($row_cat = $item_cat_result->fetch_assoc()){

                                                ?>

                                                <tr class="d-flex">
                                                    <th scope="row" class="col-2 text-center"><?php echo $row_cat["item_cat_id"]; ?></th>
                                                    <td id="td_category_name" class="col-8"><input type="text" id="txt_change_cat_name<?php echo $row_cat["item_cat_id"]; ?>" class="form-control text-center" value="<?php echo $row_cat["item_cat_name"]; ?>" readonly/></td>
                                                    <td id="table_manage_category" class="col-1 text-center"><a href="#" data-id="<?php echo $row_cat["item_cat_id"]; ?>" class="btn btn-outline-primary mr-n5"><i class="fa fa-pencil"></i></a></td>
                                                    <td id="table_manage_category_del" class="col-1 text-center"><a href="#" data-id="<?php echo $row_cat["item_cat_id"]; ?>" class="btn btn-outline-danger"><i class="fa fa-times"></i></a></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>









                                </div>
                            </div>
                        </div>

                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn_save">Save</button>
                </div>
            </div>
        </div>
    </div>







    <!-- End of Manage Categories Modal -->








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






    <!-- Cards row  -->
    <div class="row padding">
        <!-- Card to display today's newly bought items -->
        <div class="col-md-6">
            <div class="card text-white bg-primary mb-3 mt-3" style="max-width: 45rem;">
                <div class="card-header"><h4>Today</h4></div>
                <div class="card-body">
                    <ul class="card-text">
                        <li>Engine Oil</li>
                        <li>Seat Belt</li>
                        <li>Air Filters</li>
                        <li>Silencer</li>
                        <li>Silencer</li>
                        <li>Silencer</li>
                        <li>Silencer</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Card to display items to be ordered soon -->
        <div class="col-md-6">
            <div class="card text-white bg-dark mb-3 mt-3" style="max-width: 45rem;">
                <div class="card-header"><h4>Order Soon...</h4></div>
                <div class="card-body">
                    <ul class="card-text">
                        <li>
                            Engine Oil
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 10%" aria-valuenow="10%" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </li>
                        <li>
                            Seat Belt
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15%" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </li>
                        <li>
                            Air Filters
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20%" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </li>
                        <li>
                            Silencer
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 22%" aria-valuenow="22%" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- New and Search Item -->
    <div class="row">
        <!-- Modal new Item-->
        <div class="modal fade" id="modal_new_item" tabindex="-1" role="dialog" aria-labelledby="modal_new_item" aria-hidden="true">
            <div class="modal-xl modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">New</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs">

                                    <!-- New Item Link   -->
                                    <li class="nav-item">
                                        <a href="#pane_new_item_form" data-toggle="tab" class="nav-link active">New Item</a>
                                    </li>

                                    <!-- Add Stock Level Link   -->
                                    <li class="nav-item">
                                        <a href="#pane_stock_level_form" data-toggle="tab" class="nav-link">Add Stock Level</a>
                                    </li>


                                    <!-- New Category Link   -->
                                    <li class="nav-item">
                                        <a href="#pane_new_category_pane" data-toggle="tab" class="nav-link">New Category</a>
                                    </li>

                                    <!-- New Item Size Link   -->
                                    <li class="nav-item">
                                        <a href="#pane_new_item_size_form" data-toggle="tab" class="nav-link">New Item Size</a>
                                    </li>


                                </ul>

                            </div>

                            <div class="card-body">
                                <!-- Panes  -->
                                <div class="tab-content">

                                    <!-- New Item Pane   -->
                                    <div class="tab-pane active" id="pane_new_item_form">
                                        <div class="row padding d-flex justify-content-center">
                                            <div class="col-6 text-center" id="error_new_item">

                                            </div>
                                        </div>

                                        <!-- New Item Form  -->




                                        <form action="../controller/inventorycontroller.php?status=add_item" method="post">

                                            <!-- First Row  -->
                                            <div class="form-row">
                                                <!-- Item Code  -->
                                                <div class="form-group col-2">
                                                    <label for="item_code">Item Code</label>
                                                    <input type="text" class="form-control" id="item_code" placeholder="Item Code" value="IVI00001" readonly>
                                                </div>
                                                <!-- Item Name  -->
                                                <div class="form-group col-5">
                                                    <label for="item_name">Item Name</label>
                                                    <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Item Name">
                                                </div>
                                            </div>

                                            <!-- Second Row -->
                                            <div class="form-row">
                                                <!-- Manufacturer Code  -->
                                                <div class="form-group col-2">
                                                    <label for="mfd_code">Manufacturer Code</label>
                                                    <input type="text" class="form-control" id="mfd_code" name="mfd_code" placeholder="Manufacturer Code">
                                                </div>
                                                <!-- Manufacturer Name  -->
                                                <div class="form-group col-5">
                                                    <label for="mfd_name">Manufacturer Name</label>
                                                    <input type="text" class="form-control" id="mfd_name" name="mfd_name" placeholder="Manufacturer Name">
                                                </div>
                                                <!-- Supplier Dropdown  -->
                                                <div class="form-group col-5">
                                                    <label for="supplier">Supplier</label>
                                                    <select name="supplier" id="supplier" class="custom-select form-control">
                                                        <option selected value="choose">Choose...</option>
                                                        <?php
                                                        $supplier_result = $inventoryObj->getAllSuppliers();
                                                        while($sup_row = $supplier_result->fetch_assoc())
                                                        {
                                                        ?>
                                                        <option value="<?php echo $sup_row["sup_id"]; ?>"><?php echo $sup_row["sup_name"]; ?></option>

                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Third row  -->
                                            <div class="form-row">
                                                <!-- Item Category Dropdown -->
                                                <div class="form-group col-5">
                                                    <label for="item_category">Item Category</label>
                                                    <select name="item_category" id="item_category" class="custom-select form-control">
                                                        <option selected value="choose">Choose...</option>
                                                        <?php
                                                        $category_result = $inventoryObj->getAllCategories();
                                                        while($cat_row = $category_result->fetch_assoc())
                                                        {
                                                            ?>
                                                            <option value="<?php echo $cat_row["item_cat_id"] ?>"><?php echo $cat_row["item_cat_name"] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <!-- Item Size Dropdown -->
                                                <div class="form-group col-5">
                                                    <label for="item_size">Item Size</label>
                                                    <select name="item_size" id="item_size" class="custom-select form-control">
                                                        <option selected>Choose...</option>
                                                        <?php
                                                        $size_result = $inventoryObj->getAllSizes();
                                                        while($size_row = $size_result->fetch_assoc())
                                                        {
                                                            ?>
                                                            <option value="<?php echo $size_row["item_size_id"] ?>"><?php echo $size_row["item_size_name"] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>


                                            <!-- Sixth Row  -->
                                            <div class="form-row">
                                                <!-- Purchase Unit Price    -->
                                                <div class="form-group col-3">
                                                    <label for="p_unit_price">Purchase Unit Price Rs.</label>
                                                    <input type="number" min="0" step="0.01" class="form-control" id="p_unit_price" name="p_unit_price" placeholder="Purchase Unit Price">
                                                </div>

                                                <!-- Selling Unit Price    -->
                                                <div class="form-group col-3">
                                                    <label for="s_unit_price">Selling Unit Price Rs.</label>
                                                    <input type="number" min="0" step="0.01" class="form-control" id="s_unit_price" name="s_unit_price" placeholder="Selling Unit Price">
                                                </div>

                                                <!-- Discount -->
                                                <div class="form-group col-3">
                                                    <label for="discount">Discount</label>
                                                    <input type="number" min="0" step="0.01" class="form-control" id="discount" name="item_discount" placeholder="Discount">
                                                </div>

                                                <!-- Handling charges    -->
                                                <div class="form-group col-3">
                                                    <label for="handling_charges">Handling Charges Rs.</label>
                                                    <input type="number" min="0" step="0.01" class="form-control" id="handling_charges" name="handling_charges" placeholder="Handling Charges">
                                                </div>
                                            </div>

                                            <!-- Seventh Row  -->
                                            <div class="form-row">
                                                <!-- Vat Rate   -->
                                                <div class="form-group col-3">
                                                    <label for="vat_rte">Vat Rate</label>
                                                    <input type="text" class="form-control" id="vat_rate" name="vat_rate" placeholder="Vat Rate">
                                                </div>
                                            </div>

                                            <!-- Eight Row  -->
                                            <div class="form-row">
                                                <!-- Location   -->
                                                <div class="form-group col-3">
                                                    <label for="location">Location</label>
                                                    <input type="text" class="form-control" id="location" name="location" placeholder="Location">
                                                </div>
                                            </div>


                                            <div class="form-row">
                                                <!-- Description    -->
                                                <div class="form-group col-6">
                                                    <label for="item_description">Description</label>
                                                    <textarea class="form-control" id="item_description" name="item_description" rows="3"></textarea>
                                                </div>
                                            </div>

                                            <!-- New Item Save Button    -->
                                            <div class="form-row mt-3">
                                                <div class="form-group col-10">&nbsp;</div>
                                                <div class="form-group col-2 d-flex justify-content-center">
                                                    <input type="submit" class="rounded-pill btn btn-primary" name="submit" id="submit" value="Save"/>
                                                </div>
                                            </div>
                                        </form>

                                        <!-- End of New Item Form   -->





                                    </div>

                                    <!-- Add Stock Level Pane   -->
                                    <div class="tab-pane" id="pane_stock_level_form">
                                        <div class="row padding d-flex justify-content-center">
                                            <div class="col-6 text-center" id="error_stock_level" class="alert alert-success">
                                                <?php
                                                if(isset($_GET['error_stock']))
                                                {
                        $msg = $_GET['error_message'];
                        echo $msg;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <!-- Add Stock Form -->
                                        <form action="../controller/inventorycontroller.php?status=add_stock_level" method="post">
                                            <!-- Item Category -->
                                            <div class="form-group row">
                                                <label for="stock_lvl_item_category" class="col-2 col-form-label">Item Category</label>
                                                <div class="col-3">
                                                    <select name="stock_lvl_item_category" id="stock_lvl_item_category" class="custom-select">
                                                        <option value="choose" selected>Choose</option>
                                                        <?php
                                                        $cat_result = $inventoryObj->getAllCategories();
                                                        while($cat_row = $cat_result->fetch_assoc())
                                                        {
                                                        ?>

                                                            <option value="<?php echo $cat_row["item_cat_id"];?>"><?php echo $cat_row["item_cat_name"];?></option>

                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <!-- Stock Item ID  -->
                                                <label for="stock_level_item_id" class="col-form-label col-2">Item ID</label>
                                                <div class="col-3">
                                                    <input type="text" id="stock_level_item_id" name="stock_level_item_id" class="form-control" value="Relevant ID" readonly/>
                                                </div>

                                                <!-- Stock Item Name    -->
                                                <label for="stock_level_item_name" class="col-form-label col-2">Item Name</label>
                                                <div class="col-5" id="change_to_select">
                                                    <input type="text" id="stock_level_item_name" name="stock_level_item_name" class="ui-widget form-control"/>
                                                </div>
                                            </div>


                                            <hr>


                                            <div class="form-group row">
                                                <!-- ROL -->
                                                <label for="stock_level_rol" class="col-2 col-form-label">Item Re Order Level</label>
                                                <div class="col-4">
                                                    <input type="number" id="stock_level_rol" name="stock_level_rol" min="1" step="1" class="form-control"/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <!-- EOQ / Re Order Quantity -->
                                                <label for="stock_level_eoq" class="col-2 col-form-label">Re Order Quantity</label>
                                                <div class="col-4">
                                                    <input type="number" id="stock_level_eoq" name="stock_level_eoq" min="0" step="1" class="form-control"/>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <!-- Minimum Stock Level -->
                                                <label for="stock_level_min_lvl" class="col-2 col-form-label">Minimum Stock Level</label>
                                                <div class="col-4">
                                                    <input type="number" id="stock_level_min_lvl" name="stock_level_min_lvl" min="0" step="1" class="form-control"/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <!-- Maximum Stock Level -->
                                                <label for="stock_level_max_lvl" class="col-2 col-form-label">Max Stock Level</label>
                                                <div class="col-4">
                                                    <input type="number" id="stock_level_max_lvl" name="stock_level_max_lvl" min="0" step="1" class="form-control"/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <!-- Lead Time -->
                                                <label for="stock_level_lead_time" class="col-2 col-form-label">Lead Time</label>
                                                <div class="col-4">
                                                    <input type="number" id="stock_level_lead_time" name="stock_level_lead_time" min="0" step="1" class="form-control"/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <!-- Danger Stock Level -->
                                                <label for="stock_level_dng_lvl" class="col-2 col-form-label">Danger Stock Level</label>
                                                <div class="col-4">
                                                    <input type="number" id="stock_level_dng_lvl" name="stock_level_dng_lvl" min="0" step="1" class="form-control"/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <!-- Buffer Stock -->
                                                <label for="stock_level_buffer" class="col-2 col-form-label">Buffer Stock</label>
                                                <div class="col-4">
                                                    <input type="number" id="stock_level_buffer" name="stock_level_buffer" min="0" step="1" class="form-control"/>
                                                </div>
                                            </div>

                                            <!-- Add Stock Save Button    -->

                                            <div class="form-row mt-3">
                                                <div class="form-group col-8">&nbsp;</div>
                                                <div class="form-group col-4 d-flex justify-content-center">
                                                    <input type="submit" class="rounded-pill btn btn-primary" name="submit" id="add_stock_submit"
                                                           value="Save"/>
                                                </div>
                                            </div>

                                        </form>

                                        <!--End of Add Stock Form -->
                                    </div>

                                    <!-- New Item Size Pane   -->

                                    <div class="tab-pane" id="pane_new_item_size_form">
                                        <div class="row padding d-flex justify-content-center">
                                            <div class="col-6 text-center" id="error_new_item_size">

                                            </div>
                                        </div>

                                        <!-- New Item Size Form  -->
                                        <form action="../controller/inventorycontroller.php?status=create_item_size" method="post" id="frm_new_item_size">
                                            <!-- Item Size ID    -->



                                            <div class="form-row">
                                                <label for="item_size_id" class="col-form-label col-2">Item Size ID</label>
                                                <div class="form-group col-4">
                                                    <input type="text" id="item_size_id" name="item_size_id" class="form-control" placeholder="IS00001" readonly/>
                                                </div>
                                            </div>

                                            <!-- Item Size Name  -->

                                            <div class="form-row">
                                                <label for="item_size_name" class="col-form-label col-2">Item Size Name</label>
                                                <div class="form-group col-8">
                                                    <input type="text" id="item_size_name" name="item_size_name" class="form-control" placeholder="Item Size Name"/>
                                                </div>
                                            </div>



                                            <!-- Item Size Description   -->
                                            <div class="form-row">
                                                <label for="item_size_description" class="col-form-label col-2">Description</label>
                                                <div class="form-group col-8">
                                                    <textarea name="item_size_description" id="item_size_description" class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>

                                            <!-- Item Size Save Button    -->

                                            <div class="form-row mt-3">
                                                <div class="form-group col-8">&nbsp;</div>
                                                <div class="form-group col-4 d-flex justify-content-center">
                                                    <input type="submit" class="rounded-pill btn btn-primary" name="submit" id="item_size_submit"
                                                           value="Save"/>
                                                </div>
                                            </div>


                                        </form>

                                        <!-- End of New Item Size Form  -->
                                    </div>


                                    <!-- New Category Pane   -->
                                    <div class="tab-pane" id="pane_new_category_pane">
                                        <!-- New Category Form  -->
                                        <div class="row padding d-flex justify-content-center">
                                            <div class="col-6 text-center" id="error_new_category">

                                            </div>
                                        </div>
                                        <form action="../controller/inventorycontroller.php?status=create_category" method="post" id="frm_new_category">
                                            <!-- Category ID    -->



                                            <div class="form-row">
                                                <label for="item_cat_id" class="col-form-label col-2">Category ID</label>
                                                <div class="form-group col-4">
                                                    <input type="text" id="item_cat_id" name="item_cat_id" class="form-control" placeholder="SC00001" readonly/>
                                                </div>
                                            </div>

                                            <!-- Category Name  -->

                                            <div class="form-row">
                                                <label for="item_cat_name" class="col-form-label col-2">Category Name</label>
                                                <div class="form-group col-8">
                                                    <input type="text" id="item_cat_name" name="item_cat_name" class="form-control" placeholder="Category Name"/>
                                                </div>
                                            </div>

                                            <!-- Category Description   -->
                                            <div class="form-row">
                                                <label for="item_cat_description" class="col-form-label col-2">Description</label>
                                                <div class="form-group col-8">
                                                    <textarea name="item_cat_description" id="item_cat_description" class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>


                                            <!-- Category Save Button    -->
                                            <div class="form-row mt-3">
                                                <div class="form-group col-8">&nbsp;</div>
                                                <div class="form-group col-4 d-flex justify-content-center">
                                                    <input type="submit" class="rounded-pill btn btn-primary" name="submit" id="category_submit"
                                                           value="Save"/>
                                                </div>
                                            </div>
                                        </form>

                                        <!-- End of New Category Form  -->

                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- End of New Item, Add Stock Level, New Category, New Item Size Modal -->


    </div>

    <!-- Item Table -->
    <div class="table-responsive">
        <table class="table table-hover table-sm mydatatable mx-4">
            <thead>
            <tr>
                <th scope="col">Item ID</th>
                <th scope="col">Item Name</th>
                <th scope="col">Category</th>
                <th scope="col">Supplier</th>
                <th scope="col" class="text-center">Sale Unit Price(Rs.)</th>
                <th scope="col" class="text-center">Purchase Unit Price(Rs.)</th>
                <th scope="col" class="text-center">Stock</th>
                <th scope="col"></th>
                <!--                <th scope="col">Manage</th>-->
            </tr>
            </thead>
            <tbody>

            <?php
            $item_results = $inventoryObj->getAllItems();

            while($row_item = $item_results->fetch_assoc()){

                $supplier_result = $inventoryObj->getSupplierById($row_item["item_supplier_id"]);
                $row_supplier = $supplier_result->fetch_assoc();

                $category_result = $inventoryObj->getCategoryById($row_item["item_category_id"]);
                $row_category = $category_result->fetch_assoc();
            ?>
            <tr>
                <th scope="row"><?php echo $row_item["item_id"]; ?></th>
                <td><?php echo $row_item["item_name"]; ?></td>
                <td><?php echo $row_category["item_cat_name"];?></td>
                <td><?php echo $row_supplier["sup_name"]; ?></td>
                <td class="text-center"><?php echo $row_item["item_sale_uprice"]; ?></td>
                <td class="text-center"><?php echo $row_item["item_purchase_uprice"]; ?></td>
                <td class="text-center"><?php echo $inventoryObj->getStockQty($row_item["item_id"]); ?></td>
                <td><a href="#modal_add_stock" data-toggle="modal" class="btn btn-sm btn-outline-primary add-stock" data-id="<?php echo $row_item["item_id"]; ?>"><i class="fa fa-exchange"></i></a>
                    <a href="#modal_manage_item" data-toggle="modal" class="btn btn-sm btn-outline-primary manage-item" data-id="<?php echo $row_item["item_id"]; ?>"><i class="fa fa-file-text-o fa-lg"></i></a></td>
            </tr>

<?php } ?>
            </tbody>
        </table>
    </div>







    <!-- Modal for Manage Items -->
    <div class="modal fade" id="modal_manage_item" tabindex="-1" role="dialog" aria-labelledby="modal_manage_item" aria-hidden="true">
        <div class="modal-xl modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Manage Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="post">
                    <div class="modal-body" id="manage_modal_body">

                        <!-- Modal From the Controller with Relevant Item Id    -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!-- Add Stock Modal    -->

    <div class="modal fade" role="dialog" id="modal_add_stock" tabindex="-1" aria-hidden="true" aria-labelledby="modal_add_stock">
        <div class="modal-xl modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Add Stock</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Add Stock Modal Form   -->
                <form action="../controller/inventorycontroller.php?status=add_stock" method="post">
                    <div class="modal-body add-stock-form">

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btn_save_stock">Save</button>

                    </div>
                </form>
            </div>

            <!--End of Add Stock Modal Form   -->
        </div>
    </div>



    <!-- End of Add Stock Modal -->





</div>

<?php include '../includes/footer.php' ?>
<script src="../assets/js/inventory.js"></script>
<script src="../assets/js/inventory_validation.js"></script>
<script>
    $(".mydatatable").DataTable();
</script>


