<?php
include '../model/user_model.php';
include '../model/notification_model.php';

$notificationObj = new Notification();
$userObj = new User();

if(isset($_REQUEST['status'])){
    $status = $_REQUEST['status'];

    switch ($status){
        case "check_current_password":
            if(isset($_POST['user_id'])){
                $user_id = $_POST['user_id'];
                $current_password = $_POST['current_password'];
                $password = strtoupper(sha1($current_password));

                $user_login_result = $userObj->getUserAndLoginByID($user_id);
                $row = $user_login_result->fetch_assoc();
                $p = $row['password'];


                if($password !== $p)
                    echo 0;
                else
                    echo 1;

            }


            break;

        case "change_password":
            if(isset($_POST['user_id']) && isset($_POST['new_password'])) {
                $user_id = $_POST['user_id'];
                $new_password = $_POST['new_password'];

                $password = strtoupper(sha1($new_password));

                echo $affected_rows = $userObj->changePasswordByID($user_id, $password);
            }
            break;

        case "update_user":

            //first name
            if(isset($_POST['userIDToUpdate']) && isset($_POST['firstName'])){
                $uid = $_POST['userIDToUpdate'];
                $first_name = $_POST['firstName'];
                $r = $userObj->updateUserFirstName($uid, $first_name);
                if($r > 0) {
                    echo 1;
                    $notification_message = "User first name of <i><b>" .$uid. "</b></i> has been changed to <i><b>".$first_name."</i></b>";
                    $notificationObj->addNotification(7, $notification_message);
                }
                else
                    echo 0;
            }

            //last name
            if(isset($_POST['userIDToUpdate']) && isset($_POST['lastName'])){
                $uid = $_POST['userIDToUpdate'];
                $last_name = $_POST['lastName'];
                $r = $userObj->updateUserLastName($uid, $last_name);
                if($r > 0) {
                    echo 1;
                    $notification_message = "User last name of <i><b>" .$uid. "</b></i> has been changed to <i><b>".$last_name."</i></b>";
                    $notificationObj->addNotification(7, $notification_message);
                }
                else
                    echo 0;
            }


            //email

            if(isset($_POST['userIDToUpdate']) && isset($_POST['email'])){
                $uid = $_POST['userIDToUpdate'];
                $email = $_POST['email'];
                $r1 = $userObj->updateUserEmail($uid, $email);
                $r2 = $userObj->updateLoginEmail($uid, $email);

                $r = $r1 + $r2;

                if($r == 2) {
                    echo 1;
                    $notification_message = "User Email of <i><b>" .$uid. "</b></i> has been changed to <i><b>".$email."</i></b>";
                    $notificationObj->addNotification(7, $notification_message);
                }
                else
                    echo 0;
            }

            //dob

            if(isset($_POST['userIDToUpdate']) && isset($_POST['dob'])){
                $uid = $_POST['userIDToUpdate'];
                $dob = $_POST['dob'];
                $r = $userObj->updateUserDOB($uid, $dob);
                if($r == 1) {
                    echo 1;
                    $notification_message = "User Date of Birth of <i><b>" .$uid. "</b></i> has been changed to <i><b>".$dob."</i></b>";
                    $notificationObj->addNotification(7, $notification_message);
                }
                else
                    echo 0;
            }

            //gender

            if(isset($_POST['userIDToUpdate']) && isset($_POST['gender'])){
                $uid = $_POST['userIDToUpdate'];
                $gender = $_POST['gender'];
                $r = $userObj->updateUserGender($uid, $gender);
                if($r == 1) {
                    echo 1;
                    $notification_message = "User Gender of <i><b>" .$uid. "</b></i> has been changed to <i><b>".$gender."</i></b>";
                    $notificationObj->addNotification(7, $notification_message);
                }
                else
                    echo 0;
            }

            //nic

            if(isset($_POST['userIDToUpdate']) && isset($_POST['nic'])){
                $uid = $_POST['userIDToUpdate'];
                $nic = $_POST['nic'];
                $r = $userObj->updateUserNIC($uid, $nic);
                if($r == 1) {
                    echo 1;
                    $notification_message = "User NIC of <i><b>" .$uid. "</b></i> has been changed to <i><b>".$nic."</i></b>";
                    $notificationObj->addNotification(7, $notification_message);
                }
                else
                    echo 0;
            }


            //cn1

            if(isset($_POST['userIDToUpdate']) && isset($_POST['cn1'])){
                $uid = $_POST['userIDToUpdate'];
                $cn1 = $_POST['cn1'];
                $r = $userObj->updateUserCN1($uid, $cn1);
                if($r == 1) {
                    echo 1;
                    $notification_message = "User Contact Number 1 of <i><b>" .$uid. "</b></i> has been changed to <i><b>".$cn1."</i></b>";
                    $notificationObj->addNotification(7, $notification_message);
                }
                else
                    echo 0;
            }

            //cn2

            if(isset($_POST['userIDToUpdate']) && isset($_POST['cn2'])){
                $uid = $_POST['userIDToUpdate'];
                $cn2 = $_POST['cn2'];
                $r = $userObj->updateUserCN2($uid, $cn2);
                if($r == 1) {
                    echo 1;
                    $notification_message = "User Contact Number 2 of <i><b>" .$uid. "</b></i> has been changed to <i><b>".$cn2."</i></b>";
                    $notificationObj->addNotification(7, $notification_message);
                }
                else
                    echo 0;
            }

            //cn2

            if(isset($_POST['userIDToUpdate']) && isset($_POST['userRole'])){
                $uid = $_POST['userIDToUpdate'];
                $user_role = $_POST['userRole'];

                $user_role_name = $user_role == 1 ? "Administrator" : "System Operator";

                $r = $userObj->updateUserRole($uid, $user_role);
                if($r == 1) {
                    echo 1;
                    $notification_message = "User Role of <i><b>" .$uid. "</b></i> has been changed to <i><b>".$user_role_name."</i></b>";
                    $notificationObj->addNotification(7, $notification_message);
                }
                else
                    echo 0;
            }




            break;

        case "upload_photo":
            if(isset($_FILES['file']['name'])){

//                $puser_id = $_GET['userIDToUpdate'];

                /* Getting file name */
                $filename = $_FILES['file']['name'];

                $img_basename = basename($_FILES['file']['name']);
                $filename = "" . time() . "_" . $img_basename;

                /* Location */
                $location = "../uploads/user_images/".$filename;
                $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
                $imageFileType = strtolower($imageFileType);

                /* Valid extensions */
                $valid_extensions = array("jpg","jpeg","png");

                $response = 0;
                /* Check file extension */
                if(in_array(strtolower($imageFileType), $valid_extensions)) {
                    /* Upload file */
                    if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
                        $response = $location;
//                        $userObj->updateUserImage($puser_id, $filename);
                    }
                }

                echo $response;
                exit;
            }

            echo 0;
            break;

        case "change_photo":
            $filename = $_POST['filename'];
            $puid = $_POST['userIDToUpdate'];
            $f = basename($filename);
            $userObj->updateUserImage($puid, $f);
            break;

        case "remove_photo":
            $userID = $_GET['userIDToUpdate'];
            $userObj->removeUserImage($userID);
            break;
    }
}
