<?php include '../model/service_model.php';

$serviceObj = new Service();

$status = $_REQUEST["status"];

switch($status)
{
    case "create_category":

        $cat_name = $_POST["cat_name"];
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

        $sub_cat_name = $_POST["sub_cat_name"];
        $sub_cat_cat_id = $_POST["sub_cat_cat_id"];
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

    default:
        echo "Thank You";
        break;
}
