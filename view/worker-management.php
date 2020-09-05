<?php include '../includes/header.php'; ?>
<title>Worker Management</title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Element", "Density", { role: "style" } ],
            ["Copper", 8.94, "#b87333"],
            ["Silver", 10.49, "silver"],
            ["Gold", 19.30, "gold"],
            ["Platinum", 21.45, "color: #e5e4e2"]
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            { calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation" },
            2]);

        var options = {
            title: "Average Task Completion Rate",
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

    <!-- Top Row    -->
    <div class="row padding welcome bg-light mb-3 py-2 mr-n5">
        <!-- Module Name    -->
        <div class="col-8">
            <div class="navbar-brand ml-5"><i class="fa fa-address-card"></i>&nbsp;Worker Management</div>
        </div>

        <!-- New Worker    -->
        <div class="col-3 d-flex justify-content-end">
            <button class="rounded-pill btn btn-outline-primary" type="button" data-toggle="modal" data-target="#modal_new_worker"><i class="fa fa-plus"></i> New Worker</button>
        </div>
    </div>


    <!-- Modal for new worker   -->
    <div class="modal fade" id="modal_new_worker" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

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
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th>Worker ID</th>
                        <th>Worker Name</th>
                        <th>Job Role</th>
                        <th>Leave Day</th>
                        <th>Half Day</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">WX1234</th>
                        <td>Saman</td>
                        <td>Mechanic</td>
                        <td>Sunday</td>
                        <td>Saturday</td>
                        <td><a href="#"><i class="fa fa-file-text-o fa-lg"></i></a></td>
                    </tr>

                    <tr>
                        <th scope="row">WX1234</th>
                        <td>Saman</td>
                        <td>Mechanic</td>
                        <td>Sunday</td>
                        <td>Saturday</td>
                        <td><a href="#"><i class="fa fa-file-text-o fa-lg"></i></a></td>
                    </tr>

                    <tr>
                        <th scope="row">WX1234</th>
                        <td>Saman</td>
                        <td>Mechanic</td>
                        <td>Sunday</td>
                        <td>Saturday</td>
                        <td><a href="#"><i class="fa fa-file-text-o fa-lg"></i></a></td>
                    </tr>

                    <tr>
                        <th scope="row">WX1234</th>
                        <td>Saman</td>
                        <td>Mechanic</td>
                        <td>Sunday</td>
                        <td>Saturday</td>
                        <td><a href="#"><i class="fa fa-file-text-o fa-lg"></i></a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>

<?php include '../includes/footer.php';?>