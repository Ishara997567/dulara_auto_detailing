<?php include '../model/customer_model.php';
include '../model/job_model.php';
include '../model/notification_model.php';
include '../model/notificationtype_model.php';

$cusObj = new Customer();
$jobObj = new Job();
$notificationObj = new Notification();
$notificationTypeObj = new NotificationType();

if($_REQUEST["status"])
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

                $not_message = "A new customer named <i><b>". $cus_name ."</b></i> created";
                $notificationObj->addNotification(4, $not_message);
            }
            else
            {
                $msg = base64_encode("New Customer Failed to Add!");
                ?>
                <script>window.location = "../view/customer-management.php?error_message=<?php echo $msg; ?>"</script>
                <?php

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

                <!-- Feedback Status    -->
                <div class="form-group row">
                    <label for="vehicle_odo" class="col-sm-4 col-form-label">Feedback</label>
                    <div class="col-sm-4">
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i>
                    </div>
                    <div class="col-sm-4">
                        <a href="customer-feedback-manage.php">
                            <i class="fa fa-lg fa-info-circle"></i>
                        </a>
                    </div>
                </div>



                <!-- Royalty Enrollments    -->
                <div class="form-group row">
                    <label for="loyalty" class="col-sm-4 col-form-label">Loyalty Enrollments</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" readonly id="loyalty" placeholder="Loyalty Package">
                    </div>
                    <div class="col-sm-4 mt-2">
                        <a href="customer-loyalty-manage.php">
                            <i class="fa fa-lg fa-info-circle"></i>
                        </a>
                    </div>
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

    }
}