<?php
if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
    $uri = 'https://';
} else {
    $uri = 'http://';
}

$uri .= $_SERVER['HTTP_HOST'];
header('Location: '.$uri.'/dulara_auto_detailing/view/login.php');
exit;
?>
