<?php

require_once "config.php";
if (!isset($_SESSION)) {
    session_start();
}

$stmt = $conn1->prepare("SELECT * FROM `user` WHERE `id` = " . $_SESSION['user']['id']);
$stmt->execute();
$rows = $stmt->fetch(PDO::FETCH_ASSOC);

if (strtotime($rows['vip_expire']) != 0) {
    $today = date("Y-m-d");
    if (strtotime($rows['vip_expire']) - strtotime($today) < 0) {
        $stmt = $conn1->prepare("UPDATE `user` SET `level`= 1 WHERE `id` = " . $_SERVER['user']['id']);
        $stmt->execute();
    }
}
?>

