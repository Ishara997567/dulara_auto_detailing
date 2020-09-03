<?php include '../includes/header.php'; ?>
    <title>New Service</title>
    </head>
    <body>
    <!-- Navigation Bar -->
    <?php include '../includes/navbar.php'; ?>

    <!-- Content    -->
    <div class="container-fluid">
        <!-- Top Row    -->
        <div class="row padding display-3 jumbotron welcome">
            <p><i class="fa fa-plus"></i>&nbsp;Create A New Service</p>
        </div>
        <!-- Form   -->
        <form action="#" method="post">
            <!-- First Row  -->
            <div class="form-row">
                <!-- Service code  -->
                <div class="form-group col-2">
                    <label for="service_code">Service Code</label>
                    <input type="text" class="form-control" readonly="readonly" id="service_code" placeholder="Service Code">
                </div>
                <!-- Service Name  -->
                <div class="form-group col-8">
                    <label for="service_name">Service Name</label>
                    <input type="text" class="form-control" id="service_name" placeholder="Service Name">
                </div>
            </div>

            <!-- Second Row -->
            <div class="form-row">
                <!-- Category Dropdown  -->
                <div class="form-group col-5">
                    <label for="service_category">Service Category</label>
                    <select class="custom-select" name="service_category" id="service_category" class="form-control">
                        <option value="choose" selected>Choose...</option>
                        <option value="">c1 - Service Category One</option>
                        <option value="">c2 - Service Category Two</option>
                        <option value="">c3 - Service Category Three</option>
                        <option value="">c4 - Service Category Four</option>
                        <option value="">c5 - Service Category Five</option>
                    </select>
                </div>

                <!-- Sub Category Dropdown -->
                <div class="form-group col-5">
                    <label for="service_required_item_1">Service Sub Category</label>
                    <select class="custom-select" name="item_category" id="service_required_item_1" class="form-control">
                        <option value="choose" selected>Choose...</option>
                        <option value="">Service Sub Category 1</option>
                        <option value="">Service Sub Category 2</option>
                        <option value="">Service Sub Category 3</option>
                        <option value="">Service Sub Category 4</option>
                        <option value="">Service Sub Category 5</option>
                    </select>
                </div>
            </div>
            <!-- Third row  -->
            <div class="form-row">
                <!-- Service Price    -->
                <div class="form-group col-2">
                    <label for="service_price">Service Price Rs.</label>
                    <input type="text" class="form-control" id="service_price" placeholder="Service Price">
                </div>

            </div>

            <!-- Fourth row -->
            <div class="form-row">
                <!-- Service Item #1 Dropdown -->
                <div class="form-group col-5">
                    <label for="service_required_item_1">Service Required Item #1</label>
                    <select class="custom-select" name="service_required_item_1" id="service_required_item_1" class="form-control">
                        <option value="choose" selected>Choose...</option>
                        <option value="">i1 - Item 1</option>
                        <option value="">i2 - Item 2</option>
                        <option value="">i3 - Item 3</option>
                        <option value="">i4 - Item 4</option>
                        <option value="">i5 - Item 5</option>
                    </select>
                </div>

                <!-- Service Item #2 Dropdown -->
                <div class="form-group col-5">
                    <label for="service_required_item_2">Service Required Item #2</label>
                    <select class="custom-select" name="service_required_item_2" id="service_required_item_2" class="form-control">
                        <option value="choose" selected>Choose...</option>
                        <option value="">i1 - Item 1</option>
                        <option value="">i2 - Item 2</option>
                        <option value="">i3 - Item 3</option>
                        <option value="">i4 - Item 4</option>
                        <option value="">i5 - Item 5</option>
                    </select>
                </div>
            </div>

            <!-- Fifth Row  -->
            <div class="form-row">
                <!-- Service Item #3 Dropdown -->
                <div class="form-group col-5">
                    <label for="service_required_item_3">Service Required Item #3</label>
                    <select class="custom-select" name="service_required_item_3" id="service_required_item_3" class="form-control">
                        <option value="choose" selected>Choose...</option>
                        <option value="">i1 - Item 1</option>
                        <option value="">i2 - Item 2</option>
                        <option value="">i3 - Item 3</option>
                        <option value="">i4 - Item 4</option>
                        <option value="">i5 - Item 5</option>
                    </select>
                </div>

                <!-- Service Item #4 Dropdown -->
                <div class="form-group col-5">
                    <label for="service_required_item_4">Service Required Item #4</label>
                    <select class="custom-select" name="service_required_item_4" id="service_required_item_4" class="form-control">
                        <option value="choose" selected>Choose...</option>
                        <option value="">i1 - Item 1</option>
                        <option value="">i2 - Item 2</option>
                        <option value="">i3 - Item 3</option>
                        <option value="">i4 - Item 4</option>
                        <option value="">i5 - Item 5</option>
                    </select>
                </div>
            </div>

            <!-- Sixth Row  -->
            <div class="form-row">
                <!-- Service Item #5 Dropdown -->
                <div class="form-group col-5">
                    <label for="service_required_item_5">Service Required Item #5</label>
                    <select class="custom-select" name="service_required_item_5" id="service_required_item_5" class="form-control">
                        <option value="choose" selected>Choose...</option>
                        <option value="">i1 - Item 1</option>
                        <option value="">i2 - Item 2</option>
                        <option value="">i3 - Item 3</option>
                        <option value="">i4 - Item 4</option>
                        <option value="">i5 - Item 5</option>
                    </select>
                </div>

                <!-- Service Item #6 Dropdown -->
                <div class="form-group col-5">
                    <label for="service_required_item_6">Service Required Item #6</label>
                    <select class="custom-select" name="service_required_item_6" id="service_required_item_6" class="form-control">
                        <option value="choose" selected>Choose...</option>
                        <option value="">i1 - Item 1</option>
                        <option value="">i2 - Item 2</option>
                        <option value="">i3 - Item 3</option>
                        <option value="">i4 - Item 4</option>
                        <option value="">i5 - Item 5</option>
                    </select>
                </div>
            </div>

            <!-- Seventh Row  -->
            <div class="form-row">
                <!-- Remarks   -->
                <div class="form-group col-10">
                    <label for="remarks">Remarks</label>
                    <input type="text" class="form-control" id="remarks" placeholder="Remarks">
                </div>
            </div>

            <!-- Eight Row  -->
            <div class="form-row">
                <!-- Assigned Worker #1 Dropdown    -->
                <div class="form-group col-5">
                    <label for="assigned_worker_1">Assigned Worker #1</label>
                    <select class="custom-select" name="assigned_worker_1" id="assigned_worker_1" class="form-control">
                        <option value="choose" selected>Choose...</option>
                        <option value="">w1 - Worker 1</option>
                        <option value="">w2 - Worker 2</option>
                        <option value="">w3 - Worker 3</option>
                        <option value="">w4 - Worker 4</option>
                        <option value="">w5 - Worker 5</option>
                    </select>
                </div>

                <!-- Assigned Worker #2 Dropdown    -->
                <div class="form-group col-5">
                    <label for="assigned_worker_2">Assigned Worker #2</label>
                    <select class="custom-select" name="assigned_worker_2" id="assigned_worker_2" class="form-control">
                        <option value="choose" selected>Choose...</option>
                        <option value="">w1 - Worker 1</option>
                        <option value="">w2 - Worker 2</option>
                        <option value="">w3 - Worker 3</option>
                        <option value="">w4 - Worker 4</option>
                        <option value="">w5 - Worker 5</option>
                    </select>
                </div>
            </div>

            <!-- Ninth Row  -->
            <div class="form-row">
                <!-- Assigned Worker #3 Dropdown    -->
                <div class="form-group col-5">
                    <label for="assigned_worker_3">Assigned Worker #3</label>
                    <select class="custom-select" name="assigned_worker_3" id="assigned_worker_3" class="form-control">
                        <option value="choose" selected>Choose...</option>
                        <option value="">w1 - Worker 1</option>
                        <option value="">w2 - Worker 2</option>
                        <option value="">w3 - Worker 3</option>
                        <option value="">w4 - Worker 4</option>
                        <option value="">w5 - Worker 5</option>
                    </select>
                </div>

                <!-- Assigned Worker #4 Dropdown    -->
                <div class="form-group col-5">
                    <label for="assigned_worker_4">Assigned Worker #4</label>
                    <select class="custom-select" name="assigned_worker_4" id="assigned_worker_4" class="form-control">
                        <option value="choose" selected>Choose...</option>
                        <option value="">w1 - Worker 1</option>
                        <option value="">w2 - Worker 2</option>
                        <option value="">w3 - Worker 3</option>
                        <option value="">w4 - Worker 4</option>
                        <option value="">w5 - Worker 5</option>
                    </select>
                </div>
            </div>

            <!-- Tenth Row  -->
            <div class="form-row">
                <!-- Description    -->
                <div class="form-group col-5">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" rows="3"></textarea>
                </div>
            </div>

            <!-- Bottom button row  -->
            <div class="form-row mb-2">
                <div class="col-8">&nbsp;</div>
                <div class="btn-group col-2" role="group" aria-label="Page Submission">
                    <button type="button" class="form-control btn btn-outline-danger rounded-pill" id="btn_cancel"><i class="fa fa-times"></i> Cancel</button>
                    &nbsp;
                    <button type="submit" class="form-control btn btn-outline-primary rounded-pill" id="btn_add_item"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
        </form>
    </div>

<?php include '../includes/footer.php' ?>