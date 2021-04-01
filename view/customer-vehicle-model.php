<?php include '../model/job_model.php';

$jobObj = new Job();

$vehicle_make_id = $_POST["vehicleMakeID"];

?>

<select name="select_cus_vehicle_model" id="select_cus_vehicle_model" class="form-control custom-select">
    <?php
    $vehicle_model_result = $jobObj->getAllVehicleModelByMake($vehicle_make_id);
    while($r=$vehicle_model_result->fetch_assoc())
    {
    ?>
    <option value="<?php echo $r["vehicle_model_id"]; ?>"><?php echo $r["vehicle_model_name"]; ?></option>

    <?php } ?>
</select>
