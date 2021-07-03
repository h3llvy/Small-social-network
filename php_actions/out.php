<?php
require('connection.php');

if (isset($_COOKIE['id'])) {
    $id = $_COOKIE['id'];
    $newid = md5(md5(uniqid()));
    $sql = "UPDATE user SET id = '$newid' WHERE id = '$id'";
    mysqli_query($link, $sql);
    }

setcookie('id', '', 0, '/');

?>

