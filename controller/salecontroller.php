<?php include '../model/sale_model.php';

$saleObj = new Sale();

if(isset($_REQUEST['status'])){
    $status = $_REQUEST['status'];

    switch($status){
        case 'add_supplier':
            $sup_name = $_POST['sup_name'];
            $sup_home_no = $_POST['sup_home_no'];
            $sup_s_name = $_POST['sup_s_name'];
            $sup_city = $_POST['sup_city'];
            $sup_state = $_POST['sup_state'];
            $sup_cn1 = $_POST['sup_cn1'];
            $sup_cn2 = $_POST['sup_cn2'];
            $sup_email = $_POST['sup_email'];
            $sup_description = $_POST['sup_description'];

            $r = $saleObj->addSupplier($sup_name, $sup_home_no, $sup_s_name, $sup_city, $sup_state, $sup_cn1, $sup_cn2, $sup_email, $sup_description);

            if($r > 0)
            {
                $msg = base64_encode("New Supplier Added Successfully!");
                ?>
                <script>window.location = "../view/sale-management.php?success_message=<?php echo $msg; ?>";</script>

                <?php

            }
            else
            {
                $msg = base64_encode("New Supplier Failed to Add!");
                ?>
                <script>window.location = "../view/sale-management.php?error_message=<?php echo $msg; ?>";</script>

                <?php
            }

            break;

        case "autofill_item_details":
            if(isset($_POST["itemName"])) {
                $item_name = $_POST["itemName"];
                $item_result = $saleObj->getItemDetailsByName($item_name);
                $data = array();
                while($r = $item_result->fetch_assoc())
                {
                    $data["item_id"] = $r["item_id"];
                    $data['price'] = $r["item_purchase_uprice"];
                }

                echo json_encode($data);
            }
            break;

        case "add_po":
            if(!($_POST["supId"] == "choose")) {
                $sup_id = $_POST["supId"];
                $itemCodeSet = $_POST["itemCodeSet"];
                $itemPriceSet = $_POST["itemPriceSet"];
                $itemQtySet = $_POST["itemQtySet"];
                $itemAmountSet = $_POST["itemAmountSet"];

                $total_po_amount = array_sum($itemAmountSet);

                $po_id = $saleObj->addPO($sup_id, $total_po_amount);

                $arr_size = sizeof($itemCodeSet);

                for($x=0; $x<$arr_size; $x++)
                {
                    $saleObj->addPOItems($itemCodeSet[$x], $itemPriceSet[$x], $itemQtySet[$x], $itemAmountSet[$x], $po_id);
                }
            }
            break;

        case "grn_fill_supplier_and_amount":
            $grn_po_id = $_POST["grnPOId"];

            $supplier_result = $saleObj->getPOSupplier($grn_po_id);

            $data = array();
            while($r = $supplier_result->fetch_assoc())
            {
                $data["sup_name"] = $r["sup_name"];
                $data["po_amount"] = $r["po_amount"];
            }
            echo json_encode($data);

            break;

        case "grn_fill_po_info":
            $grn_po_id = $_POST["grnPOId"];

            $po_result = $saleObj->grnPOItems($grn_po_id);
            $id = 1;
            while($r=$po_result->fetch_assoc())
            {
                ?>
                <tr>
                    <th scope="row"><?php echo $id; ?></th>
                    <td id="grn_item_id"><?php echo $r['poi_item_id']; ?></td>
                    <td><?php echo $r['item_name']; ?></td>
                    <td><?php echo $r['poi_item_qty']; ?></td>
                    <td><input type="text" class="form-control" name="grn_purchase_price[]" id="grn_purchase_price<?php echo $id; ?>" value="<?php echo $r['poi_item_price']; ?>"/></td>
                    <td><?php echo $r['poi_item_amount']; ?></td>
                    <td><input type="text" class="form-control" name="grn_qty[]" id="grn_qty<?php echo $id; ?>"/></td>
                    <td><input type="text" class="form-control" name="grn_amount[]" id="grn_amount<?php echo $id; ?>" readonly></td>
                </tr>
                <?php
                $id++;
            }

            break;

        case "generate_grn":

            if(!($_POST["poID"] == "choose")) {

                $grn_po_id = $_POST["poID"];
                $grn_item_id = $_POST["grnItemId"];
                $grn_purchasing_u_price = $_POST["grnPurchasingUnitPrice"];
                $grn_qty = $_POST["grnQty"];
                $grn_amount = $_POST["grnAmount"];


                $grn_total_amount = array_sum($grn_amount);

                $grn_id = $saleObj->addGRN($grn_po_id, $grn_total_amount);
                if ($grn_id > 0) {

                    $l = sizeof($grn_item_id);

                    for ($x = 0; $x < $l; $x++) {
                        $saleObj->addGRNItems($grn_item_id[$x], $grn_purchasing_u_price[$x], $grn_qty[$x], $grn_amount[$x], $grn_id);
                    }
                    echo 1;

                } else {
                    echo 0;
                }

            }
            break;


        case "po_history_date_range":

            $s_date = $_POST["startDate"];
            $e_date = $_POST["endDate"];

            $po_result_by_date = $saleObj->getPOByDateRange($s_date, $e_date);
            while($r=$po_result_by_date->fetch_assoc())
            {
                $timestamp = strtotime($r["po_created_at"]);
                $date = date("Y-m-d", $timestamp);
                ?>
                <tr>
                    <th scope="row"><?php echo $r["po_id"]; ?></th>
                    <td><?php echo $r["po_amount"]; ?></td>
                    <td><?php echo $r["sup_name"]; ?></td>
                    <td><?php echo $date; ?></td>
                    <td><a href="#modal_manage_po" data-toggle="modal" data-id="<?php echo $r["po_id"]; ?>"><i class="fa fa-lg fa-file-text-o"></i></a></td>
                </tr>

                <?php

            }


            break;

        case "manage_po_history":
            $po_id = $_POST["poId"];

            $po_result = $saleObj->getPOById($po_id);
            while($po_row = $po_result->fetch_assoc())
            {
                $timestamp = strtotime($po_row["po_created_at"]);
                $date = date("Y-m-d", $timestamp);
                ?>


                <div class="form-group row">
                    <label for="grnh_pid" class="col-form-label col-1">PO ID</label>
                    <div class="col-4">
                        <input type="text" class="form-control" name="grnh_pid" id="grnh_pid" readonly value="<?php echo $po_row["po_id"]; ?>"/>
                    </div>
                    <div class="col-1">&nbsp;</div>
                    <label for="grnh_supplier" class="col-form-label col-1">Supplier</label>
                    <div class="col-4">
                        <input type="text" class="form-control" name="grnh_supplier" id="grnh_supplier" readonly value="<?php echo $po_row["sup_name"]; ?>"/>
                    </div>
                </div>

                <div class="form-group row">

                    <label for="grnh_amount" class="col-form-label col-1">Amount</label>
                    <div class="col-4">
                        <input type="text" class="form-control" name="grnh_amount" id="grnh_amount" readonly value="<?php echo $po_row["po_amount"]; ?>"/>
                    </div>

                    <div class="col-1">&nbsp;</div>


                    <label for="grnh_date" class="col-form-label col-1">Date</label>
                    <div class="col-4">
                        <input type="text" class="form-control" name="grnh_date" id="grnh_date" readonly value="<?php echo $date; ?>"/>
                    </div>
                </div>



                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th scope="col">Item ID</th>
                            <th>Item Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php

                        $poi_result = $saleObj->getPOItemsByPOId($po_id);
                        while($poi_row=$poi_result->fetch_assoc())
                        {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $poi_row["poi_item_id"]; ?></th>
                                <td><?php echo $poi_row["item_name"]; ?></td>
                                <td><?php echo $poi_row["poi_item_price"]; ?></td>
                                <td><?php echo $poi_row["poi_item_qty"]; ?></td>
                                <td><?php echo $poi_row["poi_item_amount"]; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>



                <?php

            }

            break;




        case "grn_history_date_range":

            $s_date = $_POST["startDate"];
            $e_date = $_POST["endDate"];

            $grn_result_by_date = $saleObj->getGRNByDateRange($s_date, $e_date);
            while($r=$grn_result_by_date->fetch_assoc())
            {
                $timestamp = strtotime($r["sgrn_created_at"]);
                $date = date("Y-m-d", $timestamp);
                ?>
                <tr>
                    <th scope="row"><?php echo $r["sgrn_id"]; ?></th>
                    <td><?php echo $r["po_id"]; ?></td>
                    <td scope="row"><?php echo $r["sgrn_total_amount"]; ?></td>
                    <td><?php echo $r["po_amount"]; ?></td>
                    <td><?php echo $r["sup_name"]; ?></td>
                    <td><?php echo $date; ?></td>
                    <td><a href="#modal_manage_grn" data-toggle="modal" data-id="<?php echo $r["sgrn_id"]; ?>"><i class="fa fa-lg fa-file-text-o"></i></a></td>
                </tr>

                <?php

            }


            break;







        case "manage_grn_history":
            $grn_id = $_POST["grnId"];

            $grn_result = $saleObj->getGRNById($grn_id);
            while($grn_row = $grn_result->fetch_assoc())
            {
                $timestamp = strtotime($grn_row["sgrn_created_at"]);
                $date = date("Y-m-d", $timestamp);
                ?>


                <div class="form-group row">
                    <label for="grnh_id" class="col-form-label col-1">GRN ID</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="grnh_id" id="grnh_id" readonly value="<?php echo $grn_row["sgrn_id"]; ?>"/>
                    </div>

                    <label for="grnh_po_id" class="col-form-label col-1">PO ID</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="grnh_po_id" id="grnh_po_id" readonly value="<?php echo $grn_row["po_id"]; ?>"/>
                    </div>


                    <label for="grnh_supplier" class="col-form-label col-1">Supplier</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="grnh_supplier" id="grnh_supplier" readonly value="<?php echo $grn_row["sup_name"]; ?>"/>
                    </div>
                </div>

                <div class="form-group row">

                    <label for="grnh_amount" class="col-form-label col-1">GRN Amount</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="grnh_amount" id="grnh_amount" readonly value="<?php echo $grn_row["sgrn_total_amount"]; ?>"/>
                    </div>

                    <label for="grnh_po_amount" class="col-form-label col-1">PO Amount</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="grnh_po_amount" id="grnh_po_amount" readonly value="<?php echo $grn_row["po_amount"]; ?>"/>
                    </div>


                    <label for="grnh_date" class="col-form-label col-1">Date</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="grnh_date" id="grnh_date" readonly value="<?php echo $date; ?>"/>
                    </div>
                </div>



                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th scope="col">Item ID</th>
                            <th>Item Name</th>
                            <th>Ordered Qty</th>
                            <th>PO Unit Price</th>
                            <th>PO Item Amount</th>
                            <th>Received Quantity</th>
                            <th>GRN Unit Price</th>
                            <th>GRN Amount</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php

                        $sgi_result = $saleObj->getGRNItemsByGRNId($grn_id);
                        while($sgi_row=$sgi_result->fetch_assoc())
                        {
                            ?>
                            <tr>
                                <th scope="row"><?php echo $sgi_row["sgi_item_id"]; ?></th>
                                <td><?php echo $sgi_row["item_name"]; ?></td>
                                <td><?php echo $sgi_row["poi_item_qty"]; ?></td>
                                <td><?php echo $sgi_row["poi_item_price"]; ?></td>
                                <td><?php echo $sgi_row["poi_item_amount"]; ?></td>
                                <td><?php echo $sgi_row["sgi_qty"]; ?></td>
                                <td><?php echo $sgi_row["sgi_p_price"]; ?></td>
                                <td><?php echo $sgi_row["sgi_amount"]; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>



                <?php

            }

            break;

        case "manage_supplier":
            $sup_id = $_POST["supplierId"];

            $sup_result = $saleObj->getSupplierById($sup_id);
            while($sup_row=$sup_result->fetch_assoc())
            {
                ?>

                <div class="form-row">
                    <!-- Sup code  -->
                    <div class="form-group col-3">
                        <label for="manage_sup_code">Supplier Code</label>
                        <input type="text" class="form-control" readonly="readonly" id="manage_sup_code" name="manage_sup_code" value="<?php echo $sup_id; ?>">
                    </div>

                    <!-- Sup Name  -->
                    <div class="form-group col-6">
                        <label for="manage_sup_name">Supplier Name</label>
                        <input type="text" class="form-control" id="manage_sup_name" name="manage_sup_name" readonly value="<?php echo $sup_row["sup_name"]; ?>"/>
                    </div>

                    <div class="form-group col-3 mt-4">
                        <button type="button" class="btn btn-outline-primary mt-2" id="sup_name_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success mt-2" id="sup_name_check"><i class="fa fa-check"></i></button>
                    </div>


                </div>


                <!-- Address Rows -->
                <div class="form-row">
                    <div class="form-group col-3">
                        <label for="manage_sup_home_no">Address</label>
                        <input type="text" class="form-control" id="manage_sup_home_no" name="manage_sup_home_no" readonly value="<?php echo $sup_row["sup_address_home"]; ?>"/>
                    </div>

                    <div class="form-group col-3 mt-4">
                        <button type="button" class="btn btn-outline-primary mt-2" id="sup_add_home_no_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success mt-2" id="sup_add_home_no_check"><i class="fa fa-check"></i></button>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-3">
                        <input type="text" class="form-control" id="manage_sup_s_name" name="manage_sup_s_name" readonly value="<?php echo $sup_row["sup_address_street"]; ?>"/>
                    </div>
                    <div class="form-group col-3">
                        <button type="button" class="btn btn-outline-primary" id="sup_add_street_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="sup_add_street_check"><i class="fa fa-check"></i></button>
                    </div>
                </div>



                <div class="form-row">
                    <div class="form-group col-3">
                        <input type="text" class="form-control" id="manage_sup_city" name="manage_sup_city" readonly value="<?php echo $sup_row["sup_address_city"]; ?>"/>
                    </div>
                    <div class="form-group col-3">
                        <button type="button" class="btn btn-outline-primary" id="sup_add_city_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="sup_add_city_check"><i class="fa fa-check"></i></button>
                    </div>
                </div>



                <div class="form-row">
                    <div class="form-group col-3">
                        <input type="text" class="form-control" id="manage_sup_state" name="manage_sup_state" readonly value="<?php echo $sup_row["sup_address_state"]; ?>"/>
                    </div>
                    <div class="form-group col-3">
                        <button type="button" class="btn btn-outline-primary" id="sup_add_state_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="sup_add_state_check"><i class="fa fa-check"></i></button>
                    </div>
                </div>


                <div class="form-row">
                    <!-- contact no 1 -->
                    <div class="form-group col-4">
                        <label for="manage_sup_cn1">Contact No 1</label>
                        <input type="text" class="form-control" id="manage_sup_cn1" name="manage_sup_cn1" readonly value="<?php echo $sup_row["sup_cn1"]; ?>"/>
                    </div>


                    <div class="form-group col-2 mt-4">
                        <button type="button" class="btn btn-outline-primary mt-2" id="sup_cn1_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success mt-2" id="sup_cn1_check"><i class="fa fa-check"></i></button>
                    </div>

                    <!-- contact no 2 -->
                    <div class="form-group col-4">
                        <label for="manage_sup_cn2">Contact No 2</label>
                        <input type="text" class="form-control" id="manage_sup_cn2" name="manage_sup_cn2" readonly value="<?php echo $sup_row["sup_cn2"]; ?>"/>
                    </div>

                    <div class="form-group col-2 mt-4">
                        <button type="button" class="btn btn-outline-primary mt-2" id="sup_cn2_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success mt-2" id="sup_cn2_check"><i class="fa fa-check"></i></button>
                    </div>

                </div>

                <!--    email   -->
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="manage_sup_email">Email</label>
                        <input type="email" class="form-control" id="manage_sup_email" name="manage_sup_email" readonly value="<?php echo $sup_row["sup_email"]; ?>"/>
                    </div>

                    <div class="form-group col-3 mt-4">
                        <button type="button" class="btn btn-outline-primary mt-2" id="sup_email_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success mt-2" id="sup_email_check"><i class="fa fa-check"></i></button>
                    </div>
                </div>




                <?php
            }

            break;

        case "update_supplier":
            if(isset($_POST["manageSupId"]))
            {
                $sup_id = $_POST["manageSupId"];

                //Getting Supplier Name
                if(isset($_POST["manageSupName"]))
                {
                    $sup_name = $_POST["manageSupName"];
                    $rows_affected = $saleObj->updateSupplierName($sup_id, $sup_name);

                    if($rows_affected > 0)
                        echo 1;
                    else
                        echo 0;
                }


                //Getting Supplier Home No
                if(isset($_POST["manageSupHomeNo"]))
                {
                    $home_no = $_POST["manageSupHomeNo"];
                    $rows_affected = $saleObj->updateSupplierHomeNo($sup_id, $home_no);

                    if($rows_affected > 0)
                        echo 1;
                    else
                        echo 0;
                }

                //Getting Supplier Street
                if(isset($_POST["manageSupStreet"]))
                {
                    $street = $_POST["manageSupStreet"];
                    $rows_affected = $saleObj->updateSupplierStreet($sup_id, $street);

                    if($rows_affected > 0)
                        echo 1;
                    else
                        echo 0;
                }


                //Getting Supplier City
                if(isset($_POST["manageSupCity"]))
                {
                    $city = $_POST["manageSupCity"];
                    $rows_affected = $saleObj->updateSupplierCity($sup_id, $city);

                    if($rows_affected > 0)
                        echo 1;
                    else
                        echo 0;
                }


                //Getting Supplier State
                if(isset($_POST["manageSupState"]))
                {
                    $state = $_POST["manageSupState"];
                    $rows_affected = $saleObj->updateSupplierState($sup_id, $state);

                    if($rows_affected > 0)
                        echo 1;
                    else
                        echo 0;
                }


                //Getting Supplier CN1
                if(isset($_POST["manageSupCN1"]))
                {
                    $cn1 = $_POST["manageSupCN1"];
                    $rows_affected = $saleObj->updateSupplierCN1($sup_id, $cn1);

                    if($rows_affected > 0)
                        echo 1;
                    else
                        echo 0;
                }

                //Getting Supplier CN2
                if(isset($_POST["manageSupCN2"]))
                {
                    $cn2 = $_POST["manageSupCN2"];
                    $rows_affected = $saleObj->updateSupplierCN2($sup_id, $cn2);

                    if($rows_affected > 0)
                        echo 1;
                    else
                        echo 0;
                }

                //Getting Supplier Email
                if(isset($_POST["manageSupEmail"]))
                {
                    $email = $_POST["manageSupEmail"];
                    $rows_affected = $saleObj->updateSupplierEmail($sup_id, $email);

                    if($rows_affected > 0)
                        echo 1;
                    else
                        echo 0;
                }

            }
            break;
    }
}
