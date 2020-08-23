<?php include '../includes/header.php'; ?>
    <title>Manage Inventory</title>
    </head>
    <body>
    <!-- Navigation Bar -->
    <?php include '../includes/navbar.php'; ?>

    <!-- Content    -->
    <div class="container-fluid">
        <!-- Top Row    -->
        <div class="row">
            <div class="h2 col-12">
                <p class="d-flex justify-content-start">Manage Service</p>
            </div>
        </div>
        <!-- Form   -->
        <form action="#" method="post">
            <!-- First Row  -->
            <div class="form-group row">
                <!-- Item code  -->
                <label for="item_code" class="col-2 col-form-label">Item Code</label>
                <div class="col-2">
                    <input type="text" readonly class="form-control-plaintext" id="Item_code" value="II000001">
                </div>
            </div>

            <!-- Second Row  -->
            <div class="form-group row">
                <!-- Item name  -->
                <label for="item_name" class="col-2 col-form-label">Item Name</label>
                <div class="input-group col-5">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="item_name" value="PHP echo Value">
                    <button type="button" class="btn btn-outline-primary" id="btn_item_name_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_item_name_check"><i class="fa fa-check"></i></button>
                </div>
            </div>

            <!-- Third Row  -->
            <div class="form-group row">
                <!-- Manufacturer code  -->
                <label for="manufacturer_code" class="col-2 col-form-label">Manufacturer Code</label>
                <div class="input-group col-5">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="manufacturer_code" value="PHP echo Value">
                    <button type="button" class="btn btn-outline-primary" id="btn_manufacturer_code_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_manufacturer_code_check"><i class="fa fa-check"></i></button>
                </div>
            </div>

            <!-- Forth Row  -->
            <div class="form-group row">
                <!-- Manufacturer name  -->
                <label for="manufacturer_name" class="col-2 col-form-label">Manufacturer Name</label>
                <div class="input-group col-5">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="manufacturer_name" value="PHP echo Value">
                    <button type="button" class="btn btn-outline-primary" id="btn_manufacturer_name_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_manufacturer_name_check"><i class="fa fa-check"></i></button>
                </div>
            </div>

            <!-- Fifth Row  -->
            <div class="form-group row mb-4">
                <!-- Supplier  -->
                <label for="supplier" class="col-2 col-form-label">Supplier</label>
                <div class="input-group col-5">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="supplier" value="PHP echo Value">
                    <button type="button" class="btn btn-outline-primary" id="btn_supplier_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_supplier_check"><i class="fa fa-check"></i></button>
                </div>
            </div>


            <!-- Sixth Row  -->
            <div class="form-group row">
                <!-- Item category  -->
                <label for="item_category" class="col-2 col-form-label">Item Category</label>
                <div class="input-group col-4">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="item_category" value="PHP echo Value Change to dropdown">
                    <button type="button" class="btn btn-outline-primary" id="btn_item_category_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_item_category_check"><i class="fa fa-check"></i></button>
                </div>


                <!-- Item Size  -->
                <label for="item_size" class="col-2 col-form-label">Item Size</label>
                <div class="input-group col-4">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="item_size" value="PHP echo Value Change to dropdown">
                    <button type="button" class="btn btn-outline-primary" id="btn_item_size_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_item_size_check"><i class="fa fa-check"></i></button>
                </div>
            </div>
            <!-- Seventh Row  -->
            <div class="form-group row">
                <!-- Quantity  -->
                <label for="quantity" class="col-2 col-form-label">Quantity</label>
                <div class="input-group col-4 my-2">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="quantity" value="PHP echo Value Change to dropdown">
                    <button type="button" class="btn btn-outline-primary" id="btn_quantity_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_quantity_check"><i class="fa fa-check"></i></button>
                </div>

                <!-- ROP  -->
                <label for="rop" class="col-2 col-form-label">ROP</label>
                <div class="input-group col-4 my-2">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="rop" value="PHP echo Value Change to dropdown">
                    <button type="button" class="btn btn-outline-primary" id="btn_rop_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_rop_check"><i class="fa fa-check"></i></button>
                </div>

                <!-- Eighth Row     -->
                <!-- Order Quantity  -->
                <label for="order_quantity" class="col-2 col-form-label">Order Quantity</label>
                <div class="input-group col-4">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="order_quantity" value="PHP echo Value Change to dropdown">
                    <button type="button" class="btn btn-outline-primary" id="btn_order_quantity_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_order_quantity_check"><i class="fa fa-check"></i></button>
                </div>

                <!-- Lead Time  -->
                <label for="lead_time" class="col-2 col-form-label">Lead Time</label>
                <div class="input-group col-4">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="lead_time" value="PHP echo Value Change to dropdown">
                    <button type="button" class="btn btn-outline-primary" id="btn_lead_time_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_lead_time_check"><i class="fa fa-check"></i></button>
                </div>
            </div>

            <!-- Ninth Row  -->
            <div class="form-group row">
                <!-- Purchase Unit Price Rs.  -->
                <label for="p_unit_price" class="col-2 col-form-label">Purchase Unit Price Rs.</label>
                <div class="input-group col-4 my-2">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="p_unit_price" value="PHP echo Value Change to dropdown">
                    <button type="button" class="btn btn-outline-primary" id="btn_p_unit_price_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_p_unit_price_check"><i class="fa fa-check"></i></button>
                </div>

                <!-- Selling Unit Price Rs.  -->
                <label for="s_unit_price" class="col-2 col-form-label">Selling Unit Price Rs.</label>
                <div class="input-group col-4 my-2">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="s_unit_price" value="PHP echo Value Change to dropdown">
                    <button type="button" class="btn btn-outline-primary" id="btn_s_unit_price_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_s_unit_price_check"><i class="fa fa-check"></i></button>
                </div>

                <!-- Tenth Row     -->
                <!-- Discount  -->
                <label for="order_quantity" class="col-2 col-form-label">Discount</label>
                <div class="input-group col-4">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="discount" value="PHP echo Value Change to dropdown">
                    <button type="button" class="btn btn-outline-primary" id="btn_discount_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_discount_check"><i class="fa fa-check"></i></button>
                </div>

                <!-- Handling Charges Rs.  -->
                <label for="handling_charges" class="col-2 col-form-label">Handling Charges Rs.</label>
                <div class="input-group col-4">
                    <input type="text" readonly class="form-control-plaintext" id="handling_charges" value="PHP echo Value Change to dropdown">
                    <button type="button" class="btn btn-outline-primary" id="btn_handling_charges_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_handling_charges_check"><i class="fa fa-check"></i></button>
                </div>
            </div>

            <!-- Eleventh Row  -->
            <div class="form-group row mt-4">
                <!-- Vat Rate  -->
                <label for="vat_rate" class="col-2 col-form-label">Vat Rate</label>
                <div class="input-group col-4">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="vat_rate" value="PHP echo Value Change to dropdown">
                    <button type="button" class="btn btn-outline-primary" id="btn_vat_rate_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_vat_rate_check"><i class="fa fa-check"></i></button>
                </div>


                <!-- Location  -->
                <label for="location" class="col-2 col-form-label">Location</label>
                <div class="input-group col-4">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="location" value="PHP echo Value Change to dropdown">
                    <button type="button" class="btn btn-outline-primary" id="btn_location_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_location_check"><i class="fa fa-check"></i></button>
                </div>
            </div>

            <!-- Bottom button row  -->
            <div class="form-row mb-3">
                <div class="col-8">&nbsp;</div>
                <div class="btn-group col-2" role="group" aria-label="Page Submission">
                    <button type="submit" class="form-control btn btn-outline-success" id="btn_add_item"><i class="fa fa-refresh"></i> Update</button>
                    &nbsp;
                    <button type="button" class="form-control btn btn-outline-danger" id="btn_cancel"><i class="fa fa-times"></i> Cancel</button>
                </div>
            </div>

        </form>
    </div>

    <script>
        function changeButtonPencilToCheck() {
            document.getElementById("btn_service_name_pencil").style.visibility = 'hidden';
            document.getElementById("btn_service_name_check").style.visibility = 'visible';
        }

        function changeButtonCheckToPencil(){
            document.getElementById('btn_service_name_check').style.visibility = 'hidden';
            document.getElementById('btn_service_name_pencil').style.visibility = 'visible';
        }
    </script>

<?php include '../includes/footer.php' ?>