<?php include '../model/customer_model.php';
$cusObj = new Customer();


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
            $cus_result = $cusObj->getCustomerById($cus_id);
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
                <div class="form-group row">
                    <label for="vehicle_no" class="col-sm-4 col-form-label">Vehicle Number</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" readonly id="vehicle_no" placeholder="Vehicle Number">
                    </div>
                </div>

                <!-- Vehicle Model -->
                <div class="form-group row">
                    <label for="vehicle_model" class="col-sm-4 col-form-label">Vehicle Model</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" readonly id="vehicle_model" placeholder="Vehicle Model">
                    </div>
                </div>

                <!-- Vehicle Make -->
                <div class="form-group row">
                    <label for="vehicle_make" class="col-sm-4 col-form-label">Vehicle Make</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" readonly id="vehicle_make" placeholder="Vehicle Make">
                    </div>
                </div>

                <!-- Vehicle Mileage -->
                <div class="form-group row">
                    <label for="vehicle_mileage" class="col-sm-4 col-form-label">Vehicle Mileage</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" readonly id="vehicle_mileage" placeholder="In Kilometers">
                    </div>
                </div>
                <hr/>
                <!-- Service Category -->
                <div class="form-group row">
                    <label for="job_service_category" class="col-sm-4 col-form-label">Service Category</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" readonly id="job_service_category" placeholder="Service Category">
                    </div>
                </div>



                <hr>

                <!-- Feedback Status    -->
                <div class="form-group row">
                    <label for="vehicle_mileage" class="col-sm-4 col-form-label">Feedback</label>
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
            }

            //Customer Home update
            if(isset($_POST["cusId"]) && isset($_POST["homeNo"])) {
                $cus_id = $_POST["cusId"];
                $home_no = $_POST["homeNo"];
                $cusObj->updateHomeNo($cus_id, $home_no);
            }

            //Customer Street update
            if(isset($_POST["cusId"]) && isset($_POST["street"])) {
                $cus_id = $_POST["cusId"];
                $street = $_POST["street"];
                $cusObj->updateStreet($cus_id, $street);
            }

            //Customer City update
            if(isset($_POST["cusId"]) && isset($_POST["city"])) {
                $cus_id = $_POST["cusId"];
                $city = $_POST["city"];
                $cusObj->updateCity($cus_id, $city);
            }

            //Customer State update
            if(isset($_POST["cusId"]) && isset($_POST["state"])) {
                $cus_id = $_POST["cusId"];
                $state = $_POST["state"];
                $cusObj->updateState($cus_id, $state);
            }

            //Customer CN1 update
            if(isset($_POST["cusId"]) && isset($_POST["cn1"])) {
                $cus_id = $_POST["cusId"];
                $cn1 = $_POST["cn1"];
                $cusObj->updateCN1($cus_id, $cn1);
            }

            //Customer CN2 update
            if(isset($_POST["cusId"]) && isset($_POST["cn2"])) {
                $cus_id = $_POST["cusId"];
                $cn2 = $_POST["cn2"];
                $cusObj->updateCN2($cus_id, $cn2);
            }

            //Customer Email update
            if(isset($_POST["cusId"]) && isset($_POST["email"])) {
                $cus_id = $_POST["cusId"];
                $email = $_POST["email"];
                $cusObj->updateEmail($cus_id, $email);
            }




            break;
    }
}