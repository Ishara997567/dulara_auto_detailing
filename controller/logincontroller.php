<?php
include '../model/login_model.php';
$loginObj = new Login();

$status = $_REQUEST['status'];

switch($status){
    case 'login':

        $uname = $_POST['username'];
        $pw = strtoupper(sha1($_POST['password']));

        $result = $loginObj->validateLogin($uname, $pw);

        if($result->num_rows===1){
            echo "Login Success!";
        }

        else{

            $msg = "Please Check Your Username or Password!";
            $msg = base64_encode($msg);

?>
<script> window.location="../view/login.php?msg=<?php echo $msg; ?>" </script>
<?php    }

}
?>