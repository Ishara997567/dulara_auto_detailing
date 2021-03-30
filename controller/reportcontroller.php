<?php include '../model/report_model.php';

$reportObj = new Report();

if(isset($_REQUEST["status"])) {
    $status = $_REQUEST["status"];

    switch ($status) {
        case "service_list":
            $result = $reportObj->getServiceList();
            ?>
            <table class="table table-sm" id="result-table">
                <thead>
                <tr>
                    <th scope="col">Service ID</th>
                    <th scope="col">Service Name</th>
                    <th scope="col">Service Price</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Sub Category Name</th>
                </tr>
                </thead>
                <tbody>
                <?php

                while($row = $result->fetch_assoc())
                {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $row['service_id']; ?></th>
                        <td><?php echo $row['service_name']; ?></td>
                        <td><?php echo $row['service_price']; ?></td>
                        <td><?php echo $row['service_cat_name']; ?></td>
                        <td><?php echo $row['service_sub_cat_name']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>

            <?php
            break;

        case "cat_service_list":
            if(isset($_POST['cat_id'])){
                $cat_id = $_POST['cat_id'];
                $result = $reportObj->getServiceByCategoryId($cat_id);
                ?>
                <table class="table table-sm" id="result-table">
                    <thead>
                    <tr>
                        <th scope="col">Service ID</th>
                        <th scope="col">Service Name</th>
                        <th scope="col">Service Price</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Sub Category Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    while($row = $result->fetch_assoc())
                    {
                        ?>
                        <tr>
                            <th><?php echo $row['service_id']; ?></th>
                            <td><?php echo $row['service_name']; ?></td>
                            <td><?php echo $row['service_price']; ?></td>
                            <td><?php echo $row['service_cat_name']; ?></td>
                            <td><?php echo $row['service_sub_cat_name']; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <?php
            }
            break;

        case "item_list":
            $result = $reportObj->getAllItems();
            ?>
            <table class="table table-sm" id="result-table">
                <thead>
                <tr>
                    <th scope="col">Item ID</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Size</th>
                    <th scope="col">Manu Code</th>
                    <th scope="col">Manufacturer</th>
                    <th scope="col">Supplier</th>
                    <th scope="col">Sale Unit Price</th>
                    <th scope="col">Purchase Unit Price</th>
                    <th scope="col">Handling Charges</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Vat Rate</th>
                    <th scope="col">Location</th>
                    <th scope="col">Description</th>
                </tr>
                </thead>
                <tbody>
                <?php

                while($row = $result->fetch_assoc())
                {
                    ?>
                    <tr>
                        <th><?php echo $row['item_id']; ?></th>
                        <td><?php echo $row['item_name']; ?></td>
                        <td><?php echo $row['item_cat_name']; ?></td>
                        <td><?php echo $row['item_size_name']; ?></td>
                        <td><?php echo $row['item_manu_code']; ?></td>
                        <td><?php echo $row['item_manu_name']; ?></td>
                        <td><?php echo $row['sup_name']; ?></td>
                        <td><?php echo $row['item_sale_uprice']; ?></td>
                        <td><?php echo $row['item_purchase_uprice']; ?></td>
                        <td><?php echo $row['item_handling']; ?></td>
                        <td><?php echo $row['item_discount']; ?></td>
                        <td><?php echo $row['item_vat_rate']; ?></td>
                        <td><?php echo $row['item_location']; ?></td>
                        <td><?php echo $row['item_description']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <?php

            break;

        case "item_category_list":
            if(isset($_POST['item_cat_id']))
            {
                $item_cat_id = $_POST['item_cat_id'];
                ?>

                <table class="table table-sm" id="result-table">
                    <thead>
                    <tr>
                        <th scope="col">Item ID</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Size</th>
                        <th scope="col">Manu Code</th>
                        <th scope="col">Manufacturer</th>
                        <th scope="col">Supplier</th>
                        <th scope="col">Sale Unit Price</th>
                        <th scope="col">Purchase Unit Price</th>
                        <th scope="col">Handling Charges</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Vat Rate</th>
                        <th scope="col">Location</th>
                        <th scope="col">Description</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php

                    $result = $reportObj->getAllItemsByCategoryId($item_cat_id);
                    while($row = $result->fetch_assoc())
                    {
                        ?>
                        <tr>
                            <th><?php echo $row['item_id']; ?></th>
                            <td><?php echo $row['item_name']; ?></td>
                            <td><?php echo $row['item_cat_name']; ?></td>
                            <td><?php echo $row['item_size_name']; ?></td>
                            <td><?php echo $row['item_manu_code']; ?></td>
                            <td><?php echo $row['item_manu_name']; ?></td>
                            <td><?php echo $row['sup_name']; ?></td>
                            <td><?php echo $row['item_sale_uprice']; ?></td>
                            <td><?php echo $row['item_purchase_uprice']; ?></td>
                            <td><?php echo $row['item_handling']; ?></td>
                            <td><?php echo $row['item_discount']; ?></td>
                            <td><?php echo $row['item_vat_rate']; ?></td>
                            <td><?php echo $row['item_location']; ?></td>
                            <td><?php echo $row['item_description']; ?></td>
                        </tr>
                        <?php

                    }   ?>
                    </tbody>
                </table>

                <?php
            }

            break;

        case "item_list_by_category":
            if(isset($_POST['icat_id']))
            {
                $item_cat_id = $_POST['icat_id'];
                $result = $reportObj->getItemNameByCategoryId($item_cat_id);
                ?>
                <select name="inventory_item" id="inventory_item" class="form-control custom-select">
                    <option value="choose" selected>Select Item</option>
                    <?php
                    while($r = $result->fetch_assoc())
                    {
                        ?>
                        <option value="<?php echo $r['item_id']; ?>"><?php echo $r['item_name']; ?></option>
                        <?php
                    }
                    ?>
                </select>
                <?php
            }

            break;

        case "stock_level_list":
            if(isset($_POST['item_id'])){
                $item_id = $_POST['item_id'];
                $result = $reportObj->getStockLevelByItemId($item_id);
                $row = $result->fetch_assoc();
                ?>
                <table class="table table-sm text-center" id="result-table">
                    <thead>
                    <tr>
                        <th scope="col">Stock Level</th>
                        <th scope="col">Quantity</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    foreach($row as $level=>$qty)
                    {
                        ?>
                        <tr>
                            <td><?php echo $level; ?></td>
                            <td><?php echo $qty; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                <?php
            }
            break;

        case "item_qty_list":
            $result = $reportObj->getItemStockQuantity();
            ?>
            <table class="table table-sm text-center" id="result-table">
                <thead>
                <tr>
                    <th scope="col">Item ID</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Available Quantity</th>
                    <th scope="col">Stock Last Updated At</th>
                    <th scope="col">Stock Expiry Date</th>
                </tr>
                </thead>
                <tbody>

                <?php
                while($row = $result->fetch_assoc())
                {
                    ?>
                    <tr>
                        <th><?php echo $row['item_id']; ?></th>
                        <td><?php echo $row['item_name']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['stock_last_updated']; ?></td>
                        <td><?php echo $row['stock_expiry_date']; ?></td>
                    </tr>
                    <?php

                }   ?>
                </tbody>
            </table>
            <?php
            break;

        case "supplier_item_list":
            if(isset($_POST['sup_id']))
            {
                $sup_id = $_POST['sup_id'];
                $result = $reportObj->getItemBySupplierId($sup_id);
                ?>

                <table class="table table-sm" id="result-table">
                    <thead>
                    <tr>
                        <th scope="col">Item ID</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Size</th>
                        <th scope="col">Manu Code</th>
                        <th scope="col">Manufacturer</th>
                        <th scope="col">Supplier</th>
                        <th scope="col">Sale Unit Price</th>
                        <th scope="col">Purchase Unit Price</th>
                        <th scope="col">Handling Charges</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Vat Rate</th>
                        <th scope="col">Location</th>
                        <th scope="col">Description</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    while($row = $result->fetch_assoc())
                    {
                        ?>
                        <tr>
                            <th><?php echo $row['item_id']; ?></th>
                            <td><?php echo $row['item_name']; ?></td>
                            <td><?php echo $row['item_cat_name']; ?></td>
                            <td><?php echo $row['item_size_name']; ?></td>
                            <td><?php echo $row['item_manu_code']; ?></td>
                            <td><?php echo $row['item_manu_name']; ?></td>
                            <td><?php echo $row['sup_name']; ?></td>
                            <td><?php echo $row['item_sale_uprice']; ?></td>
                            <td><?php echo $row['item_purchase_uprice']; ?></td>
                            <td><?php echo $row['item_handling']; ?></td>
                            <td><?php echo $row['item_discount']; ?></td>
                            <td><?php echo $row['item_vat_rate']; ?></td>
                            <td><?php echo $row['item_location']; ?></td>
                            <td><?php echo $row['item_description']; ?></td>
                        </tr>
                        <?php

                    }   ?>
                    </tbody>
                </table>
                <?php
            }
            break;

        //Job Reports

        case "job_completed_list":
            if(isset($_POST['from']) && isset($_POST['to']))
            {
                $from_date = $_POST['from'];
                $to_date = $_POST['to'];

                if($from_date > $to_date) {
                    ?>
                    <div class="row">
                        <div class="col-md-2">&nbsp;</div>
                        <div class="col-md-8 text-center alert alert-danger">
                            Please Select Valid Date Range!
                        </div>
                        <div class="col-md-2">&nbsp;</div>
                    </div>
                    <?php
                } else {

                    $result = $reportObj->getCompletedRangedJobs($from_date, $to_date);
                    ?>
                    <table class="table table-sm" id="result_table">
                    <thead>
                    <tr>
                        <th scope="col">Job ID</th>
                        <th scope="col">Vehicle Number</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Vehicle Make</th>
                        <th scope="col">Vehicle Model</th>
                        <th scope="col">Vehicle ODO</th>
                        <th scope="col">Vehicle Mileage</th>
                        <th scope="col">Job In-time</th>
                        <th scope="col">Job Out-time</th>
                        <th scope="col">Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($row = $result->fetch_assoc())
                    {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row['job_id']; ?></th>
                            <td><?php echo $row['job_vehicle_id']; ?></td>
                            <td><?php echo $row['cus_name']; ?></td>
                            <td><?php echo $row['vehicle_make_name']; ?></td>
                            <td><?php echo $row['vehicle_model_name']; ?></td>
                            <td><?php echo $row['job_vehicle_odo']; ?></td>
                            <td><?php echo $row['job_vehicle_mileage']; ?></td>
                            <td><?php echo $row['job_start_time']; ?></td>
                            <td><?php echo $row['job_finish_time']; ?></td>
                            <td><?php echo $row['job_description']; ?></td>
                        </tr>
                        <?php
                    }
                }
            }
            break;

        case "sale_daily_income_list":
            $result = $reportObj->getDailyIncome();
            ?>
            <div class="table-responsive">
                <table class="table table-sm" id="result-table">
                    <thead>
                    <tr>
                        <th scope="col">Invoice ID</th>
                        <th scope="col">Job Name</th>
                        <th scope="col">Total Item Amount (Rs.)</th>
                        <th scope="col">Total Service Amount (Rs.)</th>
                        <th scope="col">Total Invoice Amount (Rs.)</th>
                        <th scope="col">Invoiced Time</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $total_daily_income = 0;
                    $total_item_amount = 0;
                    $total_service_amount = 0;
                    while($row = $result->fetch_assoc())
                    {
                        $total_daily_income += $row['invoice_amount'];
                        $total_item_amount += $row['invoice_item_total_amount'];
                        $total_service_amount += $row['invoice_service_total_amount'];
                        ?>
                        <tr>
                            <th><?php echo $row['invoice_id']; ?></th>
                            <td><?php echo $row['job_id']; ?></td>
                            <td><?php echo $row['invoice_item_total_amount']; ?></td>
                            <td><?php echo $row['invoice_service_total_amount']; ?></td>
                            <td><?php echo $row['invoice_amount']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                        </tr>
                        <?php

                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <hr>
            <form>

                <div class="form-group row">
                    <label for="tot_item_amount" class="col-md-3 col-form-label">Total Daily Income from Items (Rs.): </label>
                    <div class="col-md-2">
                        <input type="text" id="tot_item_amount" name="tot_item_amount" class="form-control" readonly value="<?php echo $total_item_amount; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tot_service_amount" class="col-md-3 col-form-label">Total Daily Income from Services (Rs.): </label>
                    <div class="col-md-2">
                        <input type="text" id="tot_service_amount" name="tot_service_amount" class="form-control" readonly value="<?php echo $total_service_amount; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tot_daily_income" class="col-md-3 col-form-label">Total Daily Income (Rs.): </label>
                    <div class="col-md-2">
                        <input type="text" id="tot_daily_income" name="tot_daily_income" class="form-control" readonly value="<?php echo $total_daily_income; ?>">
                    </div>
                </div>
            </form>
            <?php
            break;

        case "sale_period_list":
            if(isset($_POST['from']) && isset($_POST['to'])) {
                $from_date = $_POST['from'];
                $to_date = $_POST['to'];

                if($from_date > $to_date) {
                    ?>
                    <div class="row">
                        <div class="col-md-2">&nbsp;</div>
                        <div class="col-md-8 text-center alert alert-danger">
                            Please Select Valid Date Range!
                        </div>
                        <div class="col-md-2">&nbsp;</div>
                    </div>
                    <?php
                } else {

                    $result = $reportObj->getPeriodicalIncome($from_date, $to_date);
                    ?>
                    <div class="table-responsive">
                        <table class="table table-sm" id="result-table">
                            <thead>
                            <tr>
                                <th scope="col">Invoice ID</th>
                                <th scope="col">Job Name</th>
                                <th scope="col">Total Item Amount (Rs.)</th>
                                <th scope="col">Total Service Amount (Rs.)</th>
                                <th scope="col">Total Invoice Amount (Rs.)</th>
                                <th scope="col">Invoiced Date and Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $total_daily_income = 0;
                            $total_item_amount = 0;
                            $total_service_amount = 0;
                            while($row = $result->fetch_assoc())
                            {
                                $total_daily_income += $row['invoice_amount'];
                                $total_item_amount += $row['invoice_item_total_amount'];
                                $total_service_amount += $row['invoice_service_total_amount'];
                                ?>
                                <tr>
                                    <th><?php echo $row['invoice_id']; ?></th>
                                    <td><?php echo $row['job_id']; ?></td>
                                    <td><?php echo $row['invoice_item_total_amount']; ?></td>
                                    <td><?php echo $row['invoice_service_total_amount']; ?></td>
                                    <td><?php echo $row['invoice_amount']; ?></td>
                                    <td><?php echo $row['invoice_created_at']; ?></td>
                                </tr>
                                <?php

                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <form>

                        <div class="form-group row">
                            <label for="tot_item_amount" class="col-md-3 col-form-label">Total Daily Income from Items (Rs.): </label>
                            <div class="col-md-2">
                                <input type="text" id="tot_item_amount" name="tot_item_amount" class="form-control" readonly value="<?php echo $total_item_amount; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tot_service_amount" class="col-md-3 col-form-label">Total Daily Income from Services (Rs.): </label>
                            <div class="col-md-2">
                                <input type="text" id="tot_service_amount" name="tot_service_amount" class="form-control" readonly value="<?php echo $total_service_amount; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tot_daily_income" class="col-md-3 col-form-label">Total Daily Income (Rs.): </label>
                            <div class="col-md-2">
                                <input type="text" id="tot_daily_income" name="tot_daily_income" class="form-control" readonly value="<?php echo $total_daily_income; ?>">
                            </div>
                        </div>
                    </form>
                    <?php

                }
            }
            break;

        case "sale_supplier_list":
            if(isset($_POST['sale_sup_id']))
            {
                $sale_sup_id = $_POST['sale_sup_id'];
                $result = $reportObj->getSupplierById($sale_sup_id);
                $row = $result->fetch_assoc();
                ?>
                <div class="row">
                    <div class="col-md-2">&nbsp;</div>
                    <div class="col-md-8 display-1 text-center"><?php echo $row['Supplier Name']; ?></div>
                    <div class="col-md-2">&nbsp;</div>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th scope="col">&nbsp;</th>
                            <th scope="col">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($row as $f => $r)
                        {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $f; ?></th>
                                <td><?php echo $r; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php

            }
            break;
    }
}