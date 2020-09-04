<?php include '../includes/header.php'; ?>
    <title>Manage Service</title>
    </head>
    <body>
    <!-- Navigation Bar -->
    <?php include '../includes/navbar.php'; ?>

    <!-- Content    -->
    <div class="container-fluid">
        <!-- Top Row    -->
        <div class="row padding display-3 jumbotron welcome">
            <p><i class="fa fa-car"></i>&nbsp;Manage Services</p>
        </div>
        <!-- Form   -->
        <form action="#" method="post">
            <!-- First Row  -->
            <div class="form-group row">
                <!-- Service code  -->
                <label for="service_code" class="col-2 col-form-label">Service Code</label>
                <div class="col-2">
                    <input type="text" readonly class="form-control-plaintext" id="service_code" value="S000001">
                </div>
            </div>

            <!-- Second Row  -->
            <div class="form-group row">
                <!-- Service name  -->
                <label for="service_name" class="col-2 col-form-label">Service Name</label>
                <div class="input-group col-5">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="service_name" value="PHP echo Value">
                    <button type="button" class="btn btn-outline-primary" id="btn_service_name_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_service_name_check"><i class="fa fa-check"></i></button>
                </div>
            </div>

            <!-- Third Row  -->
            <div class="form-group row">
                <!-- Service category  -->
                <label for="service_category" class="col-2 col-form-label">Service Category</label>
                <div class="input-group col-5">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="service_category" value="PHP echo Value Change to dropdown">
                    <button type="button" class="btn btn-outline-primary" id="btn_service_category_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_service_category_check"><i class="fa fa-check"></i></button>
                </div>
            </div>

            <!-- Forth Row  -->
            <div class="form-group row">
                <!-- Service sub category  -->
                <label for="service_sub_category" class="col-2 col-form-label">Service Sub Category</label>
                <div class="input-group col-5">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="service_sub_category" value="PHP echo Value Change to dropdown">
                    <p class="span2">
                    <p><button type="button" class="btn btn-outline-primary" id="btn_service_sub_category_pencil"><i class="fa fa-pencil"></i></button></p>
                    <p><button type="button" class="btn btn-outline-primary" id="btn_service_sub_category_check"><i class="fa fa-check"></i></button></p>
                </div>
            </div>

            <!-- Sixth Row -->
            <div class="form-row">
                <div class="form-group col-5">
                    <label><b>Service Required Item List</b></label>
                </div>
            </div>

            <!--Seventh Row -->
            <div class="form-group row">
                <!-- Item 1 -->
                <div class="input-group col-6 mb-2">
                    <input type="text" readonly class="col-2 form-control-plaintext mr-2" value="Item Code 1">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="editable_item_1" value="PHP echo Value">
                    <button type="button" class="btn btn-outline-primary" id="btn_editable_item_1_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_editable_item_1_check"><i class="fa fa-check"></i></button>
                </div>

                <!-- Item 2 -->
                <div class="input-group col-6 mb-2">
                    <input type="text" readonly class="col-2 form-control-plaintext mr-2" value="Item Code 2">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="editable_item_2" value="PHP echo Value">
                    <button type="button" class="btn btn-outline-primary" id="btn_editable_item_2_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_editable_item_2_check"><i class="fa fa-check"></i></button>
                </div>

                <!-- Item 3 -->
                <div class="input-group col-6 mb-2">
                    <input type="text" readonly class="col-2 form-control-plaintext mr-2" value="Item Code 3">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="editable_item_3" value="PHP echo Value">
                    <button type="button" class="btn btn-outline-primary" id="btn_editable_item_3_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_editable_item_3_check"><i class="fa fa-check"></i></button>
                </div>

                <!-- Item 4 -->
                <div class="input-group col-6 mb-2">
                    <input type="text" readonly class="col-2 form-control-plaintext mr-2" value="Item Code 4">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="editable_item_4" value="PHP echo Value">
                    <button type="button" class="btn btn-outline-primary" id="btn_editable_item_4_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_editable_item_4_check"><i class="fa fa-check"></i></button>
                </div>

                <!-- Item 5 -->
                <div class="input-group col-6 mb-2">
                    <input type="text" readonly class="col-2 form-control-plaintext mr-2" value="Item Code 5">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="editable_item_5" value="PHP echo Value">
                    <button type="button" class="btn btn-outline-primary" id="btn_editable_item_5_pencil"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-outline-primary" id="btn_editable_item_5_check"><i class="fa fa-check"></i></button>
                </div>

                <!-- Item 6 -->
                <div class="input-group col-6 mb-2">
                    <input type="text" readonly class="col-2 form-control-plaintext mr-2" value="Item Code 6">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="editable_item_6" value="PHP echo Value">
                    <button type="button" class="btn btn-outline-primary" id="btn_editable_item_6_pencil"> <i class="fa fa-pencil"></i> </button>
                    <button type="button" class="btn btn-outline-primary" id="btn_editable_item_6_check"><i class="fa fa-check"></i></button>
                </div>
            </div>

            <!-- Eight Row -->
            <div class="form-row">
                <div class="form-group col-5">
                    <label><b>Worker Assignment List</b></label>
                </div>
            </div>

            <!--Ninth Row -->
            <div class="form-group row">
                <!-- Worker 1 -->
                <div class="input-group col-6 mb-2">
                    <input type="text" readonly class="col-2 form-control-plaintext mr-2" value="Worker Code 1">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="editable_worker_1" value="PHP echo Value">
                    <button type="button" class="btn btn-outline-primary" id="btn_editable_worker_1_pencil"> <i class="fa fa-pencil"></i> </button>
                    <button type="button" class="btn btn-outline-primary" id="btn_editable_worker_1_check"><i class="fa fa-check"></i></button>
                </div>

                <!-- Worker 2 -->
                <div class="input-group col-6 mb-2">
                    <input type="text" readonly class="col-2 form-control-plaintext mr-2" value="Worker Code 2">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="editable_worker_2" value="PHP echo Value">
                    <button type="button" class="btn btn-outline-primary" id="btn_editable_worker_2_pencil"> <i class="fa fa-pencil"></i> </button>
                    <button type="button" class="btn btn-outline-primary" id="btn_editable_worker_2_check"><i class="fa fa-check"></i></button>
                </div>

                <!-- Worker 3 -->
                <div class="input-group col-6 mb-2">
                    <input type="text" readonly class="col-2 form-control-plaintext mr-2" value="Worker Code 3">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="editable_worker_1" value="PHP echo Value">
                    <button type="button" class="btn btn-outline-primary" id="btn_editable_worker_3_pencil"> <i class="fa fa-pencil"></i> </button>
                    <button type="button" class="btn btn-outline-primary" id="btn_editable_worker_3_check"><i class="fa fa-check"></i></button>
                </div>

                <!-- Worker 4 -->
                <div class="input-group col-6 mb-2">
                    <input type="text" readonly class="col-2 form-control-plaintext mr-2" value="Worker Code 4">
                    <input type="text" readonly class="form-control-plaintext mr-2" id="editable_worker_4" value="PHP echo Value">
                    <button type="button" class="btn btn-outline-primary" id="btn_editable_worker_4_pencil"> <i class="fa fa-pencil"></i> </button>
                    <button type="button" class="btn btn-outline-primary" id="btn_editable_worker_4_check"><i class="fa fa-check"></i></button>
                </div>
            </div>

            <!-- Bottom button row  -->
            <div class="form-row mb-3">
                <div class="col-8">&nbsp;</div>
                <div class="btn-group col-2" role="group" aria-label="Page Submission">
                    <button type="submit" class="form-control btn btn-outline-success" id="btn_add_item"><i class="fa fa-refresh"></i> Update</button>
                    &nbsp;
                    <button type="button" class="form-control btn btn-outline-danger" id="btn_cancel"><i class="fa fa-times"></i> Cancel</button>
                </div>
            </div>

        </form>
    </div>


    <script>
        function changeButtonPencilToCheck() {
            document.getElementById("btn_service_name_pencil").style.visibility = 'hidden';
            document.getElementById("btn_service_name_check").style.visibility = 'visible';
        }

        function changeButtonCheckToPencil(){
            document.getElementById('btn_service_name_check').style.visibility = 'hidden';
            document.getElementById('btn_service_name_pencil').style.visibility = 'visible';
        }
    </script>
    </body>
<?php include '../includes/footer.php' ?>