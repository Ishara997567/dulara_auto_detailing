<?php include '../includes/header.php' ?>
    <title>Inventory</title>
    </head>
    <body>

<!-- Navigation Bar -->
<?php include '../includes/navbar.php'; ?>

<!-- Page Content   -->
<div class="container-fluid">

    <!-- Cards row  -->
    <div class="row">
        <!-- Card to display today's newly bought items -->
        <div class="col-md-6">
            <div class="card text-white bg-primary mb-3 mt-3" style="max-width: 45rem;">
                <div class="card-header"><h4>Today</h4></div>
                <div class="card-body">
                    <ul class="card-text">
                        <li>Engine Oil</li>
                        <li>Seat Belt</li>
                        <li>Air Filters</li>
                        <li>Silencer</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Card to display items to be ordered soon -->
        <div class="col-md-6 bg-danger">
            <div class="card text-white bg-dark mb-3 mt-3" style="max-width: 45rem;">
                <div class="card-header"><h4>Order Soon...</h4></div>
                <div class="card-body">
                    <ul class="card-text">
                        <li>
                            Engine Oil
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 10%" aria-valuenow="10%" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </li>
                        <li>
                            Seat Belt
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15%" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </li>
                        <li>
                            Air Filters
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20%" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </li>
                        <li>
                            Silencer
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 22%" aria-valuenow="22%" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- New and Search Item -->
    <div class="row">
        <!-- New    -->
        <div class="col-md-3 d-flex justify-content-md-start">
            <button class="btn btn-outline-primary rounded-pill my-xl-1" data-toggle="modal" data-target="#modal_new_item"><i class="fa fa-plus"></i> New</button>
        </div>

        <!-- Modal new Item-->
        <div class="modal fade" id="modal_new_item" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-xl modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">New Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="post">
                            <!-- First Row  -->
                            <div class="form-row">
                                <!-- Item Code  -->
                                <div class="form-group col-2">
                                    <label for="item_code">Item Code</label>
                                    <input type="text" class="form-control" id="item_code" placeholder="Item Code">
                                </div>
                                <!-- Item Name  -->
                                <div class="form-group col-5">
                                    <label for="item_name">Item Name</label>
                                    <input type="text" class="form-control" id="item_name" placeholder="Item Name">
                                </div>
                            </div>

                            <!-- Second Row -->
                            <div class="form-row">
                                <!-- Manufacturer Code  -->
                                <div class="form-group col-2">
                                    <label for="mfd_code">Manufacturer Code</label>
                                    <input type="text" class="form-control" id="mfd_code" placeholder="Manufacturer Code">
                                </div>
                                <!-- Manufacturer Name  -->
                                <div class="form-group col-5">
                                    <label for="mfd_name">Manufacturer Name</label>
                                    <input type="text" class="form-control" id="mfd_name" placeholder="Manufacturer Name">
                                </div>
                                <!-- Supplier Dropdown  -->
                                <div class="form-group col-5">
                                    <label for="supplier">Supplier</label>
                                    <select name="supplier" id="supplier" class="form-control">
                                        <option value="">s1 - Supplier One</option>
                                        <option value="">s2 - Supplier Two</option>
                                        <option value="">s3 - Supplier Three</option>
                                        <option value="">s4 - Supplier Four</option>
                                        <option value="">s5 - Supplier Five</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Third row  -->
                            <div class="form-row">
                                <!-- Item Category Dropdown -->
                                <div class="form-group col-5">
                                    <label for="item_category">Item Category</label>
                                    <select name="item_category" id="item_category" class="form-control">
                                        <option value="">Item Category 1</option>
                                        <option value="">Item Category 2</option>
                                        <option value="">Item Category 3</option>
                                        <option value="">Item Category 4</option>
                                        <option value="">Item Category 5</option>
                                    </select>
                                </div>

                                <!-- Item Size Dropdown -->
                                <div class="form-group col-5">
                                    <label for="item_size">Item Size</label>
                                    <select name="item_size" id="item_size" class="form-control">
                                        <option value="">Item Size 1</option>
                                        <option value="">Item Size 2</option>
                                        <option value="">Item Size 3</option>
                                        <option value="">Item Size 4</option>
                                        <option value="">Item Size 5</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Fourth row -->
                            <div class="form-row">
                                <!-- Quantity   -->
                                <div class="form-group col-3">
                                    <label for="qty">Quantity</label>
                                    <input type="text" class="form-control" id="qty" placeholder="Quantity">
                                </div>

                                <!-- ROP   -->
                                <div class="form-group col-3">
                                    <label for="rop">ROP</label>
                                    <input type="text" class="form-control" id="rop" placeholder="ROP">
                                </div>

                                <!-- Order quantity   -->
                                <div class="form-group col-3">
                                    <label for="order_qty">Order Quantity</label>
                                    <input type="text" class="form-control" id="order_qty" placeholder="Order Quantity">
                                </div>

                                <!-- Lead time   -->
                                <div class="form-group col-3">
                                    <label for="lt">Lead Time</label>
                                    <input type="text" class="form-control" id="lt" placeholder="Lead Time">
                                </div>
                            </div>

                            <!-- Fifth Row  -->
                            <div class="form-row">
                                <!-- Description    -->
                                <div class="form-group col-6">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" rows="3"></textarea>
                                </div>
                            </div>

                            <!-- Sixth Row  -->
                            <div class="form-row">
                                <!-- Purchase Unit Price    -->
                                <div class="form-group col-3">
                                    <label for="p_unit_price">Purchase Unit Price Rs.</label>
                                    <input type="text" class="form-control" id="p_unit_price" placeholder="Purchase Unit Price">
                                </div>

                                <!-- Selling Unit Price    -->
                                <div class="form-group col-3">
                                    <label for="s_unit_price">Selling Unit Price Rs.</label>
                                    <input type="text" class="form-control" id="s_unit_price" placeholder="Selling Unit Price">
                                </div>

                                <!-- Discount -->
                                <div class="form-group col-3">
                                    <label for="discount">Discount</label>
                                    <input type="text" class="form-control" id="discount" placeholder="Discount">
                                </div>

                                <!-- Handling charges    -->
                                <div class="form-group col-3">
                                    <label for="handling_charges">Handling Charges Rs.</label>
                                    <input type="text" class="form-control" id="handling_charges" placeholder="Handling Charges">
                                </div>
                            </div>

                            <!-- Seventh Row  -->
                            <div class="form-row">
                                <!-- Vat Rate   -->
                                <div class="form-group col-3">
                                    <label for="vat_rte">Vat Rate</label>
                                    <input type="text" class="form-control" id="vat_rate" placeholder="Vat Rate">
                                </div>
                            </div>

                            <!-- Eight Row  -->
                            <div class="form-row">
                                <!-- Location   -->
                                <div class="form-group col-3">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" id="location" placeholder="Location">
                                </div>
                            </div>

                            <!-- Remarks  -->
                            <div class="form-row">
                                <!-- Remarks   -->
                                <div class="form-group col-6">
                                    <label for="remarks">Remarks</label>
                                    <input type="text" class="form-control" id="remarks" placeholder="Remarks">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-success">Save changes</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Search Bar -->
        <div class="col-md-9">
            <form class="form-inline" id="frm_item_search">
                <input class="rounded-pill form-control my-1 mr-sm-2 w-75" type="search" placeholder="Search . . ." aria-label="Search">
                <button class="btn btn-outline-primary rounded-pill my-xl-1" type="submit"><i class="fa fa-search"></i> Search</button>
            </form>
        </div>
    </div>

    <!-- Item Table -->
    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                <!--                <th scope="col">Manage</th>-->
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td><a href="#"><i class="fa fa-file-text-o fa-lg"></i></a></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td><a href="#"><i class="fa fa-file-text-o fa-lg"></i></a></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
                <td><a href="#"><i class="fa fa-file-text-o fa-lg"></i></a></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include '../includes/footer.php' ?>