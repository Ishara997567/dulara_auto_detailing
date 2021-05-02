<?php include '../includes/header.php';
include "../model/employee_model.php";

$empObj = new Employee();

?>
<title>Employee Management</title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Name", "No of Days", { role: "style" } ],
            <?php
            $result = $empObj->getEmployeeAttendanceKPI();
            $count = 0;
            while($r = $result->fetch_assoc())
            {
                $color = $count % 2 == 0 ? "#b87333" : "gold"
            ?>
            ["<?php echo $r['name']; ?>", <?php echo $r['DayCount']; ?>, "<?php echo $color; ?>"],
            <?php $count++; } ?>
            // ["Silver", 10.49, "silver"],
            // ["Gold", 19.30, "gold"],
            // ["Platinum", 21.45, "color: #e5e4e2"]
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            { calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation" },
            2]);

        var options = {
            title: "Attendance in <?php echo date("Y"); ?>",
            width: 600,
            height: 400,
            bar: {groupWidth: "95%"},
            legend: { position: "none" },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
    }
</script>
</head>
<body>
<!-- Navigation Bar -->
<?php include '../includes/navbar.php'; ?>

<!-- Content    -->
<div class="container-fluid">

    <!-- Nav bar for Employee Management    -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="navbar-brand"><i class="fa fa-address-card"></i> Employee Management</div>

        <div class="collapse navbar-collapse">
            <!-- Employee Attendance Nav Link   -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Attendance</a>
                    <div class="dropdown-menu">
                        <a href="#modal_new_attendance" data-toggle="modal" data-target="#modal_new_attendance" class="dropdown-item"><i class="fa fa-plus"></i> New Attendance</a>
                        <a href="employee-attendance-sheet.php" class="dropdown-item"><i class="fa fa-file-text-o"></i> Attendance Sheet</a>
                    </div>
                </li>
            </ul>
        </div>

        <div class="col-3 d-flex justify-content-end mr-n3">
            <button class="rounded-pill btn btn-outline-primary" type="button" data-toggle="modal" data-target="#modal_new_worker"><i class="fa fa-plus"></i> New Worker</button>
        </div>

    </nav>


    <!-- Modal for new attendance   -->
    <div class="modal fade" role="dialog" tabindex="-1" id="modal_new_attendance" aria-labelledby="modal_new_attendance" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">New Attendance</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="../controller/employeecontroller.php?status=add_attendance" method="post" enctype="multipart/form-data">

                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="new_attendance_date" class="col-form-label col-sm-4">Attendance Date</label>
                            <div class="col-sm-8">
                                <input type="date" id="new_attendance_date" name="new_attendance_date" class="form-control" value="<?php echo date("Y-m-d", strtotime("-1 days")); ?>"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="new_attendance_file" class="col-form-label col-sm-4">Upload File</label>
                            <div class="col-sm-8">
                                <input type="file" id="new_attendance_file" name="new_attendance_file" class="form-control">
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- End of Modal for new attendance   -->


    <!--End of Nav bar for Employee Management    -->

    <!-- Modal for new worker   -->
    <div class="modal fade" id="modal_new_worker" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">New Worker</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="../controller/employeecontroller.php?status=add_employee" method="post" id="frm_add_employee">
                    <div class="modal-body">


                        <div class="row padding d-flex justify-content-center">
                            <div class="col-6 text-center" id="employee_validation">

                            </div>
                        </div>


                        <div class="form-row">
                            <!-- First name -->
                            <div class="form-group col-6">
                                <label for="emp_fn">First Name</label>
                                <input type="text" class="form-control" name="emp_fn" id="emp_fn" placeholder="Enter First Name"/>
                            </div>

                            <!-- Last name -->
                            <div class="form-group col-6">
                                <label for="emp_ln">Last Name</label>
                                <input type="text" class="form-control" name="emp_ln" id="emp_ln" placeholder="Enter Last Name"/>
                            </div>
                        </div>


                        <div class="form-row">
                            <!-- DOB -->
                            <div class="form-group col-6">
                                <label for="emp_dob">DOB</label>
                                <input type="date" class="form-control" name="emp_dob" id="emp_dob" placeholder="EnterDate of Birth"/>
                            </div>

                            <!-- NIC -->
                            <div class="form-group col-6">
                                <label for="emp_nic">NIC</label>
                                <input type="text" class="form-control" name="emp_nic" id="emp_nic" placeholder="Enter National Identity Card"/>
                            </div>
                        </div>


                        <div class="form-row">
                            <!-- License type -->
                            <div class="form-group col-6">
                                <label for="emp_licenseType">License Type</label>
                                <select name="emp_licenseType" id="emp_licenseType" class="form-control custom-select">
                                    <option value="choose">Choose</option>
                                    <option value="light">Light Vehicle</option>
                                    <option value="heavy">Heavy Vehicle</option>
                                </select>
                            </div>

                            <!-- License Number -->
                            <div class="form-group col-6">
                                <label for="emp_licenseNo">License Number</label>
                                <input type="text" class="form-control" name="emp_licenseNo" id="emp_licenseNo" placeholder="Enter Driving License Number"/>
                            </div>
                        </div>


                        <div class="form-row">
                            <!-- Blood Group -->
                            <div class="form-group col-6">
                                <label for="emp_bloodGroup">Blood Group</label>
                                <select name="emp_bloodGroup" id="emp_bloodGroup" class="form-control custom-select">
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
                            </div>

                            <!-- Email -->
                            <div class="form-group col-6">
                                <label for="emp_email">Email</label>
                                <input type="text" class="form-control" name="emp_email" id="emp_email" placeholder="Enter Email Address"/>
                            </div>
                        </div>

                        <!-- Address    -->
                        <div class="form-row">
                            <div class="form-group col-8">
                                <label for="emp_address">Permanent Resident</label>
                                <input type="text" id="emp_address" name="emp_address" class="form-control" placeholder="Enter Permanent Address">
                            </div>
                        </div>


                        <div class="form-row">
                            <!-- Table Known Illnesses  -->

                            <div class="form-group col-6 table-responsive">
                                <h4 class="card-title">Known Illnesses <button type="button" class="btn btn-primary" id="btn_illness"><i class="fa fa-plus"></i></button></h4>
                                <table class="table table-sm">
                                    <thead>
                                    <tr>
                                        <th scope="row">Illness Name</th>
                                        <th>Is Going</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    </thead>

                                    <tbody id="tbody_illness"></tbody>
                                </table>
                            </div>

                            <!-- Table Contact Numbers  -->

                            <div class="form-group col-6 table-responsive">
                                <h4 class="card-title">Contact Numbers <button type="button" class="btn btn-primary" id="btn_addContactNo"><i class="fa fa-plus"></i></button></h4>
                                <table class="table table-sm">
                                    <thead>
                                    <tr>
                                        <th scope="row">Number Type</th>
                                        <th>Number</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    </thead>

                                    <tbody id="tbody_contactNumbers"></tbody>
                                </table>
                            </div>
                        </div>

                        <hr>

                        <div class="form-row">
                            <!-- EPF Number-->
                            <div class="form-group col-6">
                                <label for="emp_epfNo">EPF Number</label>
                                <input type="text" class="form-control" name="emp_epfNo" id="emp_epfNo" placeholder="Enter EPF Number"/>
                            </div>

                            <!-- ETF Number -->
                            <div class="form-group col-6">
                                <label for="emp_etfNo">ETF Number</label>
                                <input type="text" class="form-control" name="emp_etfNo" id="emp_etfNo" placeholder="Enter ETF Number"/>
                            </div>
                        </div>

                        <div class="form-row">
                            <!-- Designation -->
                            <div class="form-group col-6">
                                <label for="emp_des">Designation</label>
                                <input type="text" class="form-control" name="emp_des" id="emp_des" placeholder="Enter the Designation"/>
                            </div>

                            <!-- Appointed Date -->
                            <div class="form-group col-6">
                                <label for="emp_appDate">Appointed Date</label>
                                <input type="date" class="form-control" name="emp_appDate" id="emp_appDate" value="<?php echo date("Y-m-d"); ?>"/>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-6 table-responsive">
                                <h4 class="card-title">Employee Roster</h4>
                                <!-- Table In Out  -->
                                <table class="table table-sm">
                                    <thead>
                                    <tr>
                                        <th scope="row">In Time</th>
                                        <th>Out Time</th>
                                    </tr>
                                    </thead>

                                    <tbody id="tbody_inOut">
                                    <tr>
                                        <td><input type="time" class="form-control" name="emp_inTime" id="emp_inTime" value="08:00:00"/></td>
                                        <td><input type="time" class="form-control" name="emp_outTime" id="emp_outTime" value="18:00:00"/></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>



                            <!-- Table Leave Half  -->
                            <div class="form-group col-6 table-responsive">
                                <h4 class="card-title">&nbsp;</h4>
                                <table class="table table-sm">
                                    <thead>
                                    <tr>
                                        <th scope="row">Off Day</th>
                                        <th>Half Day</th>
                                    </tr>
                                    </thead>

                                    <tbody id="tbody_leaveDays">
                                    <tr>
                                        <td>
                                            <select name="emp_offDay" id="emp_offDay" class="form-control custom-select">
                                                <option value="Mon">Monday</option>
                                                <option value="Tue">Tuesday</option>
                                                <option value="Wed">Wednesday</option>
                                                <option value="Thu">Thursday</option>
                                                <option value="Fri">Friday</option>
                                                <option value="Sat">Saturday</option>
                                                <option value="Sun">Sunday</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="emp_halfDay" id="emp_halfDay" class="form-control custom-select">
                                                <option value="Mon">Monday</option>
                                                <option value="Tue">Tuesday</option>
                                                <option value="Wed">Wednesday</option>
                                                <option value="Thu">Thursday</option>
                                                <option value="Fri">Friday</option>
                                                <option value="Sat">Saturday</option>
                                                <option value="Sun">Sunday</option>
                                            </select>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col-8">
                                <label for="emp_jobDescription">Job Description</label>
                                <textarea name="emp_jobDescription" id="emp_jobDescription" class="form-control"></textarea>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="emp_submit" id="emp_submit">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Success Message From the Controller    -->
    <?php
    if(isset($_GET['success_message']))
    {
        ?>

        <div class="row padding d-flex justify-content-center">
            <div class="col-11 display-4 text-center alert alert-success">
                <?php
                echo base64_decode($_GET['success_message']);

                ?>
            </div>
        </div>

    <?php  } ?>
    <!-- End of Success Message From the Controller    -->


    <!-- Error Message From the Controller  -->
    <?php
    if(isset($_GET["error_message"]))
    {
        ?>
        <div class="row padding d-flex justify-content-center">
            <div class="col-11 display-4 text-center alert alert-danger">

                <?php
                echo base64_decode($_GET['error_message']);
                ?>
            </div>
        </div>

    <?php  } ?>

    <!-- End of Error Message From the Controller  -->






    <!-- First Row Cards    -->
    <div class="row my-2">
        <!-- Card for Currently Engaged Workers   -->
        <div class="col-6">
            <div class="card">
                <h5 class="card-header">
                    Currently Engaged Workers
                </h5>
                <div class="card-body">
                    <!-- First two engaged workers  -->
                    <div class="row">
                        <div class="col-6">
                            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                                <h5 class="card-header">Saman Kumara</h5>
                                <div class="card-body">
                                    <h5 class="card-title">Job ID: <?php echo "JX3456"; ?></h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card bg-light mb-3" style="max-width: 18rem;">
                                <h5 class="card-header">Asitha Sandun</h5>
                                <div class="card-body">
                                    <h5 class="card-title">Dark card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Second two engaged workers  -->
                    <div class="row">
                        <div class="col-6">
                            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                <h5 class="card-header">Thilak Perera</h5>
                                <div class="card-body">
                                    <h5 class="card-title">Dark card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                <h5 class="card-header">Sunil Raj</h5>
                                <div class="card-body">
                                    <h5 class="card-title">Dark card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card for Worker KPI   -->
        <div class="col-6">
            <div class="card">
                <h5 class="card-header">
                    KPI
                </h5>
                <div class="card-body">
                    <div id="columnchart_values" style="width: 900px; height: 430px;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Second Row for Roster for Worker Card    -->
    <div class="card">
        <h5 class="card-header">Roster for Workers</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-hover table-employee">
                    <thead>
                    <tr>
                        <th>Worker ID</th>
                        <th>Worker Name</th>
                        <th>Job Role</th>
                        <th>Off Day</th>
                        <th>Half Day</th>
                        <th>In Time</th>
                        <th>Out Time</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $emp_result = $empObj->getEmployeeRoster();
                    while($er=$emp_result->fetch_assoc())
                    {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $er["emp_id"]; ?></th>
                            <td><?php echo $er["emp_fn"]." ".$er["emp_ln"]; ?></td>
                            <td><?php echo $er["emp_designation"]; ?></td>
                            <td><?php echo $er["emp_roster_off_day"]; ?></td>
                            <td><?php echo $er["emp_roster_half_day"]; ?></td>
                            <td><?php echo $er["emp_roster_in_time"]; ?></td>
                            <td><?php echo $er["emp_roster_out_time"]; ?></td>
                            <td><a href="#modal_manage_employee" data-toggle="modal" data-id="<?php echo $er["emp_id"]; ?>"><i class="fa fa-file-text-o fa-lg"></i></a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Manage Employee Modal  -->
    <div class="modal fade" id="modal_manage_employee" role="dialog" tabindex="1" aria-labelledby="modal_manage_employee" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Manage Employee Details</h3>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="post">
                    <div class="row padding d-flex justify-content-center mt-2">
                        <div class="col-6 text-center" id="manage_employee_message">

                        </div>
                    </div>
                    <div class="modal-body employee-manage-content">


                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save Changes</button>
                    </div>


                </form>
            </div>
        </div>
    </div>





    <!-- End of Manage Employee Modal  -->



    <!-- Modal for New Payroll  -->


    <div class="modal fade" role="dialog" tabindex="-1" id="modal_new_payroll" aria-labelledby="modal_new_payroll" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">New Payroll</h3>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="post">
                    <div class="modal-body">
                        <div class="form-group row">
                            <!-- Employee ID    -->
                            <label for="payroll_emp_id" class="col-2 col-form-label">Employee ID</label>
                            <div class="col-3">
                                <input type="text" class="form-control" name="payroll_emp_id" id="payroll_emp_id"
                                       readonly/>
                            </div>

                            <div class="col-2">&nbsp;</div>

                            <!-- Designation    -->
                            <label for="payroll_emp_designation" class="col-2 col-form-label">Designation</label>
                            <div class="col-3">
                                <input type="text" class="form-control" name="payroll_emp_designation" id="payroll_emp_designation" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- Employee Name    -->
                            <label for="payroll_emp_name" class="col-2 col-form-label">Employee Name</label>
                            <div class="col-3">
                                <input type="text" class="form-control" name="payroll_emp_name" id="payroll_emp_name" readonly/>
                            </div>


                            <div class="col-2">&nbsp;</div>


                            <!-- EPF Number    -->
                            <label for="payroll_emp_epf_no" class="col-2 col-form-label">EPF Number</label>
                            <div class="col-3">
                                <input type="text" class="form-control" name="payroll_emp_epf_no" id="payroll_emp_epf_no" readonly/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-7">&nbsp;</div>

                            <!--ETF Number-->
                            <label for="payroll_emp_etf_no" class="col-2 col-form-label">ETF Number</label>
                            <div class="col-3">
                                <input type="text" class="form-control" name="payroll_emp_etf_no" id="payroll_emp_etf_no" readonly />
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <!-- End of Modal for New Payroll  -->





</div>
</body>

<?php include '../includes/footer.php';?>
<script src="../assets/js/employee_add.js"></script>
<script src="../assets/js/employee_validation.js"></script>
<script src="../assets/js/employee_manage.js"></script>
<script>
    $(".table-employee").DataTable();
</script>
