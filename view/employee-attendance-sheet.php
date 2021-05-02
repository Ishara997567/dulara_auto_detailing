<?php include '../includes/header.php';
include '../model/employee_model.php';

$employeeObj = new Employee();

?>
<title>Attendnace Sheet</title>
</head>
<body>
<?php include '../includes/navbar.php'; ?>
<div class="container-fluid">
    <div class="row padding">
        <div class="col-12 display-1 jumbotron welcome">
            Employee Attendance Sheet
        </div>
    </div>


    <div class="row mt-2">&nbsp;</div>

    <div class="table-responsive">
        <table class="table table-hover table-sm tbl-attendance">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th>Emp ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>In Time</th>
                <th>Out Time</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $att_result = $employeeObj->getEmployeeAttendance();
            while($att_r = $att_result->fetch_assoc())
            {
            ?>
                <tr>
                    <th scope="row"><?php echo $att_r['att_id']; ?></th>
                    <td><?php echo $att_r['emp_id']; ?></td>
                    <td><?php echo $att_r['emp_fn']." ". $att_r['emp_ln']; ?></td>
                    <td><?php echo $att_r['att_date']; ?></td>
                    <td><?php echo $att_r['att_in_time']; ?></td>
                    <td><?php echo $att_r['att_out_time']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

</div>
<?php include '../includes/footer.php'; ?>
<script>
    $(".tbl-attendance").DataTable();
</script>

