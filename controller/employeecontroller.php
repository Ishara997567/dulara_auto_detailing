<?php include "../model/employee_model.php";
$empObj = new Employee();

if(isset($_REQUEST["status"]))
{
    $status = $_REQUEST["status"];

    switch ($status) {
        case "add_employee":
            if (isset($_POST["emp_submit"])) {
                $emp_fn = $_POST["emp_fn"];
                $emp_ln = $_POST["emp_ln"];
                $emp_dob = $_POST["emp_dob"];
                $emp_nic = $_POST["emp_nic"];
                $emp_license_type = $_POST["emp_licenseType"];
                $emp_license_no = $_POST["emp_licenseNo"];
                $emp_blood_group = $_POST["emp_bloodGroup"];
                $emp_email = $_POST["emp_email"];
                $emp_address = $_POST["emp_address"];
                $emp_epf_no = $_POST["emp_epfNo"];
                $emp_etf_no = $_POST["emp_etfNo"];
                $emp_designation = $_POST["emp_des"];
                $emp_app_date = $_POST["emp_appDate"];
                $emp_job_description = $_POST["emp_jobDescription"];

                //Getting Roster Values

                $emp_rooster_in_time = $_POST["emp_inTime"];
                $emp_rooster_out_time = $_POST["emp_outTime"];
                $emp_rooster_off_day = $_POST["emp_offDay"];
                $emp_rooster_half_day = $_POST["emp_halfDay"];

                //Getting AJAX Checkbox values for Illness Ongoing


                $emp_id = $empObj->addEmployee($emp_fn, $emp_ln, $emp_dob, $emp_nic, $emp_license_type, $emp_license_no, $emp_blood_group, $emp_email, $emp_address, $emp_epf_no, $emp_etf_no, $emp_designation, $emp_app_date, $emp_job_description);

                if ($emp_id > 0) {
                    if (isset($_POST["txt_illnessName"])) {
                        $ill_arr_size = sizeof($_POST["txt_illnessName"]);
                        for ($i = 0; $i < $ill_arr_size; $i++) {
                            $is_going = isset($_POST["check_isGoing"]) ? 1 : 0;
                            $empObj->addEmployeeIllness($_POST["txt_illnessName"][$i], $is_going, $emp_id);
                        }
                    }

                    if (isset($_POST["select_numberType"])) {
                        $num_type_arr_length = sizeof($_POST["select_numberType"]);
                        for ($j = 0; $j < $num_type_arr_length; $j++) {
                            if (isset($_POST["text_number"]))
                                $empObj->addEmployeeContact($_POST["select_numberType"][$j], $_POST["text_number"][$j], $emp_id);
                        }

                        $empObj->addEmployeeRoster($emp_rooster_in_time, $emp_rooster_out_time, $emp_rooster_off_day, $emp_rooster_half_day, $emp_id);

                        $msg = base64_encode("New Employee Created Successfully!");
                        ?>
                        <script>window.location = "../view/employee-management.php?success_message=<?php echo $msg; ?>";</script>

                        <?php
                    } else {
                        $msg = base64_encode("New Employee Failed to Create!");
                        ?>
                        <script>window.location = "../view/employee-management.php?error_message=<?php echo $msg; ?>";</script>
                        <?php
                    }
                }

            }
            break;


        case "manage_employee":
            $emp_id = $_POST["empID"];

            $emp_result = $empObj->getEmployeeByEmpID($emp_id);
            while($er=$emp_result->fetch_assoc())
            {
                ?>

                <div class="form-group row">
                    <!-- Employee ID    -->
                    <label for="manage_emp_id" class="col-2 col-form-label">Employee ID</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="manage_emp_id" id="manage_emp_id" readonly value="<?php echo $er["emp_id"]; ?>"/>
                    </div>

                    <div class="col-1">&nbsp;</div>

                    <!-- License Type    -->
                    <label for="manage_emp_license_type" class="col-2 col-form-label">License Type</label>
                    <div class="input-group col-4">
                        <input type="text" class="form-control mr-2" name="manage_emp_license_type" id="manage_emp_license_type" readonly value="<?php echo $er["emp_license_type"]; ?>"/>

                        <select name="select_manage_emp_license_type" id="select_manage_emp_license_type" class="form-control custom-select mr-2">
                            <option value="choose">Choose</option>
                            <option value="light">Light Vehicle</option>
                            <option value="heavy">Heavy Vehicle</option>
                        </select>

                        <button type="button" class="btn btn-outline-primary mr-1" id="btn_emp_license_type_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_emp_license_type_check"><i class="fa fa-check"></i></button>
                    </div>
                </div>

                <!-- Employee First Name    -->
                <div class="form-group row">
                    <label for="manage_emp_fn" class="col-2 col-form-label">First Name</label>
                    <div class="input-group col-4">
                        <input type="text" class="form-control mr-2" name="manage_emp_fn" id="manage_emp_fn" readonly value="<?php echo $er["emp_fn"]; ?>"/>

                        <button type="button" class="btn btn-outline-primary mr-1" id="btn_emp_fn_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_emp_fn_check"><i class="fa fa-check"></i></button>
                    </div>


                    <!-- License Number    -->
                    <label for="manage_emp_license_number" class="col-2 col-form-label">License Number</label>
                    <div class="input-group col-4">
                        <input type="text" class="form-control mr-1" name="manage_emp_license_number" id="manage_emp_license_number" readonly value="<?php echo $er["emp_license_no"]; ?>"/>

                        <button type="button" class="btn btn-outline-primary mr-1" id="btn_emp_license_no_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_emp_license_no_check"><i class="fa fa-check"></i></button>

                    </div>
                </div>

                <!-- Employee Last Name    -->
                <div class="form-group row">
                    <label for="manage_emp_ln" class="col-2 col-form-label">Last Name</label>
                    <div class="input-group col-4">
                        <input type="text" class="form-control mr-2" name="manage_emp_ln" id="manage_emp_ln" readonly value="<?php echo $er["emp_ln"]; ?>"/>

                        <button type="button" class="btn btn-outline-primary mr-1" id="btn_emp_ln_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_emp_ln_check"><i class="fa fa-check"></i></button>
                    </div>


                    <!-- Blood Group    -->
                    <label for="manage_emp_blood_group" class="col-2 col-form-label">Blood Group</label>
                    <div class="input-group col-4">

                        <select name="select_emp_blood_group" id="select_emp_blood_group" class="form-control custom-select mr-2">
                            <option value="choose">Choose</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="O">O</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>



                        <input type="text" class="form-control mr-2" name="manage_emp_blood_group" id="manage_emp_blood_group" readonly value="<?php echo $er["emp_blood_group"]; ?>"/>
                        <button type="button" class="btn btn-outline-primary mr-1" id="btn_emp_blood_group_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_emp_blood_group_check"><i class="fa fa-check"></i></button>
                    </div>

                </div>

                <!-- Employee DOB    -->
                <div class="form-group row">
                    <label for="manage_emp_dob" class="col-2 col-form-label">DOB</label>
                    <div class="input-group col-4">
                        <input type="date" class="form-control mr-2" name="manage_emp_dob" id="manage_emp_dob" readonly value="<?php echo $er["emp_dob"]; ?>"/>
                        <button type="button" class="btn btn-outline-primary mr-1" id="btn_emp_dob_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_emp_dob_check"><i class="fa fa-check"></i></button>

                    </div>



                    <!-- Email    -->
                    <label for="manage_emp_email" class="col-2 col-form-label">Email</label>
                    <div class="input-group col-4">
                        <input type="text" class="form-control mr-2" name="manage_emp_email" id="manage_emp_email" readonly value="<?php echo $er["emp_email"]; ?>"/>

                        <button type="button" class="btn btn-outline-primary mr-1" id="btn_emp_email_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_emp_email_check"><i class="fa fa-check"></i></button>
                    </div>

                </div>

                <!-- Employee NIC    -->
                <div class="form-group row">
                    <label for="manage_emp_nic" class="col-2 col-form-label">NIC</label>
                    <div class="input-group col-4">
                        <input type="text" class="form-control mr-2" name="manage_emp_nic" id="manage_emp_nic" readonly value="<?php echo $er["emp_nic"]; ?>"/>

                        <button type="button" class="btn btn-outline-primary mr-1" id="btn_emp_nic_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_emp_nic_check"><i class="fa fa-check"></i></button>
                    </div>



                    <!-- Address    -->
                    <label for="manage_emp_address" class="col-2 col-form-label">Address</label>
                    <div class="input-group col-4">
                        <input type="text" class="form-control mr-2" name="manage_emp_address" id="manage_emp_address" readonly value="<?php echo $er["emp_address"]; ?>"/>

                        <button type="button" class="btn btn-outline-primary mr-1" id="btn_emp_address_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_emp_address_check"><i class="fa fa-check"></i></button>
                    </div>

                </div>

                <hr>

                <div class="form-group row">
                    <!-- Illness Table  -->
                    <div class="col-6">
                        <h4>Illnesses Details</h4>
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th scope="col">Illness Name</th>
                                <th>Is Going</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            $emp_illness_result = $empObj->getEmployeeIllnessByEmpID($emp_id);

                            $i=1;

                            while($eir=$emp_illness_result->fetch_assoc())
                            {
                                $is_going = $eir["emp_illness_is_going"] == 1 ? "Yes" : "No";

                                ?>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" name="manage_emp_illness_name[]" id="manage_emp_illness_name_<?php echo $i; ?>" value="<?php echo $eir["emp_illness_name"]; ?>" readonly/>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" id="manage_emp_is_going_<?php echo $i; ?>" value="<?php echo $is_going; ?>" readonly/>
                                        <input type='checkbox' class='form-control-sm' name='manage_emp_check_is_going[]' id="manage_emp_check_is_going_<?php echo $i; ?>" />
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-outline-primary btn-sm" name="btn_emp_illness_name_pencil[]" id="btn_emp_illness_name_pencil_<?php echo $i; ?>" data-id="<?php echo $i; ?>"><i class="fa fa-pencil"></i></button>
                                        <button type="button" class="btn btn-outline-success btn-sm" name="btn_emp_illness_name_check[]" id="btn_emp_illness_name_check_<?php echo $i; ?>" data-id="<?php echo $i; ?>"><i class="fa fa-check"></i></button>
                                        <input type="hidden" id="hidden_emp_illness_id_<?php echo $i; ?>" value="<?php echo $eir["emp_illness_id"]; ?>">
                                    </td>
                                </tr>
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Contact Number Table   -->
                    <div class="col-6">
                        <h4>Contact Numbers</h4>
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th scope="col">Number Type</th>
                                <th>Number</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            $emp_contact_result = $empObj->getEmployeeContactByEmpID($emp_id);

                            $j=1;

                            while($ecr=$emp_contact_result->fetch_assoc())
                            {
                                ?>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" id="manage_emp_contact_type_<?php echo $j; ?>" value="<?php echo $ecr["emp_contact_type"]; ?>" readonly/>
                                        <select name="select_emp_contact_type[]" id="select_emp_contact_type_<?php echo $j; ?>" class="form-control custom-select-sm">
                                            <option value="Mobile">Mobile</option>
                                            <option value="Home">Home</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control form-control-sm" name="manage_emp_contact_no[]" id="manage_emp_contact_no_<?php echo $j; ?>" value="<?php echo $ecr["emp_contact_no"]; ?>" readonly/></td>
                                    <td>
                                        <button type="button" class="btn btn-outline-primary btn-sm" name="btn_emp_contact_pencil[]" id="btn_emp_contact_pencil_<?php echo $j; ?>" data-id="<?php echo $j; ?>"><i class="fa fa-pencil"></i></button>
                                        <button type="button" class="btn btn-outline-success btn-sm" name="btn_emp_contact_check[]" id="btn_emp_contact_check_<?php echo $j; ?>" data-id="<?php echo $j; ?>"><i class="fa fa-check"></i></button>
                                        <input type="hidden" id="hidden_emp_contact_id_<?php echo $j; ?>" value="<?php echo $ecr["emp_contact_id"]; ?>">
                                    </td>
                                </tr>
                                <?php $j++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <hr>



                <div class="form-group row">
                    <!-- EPF Number    -->
                    <label for="manage_emp_epf_no" class="col-2 col-form-label">EPF Number</label>
                    <div class="input-group col-4">
                        <input type="text" class="form-control mr-2" name="manage_emp_epf_no" id="manage_emp_epf_no" readonly value="<?php echo $er["emp_epf_no"]; ?>"/>

                        <button type="button" class="btn btn-outline-primary mr-1" id="btn_emp_epf_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_emp_epf_check"><i class="fa fa-check"></i></button>
                    </div>



                    <!-- ETF Number    -->
                    <label for="manage_emp_etf_no" class="col-2 col-form-label">ETF Number</label>
                    <div class="input-group col-4">
                        <input type="text" class="form-control mr-2" name="manage_emp_etf_no" id="manage_emp_etf_no" readonly value="<?php echo $er["emp_etf_no"]; ?>"/>

                        <button type="button" class="btn btn-outline-primary mr-1" id="btn_emp_etf_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_emp_etf_check"><i class="fa fa-check"></i></button>
                    </div>

                </div>


                <div class="form-group row">
                    <!-- Designation    -->
                    <label for="manage_emp_designation" class="col-2 col-form-label">Designation</label>
                    <div class="input-group col-4">
                        <input type="text" class="form-control mr-2" name="manage_emp_designation" id="manage_emp_designation" readonly value="<?php echo $er["emp_designation"]; ?>"/>

                        <button type="button" class="btn btn-outline-primary mr-1" id="btn_emp_des_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_emp_des_check"><i class="fa fa-check"></i></button>
                    </div>



                    <!-- Appointed Date    -->
                    <label for="manage_emp_app_date" class="col-2 col-form-label">Appointed Date</label>
                    <div class="input-group col-4">
                        <input type="date" class="form-control mr-2" name="manage_emp_app_date" id="manage_emp_app_date" readonly value="<?php echo $er["emp_app_date"]; ?>"/>

                        <button type="button" class="btn btn-outline-primary mr-1" id="btn_emp_app_date_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_emp_app_date_check"><i class="fa fa-check"></i></button>
                    </div>

                </div>

                <hr>
                <h4>Employee Roster</h4>

                <div class="form-group row">
                <?php
                $emp_roster_result = $empObj->getEmployeeRosterByEmpID($emp_id);
                while($err=$emp_roster_result->fetch_assoc())
                {
                    ?>
                    <!-- In Time    -->
                    <label for="manage_emp_in_time" class="col-2 col-form-label">In Time</label>
                    <div class="input-group col-4">
                        <input type="time" class="form-control mr-2" name="manage_emp_in_time" id="manage_emp_in_time" readonly value="<?php echo $err["emp_roster_in_time"]; ?>"/>

                        <button type="button" class="btn btn-outline-primary mr-1" id="btn_emp_in_time_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_emp_in_time_check"><i class="fa fa-check"></i></button>
                    </div>



                    <!-- Out Time    -->
                    <label for="manage_emp_out_time" class="col-2 col-form-label">Out Time</label>
                    <div class="input-group col-4">
                        <input type="time" class="form-control mr-2" name="manage_emp_out_time" id="manage_emp_out_time" readonly value="<?php echo $err["emp_roster_out_time"]; ?>"/>

                        <button type="button" class="btn btn-outline-primary mr-1" id="btn_emp_out_time_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_emp_out_time_check"><i class="fa fa-check"></i></button>
                    </div>



                    </div>




                    <div class="form-group row">
                    <!-- Off Day    -->
                    <label for="manage_emp_off_day" class="col-2 col-form-label">Off Day</label>
                    <div class="input-group col-4">
                        <input type="text" class="form-control mr-2" name="manage_emp_off_day" id="manage_emp_off_day" readonly value="<?php echo $err["emp_roster_off_day"]; ?>"/>


                        <select name="select_emp_off_day" id="select_emp_off_day" class="form-control custom-select mr-2">
                            <option value="Mon">Monday</option>
                            <option value="Tue">Tuesday</option>
                            <option value="Wed">Wednesday</option>
                            <option value="Thu">Thursday</option>
                            <option value="Fri">Friday</option>
                            <option value="Sat">Saturday</option>
                            <option value="Sun">Sunday</option>
                        </select>




                        <button type="button" class="btn btn-outline-primary mr-1" id="btn_emp_off_day_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_emp_off_day_check"><i class="fa fa-check"></i></button>
                    </div>



                    <!-- Half Day    -->
                    <label for="manage_emp_half_day" class="col-2 col-form-label">Half Day</label>
                    <div class="input-group col-4">
                        <input type="text" class="form-control mr-2" name="manage_emp_half_day" id="manage_emp_half_day" readonly value="<?php echo $err["emp_roster_half_day"]; ?>"/>



                        <select name="select_emp_half_day" id="select_emp_half_day" class="form-control custom-select mr-2">
                            <option value="Mon">Monday</option>
                            <option value="Tue">Tuesday</option>
                            <option value="Wed">Wednesday</option>
                            <option value="Thu">Thursday</option>
                            <option value="Fri">Friday</option>
                            <option value="Sat">Saturday</option>
                            <option value="Sun">Sunday</option>
                        </select>




                        <button type="button" class="btn btn-outline-primary mr-1" id="btn_emp_half_day_pencil"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-outline-success" id="btn_emp_half_day_check"><i class="fa fa-check"></i></button>
                    </div>
                <?php } ?>

                </div>


                <hr>

                <div class="form-group row">
                    <label for="manage_emp_job_description" class="col-2 col-form-label">Job Description</label>
                    <div class="col-6">
                        <textarea name="manage_emp_job_description" id="manage_emp_job_description" class="form-control" readonly><?php echo $er["emp_job_description"]; ?></textarea>
                    </div>
                </div>


                <?php
            }

            break;


        case "update_employee":

            if(isset($_POST["empID"])) {

                $emp_id = $_POST["empID"];

                if(isset($_POST["contactNo"])) {
                    $contact_id = $_POST["contactID"];
                    $contact_type = $_POST["contactType"];
                    $contact_no = $_POST["contactNo"];

                    $affected_rows = $empObj->updateEmployeeContactNumber($emp_id, $contact_id, $contact_type, $contact_no);

                    if($affected_rows > 0)
                        echo 1;
                    else
                        echo 0;
                }

                if(isset($_POST["isGoing"])){

                    $illness_id = $_POST["illnessID"];
                    $illness_name = $_POST["illnessName"];
                    $is_going = $_POST["isGoing"];

                    $affected_rows = $empObj->updateEmployeeIllness($emp_id,$illness_id, $illness_name, $is_going);


                    if($affected_rows > 0)
                        echo 1;
                    else
                        echo 0;
                }

                if(isset($_POST["firstName"])){
                    $fn = $_POST["firstName"];
                    $affected_rows = $empObj->updateEmployeeFirstName($emp_id, $fn);

                    if($affected_rows > 0)
                        echo 1;
                    else
                        echo 0;
                }

                if(isset($_POST["lastName"])){
                    $ln = $_POST["lastName"];

                    $affected_rows = $empObj->updateEmployeeLastName($emp_id, $ln);

                    if($affected_rows > 0)
                        echo 1;
                    else
                        echo 0;
                }

                if(isset($_POST["dob"])){
                    $dob = $_POST["dob"];

                    $affected_rows = $empObj->updateEmployeeDOB($emp_id, $dob);

                    if($affected_rows > 0)
                        echo 1;
                    else
                        echo 0;
                }

                if(isset($_POST["nic"])){
                    $nic = $_POST["nic"];

                    $affected_rows = $empObj->updateEmployeeNIC($emp_id, $nic);

                    if($affected_rows > 0)
                        echo 1;
                    else
                        echo 0;
                }

                if(isset($_POST["licenseType"])){
                    $lt = $_POST["licenseType"];

                    $affected_rows = $empObj->updateEmployeeLicenseType($emp_id, $lt);

                    if($affected_rows > 0)
                        echo 1;
                    else
                        echo 0;
                }

                if(isset($_POST["licenseNO"])){
                    $lno = $_POST["licenseNO"];

                    $affected_rows = $empObj->updateEmployeeLicenseNO($emp_id, $lno);

                    if($affected_rows > 0)
                        echo 1;
                    else
                        echo 0;
                }

                if(isset($_POST["bg"])){
                    $bg = $_POST["bg"];

                    $affected_rows = $empObj->updateEmployeeBloodGroup($emp_id, $bg);

                    if($affected_rows > 0)
                        echo 1;
                    else
                        echo 0;
                }

                if(isset($_POST["email"])){
                    $email = $_POST["email"];

                    $affected_rows = $empObj->updateEmployeeEmail($emp_id, $email);

                    if($affected_rows > 0)
                        echo 1;
                    else
                        echo 0;
                }

                if(isset($_POST["address"])){
                    $address = $_POST["address"];

                    $affected_rows = $empObj->updateEmployeeAddress($emp_id, $address);

                    if($affected_rows > 0)
                        echo 1;
                    else
                        echo 0;
                }

                if(isset($_POST["etfNo"])){
                    $etf_no = $_POST["etfNo"];

                    $affected_rows = $empObj->updateEmployeeETFNo($emp_id, $etf_no);

                    if($affected_rows > 0)
                        echo 1;
                    else
                        echo 0;
                }

                if(isset($_POST["epfNo"])){
                    $epf_no = $_POST["epfNo"];

                    $affected_rows = $empObj->updateEmployeeEPFNo($emp_id, $epf_no);

                    if($affected_rows > 0)
                        echo 1;
                    else
                        echo 0;
                }

                if(isset($_POST["designation"])){
                    $designation = $_POST["designation"];

                    $affected_rows = $empObj->updateEmployeeDesignation($emp_id, $designation);

                    if($affected_rows > 0)
                        echo 1;
                    else
                        echo 0;
                }

                if(isset($_POST["appDate"])){
                    $app_date = $_POST["appDate"];

                    $affected_rows = $empObj->updateEmployeeAppointedDate($emp_id, $app_date);

                    if($affected_rows > 0)
                        echo 1;
                    else
                        echo 0;
                }

                if(isset($_POST["inTime"])){
                    $in_time = $_POST["inTime"];

                    $affected_rows = $empObj->updateEmployeeRosterInTime($emp_id, $in_time);

                    if($affected_rows > 0)
                        echo 1;
                    else
                        echo 0;
                }

                if(isset($_POST["outTime"])){
                    $out_time = $_POST["outTime"];

                    $affected_rows = $empObj->updateEmployeeRosterOutTime($emp_id, $out_time);

                    if($affected_rows > 0)
                        echo 1;
                    else
                        echo 0;
                }

                if(isset($_POST["offDay"])){
                    $off_day = $_POST["offDay"];

                    $affected_rows = $empObj->updateEmployeeRosterOffDay($emp_id, $off_day);

                    if($affected_rows > 0)
                        echo 1;
                    else
                        echo 0;
                }

                if(isset($_POST["halfDay"])){
                    $half_day = $_POST["halfDay"];

                    $affected_rows = $empObj->updateEmployeeRosterHalfDay($emp_id, $half_day);

                    if($affected_rows > 0)
                        echo 1;
                    else
                        echo 0;
                }

            }
            break;
    }

}

