<?php

if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
    $uri = 'https://';
} else {
    $uri = 'http://';
}

$uri .= $_SERVER['HTTP_HOST'];
if(isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    header('Location: ' . $uri . '/dulara_auto_detailing/view/login.php?msg='.$msg);
    exit;
} else {
    header('Location: '.$uri.'/dulara_auto_detailing/view/login.php');
    exit;
}

