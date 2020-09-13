<?php include '../model/service_model.php';

$serviceObj = new Service();

$status = $_REQUEST["status"];

switch($status)
{
    case "create_category":

        $cat_name = ucwords($_POST["cat_name"]);
        $cat_description = $_POST["cat_description"];


        $last_cat_id = $serviceObj->createCategory($cat_name, $cat_description);

        if($last_cat_id > 0)
        {
            $message = base64_encode("New Category Created Successfully!");

            ?>
            <script>window.location = "../view/service-management.php?success_message=<?php echo $message; ?>"</script>
            <?php
        }

        else{
            $message = base64_encode("The Category Failed to Create!");
            ?>
            <script>window.location = "../view/service-management.php?error_message=<?php echo $message; ?>"</script>
            <?php
        }

        break;





    case "create_sub_category" :

        $sub_cat_name = ucwords($_POST["sub_cat_name"]);
        $sub_cat_cat_id = $_POST["select_sub_cat"];
        $sub_cat_description = $_POST["sub_cat_description"];

        $last_sub_cat_id = $serviceObj->createSubCategory($sub_cat_name, $sub_cat_cat_id, $sub_cat_description);

        if($last_sub_cat_id > 0)
        {
            $message = base64_encode("New Sub Category Created Successfully!");

            ?>
            <script>window.location = "../view/service-management.php?success_message=<?php echo $message; ?>"</script>
            <?php
        }

        else{
            $message = base64_encode("New Sub Category Failed to Created!");
            ?>
            <script>window.location = "../view/service-management.php?error_message=<?php echo $message; ?>"</script>
            <?php
        }


        break;




    case "create_service":
        $service_name = ucwords($_POST["service_name"]);
        $service_price = $_POST["service_price"];

        $service_ri1 = $_POST["service_ri1"];
        $service_ri2 = $_POST["service_ri2"];
        $service_ri3 = $_POST["service_ri3"];
        $service_ri4 = $_POST["service_ri4"];
        $service_ri5 = $_POST["service_ri5"];
        $service_ri6 = $_POST["service_ri6"];

        $service_ass_w1 = $_POST["service_ass_w1"];
        $service_ass_w2 = $_POST["service_ass_w2"];
        $service_ass_w3 = $_POST["service_ass_w3"];
        $service_ass_w4 = $_POST["service_ass_w4"];

        $service_cat_id = $_POST["service_cat_id"];
        $service_sub_cat_id = $_POST["service_sub_cat_id"];
        $service_description = $_POST["service_description"];

        $last_service_id = $serviceObj->createService($service_name, $service_price, $service_ri1, $service_ri2, $service_ri3, $service_ri4, $service_ri5, $service_ri6, $service_ass_w1, $service_ass_w2, $service_ass_w3, $service_ass_w4, $service_cat_id, $service_sub_cat_id, $service_description);

        if($last_service_id > 0)
        {
            $message = base64_encode("New Service Created Successfully!");

            ?>
            <script>window.location = "../view/service-management.php?success_message=<?php echo $message; ?>"</script>
            <?php
        }
        else{
            $message = base64_encode("New Service Failed to Created!");
            ?>
            <script>window.location = "../view/service-management.php?error_message=<?php echo $message; ?>"</script>
            <?php
        }

        break;

    case "manage_service":

            $service_id = $_POST["service_id"];



        $manage_service_result = $serviceObj->selectToManageService($service_id);
        $row_service = $manage_service_result->fetch_assoc();

        $manage_category_result = $serviceObj->selectCategoryById($row_service["service_cat_id"]);
        $row_category = $manage_category_result->fetch_assoc();

        $manage_sub_category_result = $serviceObj->selectSubCategoriesById($row_service["service_sub_cat_id"]);
        $row_sub_category = $manage_sub_category_result->fetch_assoc();

        $category_result = $serviceObj->selectCategories();
        $sub_category_result = $serviceObj->selectSubCategories();

        ?>




        <!-- First Row  -->
        <div class="form-group row">
            <!-- Service code  -->
            <label for="service_id" class="col-2 col-form-label">Service ID</label>
            <div class="col-2">
                <input type="text" readonly class="form-control" id="service_id" value="<?php echo $row_service["service_id"]; ?>"/>
            </div>
        </div>

        <!-- Second Row  -->
        <div class="form-group row">
            <!-- Service name  -->
            <label for="manage_service_name" class="col-2 col-form-label">Service Name</label>
            <div class="input-group col-5">
                <input type="text" readonly class="form-control mr-2" id="manage_service_name" value="<?php echo $row_service["service_name"]; ?>">
                <button type="button" class="btn btn-outline-primary" id="btn_service_name_pencil"><i class="fa fa-pencil"></i></button>
                <button type="button" class="btn btn-outline-primary" id="btn_service_name_check"><i class="fa fa-check"></i></button>
            </div>
        </div>

        <!-- Service Price Row  -->
        <div class="form-group row" id="input_group_service_price">
            <!-- Service name  -->
            <label for="service_price" class="col-2 col-form-label">Service Price</label>
            <div class="input-group col-5">
                <input type="text" readonly class="form-control mr-2" id="service_price" name="txt_service_price" value="<?php echo $row_service["service_price"]; ?>">
                <button type="button" class="btn btn-outline-primary" id="btn_service_price_pencil"><i class="fa fa-pencil"></i></button>
                <button type="button" class="btn btn-outline-primary" id="btn_service_price_check"><i class="fa fa-check"></i></button>

            </div>
        </div>

        <!-- Third Row  -->
        <div class="form-group row">
            <!-- Service category  -->
            <label for="select_service_category" class="col-2 col-form-label">Service Category</label>
            <div class="input-group col-5">

                <!-- Hidden Select Drop Down    -->

                <select class="custom-select mr-2" name="service_cat_id" id="select_service_category" class="form-control">
                    <option value="choose" selected>Choose...</option>
                    <?php
                    while($category_row_result = $category_result->fetch_assoc())
                    {
                        ?>
                        <option value="<?php echo $category_row_result["service_cat_id"]; ?>"><?php echo $category_row_result["service_cat_name"]; ?></option>

                    <?php } ?>
                </select>

                <!-- End of Hidden Select Drop Down    -->



                <input type="text" readonly class="form-control mr-2" id="service_category" value="<?php echo $row_category["service_cat_name"]; ?>">
                <button type="button" class="btn btn-outline-primary" id="btn_service_category_pencil"><i class="fa fa-pencil"></i></button>
                <button type="button" class="btn btn-outline-primary" id="btn_service_category_check"><i class="fa fa-check"></i></button>
            </div>
        </div>

        <!-- Forth Row  -->
        <div class="form-group row">
            <!-- Service sub category  -->
            <label for="service_sub_category" class="col-2 col-form-label">Service Sub Category</label>
            <div class="input-group col-5">

                <!-- Hidden Select Drop Down    -->

                <select class="custom-select mr-2" name="service_sub_cat_id" id="select_service_sub_category" class="form-control">
                    <option value="choose" selected>Choose...</option>
                    <?php
                    while($sub_category_row_result = $sub_category_result->fetch_assoc())
                    {
                        ?>
                        <option value="<?php echo $sub_category_row_result["service_sub_cat_id"]; ?>"><?php echo $sub_category_row_result["service_sub_cat_name"]; ?></option>

                    <?php } ?>
                </select>

                <!-- End of Hidden Select Drop Down    -->

                <input type="text" readonly class="form-control mr-2" id="service_sub_category" value="<?php echo $row_sub_category["service_sub_cat_name"] ;?>">
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
                <input type="text" readonly class="col-2 form-control mr-2" value="Item Code 1">
                <input type="text" readonly class="form-control mr-2" id="editable_item_1" value="">
                <button type="button" class="btn btn-outline-primary" id="btn_editable_item_1_pencil"><i class="fa fa-pencil"></i></button>
                <button type="button" class="btn btn-outline-primary" id="btn_editable_item_1_check"><i class="fa fa-check"></i></button>
            </div>

            <!-- Item 2 -->
            <div class="input-group col-6 mb-2">
                <input type="text" readonly class="col-2 form-control mr-2" value="Item Code 2">
                <input type="text" readonly class="form-control mr-2" id="editable_item_2" value="">
                <button type="button" class="btn btn-outline-primary" id="btn_editable_item_2_pencil"><i class="fa fa-pencil"></i></button>
                <button type="button" class="btn btn-outline-primary" id="btn_editable_item_2_check"><i class="fa fa-check"></i></button>
            </div>

            <!-- Item 3 -->
            <div class="input-group col-6 mb-2">
                <input type="text" readonly class="col-2 form-control mr-2" value="Item Code 3">
                <input type="text" readonly class="form-control mr-2" id="editable_item_3" value="">
                <button type="button" class="btn btn-outline-primary" id="btn_editable_item_3_pencil"><i class="fa fa-pencil"></i></button>
                <button type="button" class="btn btn-outline-primary" id="btn_editable_item_3_check"><i class="fa fa-check"></i></button>
            </div>

            <!-- Item 4 -->
            <div class="input-group col-6 mb-2">
                <input type="text" readonly class="col-2 form-control mr-2" value="Item Code 4">
                <input type="text" readonly class="form-control mr-2" id="editable_item_4" value="">
                <button type="button" class="btn btn-outline-primary" id="btn_editable_item_4_pencil"><i class="fa fa-pencil"></i></button>
                <button type="button" class="btn btn-outline-primary" id="btn_editable_item_4_check"><i class="fa fa-check"></i></button>
            </div>

            <!-- Item 5 -->
            <div class="input-group col-6 mb-2">
                <input type="text" readonly class="col-2 form-control mr-2" value="Item Code 5">
                <input type="text" readonly class="form-control mr-2" id="editable_item_5" value="">
                <button type="button" class="btn btn-outline-primary" id="btn_editable_item_5_pencil"><i class="fa fa-pencil"></i></button>
                <button type="button" class="btn btn-outline-primary" id="btn_editable_item_5_check"><i class="fa fa-check"></i></button>
            </div>

            <!-- Item 6 -->
            <div class="input-group col-6 mb-2">
                <input type="text" readonly class="col-2 form-control mr-2" value="Item Code 6">
                <input type="text" readonly class="form-control mr-2" id="editable_item_6" value="">
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
                <input type="text" readonly class="col-2 form-control mr-2" value="Worker Code 1">
                <input type="text" readonly class="form-control mr-2" id="editable_worker_1" value="">
                <button type="button" class="btn btn-outline-primary" id="btn_editable_worker_1_pencil"> <i class="fa fa-pencil"></i> </button>
                <button type="button" class="btn btn-outline-primary" id="btn_editable_worker_1_check"><i class="fa fa-check"></i></button>
            </div>

            <!-- Worker 2 -->
            <div class="input-group col-6 mb-2">
                <input type="text" readonly class="col-2 form-control mr-2" value="Worker Code 2">
                <input type="text" readonly class="form-control mr-2" id="editable_worker_2" value="">
                <button type="button" class="btn btn-outline-primary" id="btn_editable_worker_2_pencil"> <i class="fa fa-pencil"></i> </button>
                <button type="button" class="btn btn-outline-primary" id="btn_editable_worker_2_check"><i class="fa fa-check"></i></button>
            </div>

            <!-- Worker 3 -->
            <div class="input-group col-6 mb-2">
                <input type="text" readonly class="col-2 form-control mr-2" value="Worker Code 3">
                <input type="text" readonly class="form-control mr-2" id="editable_worker_1" value="">
                <button type="button" class="btn btn-outline-primary" id="btn_editable_worker_3_pencil"> <i class="fa fa-pencil"></i> </button>
                <button type="button" class="btn btn-outline-primary" id="btn_editable_worker_3_check"><i class="fa fa-check"></i></button>
            </div>

            <!-- Worker 4 -->
            <div class="input-group col-6 mb-2">
                <input type="text" readonly class="col-2 form-control mr-2" value="Worker Code 4">
                <input type="text" readonly class="form-control mr-2" id="editable_worker_4" value="">
                <button type="button" class="btn btn-outline-primary" id="btn_editable_worker_4_pencil"> <i class="fa fa-pencil"></i> </button>
                <button type="button" class="btn btn-outline-primary" id="btn_editable_worker_4_check"><i class="fa fa-check"></i></button>
            </div>
        </div>


        <?php
        break;


    case "manage_sub_category":
        $changed_sub_cat_id = $_POST["changed_sub_cat_id"];
        $changed_sub_cat_name = $_POST["changed_sub_cat_name"];


        $r = $serviceObj->changeSubCategory($changed_sub_cat_id, $changed_sub_cat_name);

        if($r > 0)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }


        break;


    case "manage_category":
        $changed_cat_id = $_POST["changed_cat_id"];
        $changed_cat_name = $_POST["changed_cat_name"];


        $r = $serviceObj->changeCategory($changed_cat_id, $changed_cat_name);

        if($r > 0)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }


        break;


    case "search":


        if(isset($_POST["searchStr"]))
        {
            $search_str = $_POST["searchStr"];
            if(!empty($search_str)) {
                $all_service_result = $serviceObj->selectService();
                ?>

                <div class="table-responsive mt-2">
                    <table class="table table-sm" id="table_search_manage">
                        <thead>
                        <tr>

                            <th scope="col">Service ID</th>
                            <th scope="col">Service Name</th>
                            <th scope="col">Service Price</th>
                            <th scope="col">Service Category</th>
                            <th scope="col">Service Sub Category</th>
                        </tr>
                        </thead>
                        <tbody>





                        <?php
                        while($row = $all_service_result->fetch_assoc()) {

                            $service_search_id = $row["service_id"];

                            $category_result = $serviceObj->selectCategoryById($row["service_cat_id"]);
                            $category_row = $category_result->fetch_assoc();

                            $sub_cat_result = $serviceObj->selectSubCategoriesById($row["service_sub_cat_id"]);
                            $sub_cat_row = $sub_cat_result->fetch_assoc();



                            $row_query_builder = http_build_query($row);
                            $category_query_builder = http_build_query($category_row);
                            $sub_cat_query_builder = http_build_query($sub_cat_row);

                            $total_query_builder = $row_query_builder.$category_query_builder.$sub_cat_query_builder;

                            $total_query_builder = str_replace("+"," ",$total_query_builder);

                            if(strpos(strtolower($total_query_builder), strtolower($search_str)))
                            {
                                ?>



                                <tr>

                                    <th scope="row"><?php echo $service_search_id; ?></th>
                                    <td id="s_name" data-serviceName="<?php echo $row["service_name"]; ?>"><?php echo $row["service_name"]; ?></td>
                                    <td><?php echo "Rs. ".$row["service_price"]; ?></td>
                                    <td><?php echo $category_row["service_cat_name"]; ?></td>
                                    <td><?php echo $sub_cat_row["service_sub_cat_name"]; ?></td>
                                    <td id="table_data_manage_service_id"><a href="#modal_service_manage" data-toggle="modal" data-id="<?php echo $service_search_id;?>"><i class="fa fa-file-text-o fa-lg"></i></a></td>

                                </tr>






                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <?php




            }


        }

        break;

    default:
        echo "Thank You";
        break;
}
