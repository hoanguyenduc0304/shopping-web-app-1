<?php

require_once 'config.php';
session_start();
if (isset($_COOKIE['remember_me'])) {
    setcookie('remember_me', '', time() - 3600, '/');
    unset($_COOKIE['remember_me']);
    $stmt = $conn1->prepare("UPDATE `user` SET `remember_token`='' WHERE id =" . $_SESSION['user']['id']);
    $stmt->execute();
}
unset($_SESSION['user']);
header("location:login.php");
?>

