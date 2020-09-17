<?php include '../model/inventory_model.php';

$inventoryObj = new Inventory();

if($_REQUEST["status"])
{
    $status = $_REQUEST["status"];

    switch($status)
    {
        case "add_item":

            $item_name = $_POST["item_name"];
            $mfd_code = $_POST["mfd_code"];
            $mfd_name = $_POST["mfd_name"];
            $supplier = $_POST["supplier"];
            $item_category = $_POST["item_category"];
            $item_size = $_POST["item_size"];
            $item_description = $_POST["item_description"];
            $p_unit_price = $_POST["p_unit_price"];
            $s_unit_price = $_POST["s_unit_price"];
            $item_discount = $_POST["item_discount"];
            $handling_charges = $_POST["handling_charges"];
            $vat_rate = $_POST["vat_rate"];
            $location = $_POST["location"];

            $rows_affected = $inventoryObj->addItem($item_name, $mfd_code, $mfd_name, $supplier, $item_category, $item_size,$item_description, $p_unit_price, $s_unit_price, $item_discount, $handling_charges, $vat_rate, $location);


            if($rows_affected > 0)
            {
                $msg = base64_encode("New Item Created Successfully!");
                ?>
                <script>window.location = "../view/inventory-management.php?success_message=<?php echo $msg; ?>";</script>

                <?php

            }
            else
            {
                $msg = base64_encode("New Item Failed to Create!");
                ?>
                <script>window.location = "../view/inventory-management.php?error_message=<?php echo $msg; ?>";</script>

                <?php
            }

            break;

        case "create_item_size":

            $item_size_name = $_POST["item_size_name"];
            $item_size_description = $_POST["item_size_description"];

            $rows_affected = $inventoryObj->createItemSize($item_size_name, $item_size_description);

            if($rows_affected > 0)
            {
                $msg = base64_encode("New Item Size Created Successfully!");
                ?>
                <script>window.location = "../view/inventory-management.php?success_message=<?php echo $msg; ?>";</script>

                <?php

            }
            else
            {
                $msg = base64_encode("New Item Size Failed to Create!");
                ?>
                <script>window.location = "../view/inventory-management.php?error_message=<?php echo $msg; ?>";</script>

                <?php
            }

            break;

        case "create_category":
            $item_cat_name = $_POST["item_cat_name"];
            $item_cat_description = $_POST["item_cat_description"];

            $rows_affected = $inventoryObj->createCategory($item_cat_name, $item_cat_description);

            if($rows_affected > 0)
            {
                $msg = base64_encode("New Item Category Created Successfully!");
                ?>
                <script>window.location = "../view/inventory-management.php?success_message=<?php echo $msg; ?>";</script>

                <?php

            }
            else
            {
                $msg = base64_encode("New Item Category Failed to Create!");
                ?>
                <script>window.location = "../view/inventory-management.php?error_stock=<?php echo $msg; ?>";</script>

                <?php
            }

            break;

        case "manage_category":
            $changed_cat_id = $_POST["changed_cat_id"];
            $changed_cat_name = $_POST["changed_cat_name"];


            $r = $inventoryObj->changeCategory($changed_cat_id, $changed_cat_name);

            if($r > 0)
            {
                echo 1;
            }
            else
            {
                echo 0;
            }


            break;

        case "manage_item_size":
            $changed_item_size_id = $_POST["changed_item_size_id"];
            $changed_item_size_name = $_POST["changed_item_size_name"];


            $r = $inventoryObj->changeItemSize($changed_item_size_id, $changed_item_size_name);

            if($r > 0)
            {
                echo 1;
            }
            else
            {
                echo 0;
            }


            break;

        case "manage_item":
            $manage_item_id = $_POST["manageItemId"];

            $item_result = $inventoryObj->getItemById($manage_item_id);
            $item_row = $item_result->fetch_assoc();

            $supplier_result = $inventoryObj->getSupplierById($item_row["item_supplier_id"]);
            $row_supplier = $supplier_result->fetch_assoc();

            $category_result = $inventoryObj->getCategoryById($item_row["item_category_id"]);
            $row_category = $category_result->fetch_assoc();

            $size_result = $inventoryObj->getItemSizeById($item_row["item_size_id"]);
            $row_size = $size_result->fetch_assoc();
            ?>
            <!--            Manage Item Modal Body-->

            <!-- First Row  -->
            <div class="form-group row">
                <!-- Item code  -->
                <label for="item_code" class="col-2 col-form-label">Item Code</label>
                <div class="col-2">
                    <input type="text" readonly class="form-control" name="manage_item_code" id="manage_item_code" value="<?php echo $item_row["item_id"]; ?>">
                </div>
            </div>

            <!-- Second Row  -->
            <div class="form-group row">
                <!-- Item name  -->
                <label for="item_name" class="col-2 col-form-label">Item Name</label>
                <div class="input-group col-5">
                    <input type="text" readonly class="form-control mr-2" id="manage_item_name" name="manage_item_name" value="<?php echo $item_row["item_name"]; ?>">
                    <button type="button" class="btn btn-outline-primary" id="btn_item_name_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-success" id="btn_item_name_check"><i class="fa fa-check"></i></button>
                </div>
            </div>

            <!-- Third Row  -->
            <div class="form-group row">
                <!-- Manufacturer code  -->
                <label for="manufacturer_code" class="col-2 col-form-label">Manufacturer Code</label>
                <div class="input-group col-5">
                    <input type="text"  readonly class="form-control mr-2" name="manage_manufacturer_code" id="manage_manufacturer_code" value="<?php echo $item_row["item_manu_code"]; ?>">
                    <button type="button" class="btn btn-outline-primary" id="btn_manufacturer_code_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-success" id="btn_manufacturer_code_check"><i class="fa fa-check"></i></button>
                </div>
            </div>

            <!-- Forth Row  -->
            <div class="form-group row">
                <!-- Manufacturer name  -->
                <label for="manufacturer_name" class="col-2 col-form-label">Manufacturer Name</label>
                <div class="input-group col-5">
                    <input type="text"  readonly class="form-control mr-2" name="manage_manufacturer_name" id="manage_manufacturer_name" value="<?php echo $item_row["item_manu_name"]; ?>">
                    <button type="button" class="btn btn-outline-primary" id="btn_manufacturer_name_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-success" id="btn_manufacturer_name_check"><i class="fa fa-check"></i></button>
                </div>
            </div>

            <!-- Fifth Row  -->
            <div class="form-group row mb-4">
                <!-- Supplier  -->
                <label for="supplier" class="col-2 col-form-label">Supplier</label>
                <div class="input-group col-5">

                    <!-- Hidden Select Drop Down    -->

                    <select class="custom-select mr-2" name="select_supplier" id="select_supplier" class="form-control">
                        <option value="choose" selected>Choose...</option>
                        <?php
                        $supplier_result = $inventoryObj->getAllSuppliers();
                        while($supplier_row = $supplier_result->fetch_assoc())
                        {
                            ?>
                            <option value="<?php echo $supplier_row["sup_id"]; ?>"><?php echo $supplier_row["sup_name"]; ?></option>

                        <?php } ?>
                    </select>

                    <!-- End of Hidden Select Drop Down    -->




                    <input type="text"  readonly class="form-control mr-2" name="manage_supplier" id="manage_supplier" value="<?php echo $row_supplier["sup_name"]; ?>">
                    <button type="button" class="btn btn-outline-primary" id="btn_supplier_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-success" id="btn_supplier_check"><i class="fa fa-check"></i></button>
                </div>
            </div>


            <!-- Sixth Row  -->
            <div class="form-group row">
                <!-- Item category  -->
                <label for="item_category" class="col-2 col-form-label">Item Category</label>
                <div class="input-group col-4">

                    <!-- Hidden Select Drop Down    -->

                    <select class="custom-select mr-2" name="select_item_category" id="select_item_category" class="form-control">
                        <option value="choose" selected>Choose...</option>
                        <?php
                        $category_result = $inventoryObj->getAllCategories();
                        while($category_row_result = $category_result->fetch_assoc())
                        {
                            ?>
                            <option value="<?php echo $category_row_result["item_cat_id"]; ?>"><?php echo $category_row_result["item_cat_name"]; ?></option>

                        <?php } ?>
                    </select>

                    <!-- End of Hidden Select Drop Down    -->



                    <input type="text"  readonly class="form-control mr-2" name="manage_item_category" id="manage_item_category" value="<?php echo $row_category["item_cat_name"]; ?>" readonly >
                    <button type="button" class="btn btn-outline-primary" id="btn_item_category_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-success" id="btn_item_category_check"><i class="fa fa-check"></i></button>
                </div>


                <!-- Item Size  -->
                <label for="item_size" class="col-2 col-form-label">Item Size</label>
                <div class="input-group col-4">
                    <!-- Hidden Select Drop Down    -->

                    <select class="custom-select mr-2" name="select_item_size" id="select_item_size" class="form-control">
                        <option value="choose" selected>Choose...</option>
                        <?php
                        $size_result = $inventoryObj->getAllSizes();
                        while($row_s = $size_result->fetch_assoc())
                        {
                            ?>
                            <option value="<?php echo $row_s["item_size_id"]; ?>"><?php echo $row_s["item_size_name"]; ?></option>

                        <?php } ?>
                    </select>

                    <!-- End of Hidden Select Drop Down    -->



                    <input type="text"  readonly class="form-control mr-2" name="manage_item_size" id="manage_item_size" value="<?php echo $row_size["item_size_name"]; ?>">
                    <button type="button" class="btn btn-outline-primary" id="btn_item_size_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-success" id="btn_item_size_check"><i class="fa fa-check"></i></button>
                </div>
            </div>
            <!-- Seventh Row  -->

            <!-- Ninth Row  -->
            <div class="form-group row">
                <!-- Purchase Unit Price Rs.  -->
                <label for="p_unit_price" class="col-2 col-form-label">Purchase Unit Price</label>
                <div class="input-group col-4">
                    <input type="text"  readonly class="form-control mr-2" name="manage_p_unit_price" id="manage_p_unit_price" value="<?php echo $item_row["item_purchase_uprice"]; ?>">
                    <button type="button" class="btn btn-outline-primary" id="btn_p_unit_price_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-success" id="btn_p_unit_price_check"><i class="fa fa-check"></i></button>
                </div>

                <!-- Selling Unit Price Rs.  -->
                <label for="s_unit_price" class="col-2 col-form-label">Selling Unit Price Rs.</label>
                <div class="input-group col-4">
                    <input type="text"  readonly class="form-control mr-2" name="manage_s_unit_price" id="manage_s_unit_price" value="<?php echo $item_row["item_sale_uprice"]; ?>">
                    <button type="button" class="btn btn-outline-primary" id="btn_s_unit_price_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-success" id="btn_s_unit_price_check"><i class="fa fa-check"></i></button>
                </div>
            </div>
            <!-- Tenth Row     -->
            <div class="form-group row">
                <!-- Discount  -->
                <label for="order_quantity" class="col-2 col-form-label">Discount</label>
                <div class="input-group col-4">
                    <input type="text"  readonly class="form-control mr-2" name="manage_discount" id="manage_discount" value="<?php echo $item_row["item_discount"]; ?>">
                    <button type="button" class="btn btn-outline-primary" id="btn_discount_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-success" id="btn_discount_check"><i class="fa fa-check"></i></button>
                </div>

                <!-- Handling Charges Rs.  -->
                <label for="handling_charges" class="col-2 col-form-label">Handling Charges Rs.</label>
                <div class="input-group col-4">
                    <input type="text"  readonly class="form-control mr-2" name="manage_handling_charges" id="manage_handling_charges" value="<?php echo $item_row["item_handling"]; ?>">
                    <button type="button" class="btn btn-outline-primary" id="btn_handling_charges_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-success" id="btn_handling_charges_check"><i class="fa fa-check"></i></button>
                </div>
            </div>

            <!-- Eleventh Row  -->
            <div class="form-group row mt-4">
                <!-- Vat Rate  -->
                <label for="vat_rate" class="col-2 col-form-label">Vat Rate</label>
                <div class="input-group col-4">
                    <input type="text"  readonly class="form-control mr-2" name="manage_vat_rate" id="manage_vat_rate" value="<?php echo $item_row["item_vat_rate"]; ?>">
                    <button type="button" class="btn btn-outline-primary" id="btn_vat_rate_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-success" id="btn_vat_rate_check"><i class="fa fa-check"></i></button>
                </div>


                <!-- Location  -->
                <label for="location" class="col-2 col-form-label">Location</label>
                <div class="input-group col-4">
                    <input type="text"  readonly class="form-control mr-2" name="manage_location" id="manage_location" value="<?php echo $item_row["item_location"]; ?>">
                    <button type="button" class="btn btn-outline-primary" id="btn_location_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-success" id="btn_location_check"><i class="fa fa-check"></i></button>
                </div>
            </div>



            <?php

            break;

        case "change_txt_select":
            $item_cat_id = $_POST["itemCatId"];

            $item_r = $inventoryObj->getItemByCategoryAndSearch($item_cat_id);
            ?>
            <select name="stock_lvl_select_item_name" id="stock_lvl_select_item_name" class="custom-select">
                <?php
                while($item_row = $item_r->fetch_assoc())
                {
                    ?>
                    <option value="<?php echo $item_row["item_id"]; ?>"><?php echo $item_row["item_name"]; ?></option>
                    <?php
                }
                ?>
            </select>
            <?php

            break;

        case "add_stock_level":
            $stk_lvl_item_id = $_POST["stock_lvl_select_item_name"];
            $stk_lvl_rol = $_POST["stock_level_rol"];
            $stk_lvl_eoq = $_POST["stock_level_eoq"];
            $stk_lvl_min = $_POST["stock_level_min_lvl"];
            $stk_lvl_max = $_POST["stock_level_max_lvl"];
            $stk_lvl_lt = $_POST["stock_level_lead_time"];
            $stk_lvl_danger = $_POST["stock_level_dng_lvl"];
            $stk_lvl_buffer = $_POST["stock_level_buffer"];

            $r = $inventoryObj->addStockLevel($stk_lvl_item_id, $stk_lvl_rol, $stk_lvl_eoq, $stk_lvl_min, $stk_lvl_max, $stk_lvl_lt, $stk_lvl_danger, $stk_lvl_buffer);

            if($r > 0)
            {
                $msg = base64_encode("Stock Level Added Successfully!");
                ?>
                <script>window.location = "../view/inventory-management.php?success_message=<?php echo $msg; ?>";</script>

                <?php

            }
            else
            {
                $msg = base64_encode("Stock Level has already been Added!");
                ?>
                <script>window.location = "../view/inventory-management.php?error_message=<?php echo $msg; ?>";</script>

                <?php
            }
            break;
        case "show_stock_data":
            $stock_item_id = $_POST["stockItemId"];
            $item_result = $inventoryObj->getItemById($stock_item_id);

            $stock_level_result = $inventoryObj->getStockLevel($stock_item_id);

            while($item_row = $item_result->fetch_assoc())
            {
                ?>


                <div class="form-group row">
                    <!-- Stock Item ID  -->
                    <label for="stock_item_id" class="col-form-label col-2">Item ID</label>
                    <div class="col-3">
                        <input type="text" id="stock_item_id" name="stock_item_id" class="form-control" value="<?php echo $item_row["item_id"]; ?>" readonly/>
                    </div>

                    <!-- Stock Item Name    -->
                    <label for="stock_item_name" class="col-form-label col-2">Item Name</label>
                    <div class="col-5">
                        <input type="text" id="stock_item_name" name="stock_item_name" class="form-control" value="<?php echo $item_row["item_name"]; ?>" readonly/>
                    </div>
                </div>

                <?php

                ?>

                <div class="form-group row">
                    <!-- Barcode   -->
                    <label for="stock_barcode" class="col-2 col-form-label">Barcode</label>
                    <div class="col-3">
                        <input type="number" step="1" min="1" id="stock_barcode" name="stock_barcode" class="form-control"/>
                    </div>
                    <div class="col-3">
                        <button type="button" id="btn_generate_stock_barcode" class="btn btn-outline-primary rounded-pill">Generate</button>
                    </div>

                </div>

                <div class="form-group row">
                    <!-- Generated Barcode  -->
                    <div class="col-2">&nbsp;</div>
                    <div class="col-4 d-flex justify-content-start" id="barcode_image"></div>
                </div>


                <div class="form-group row">
                    <!-- MFD Date   -->
                    <label for="stock_mfd" class="col-2 col-form-label">Manufactured Date</label>
                    <div class="col-4">
                        <input type="date" name="stock_mfd" id="stock_mfd" class="form-control" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>"/>
                    </div>


                    <!-- EXP date   -->
                    <label for="stock_date" class="col-2 col-form-label">Stock Date</label>
                    <div class="col-4">
                        <input type="date" name="stock_date" id="stock_date" class="form-control" min="<?php echo date("Y-m-d"); ?>"/>
                    </div>
                </div>

                <div class="form-group row">
                    <!-- EXP date   -->
                    <label for="stock_exp" class="col-2 col-form-label">Expiry Date</label>
                    <div class="col-4">
                        <input type="date" name="stock_exp" id="stock_exp" class="form-control" min="<?php echo date("Y-m-d"); ?>"/>
                    </div>

                    <!-- Stock Quantity -->
                    <label for="stock_qty" class="col-2 col-form-label">Stock Quantity</label>
                    <div class="col-4">
                        <input type="number" min="1" step="1" id="stock_qty" name="stock_qty" class="form-control"/>
                    </div>
                </div>

                <hr>

                <?php

                while($r=$stock_level_result->fetch_assoc())
                {
                    ?>



                    <div class="form-group row">
                        <!-- ROL -->
                        <label for="stock_rol" class="col-2 col-form-label">Item Re Order Level</label>
                        <div class="col-4">
                            <input type="number" id="stock_rol" name="stock_rol" min="1" step="1" class="form-control" readonly value="<?php echo $r["stk_lvl_rol"]; ?>"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <!-- EOQ / Re Order Quantity -->
                        <label for="stock_eoq" class="col-2 col-form-label">Re Order Quantity</label>
                        <div class="col-4">
                            <input type="number" min="1" step="1" id="stock_eoq" name="stock_eoq" class="form-control" readonly value="<?php echo $r["stk_lvl_eoq"]; ?>"/>
                        </div>
                    </div>



                    <div class="form-group row">
                        <!-- Minimum Stock Level -->
                        <label for="stock_min_lvl" class="col-2 col-form-label">Minimum Stock Level</label>
                        <div class="col-4">
                            <input type="number" id="stock_min_lvl" name="stock_min_lvl" min="0" step="1" class="form-control" readonly value="<?php echo $r["stk_lvl_min"]; ?>"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <!-- Maximum Stock Level -->
                        <label for="stock_max_lvl" class="col-2 col-form-label">Max Stock Level</label>
                        <div class="col-4">
                            <input type="number" id="stock_max_lvl" name="stock_max_lvl" min="0" step="1" class="form-control" readonly value="<?php echo $r["stk_lvl_max"]; ?>"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <!-- Lead Time -->
                        <label for="stock_lead_time" class="col-2 col-form-label">Lead Time</label>
                        <div class="col-4">
                            <input type="number" id="stock_lead_time" name="stock_lead_time" min="0" step="1" class="form-control" readonly value="<?php echo $r["stk_lvl_lt"]; ?>"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <!-- Danger Stock Level -->
                        <label for="stock_dng_lvl" class="col-2 col-form-label">Danger Stock Level</label>
                        <div class="col-4">
                            <input type="number" id="stock_dng_lvl" name="stock_dng_lvl" min="0" step="1" class="form-control" readonly value="<?php echo $r["stk_lvl_danger"]; ?>"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <!-- Buffer Stock -->
                        <label for="stock_buffer" class="col-2 col-form-label">Buffer Stock</label>
                        <div class="col-4">
                            <input type="number" id="stock_buffer" name="stock_buffer" min="0" step="1" class="form-control" readonly value="<?php echo $r["stk_lvl_buffer"]; ?>"/>
                        </div>
                    </div>
                    <?php
                }
            }
            break;

        case "add_stock":

            if(isset($_POST["btn_save_stock"])) {

                $item_id = $_POST["stock_item_id"];
                $item_stock_barcode = $_POST["stock_barcode"];
                $item_stock_manu_date = $_POST["stock_mfd"];
                $item_stock_date = $_POST["stock_exp"];
                $item_stock_exp_date = $_POST["stock_date"];
                $item_stock_qty = $_POST["stock_qty"];

                $rows_affected = $inventoryObj->addStock($item_id, $item_stock_barcode, $item_stock_manu_date, $item_stock_date, $item_stock_exp_date, $item_stock_qty);

                if($rows_affected > 0)
                {
                    $msg = base64_encode("Stock Added Successfully!");
                    ?>
                    <script>window.location = "../view/inventory-management.php?success_message=<?php echo $msg; ?>";</script>

                    <?php

                }
                else
                {
                    $msg = base64_encode("Stock Failed to Add!");
                    ?>
                    <script>window.location = "../view/inventory-management.php?error_stock=<?php echo $msg; ?>";</script>

                    <?php
                }
            }
            break;

        case "generate_barcode":
            $barcode = $_POST["barcode"];

            ?>
            <img src="http://barcodes4.me/barcode/c128a/<?php echo $barcode; ?>.png" width="100px" height="60px">

            <?php

            break;

        case "update_item":

            //item Name update
            if(isset($_POST["manageItemId"]) && isset($_POST["manageItemName"])) {
                $manage_item_id = $_POST["manageItemId"];
                $manage_item_name = $_POST["manageItemName"];
                $i_r = $inventoryObj->getAllItems();
                $i_row = $i_r->fetch_assoc();
                if ($manage_item_name !== $i_row["item_name"])
                    $inventoryObj->updateItemName($manage_item_id, $manage_item_name);
            }
        //Item Manu Code Update
            if(isset($_POST["manageItemId"]) && isset($_POST["manageManuCode"])) {
                $manage_item_id = $_POST["manageItemId"];
                $manage_manu_code = $_POST["manageManuCode"];
                $i_r = $inventoryObj->getAllItems();
                $i_row = $i_r->fetch_assoc();
                if ($manage_manu_code !== $i_row["item_manu_code"])
                    $inventoryObj->updateItemManuCode($manage_item_id, $manage_manu_code);
            }
            //Item Manu Name Update
            if(isset($_POST["manageItemId"]) && isset($_POST["manageManuName"])) {
                $manage_item_id = $_POST["manageItemId"];
                $manage_manu_name = $_POST["manageManuName"];
                $i_r = $inventoryObj->getAllItems();
                $i_row = $i_r->fetch_assoc();
                if ($manage_manu_name !== $i_row["item_manu_name"])
                    $inventoryObj->updateItemManuName($manage_item_id, $manage_manu_name);
            }




            //Item Sup Id Update
            if(isset($_POST["manageItemId"]) && isset($_POST["manageSupId"])) {
                $manage_item_id = $_POST["manageItemId"];
                $manage_sup_id = $_POST["manageSupId"];
                $i_r = $inventoryObj->getAllItems();
                $i_row = $i_r->fetch_assoc();
                if ($manage_sup_id !== $i_row["item_supplier_id"])
                    $inventoryObj->updateSupId($manage_item_id, $manage_sup_id);
            }

            //Item Cat Id Update
            if(isset($_POST["manageItemId"]) && isset($_POST["manageCatId"])) {
                $manage_item_id = $_POST["manageItemId"];
                $manage_cat_id = $_POST["manageCatId"];
                $i_r = $inventoryObj->getAllItems();
                $i_row = $i_r->fetch_assoc();
                if ($manage_cat_id !== $i_row["item_category_id"])
                    $inventoryObj->updateCatId($manage_item_id, $manage_cat_id);
            }

            //Item Size Id Update
            if(isset($_POST["manageItemId"]) && isset($_POST["manageSizeId"])) {
                $manage_item_id = $_POST["manageItemId"];
                $manage_size_id = $_POST["manageSizeId"];
                $i_r = $inventoryObj->getAllItems();
                $i_row = $i_r->fetch_assoc();
                if ($manage_size_id !== $i_row["item_size_id"])
                    $inventoryObj->updateSizeId($manage_item_id, $manage_size_id);
            }

        //Item Purchase Uprice Update
            if(isset($_POST["manageItemId"]) && isset($_POST["managePUprice"])) {
                $manage_item_id = $_POST["manageItemId"];
                $manage_p_u_price = $_POST["managePUprice"];
                $i_r = $inventoryObj->getAllItems();
                $i_row = $i_r->fetch_assoc();
                if ($manage_p_u_price !== $i_row["item_purchase_uprice"])
                    $inventoryObj->updatePurchaseUPrice($manage_item_id, $manage_p_u_price);
            }

            //Item Sale Uprice Update
            if(isset($_POST["manageItemId"]) && isset($_POST["manageSUprice"])) {
                $manage_item_id = $_POST["manageItemId"];
                $manage_s_u_price = $_POST["manageSUprice"];
                $i_r = $inventoryObj->getAllItems();
                $i_row = $i_r->fetch_assoc();
                if ($manage_s_u_price !== $i_row["item_sale_uprice"])
                    $inventoryObj->updateSaleUPrice($manage_item_id, $manage_s_u_price);
            }


            //Item Discount Update
            if(isset($_POST["manageItemId"]) && isset($_POST["manageDiscount"])) {
                $manage_item_id = $_POST["manageItemId"];
                $manage_discount = $_POST["manageDiscount"];
                $i_r = $inventoryObj->getAllItems();
                $i_row = $i_r->fetch_assoc();
                if ($manage_discount !== $i_row["item_discount"])
                    $inventoryObj->updateDiscount($manage_item_id, $manage_discount);
            }

            //Item Handling Update
            if(isset($_POST["manageItemId"]) && isset($_POST["manageHandling"])) {
                $manage_item_id = $_POST["manageItemId"];
                $manage_handling = $_POST["manageHandling"];
                $i_r = $inventoryObj->getAllItems();
                $i_row = $i_r->fetch_assoc();
                if ($manage_handling !== $i_row["item_handling"])
                    $inventoryObj->updateHandling($manage_item_id, $manage_handling);
            }

            //Item Vat Update
            if(isset($_POST["manageItemId"]) && isset($_POST["manageVat"])) {
                $manage_item_id = $_POST["manageItemId"];
                $manage_vat = $_POST["manageVat"];
                $i_r = $inventoryObj->getAllItems();
                $i_row = $i_r->fetch_assoc();
                if ($manage_vat !== $i_row["item_vat_rate"])
                    $inventoryObj->updateVat($manage_item_id, $manage_vat);
            }

            //Item Location Update
            if(isset($_POST["manageItemId"]) && isset($_POST["manageLocation"])) {
                $manage_item_id = $_POST["manageItemId"];
                $manage_location = $_POST["manageLocation"];
                $i_r = $inventoryObj->getAllItems();
                $i_row = $i_r->fetch_assoc();
                if ($manage_location !== $i_row["item_location"])
                    $inventoryObj->updateLocation($manage_item_id, $manage_location);
            }



//
//                //manu name
//                if($mfd_name !== $i_row["item_manu_name"])
//                {
//                    $ar = $inventoryObj->updateItemManuName($item_id, $mfd_name);
//
//                    if($ar > 0)
//                    {
//                        echo "Item Manufacturer Name Updated Successfully!";
//                    }
//
//                    else
//                    {
//                        echo "Item Manufacturer Name Failed to Update!";
//                    }
//                }










    }
}

?>

<script src="../assets/js/inventory.js"></script>
<script src="../assets/js/inventory_update.js"></script>

