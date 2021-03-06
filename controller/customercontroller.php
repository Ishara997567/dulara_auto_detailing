<?php include '../model/customer_model.php';
include '../model/job_model.php';
include '../model/notification_model.php';
include '../model/notificationtype_model.php';

$cusObj = new Customer();
$jobObj = new Job();
$notificationObj = new Notification();
$notificationTypeObj = new NotificationType();

if(isset($_REQUEST["status"]))
{
    $status = $_REQUEST["status"];

    switch ($status)
    {
        case "check_vehicle_no":
            if(isset($_POST['vn'])) {
                $vehicle_no = $_POST['vn'];
                $r = $cusObj->selectByVehicleNo($vehicle_no);

                if ($r->num_rows !== 0)
                    echo "The Vehicle Number is Already Registered in the System!";
            }

            break;

        case "add_customer":

            $cus_name = $_POST["cus_name"];
            $cus_vehicle = strtoupper($_POST["cus_vehicle_no"]);
            $cus_add_l1 = $_POST["cus_add_l1"];
            $cus_add_l2 = $_POST["cus_add_l2"];
            $cus_add_l3 = $_POST["cus_add_l3"];
            $cus_add_l4 = $_POST["cus_add_l4"];
            $cus_cn1 = $_POST["cus_cn1"];
            $cus_cn2 = $_POST["cus_cn2"];
            $cus_email = $_POST["cus_email"];

            $cus_id = $cusObj->addCustomer($cus_name, $cus_vehicle, $cus_add_l1, $cus_add_l2, $cus_add_l3, $cus_add_l4, $cus_cn1, $cus_cn2, $cus_email);

            if($cus_id > 0)
            {
                $msg = base64_encode("New Customer Added Successfully!");
                ?>
                <script>window.location = "../view/customer-management.php?success_message=<?php echo $msg; ?>"</script>
                <?php

                $cus_point_id = $cusObj->allocateCustomerPoints($cus_id, 1);

                $not_message = "A new customer named <i><b>". $cus_name ."</b></i> created";
                $notificationObj->addNotification(4, $not_message);

                $not_message = "The new customer <i><b>". $cus_name ."</b></i> has obtained <b><i>1</i></b> points!";
                $notificationObj->addNotification(4, $not_message);
            }
            else
            {
                $msg = base64_encode("New Customer Failed to Add!");
                ?>
                <script>window.location = "../view/customer-management.php?error_message=<?php echo $msg; ?>"</script>
                <?php

            }


            if(isset($_POST['cus_referral_invoice_id']) && !empty($_POST['cus_referral_invoice_id']))
            {
                $cus_referral_invoice_id = $_POST['cus_referral_invoice_id'];
                $referrer_cus_id_result = $cusObj->getCustomerIDByInvoiceID($cus_referral_invoice_id);
                $referrer_cus_id_row = $referrer_cus_id_result->fetch_assoc();

                $referrer_cus_id = $referrer_cus_id_row['cus_id'];
                $referee_cus_id = $_POST['cus_code'];
                $description = $_POST['cus_referral_description'];

                $cus_referral_id = $cusObj->addCustomerReferral($referrer_cus_id, $referee_cus_id, $description);
                $cus_point_id = $cusObj->allocateCustomerPoints($cus_id, 2);

                $not_message = "A new customer referral <i><b>". $cus_referral_id ."</b></i> created for the referrer <b><i>".$referrer_cus_id."</i></b>";
                $notificationObj->addNotification(4, $not_message);

                $not_message = "The referrer customer <i><b>". $cus_name ."</b></i> has obtained <b><i>5</i></b> points for the referee customer <b><i>".$referee_cus_id."</i></b>";
                $notificationObj->addNotification(4, $not_message);
            }




            break;

        case "manage_customer":

            $cus_id = $_POST["cusId"];
            $cus_result = $cusObj->getAllCustomerRelatedData($cus_id);
            while($cus_row = $cus_result->fetch_assoc())
            {

                ?>
                <div class="form-row">
                    <!-- Cus code  -->
                    <div class="form-group col-2">
                        <label for="cus_code">Customer Code</label>
                        <input type="text" class="form-control" readonly id="cus_code" value="<?php echo $cus_row["cus_id"]; ?>">
                    </div>

                </div>


                <div class="form-row">
                    <!-- Cus Vehicle Number  -->
                    <div class="form-group col-2">
                        <label for="cus_vehicle_no">Vehicle Number</label>
                        <input type="text" class="form-control" readonly id="cus_vehicle_no" value="<?php echo $cus_row["cus_vehicle_no"]; ?>">
                    </div>

                    <!-- Cus Name  -->
                    <div class="form-group col-8">
                        <label for="cus_name">Customer Name</label>
                        <input type="text" class="form-control mr-2" id="cus_name" value="<?php echo $cus_row["cus_name"]; ?>" readonly>
                    </div>
                    <div class="form-group col-2">
                        <label for="">&nbsp;</label>
                        <br>
                        <button type="button" class="btn btn-outline-primary" id="btn_cus_name_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_cus_name_check"><i class="fa fa-check"></i></button>
                    </div>
                </div>







                <!-- Address Rows -->
                <div class="form-row">
                    <div class="form-group col-2">
                        <label for="home_no">Address</label>
                        <input type="text" class="form-control" id="home_no" value="<?php echo $cus_row["cus_add_l1"]; ?>" readonly>
                    </div>
                    <div class="form-group col-2">
                        <label for="">&nbsp;</label>
                        <br>
                        <button type="button" class="btn btn-outline-primary" id="btn_cus_add_home_no_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_cus_add_home_no_check"><i class="fa fa-check"></i></button>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-4">
                        <input type="text" class="form-control" id="s_name" value="<?php echo $cus_row["cus_add_l2"]; ?>" readonly>
                    </div>

                    <div class="form-group col-2">
                        <button type="button" class="btn btn-outline-primary" id="btn_cus_add_street_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_cus_add_street_check"><i class="fa fa-check"></i></button>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-3">
                        <input type="text" class="form-control" id="city" value="<?php echo $cus_row["cus_add_l3"]; ?>" readonly>
                    </div>
                    <div class="form-group col-2">
                        <button type="button" class="btn btn-outline-primary" id="btn_cus_add_city_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_cus_add_city_check"><i class="fa fa-check"></i></button>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-3">
                        <input type="text" class="form-control" id="state" value="<?php echo $cus_row["cus_add_l4"]; ?>" readonly>
                    </div>
                    <div class="form-group col-2">
                        <button type="button" class="btn btn-outline-primary" id="btn_cus_add_state_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_cus_add_state_check"><i class="fa fa-check"></i></button>
                    </div>
                </div>




                <div class="form-row">
                    <!-- contact no 1 -->
                    <div class="form-group col-4">
                        <label for="cn1">Contact No 1</label>
                        <input type="text" class="form-control" id="cn1" value="<?php echo $cus_row["cus_cn1"]; ?>" readonly>
                    </div>
                    <div class="form-group col-2">
                        <label for="">&nbsp;</label>
                        <br>
                        <button type="button" class="btn btn-outline-primary" id="btn_cus_add_cn1_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_cus_add_cn1_check"><i class="fa fa-check"></i></button>
                    </div>

                    <!-- contact no 2 -->
                    <div class="form-group col-4">
                        <label for="cn2">Contact No 2</label>
                        <input type="text" class="form-control" id="cn2" value="<?php echo $cus_row["cus_cn2"]; ?>" readonly>
                    </div>
                    <div class="form-group col-2">
                        <label for="">&nbsp;</label>
                        <br>
                        <button type="button" class="btn btn-outline-primary" id="btn_cus_add_cn2_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_cus_add_cn2_check"><i class="fa fa-check"></i></button>
                    </div>
                </div>

                <!--    email   -->
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="email">Customer Email</label>
                        <input type="email" class="form-control" id="email" value="<?php echo $cus_row["cus_email"]; ?>" readonly>
                    </div>
                    <div class="form-group col-2">
                        <label for="">&nbsp;</label>
                        <br>
                        <button type="button" class="btn btn-outline-primary" id="btn_cus_email_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_cus_email_check"><i class="fa fa-check"></i></button>
                    </div>
                </div>

                <hr>

                <!-- Vehicle and Service Details    -->

                <!-- Vehicle Make -->
                <div class="form-group row">
                    <label for="vehicle_make" class="col-sm-4 col-form-label">Vehicle Make</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" readonly id="vehicle_make" value="<?php echo $cus_row["vehicle_make_name"]; ?>">

                        <select name="select_cus_vehicle_make" id="select_cus_vehicle_make" class="form-control custom-select">
                            <?php
                            $vehicle_make_result = $jobObj->getAllVehicleMakes();
                            while($r=$vehicle_make_result->fetch_assoc())
                            {
                                ?>

                                <option value="<?php echo  $r["vehicle_make_id"]; ?>"><?php echo  $r["vehicle_make_name"]; ?></option>

                            <?php } ?>
                        </select>

                    </div>
                    <div class="col-sm-2 ml-n3">
                        <button type="button" class="btn btn-outline-primary" id="btn_cus_vehicle_make_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_cus_vehicle_make_check"><i class="fa fa-check"></i></button>
                    </div>
                </div>

                <!-- Vehicle Model -->
                <div class="form-group row">
                    <label for="vehicle_model" class="col-sm-4 col-form-label">Vehicle Model</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" readonly id="vehicle_model" value="<?php echo $cus_row["vehicle_model_name"]; ?>">

                        <div id="vehicle_model_select_box">

                        </div>

                    </div>
                    <div class="col-sm-2 ml-n3">
                        <button type="button" class="btn btn-outline-success" id="btn_cus_vehicle_model_check"><i class="fa fa-check"></i></button>
                    </div>
                </div>

                <!-- Vehicle ODO  -->
                <div class="form-group row">
                    <label for="vehicle_odo" class="col-sm-4 col-form-label">Vehicle ODO</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" readonly id="vehicle_odo" value="<?php echo $cus_row["job_vehicle_odo"]; ?>">
                    </div>
                    <div class="col-sm-2 ml-n3">
                        <button type="button" class="btn btn-outline-primary" id="btn_cus_vehicle_odo_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_cus_vehicle_odo_check"><i class="fa fa-check"></i></button>
                    </div>
                </div>

                <!-- Vehicle Mileage -->
                <div class="form-group row">
                    <label for="vehicle_odo" class="col-sm-4 col-form-label">Vehicle Mileage</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" readonly id="vehicle_mileage" value="<?php echo $cus_row["job_vehicle_mileage"]; ?>">
                    </div>
                    <div class="col-sm-2 ml-n3">
                        <button type="button" class="btn btn-outline-primary" id="btn_cus_vehicle_mileage_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_cus_vehicle_mileage_check"><i class="fa fa-check"></i></button>
                    </div>
                </div>

                <!-- Customer Service Details History   -->
                <div class="form-group row">
                    <div class="table-responsive">
                        <table class="table table-sm m-5">
                            <thead>
                            <tr>
                                <th scope="col">Service ID</th>
                                <th scope="col">Service Name</th>
                                <th scope="col">Service Category</th>
                                <th scope="col">Date</th>
                            </tr>
                            </thead>
                            <tbody>


                            <?php
                            $cus_service_result = $cusObj->getCustomerServices($cus_id);
                            while($r=$cus_service_result->fetch_assoc())
                            {
                                ?>
                                <!-- Service Category -->
                                <tr>
                                    <th scope="row"><?php echo $r["service_id"]; ?></th>
                                    <td><?php echo $r["service_name"]; ?></td>
                                    <td><?php echo $r["service_cat_name"]; ?></td>
                                    <td><?php echo $r["job_finish_time"]; ?></td>
                                </tr>



                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <?php
                $points_result = $cusObj->getSumOfPointsByCustomerID($cus_id);
                $points_r = $points_result->fetch_assoc();
                $sum_of_points = $points_r['SumOfPoints'] ?? 0;

                $loyalty_result = $cusObj->getLoyaltyProgramBySumOfPoints($sum_of_points);
                $loyalty_r = $loyalty_result->fetch_assoc();
                $loyalty = $loyalty_r['loyalty_name'] ?? "-";



                ?>

                <!-- Loyalty Points    -->
                <div class="form-group row">
                    <label for="loyalty_points" class="col-sm-4 col-form-label">Loyalty Points</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" readonly id="loyalty_points" value="<?php echo $sum_of_points; ?>">
                    </div>
                </div>


                <!-- Loyalty Enrollments    -->
                <div class="form-group row">
                    <label for="loyalty" class="col-sm-4 col-form-label">Loyalty Enrollments</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" readonly id="loyalty" value="<?php echo $loyalty; ?>">
                    </div>
                    <div class="col-sm-1">
                        <button type="button" class="btn btn-danger rounded-pill btn-reset-loyalty-points">Reset</button>
                    </div>

                    <div class="col-sm-4 text-left mt-2 div-reset-message"></div>
                </div>

                <?php
            }
            break;

        case "update_customer":

            //Customer Name update
            if(isset($_POST["cusId"]) && isset($_POST["cusName"])) {
                $cus_id = $_POST["cusId"];
                $cus_name = $_POST["cusName"];
                $cusObj->updateCusName($cus_id, $cus_name);

                $notification_message = "Customer name of <i><b>" .$cus_id. "</b></i> has been changed to <i><b>".$cus_name."</i></b>";
                $notificationObj->addNotification(4, $notification_message);
            }

            //Customer Home update
            if(isset($_POST["cusId"]) && isset($_POST["homeNo"])) {
                $cus_id = $_POST["cusId"];
                $home_no = $_POST["homeNo"];
                $cusObj->updateHomeNo($cus_id, $home_no);

                $notification_message = "Customer home address line of <i><b>" .$cus_id. "</b></i> has been changed to <i></b>".$home_no."</i></b>";
                $notificationObj->addNotification(4, $notification_message);
            }

            //Customer Street update
            if(isset($_POST["cusId"]) && isset($_POST["street"])) {
                $cus_id = $_POST["cusId"];
                $street = $_POST["street"];
                $cusObj->updateStreet($cus_id, $street);

                $notification_message = "Customer street address line of <i><b>" .$cus_id. "</b></i> has been changed to <i><b>".$street."</b></i>";
                $notificationObj->addNotification(4, $notification_message);
            }

            //Customer City update
            if(isset($_POST["cusId"]) && isset($_POST["city"])) {
                $cus_id = $_POST["cusId"];
                $city = $_POST["city"];
                $cusObj->updateCity($cus_id, $city);

                $notification_message = "Customer city address line of <i><b>" .$cus_id. "</b></i> has been changed to <i><b>".$city."</b></i>";
                $notificationObj->addNotification(4, $notification_message);
            }

            //Customer State update
            if(isset($_POST["cusId"]) && isset($_POST["state"])) {
                $cus_id = $_POST["cusId"];
                $state = $_POST["state"];
                $cusObj->updateState($cus_id, $state);

                $notification_message = "Customer state address line of <i><b>" .$cus_id. "</b></i> has been changed to <i><b>".$state."</b></i>";
                $notificationObj->addNotification(4, $notification_message);
            }

            //Customer CN1 update
            if(isset($_POST["cusId"]) && isset($_POST["cn1"])) {
                $cus_id = $_POST["cusId"];
                $cn1 = $_POST["cn1"];
                $cusObj->updateCN1($cus_id, $cn1);

                $notification_message = "Customer contact number 1 of <i><b>" .$cus_id. "</b></i> has been changed to <i><b>".$cn1."</b></i>";
                $notificationObj->addNotification(4, $notification_message);
            }

            //Customer CN2 update
            if(isset($_POST["cusId"]) && isset($_POST["cn2"])) {
                $cus_id = $_POST["cusId"];
                $cn2 = $_POST["cn2"];
                $cusObj->updateCN2($cus_id, $cn2);

                $notification_message = "Customer contact number 2 of <i><b>" .$cus_id. "</b></i> has been changed to <i><b>".$cn2."</b></i>";
                $notificationObj->addNotification(4, $notification_message);
            }

            //Customer Email update
            if(isset($_POST["cusId"]) && isset($_POST["email"])) {
                $cus_id = $_POST["cusId"];
                $email = $_POST["email"];
                $cusObj->updateEmail($cus_id, $email);

                $notification_message = "Customer email of <i><b>" .$cus_id. "</b></i> has been changed to <i><b>".$email."</b></i>";
                $notificationObj->addNotification(4, $notification_message);
            }

            //Customer Vehicle Make update
            if(isset($_POST["cusId"]) && isset($_POST["vehicleMake"])) {
                $cus_id = $_POST["cusId"];
                $vm = $_POST["vehicleMake"];
                $cusObj->updateVehicleMake($cus_id, $vm);
                $notification_message = "Customer vehicle make of <i><b>" .$cus_id. "</b></i> has been changed to <i><b>".$vm."</b></i>";
                $notificationObj->addNotification(4, $notification_message);

            }

            //Customer Vehicle Model update
            if(isset($_POST["cusId"]) && isset($_POST["vehicleModel"])) {
                $cus_id = $_POST["cusId"];
                $vm = $_POST["vehicleModel"];
                $cusObj->updateVehicleModel($cus_id, $vm);

                $notification_message = "Customer vehicle model of <i><b>" .$cus_id. "</b></i> has been changed to <i><b>".$vm."</b></i>";
                $notificationObj->addNotification(4, $notification_message);
            }

            //Customer Vehicle ODO update
            if(isset($_POST["cusId"]) && isset($_POST["vehicleODO"])) {
                $cus_id = $_POST["cusId"];
                $odo = $_POST["vehicleODO"];
                $cusObj->updateVehicleODO($cus_id, $odo);

                $notification_message = "Customer vehicle ODO of <i><b>" .$cus_id. "</b></i> has been changed to <i><b>".$odo."</b></i>";
                $notificationObj->addNotification(4, $notification_message);
            }

            //Customer Vehicle Mileage update
            if(isset($_POST["cusId"]) && isset($_POST["vehicleMileage"])) {
                $cus_id = $_POST["cusId"];
                $mileage = $_POST["vehicleMileage"];
                $cusObj->updateVehicleMileage($cus_id, $mileage);

                $notification_message = "Customer vehicle mileage of <i><b>" .$cus_id. "</b></i> has been changed to <i><b>".$mileage."</b></i>";
                $notificationObj->addNotification(4, $notification_message);
            }

            break;

        case "customer_feedback_send_message":

            //post values
            $m_heading = $_POST["m_heading"];
            $message = $_POST["message"];
            $m_type = isset($_POST["m_type"]) ? $_POST["m_type"] : "";
            $m_to_whom = isset($_POST["m_to_whom"]) ? $_POST["m_to_whom"] : "";
            $specific_customer_names = isset($_POST["specific_customer_names"]) ? $_POST["specific_customer_names"] : "";
            $when = isset($_POST["when"]) ? $_POST["when"] : "";


            foreach($m_type as $type) {
                echo $type;
            }

            foreach($m_to_whom as $whom) {
                echo $whom;
            }
            foreach($specific_customer_names as $specific_customer_nam) {
                echo $specific_customer_nam;
            }
            foreach($when as $w) {
                echo $w;
            }



            //db string values
            $m_type_s = json_encode($m_type);
            $m_to_whom_s = json_encode($m_to_whom);
            $specific_customer_names_s = json_encode($specific_customer_names);
            $when_s = json_encode($when);

            //$insert_id = $cusObj->storeCustomerMessage($m_heading,$message, $m_type_s, $m_to_whom_s, $specific_customer_names_s, $when_s);



            break;

        case "create_loyalty":

            $loyalty_name = $_POST['loyalty_name'];
            $loyalty_points = $_POST['loyalty_points'];
            $loyalty_reward = $_POST['loyalty_reward'];
            $loyalty_description = $_POST['loyalty_description'];

            $last_loyalty_id = $cusObj ->createLoyaltyProgram($loyalty_name, $loyalty_points, $loyalty_reward, $loyalty_description);

            if($last_loyalty_id > 0)
            {
                $msg = base64_encode("New Loyalty Program Created Successfully!");
                ?>
                <script>window.location = "../view/customer-loyalty-manage.php?success_message=<?php echo $msg; ?>"</script>
                <?php

                $not_message = "A new loyalty program named <i><b>". $loyalty_name ."</b></i> created";
                $notificationObj->addNotification(4, $not_message);
            }
            else
            {
                $msg = base64_encode("New Loyalty Program Failed to Create!");
                ?>
                <script>window.location = "../view/customer-loyalty-manage.php?error_message=<?php echo $msg; ?>"</script>
                <?php

            }


            break;

        case "manage_loyalty":
            $loyalty_id = $_POST['loyaltyID'];
            $loyalty_result = $cusObj->getLoyaltyByID($loyalty_id);
            while($r = $loyalty_result->fetch_assoc())
            {
                ?>
                <div class="form-row">
                    <!-- Loyalty Program ID  -->
                    <div class="form-group col-3">
                        <label for="manage_loy_code">Loyalty Program ID</label>
                        <input type="text" class="form-control" readonly="readonly" id="manage_loy_code" value="<?php echo $r['loyalty_id']; ?>">
                    </div>

                    <!-- Loyalty Program Name  -->
                    <div class="form-group col-8">
                        <label for="manage_loy_name">Loyalty Program Name</label>
                        <input type="text" class="form-control" id="manage_loy_name" value="<?php echo $r['loyalty_name']; ?>" readonly>
                    </div>

                    <div class="col-md-1 pt-2 mt-4">
                        <button type="button" class="btn btn-outline-primary" id="btn_loyalty_name_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_loyalty_name_check"><i class="fa fa-check"></i></button>
                    </div>


                </div>

                <!--    Loyalty Points and Loyalty Reward   -->
                <div class="form-row">

                    <div class="form-group col-2">
                        <label for="manage_loy_points">Loyalty Points</label>
                        <input type="email" class="form-control" id="manage_loy_points" value="<?php echo $r['loyalty_points']; ?>" readonly>
                    </div>

                    <div class="col-md-1 pt-2 mt-4">
                        <button type="button" class="btn btn-outline-primary" id="btn_loyalty_points_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_loyalty_points_check"><i class="fa fa-check"></i></button>
                    </div>

                    <div class="form-group col-8">
                        <label for="manage_loy_reward">Loyalty Reward</label>
                        <input type="text" class="form-control" id="manage_loy_reward" value="<?php echo $r['loyalty_reward']; ?>" readonly>

                    </div>

                    <div class="col-md-1 pt-2 mt-4">
                        <button type="button" class="btn btn-outline-primary" id="btn_loyalty_reward_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_loyalty_reward_check"><i class="fa fa-check"></i></button>
                    </div>

                </div>

                <?php
            }
            break;

        case "loyalty_update":
            if(isset($_POST['loyaltyID']) && isset($_POST['loyaltyName']))
            {
                $loyalty_id = $_POST["loyaltyID"];
                $loyalty_name = $_POST["loyaltyName"];
                $cusObj->updateLoyaltyName($loyalty_id, $loyalty_name);

                $notification_message = "Loyalty Program Name of <i><b>" .$loyalty_id. "</b></i> has been changed to <i><b>".$loyalty_name."</b></i>";
                $notificationObj->addNotification(4, $notification_message);
            }

            if(isset($_POST['loyaltyID']) && isset($_POST['loyaltyPoints']))
            {
                $loyalty_id = $_POST["loyaltyID"];
                $loyalty_points = $_POST["loyaltyPoints"];
                $cusObj->updateLoyaltyPoints($loyalty_id, $loyalty_points);

                $notification_message = "Loyalty Program Points of <i><b>" .$loyalty_id. "</b></i> has been changed to <i><b>".$loyalty_points."</b></i>";
                $notificationObj->addNotification(4, $notification_message);
            }

            if(isset($_POST['loyaltyID']) && isset($_POST['loyaltyReward']))
            {
                $loyalty_id = $_POST["loyaltyID"];
                $loyalty_reward = $_POST["loyaltyReward"];
                $cusObj->updateLoyaltyReward($loyalty_id, $loyalty_reward);

                $notification_message = "Loyalty Program Reward of <i><b>" .$loyalty_id. "</b></i> has been changed to <i><b>".$loyalty_reward."</b></i>";
                $notificationObj->addNotification(4, $notification_message);
            }
            break;

        case "delete_loyalty":
            if(isset($_POST['delete_loyalty_id']))
            {
                $loyalty_id = $_POST['delete_loyalty_id'];
                $num_rows_affected = $cusObj->changeLoyaltyStatus($loyalty_id);
                if($num_rows_affected > 0)
                {
                    echo "The Loyalty Program has been successfully deleted!";
                } else {
                    echo "The Loyalty Program could not be deleted!";
                }
            }
            break;

        case "create_loyalty_point_category":
            $cat_name = $_POST['loyalty_point_cat_name'];
            $points = $_POST['loyalty_points'];
            $description = $_POST['loyalty_point_description'];

            $point_id = $cusObj->addNewLoyaltyPointCategory($cat_name, $points, $description);

            if($point_id > 0)
            {
                $msg = base64_encode("New Loyalty Point Category Created Successfully!");
                ?>
                <script>window.location = "../view/customer-loyalty-manage.php?success_message=<?php echo $msg; ?>"</script>
                <?php

                $not_message = "A new loyalty point category named <i><b>". $cat_name ."</b></i> created";
                $notificationObj->addNotification(4, $not_message);
            }
            else
            {
                $msg = base64_encode("New Loyalty Point Category Failed to Create!");
                ?>
                <script>window.location = "../view/customer-loyalty-manage.php?error_message=<?php echo $msg; ?>"</script>
                <?php

            }

            break;

        case "delete_loyalty_point":
            if(isset($_POST['pointID']))
            {
                $point_id = $_POST['pointID'];
                $num_rows_affected = $cusObj->changeLoyaltyPointStatus($point_id);
                if($num_rows_affected > 0)
                {
                    echo "The Loyalty Point Category has been successfully deleted!";
                } else {
                    echo "The Loyalty Point Category could not be deleted!";
                }
            }
            break;

        case "reset_loyalty_points":
            if(isset($_POST['cusId']))
            {
                $cus_id = $_POST['cusId'];
                $affected_rows = $cusObj->resetLoyaltyPoints($cus_id);
                if($affected_rows > 0)
                    echo 1;
                else
                    echo 0;
            }
            break;

        case "change_is_like":
            if(isset($_GET['fid']))
            {
                $fid = $_GET['fid'];
                $is_like = $_GET['is_like'];

                $cusObj->changeIsLike($is_like, $fid);
            }
            break;

        case "change_reply":
            if(isset($_POST['fid']))
            {
                $fid = $_POST['fid'];
                $is_replied = $_POST['is_replied'];
                $reply = $_POST['reply'];

                $af_rows = $cusObj->replyFeedback($fid, $is_replied, $reply);

                if($af_rows > 0)
                    echo 1;
                else
                    echo 0;
            }
            break;
    }
}