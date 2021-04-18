<?php include 'Feedback.php';
$feedbackObj = new Feedback();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DULARA AUTO DETAILING</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="style.css" rel="stylesheet">
</head>
<body>

<!-- Navigation -->

<nav class="navbar navbar-expand-md bg-light navbar-light sticky-top">
    <div class="container-fluid">
        <a href="#" class="navbar-brand"><img src="img/logo.png" alt="LOGO"></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-responsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-responsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Services</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!--- Image Slider -->
<div class="d-flex justify-content-center">
    <div id="slides" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#slides" data-slide-to="0" active></li>
            <li data-target="#slides" data-slide-to="1"></li>
            <li data-target="#slides" data-slide-to="2"></li>
            <li data-target="#slides" data-slide-to="3"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-caption align-top">
                    <h1 class="display-1">DULARA</h1>
                    <h1 class="display-3">AUTO DETAILING</h1>
                    <button type="button" class="btn btn-outline-light btn-lg">VIEW DEMO</button>
                    <button type="button" class="btn btn-primary btn-lg">Get Started</button>
                </div>
                <img src="img/background.jpg" height="560" width="1360"/>
            </div>
            <div class="carousel-item">
                <img src="img/background2.jpg" height="560" width="1360"/>
            </div>
            <div class="carousel-item">
                <img src="img/background3.jpg" height="560" width="1360"/>
            </div>
            <div class="carousel-item">
                <img src="img/logo.jpg" height="560" width="1360"/>
            </div>
        </div>
    </div>
</div>

<!--- Jumbotron -->
<div class="container-fluid">
    <div class="row jumbotron">
        <div class="col-md-9">
            <p class="lead">DULARA AUTO DETAILING is the most finest auto-mobile service center in the entire area.</p>
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-outline-secondary">Web Hosting</button>
        </div>

    </div>
</div>

<!--- Welcome Section -->
<div class="container-fluid">
    <div class="row padding text-center">
        <div class="col-12">
            <h1 class="display-4">Service with perfection</h1>
            <hr class="my-4"/>
        </div>
        <div class="col-12">
            <p class="lead">DULARA AUTO DETAILING is the most finest auto-mobile service center in the entire area.</p>
            <p class="lead">Give your feedback here...</p>
            <a href="#modal_customer_feedback" class="btn btn-success" data-target="#modal_customer_feedback" data-toggle="modal">Feedback</a>
        </div>
    </div>
</div>

<!-- Customer Feedback Modal    -->
<div class="modal fade" id="modal_customer_feedback" tabindex="-1" role="dialog" aria-labelledby="modal_customer_feedback" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_customer_feedback">Write your feedback here...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row padding mt-3 d-flex justify-content-center">
                <div class="col-sm-10 feedback_message text-center">

                </div>
            </div>
            <form action="#" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="feedback_cus_name" class="col-sm-3 col-form-label">Your Name</label>
                        <div class="col-sm-9">
                            <input type="text" id="feedback_cus_name" name="feedback_cus_name" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="feedback_cus_vno" class="col-sm-3 col-form-label">Vehicle Number</label>
                        <div class="col-sm-4">
                            <input type="text" id="feedback_cus_vno" name="feedback_cus_vno" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="feedback_invoice_no" class="col-sm-3 col-form-label">Invoice Number</label>
                        <div class="col-sm-4">
                            <input type="text" id="feedback_invoice_no" name="feedback_invoice_no" class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="feedback_star_rating" class="col-sm-3 col-form-label">Your Rating</label>
                        <div class="col-sm-9">
                            <p class="stars">
  <span>
    <a class="star-1" href="#" data-id="1">1</a>
    <a class="star-2" href="#" data-id="2">2</a>
    <a class="star-3" href="#" data-id="3">3</a>
    <a class="star-4" href="#" data-id="4">4</a>
    <a class="star-5" href="#" data-id="5">5</a>
  </span>
                            </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="feedback_message">Write what you feel about our service</label>
                        <textarea class="form-control" id="feedback_message" rows="3" name="feedback_message"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary btn-submit-feedback">Submit Feedback</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Customer Feedback Modal    -->


<!--- Meet the team -->


<!--- Cards -->


<!--- Two Column Section -->


<!--- Connect -->


<!--- Footer -->




</body>
</html>
<script src="feedback.js"></script>



