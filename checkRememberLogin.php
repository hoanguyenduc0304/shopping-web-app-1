<?php

require_once 'config.php';
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_COOKIE['remember_me'])) {
    $str = base64_decode($_COOKIE['remember_me']);
    $arr = explode("||", $str);

    $username = $arr[0];
    $password = $arr[1];
    $expiration = $arr[2];

    $today = date("Y-m-d");
    if (strtotime($expiration) - strtotime($today) >= 0) { //xác thực cookie phía người dùng
        $stmt = $conn1->prepare("SELECT * FROM `user` WHERE `username` = '" . $username . "' AND `password` = '" . $password . "'AND `remember_token` = '" . $_COOKIE['remember_me'] . "'");
        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($rows == null) { // xác thực cookie phía server 
            $_SESSION['loginError'] = "vcl";
            header("location:login.php");
        }else{
            $_SESSION['user']['id']= $rows['id'];
        }
    }
}
?>