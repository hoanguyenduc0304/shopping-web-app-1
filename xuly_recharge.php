<?php

require_once 'config.php';
if (isset($_POST["submit"])) {
    $namecard = $_POST["namecard"];
    $value = $_POST["value"];
    $seri = $_POST["serinumber"];
    $codenumber = $_POST["codenumber"];
    if ($namecard != null && $value != null && $seri != null && $codenumber != null) {
        if (is_int($value) && is_int($seri)) {
            $stmt = $conn1->prepare("SELECT * FROM `card` WHERE `namecard` ='" . $namecard . "' AND `seri_number` = " . $seri . " AND `code_number` = '" . $codenumber . "' AND `value` =" . $value);
            $stmt->execute();
            $rows = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($rows != null) { // kiểm tra các thông số của thẻ cào
                $today = date("Y-m-d");
                if ((strtotime($rows['expiry_date']) - strtotime($today) >= 0) && ($rows['used'] == 0)) {// kiểm tra hạn thẻ cào hoặc thẻ cào đã được sử dụng
                    session_start();
                    $stmt = $conn1->prepare("INSERT INTO `be_used`(`user_id`, `card_id`) VALUES (" . $_SESSION['user']['id'] . "," . $rows['id'] . ")");
                    $stmt->execute();
                    $stmt = $conn1->prepare("UPDATE `card` SET `used` = 1 WHERE `id`=" . $rows['id']);
                    $stmt->execute();
                    $stmt = $conn1->prepare("UPDATE `user` SET `coin`= " . $rows['value'] . " WHERE `id` = " . $_SESSION['user']['id']);
                    $stmt->execute();
                    $error = "Nạp thẻ thành công !!";
                    header("location:recharge.php?error=" . $error);
                } else {
                    $error = "thẻ cào hết hạn hoặc đã được sử dụng !!";
                    header("location:recharge.php?error=" . $error);
                }
            } else {
                $error = "thẻ cào không tồn tại !";
                header("location:recharge.php?error=" . $error);
            }
        } else {
            $error = "Giá trị nhập vào không hợp lệ !";
            header("location:recharge.php?error=" . $error);
        }
    } else {
        $error = "Có giá trị để trống !";
            header("location:recharge.php?error=" . $error);
    }
}
?>

