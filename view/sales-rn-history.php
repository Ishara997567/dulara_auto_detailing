<?php include '../includes/header.php'; ?>
<title>Return Note History</title>
</head>
<body>
<?php include '../includes/navbar.php'; ?>
<div class="container-fluid">
    <div class="row padding">
        <div class="col-12 display-1 jumbotron welcome">
            Return Note History
        </div>
    </div>

    <!-- Form   -->
    <form action="#" method="post">
        <label for="">Date Range</label>
        <div class="form-row">
            <label for="from_date" class="col-form-label">From</label>
            <div class="col">
                <input type="date" id="from_date" class="form-control"/>
            </div>
            <label for="to_date" class="col-form-label">To</label>
            <div class="col">
                <input type="date" id="to_date" class="form-control"/>
            </div>
            <div class="col-1">
                <button type="submit" class="btn btn-lg mt-n2 btn-outline-primary rounded-pill">View</button>
            </div>
        </div>
    </form>

    <div class="row mt-2">&nbsp;</div>

    <div class="table-responsive">
        <table class="table table-hover table">
            <thead>
            <tr>
                <th scope="col">RN ID</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Supplier</th>
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td><a href="#"><i class="fa fa-lg fa-file-text-o"></i></a></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td><a href="#"><i class="fa fa-lg fa-file-text-o"></i></a></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
                <td><a href="#"><i class="fa fa-lg fa-file-text-o"></i></a></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<?php include '../includes/footer.php'; ?>
