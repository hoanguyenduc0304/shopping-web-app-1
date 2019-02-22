<?php
require_once 'config.php';
if (!isset($_SESSION)) {
    session_start();
}
$stmt = $conn1->prepare("SELECT * FROM `user` WHERE `id` = " . $_SESSION['user']['id']);
$stmt->execute();
$rows = $stmt->fetch(PDO::FETCH_ASSOC);
if ($rows != null) {
    $_SESSION['user']['id'] = $rows['id'];
    $_SESSION['user']['username'] = $rows['username'];
    $_SESSION['user']['password'] = $rows['password'];
    $_SESSION['user']['name'] = $rows['name'];
    $_SESSION['user']['level'] = $rows['level'];
    $_SESSION['user']['vip_expire'] = $rows['vip_expire'];
    $_SESSION['user']['gioitinh'] = $rows['gioitinh'];
    $_SESSION['user']['ngaysinh'] = $rows['ngaysinh'];
    $_SESSION['user']['diachi'] = $rows['diachi'];
    $_SESSION['user']['email'] = $rows['email'];
    $_SESSION['user']['avatar'] = $rows['avatar'];
    $_SESSION['user']['coin'] = $rows['coin'];
    
}
?>

