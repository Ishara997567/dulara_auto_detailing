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
                $msg = base64_encode("New Item Failed to Created!");
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
                $msg = base64_encode("New Item Size Failed to Created!");
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
                $msg = base64_encode("New Item Category Failed to Created!");
                ?>
                <script>window.location = "../view/inventory-management.php?error_message=<?php echo $msg; ?>";</script>

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

        case "generate_barcode":
            $barcode = $_POST["barcode"];

            ?>
            <img src="http://barcodes4.me/barcode/c128a/<?php echo $barcode; ?>.png" width="100px" height="60px">

            <?php
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
                    <input type="text" readonly class="form-control" id="manage_item_code" value="<?php echo $item_row["item_id"]; ?>">
                </div>
            </div>

            <!-- Second Row  -->
            <div class="form-group row">
                <!-- Item name  -->
                <label for="item_name" class="col-2 col-form-label">Item Name</label>
                <div class="input-group col-5">
                    <input type="text" readonly class="form-control mr-2" id="manage_item_name" value="<?php echo $item_row["item_name"]; ?>">
                    <button type="button" class="btn btn-outline-primary" id="btn_item_name_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_item_name_check"><i class="fa fa-check"></i></button>
                </div>
            </div>

            <!-- Third Row  -->
            <div class="form-group row">
                <!-- Manufacturer code  -->
                <label for="manufacturer_code" class="col-2 col-form-label">Manufacturer Code</label>
                <div class="input-group col-5">
                    <input type="text"  readonly class="form-control mr-2" id="manage_manufacturer_code" value="<?php echo $item_row["item_manu_code"]; ?>">
                    <button type="button" class="btn btn-outline-primary" id="btn_manufacturer_code_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_manufacturer_code_check"><i class="fa fa-check"></i></button>
                </div>
            </div>

            <!-- Forth Row  -->
            <div class="form-group row">
                <!-- Manufacturer name  -->
                <label for="manufacturer_name" class="col-2 col-form-label">Manufacturer Name</label>
                <div class="input-group col-5">
                    <input type="text"  readonly class="form-control mr-2" id="manage_manufacturer_name" value="<?php echo $item_row["item_manu_name"]; ?>">
                    <button type="button" class="btn btn-outline-primary" id="btn_manufacturer_name_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_manufacturer_name_check"><i class="fa fa-check"></i></button>
                </div>
            </div>

            <!-- Fifth Row  -->
            <div class="form-group row mb-4">
                <!-- Supplier  -->
                <label for="supplier" class="col-2 col-form-label">Supplier</label>
                <div class="input-group col-5">
                    <input type="text"  readonly class="form-control mr-2" id="manage_supplier" value="<?php echo $row_supplier["sup_name"]; ?>">
                    <button type="button" class="btn btn-outline-primary" id="btn_supplier_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_supplier_check"><i class="fa fa-check"></i></button>
                </div>
            </div>


            <!-- Sixth Row  -->
            <div class="form-group row">
                <!-- Item category  -->
                <label for="item_category" class="col-2 col-form-label">Item Category</label>
                <div class="input-group col-4">
                    <input type="text"  readonly class="form-control mr-2" id="manage_item_category" value="<?php echo $row_category["item_cat_name"]; ?>readonly ">
                    <button type="button" class="btn btn-outline-primary" id="btn_item_category_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_item_category_check"><i class="fa fa-check"></i></button>
                </div>


                <!-- Item Size  -->
                <label for="item_size" class="col-2 col-form-label">Item Size</label>
                <div class="input-group col-4">
                    <input type="text"  readonly class="form-control mr-2" id="manage_item_size" value="<?php echo $row_size["item_size_name"]; ?>">
                    <button type="button" class="btn btn-outline-primary" id="btn_item_size_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_item_size_check"><i class="fa fa-check"></i></button>
                </div>
            </div>
            <!-- Seventh Row  -->

            <!-- Ninth Row  -->
            <div class="form-group row">
                <!-- Purchase Unit Price Rs.  -->
                <label for="p_unit_price" class="col-2 col-form-label">Purchase Unit Price</label>
                <div class="input-group col-4">
                    <input type="text"  readonly class="form-control mr-2" id="manage_p_unit_price" value="<?php echo $item_row["item_purchase_uprice"]; ?>">
                    <button type="button" class="btn btn-outline-primary" id="btn_p_unit_price_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_p_unit_price_check"><i class="fa fa-check"></i></button>
                </div>

                <!-- Selling Unit Price Rs.  -->
                <label for="s_unit_price" class="col-2 col-form-label">Selling Unit Price Rs.</label>
                <div class="input-group col-4">
                    <input type="text"  readonly class="form-control mr-2" id="manage_s_unit_price" value="<?php echo $item_row["item_sale_uprice"]; ?>">
                    <button type="button" class="btn btn-outline-primary" id="btn_s_unit_price_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_s_unit_price_check"><i class="fa fa-check"></i></button>
                </div>
            </div>
            <!-- Tenth Row     -->
            <div class="form-group row">
                <!-- Discount  -->
                <label for="order_quantity" class="col-2 col-form-label">Discount</label>
                <div class="input-group col-4">
                    <input type="text"  readonly class="form-control mr-2" id="manage_discount" value="<?php echo $item_row["item_discount"]; ?>">
                    <button type="button" class="btn btn-outline-primary" id="btn_discount_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_discount_check"><i class="fa fa-check"></i></button>
                </div>

                <!-- Handling Charges Rs.  -->
                <label for="handling_charges" class="col-2 col-form-label">Handling Charges Rs.</label>
                <div class="input-group col-4">
                    <input type="text"  readonly class="form-control" id="manage_handling_charges" value="<?php echo $item_row["item_handling"]; ?>">
                    <button type="button" class="btn btn-outline-primary" id="btn_handling_charges_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_handling_charges_check"><i class="fa fa-check"></i></button>
                </div>
            </div>

            <!-- Eleventh Row  -->
            <div class="form-group row mt-4">
                <!-- Vat Rate  -->
                <label for="vat_rate" class="col-2 col-form-label">Vat Rate</label>
                <div class="input-group col-4">
                    <input type="text"  readonly class="form-control mr-2" id="manage_vat_rate" value="<?php echo $item_row["item_vat_rate"]; ?>">
                    <button type="button" class="btn btn-outline-primary" id="btn_vat_rate_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_vat_rate_check"><i class="fa fa-check"></i></button>
                </div>


                <!-- Location  -->
                <label for="location" class="col-2 col-form-label">Location</label>
                <div class="input-group col-4">
                    <input type="text"  readonly class="form-control mr-2" id="manage_location" value="<?php echo $item_row["item_location"]; ?>">
                    <button type="button" class="btn btn-outline-primary" id="btn_location_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_location_check"><i class="fa fa-check"></i></button>
                </div>
            </div>



            <?php

            break;
    }
}