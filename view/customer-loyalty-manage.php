<?php include '../includes/header.php'; ?>
<title>Customer Loyalty Management</title>
</head>
<body>
<?php include '../includes/navbar.php'; ?>
<div class="container-fluid padding">
    <div class="row padding jumbotron welcome display-4">
        <p>
        <i class="fa fa-trophy"></i>
        Customer Loyalty Management
        </p>
    </div>


    <div class="modal fade" id="modal_new_loyalty" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Loyalty Program</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post">
                        <div class="form-row">
                            <!-- Loyalty Program ID  -->
                            <div class="form-group col-3">
                                <label for="loy_code">Loyalty Program ID</label>
                                <input type="text" class="form-control" readonly="readonly" id="loy_code" placeholder="LP129CX">
                            </div>

                            <!-- Loyalty Program Name  -->
                            <div class="form-group col-9">
                                <label for="loy_name">Loyalty Program Name</label>
                                <input type="text" class="form-control" id="loy_name" placeholder="Loyalty Program Name">
                            </div>
                        </div>

                        <!-- Loyalty Program Category   -->
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="loy_cat">Loyalty Program Category</label>
                                <input type="text" class="form-control" id="loy_cat" placeholder="Loyalty Program Category">
                            </div>
                        </div>


                        <!-- Allowed Customers   -->
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="loy_allowed_customers">Allowed Customers</label>
                                <select id="loy_allowed_customers" class="form-control">
                                    <option value="c1">Customer 1</option>
                                    <option value="c2">Customer 2</option>
                                    <option value="c3">Customer 3</option>
                                    <option value="c4">Customer 4</option>
                                    <option value="c5">Customer 5</option>
                                </select>
                            </div>
                        </div>


                        <!--    Loyalty Points and Loyalty Reward   -->
                        <div class="form-row">

                            <div class="form-group col-3">
                                <label for="loy_points">Loyalty Points</label>
                                <input type="email" class="form-control" id="loy_points" placeholder="Loyalty Points" >
                            </div>

                            <div class="form-group col-9">
                                <label for="loy_reward">Loyalty Reward</label>
                                <select id="loy_reward" class="form-control">
                                    <option value="r1">Loyalty Reward 1</option>
                                    <option value="r2">Loyalty Reward 2</option>
                                    <option value="r3">Loyalty Reward 3</option>
                                    <option value="r4">Loyalty Reward 4</option>
                                    <option value="r5">Loyalty Reward 5</option>
                                </select>
                            </div>

                        </div>
                        <!-- Description    -->
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                            </div>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-outline-success">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Customer Info Manage  -->

    <div class="row padding">
        <div class="col-md-3"><button class="rounded-pill btn btn-outline-primary" data-toggle="modal" data-target="#modal_new_loyalty" type="button"><i class="fa fa-plus"></i> New Loyalty Program</button></div>
        <div class="col-md-9 justify-content-end">
            <form class="form-inline p-0" id="frm_item_search">
                <input class="rounded-pill form-control my-1 mr-sm-2 w-75" type="search" placeholder="Search . . ." aria-label="Search">
                <button class="btn btn-outline-primary rounded-pill" type="submit"><i class="fa fa-search"></i> Search</button>
            </form>
        </div>
    </div>

    <!-- Info Table -->
    <div class="row padding">
        <div class="table-responsive mt-3">
            <table class="table table-md">
                <thead>
                <tr>
                    <th scope="col">Loyalty Program ID</th>
                    <th scope="col">Loyalty Program Name</th>
                    <th scope="col">Loyalty Program Category</th>
                    <th scope="col">Allowed Customers</th>
                    <th scope="col">Loyalty Points</th>
                    <th scope="col">Loyalty Reward</th>
                    <!--                <th scope="col">Manage</th>-->
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">LP12389</th>
                    <td>Loyalty Program 1</td>
                    <td>Service Request</td>
                    <td>Registered Customers</td>
                    <td>10</td>
                    <td>50% off From Next Service</td>
                    <td><a href="#loy_info_modal" data-target="#loy_info_modal" data-toggle="modal"><i class="fa fa-file-text-o fa-lg"></i></a></td>
                </tr>
                <tr>
                    <th scope="row">LP12389</th>
                    <td>Loyalty Program 2</td>
                    <td>Customer Referral</td>
                    <td>Registered Customers</td>
                    <td>20</td>
                    <td>Free Body Wash</td>
                    <td><a href="#loy_info_modal" data-target="#loy_info_modal" data-toggle="modal"><i class="fa fa-file-text-o fa-lg"></i></a></td>
                </tr>
                <tr>
                    <th scope="row">LP12334</th>
                    <td>Loyalty Program 3</td>
                    <td>Reviews and Recommendations</td>
                    <td>Registered Customers</td>
                    <td>30</td>
                    <td>Earn 5 points</td>
                    <td><a href="#loy_info_modal" data-target="#loy_info_modal" data-toggle="modal"><i class="fa fa-file-text-o fa-lg"></i></a></td>
                </tr>
                </tbody>
            </table>
        </div>

        <!-- Each Loyalty Program Info Modal    -->

        <div class="modal fade" id="loy_info_modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">New Loyalty Program</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="post">
                            <div class="form-row">
                                <!-- Loyalty Program ID  -->
                                <div class="form-group col-3">
                                    <label for="loy_code">Loyalty Program ID</label>
                                    <input type="text" class="form-control" readonly="readonly" id="loy_code" placeholder="LP129CX">
                                </div>

                                <!-- Loyalty Program Name  -->
                                <div class="form-group col-9">
                                    <label for="loy_name">Loyalty Program Name</label>
                                    <input type="text" class="form-control" id="loy_name" placeholder="Loyalty Program Name">
                                </div>
                            </div>

                            <!-- Loyalty Program Category   -->
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="loy_cat">Loyalty Program Category</label>
                                    <input type="text" class="form-control" id="loy_cat" placeholder="Loyalty Program Category">
                                </div>
                            </div>


                            <!-- Allowed Customers   -->
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="loy_allowed_customers">Allowed Customers</label>
                                    <select id="loy_allowed_customers" class="form-control">
                                        <option value="c1">Customer 1</option>
                                        <option value="c2">Customer 2</option>
                                        <option value="c3">Customer 3</option>
                                        <option value="c4">Customer 4</option>
                                        <option value="c5">Customer 5</option>
                                    </select>
                                </div>
                            </div>


                            <!--    Loyalty Points and Loyalty Reward   -->
                            <div class="form-row">

                                <div class="form-group col-3">
                                    <label for="loy_points">Loyalty Points</label>
                                    <input type="email" class="form-control" id="loy_points" placeholder="Loyalty Points" >
                                </div>

                                <div class="form-group col-9">
                                    <label for="loy_reward">Loyalty Reward</label>
                                    <select id="loy_reward" class="form-control">
                                        <option value="r1">Loyalty Reward 1</option>
                                        <option value="r2">Loyalty Reward 2</option>
                                        <option value="r3">Loyalty Reward 3</option>
                                        <option value="r4">Loyalty Reward 4</option>
                                        <option value="r5">Loyalty Reward 5</option>
                                    </select>
                                </div>

                            </div>
                            <!-- Description    -->
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control"></textarea>
                                </div>
                            </div>


                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-success">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>



    </div>




</div>
</body>

<?php include '../includes/footer.php'; ?>

