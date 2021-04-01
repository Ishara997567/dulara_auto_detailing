<?php include '../includes/header.php';
include '../model/sale_model.php';

$saleObj = new Sale();

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
                <tr>
                    <th scope="row">1</th>
                    <td>173</td>
                    <td>Ishara Perera</td>
                    <td>10/10/2020</td>
                    <td>08:05</td>
                    <td>17:12</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
<?php include '../includes/footer.php'; ?>
<script>
    $(".tbl-attendance").DataTable();
</script>

