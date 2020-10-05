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

            if(!($_POST["poID"] == "choose")){

                $grn_po_id = $_POST["poID"];
                $grn_item_id = $_POST["grnItemId"];
                $grn_purchasing_u_price = $_POST["grnPurchasingUnitPrice"];
                $grn_qty = $_POST["grnQty"];
                $grn_amount = $_POST["grnAmount"];


                $grn_total_amount = array_sum($grn_amount);

                $grn_id = $saleObj->addGRN($grn_po_id, $grn_total_amount);

                $l = sizeof($grn_item_id);

                for($x=0; $x<$l; $x++)
                {
                    $saleObj->addGRNItems($grn_item_id[$x], $grn_purchasing_u_price[$x], $grn_qty[$x], $grn_amount[$x], $grn_id);
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
                    <label for="poh_pid" class="col-form-label col-1">PO ID</label>
                    <div class="col-4">
                        <input type="text" class="form-control" name="poh_pid" id="poh_pid" readonly value="<?php echo $po_row["po_id"]; ?>"/>
                    </div>
                    <div class="col-1">&nbsp;</div>
                    <label for="poh_supplier" class="col-form-label col-1">Supplier</label>
                    <div class="col-4">
                        <input type="text" class="form-control" name="poh_supplier" id="poh_supplier" readonly value="<?php echo $po_row["sup_name"]; ?>"/>
                    </div>
                </div>

                <div class="form-group row">

                    <label for="poh_amount" class="col-form-label col-1">Amount</label>
                    <div class="col-4">
                        <input type="text" class="form-control" name="poh_amount" id="poh_amount" readonly value="<?php echo $po_row["po_amount"]; ?>"/>
                    </div>

                    <div class="col-1">&nbsp;</div>


                    <label for="poh_date" class="col-form-label col-1">Date</label>
                    <div class="col-4">
                        <input type="text" class="form-control" name="poh_date" id="poh_date" readonly value="<?php echo $date; ?>"/>
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
    }
}
