<?php   include '../commons/sessions.php';
include '../model/login_model.php';

$loginObj = new Login();

$status = $_REQUEST['status'];

switch($status){
    case 'login':
        $u = $_POST['username'];
        $p = $_POST['password'];

        $p = strtoupper(sha1($p));

        $result = $loginObj->validateUser($u, $p);

        if($result->num_rows == 1){
            ?>
            <script> window.location = '../view/dashboard.php' </script>
            <?php
        } else {
            $msg = "Invalid Username or Password!";
            $msg = base64_encode($msg);

            ?>
            <script> window.location = '../view/login.php?msg=<?php echo $msg?>' </script>
            <?php
        }

        break;

    case 'add_user':


        $fn = $_POST['first_name'];
        $ln = $_POST['last_name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $nic = $_POST['nic'];
        $cn1 = $_POST['cn1'];
        $cn2 = $_POST['cn2'];
        $user_access_level = $_POST['user_role'];






        if($_FILES['user_img']['name'] != "") {
            $img_basename = basename($_FILES['user_img']['name']);
            $new_img_name = "" . time() . "_" . $img_basename;


            $target_dir = "../uploads/user_images/";
            $target_file = $target_dir . $new_img_name;
            move_uploaded_file($_FILES['user_img']['tmp_name'], $target_file);

            $user_img = $new_img_name;
        } else{
            $user_img = 'default_user_img.png';
        }
        if($loginObj->validateEmail($email)){

            $r = $loginObj->insertUser($fn, $ln, $email, $gender, $dob, $nic, $cn1, $cn2, $user_access_level,$user_img);

            if($r>0) {
                $passwd = strtoupper(sha1($nic));
                $user_id = $r;

                $affected_rows = $loginObj->addLogin($email,$passwd, $user_id, 1);

                if($affected_rows > 0)
                    $msg = "New User Created Successfully!";


            } else {
                $msg = "Could not Create the User!";

            }

            $success_message=base64_encode($msg);

            ?>
            <script>window.location = "../view/login.php?m=<?php echo $success_message; ?>"</script>
            <?php
        }
        else{
            $m = "Your Email is Already Taken!";
            $fatal_message = base64_encode($m);
            ?>

            <!-- Go to the location - Paste the code from the notepad   -->
            <script>window.location = "../view/login.php?fatal=<?php echo $fatal_message; ?>"</script>
            <!-- End of Pasting -->
            <?php
        }
        break;
    default:
        echo "Thank you!";


}