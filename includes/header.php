<?php
include '../commons/session.php';
if(!isset($_SESSION['user']['authenticated']))
{
    $msg = base64_encode("You are not allowed to access that page unless logged in!");
    header("location: ../index.php?msg=$msg");
    exit;

} else {

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        <link rel="stylesheet" href="../assets/css/style.css">
        <!-- Include bootstrap css files in the head    -->
        <?php include '../includes/bootstrap_includes_css.php';
        }
?>
