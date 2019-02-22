<?php

require_once 'config.php';

if (isset($_POST["upgrade"])) {
    $vip = $_POST["vip"];
    if (!isset($_SESSION)) {
        session_start();
    }

    if ($vip <= $_SESSION['user']['coin']) {
        switch ($vip) {
            case 100000:
                if ($_SESSION['user']['level'] == 2) {
                    $expire = date('Y-m-d', strtotime($_SESSION['user']['vip_expire']."+1 month"));
                } else {
                    $expire = date('Y-m-d', strtotime("+1 month"));
                }
                $stmt = $conn1->prepare("UPDATE `user` SET `level`= 2,`vip_expire`='" . $expire . "', `coin`= " . ($_SESSION['user']['coin'] - 100000) . " WHERE `id` = " . $_SESSION['user']['id']);
                $stmt->execute();
                $error = "Tài khoản của bạn đã được nâng cấp V.I.P trong 1 tháng.";
                break;
            case 275000:
                if ($_SESSION['user']['level'] == 2) {
                    $expire = date('Y-m-d', strtotime($_SESSION['user']['vip_expire']."+3 months"));
                } else {
                    $expire = date('Y-m-d', strtotime("+3 months"));
                }
                $stmt = $conn1->prepare("UPDATE `user` SET `level`= 2,`vip_expire`='" . $expire . "', `coin`= " . ($_SESSION['user']['coin'] - 275000) . " WHERE `id` = " . $_SESSION['user']['id']);
                $stmt->execute();
                $error = "Tài khoản của bạn đã được nâng cấp V.I.P trong 3 tháng.";
                break;
            case 500000:
                if ($_SESSION['user']['level'] == 2) {
                    $expire = date('Y-m-d', strtotime($_SESSION['user']['vip_expire']."+6 months"));
                } else {
                    $expire = date('Y-m-d', strtotime("+6 months"));
                }
                $stmt = $conn1->prepare("UPDATE `user` SET `level`= 2,`vip_expire`='" . $expire . "', `coin`= " . ($_SESSION['user']['coin'] - 500000) . " WHERE `id` = " . $_SESSION['user']['id']);
                $stmt->execute();
                $error = "Tài khoản của bạn đã được nâng cấp V.I.P trong 6 tháng.";
                break;
            case 950000:
                if ($_SESSION['user']['level'] == 2) {
                    $expire = date('Y-m-d', strtotime($_SESSION['user']['vip_expire']."+1 year"));
                } else {
                    $expire = date('Y-m-d', strtotime("+1 year"));
                }
                $stmt = $conn1->prepare("UPDATE `user` SET `level`= 2,`vip_expire`='" . $expire . "', `coin`= " . ($_SESSION['user']['coin'] - 950000) . " WHERE `id` = " . $_SESSION['user']['id']);
                $stmt->execute();
                $error = "Tài khoản của bạn đã được nâng cấp V.I.P trong 1 năm.";
                break;
        }
        header("location:upgradeVip.php?error=" . $error);
    } else {
        $error = "Số dư trong tài khoản không đủ !!";
        header("location:upgradeVip.php?error=" . $error);
    }
}
?>
