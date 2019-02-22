<?php

require_once 'config.php';
require_once 'checkRememberLogin.php';
require_once 'checkLogin.php';
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    if ($username != $_SESSION['user']['username']) {
        $stmt = $conn1->prepare("SELECT * FROM `user` WHERE `username` = '" . $username . "'");
        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($rows != null) {
            $coin = $_POST["coin"];
            if ($_SESSION['user']['coin'] >= $coin) {
                $pass = $_POST["password"];
                if (md5($pass) == $_SESSION['user']['password']) {
                    $stmt = $conn1->prepare("UPDATE `user` SET `coin`= " . ($rows['coin'] + $coin) . " WHERE `id` =" . $rows['id']); // Thêm coin vào tài khoản cần chuyển tới
                    $stmt->execute();
                    $stmt = $conn1->prepare("UPDATE `user` SET `coin`= " . ($_SESSION['user']['coin'] - $coin) . " WHERE `id` =" . $_SESSION['user']['id']); // giảm coin ở tài khoàn chuyển 
                    $stmt->execute();
                    $error = "Bạn đã chuyển " . $coin . " tới tài khoản " . $username . " thành công !!";
                    header("location:tranfer.php?error=" . $error);
                } else {
                    $error = "Mật khẩu không đúng !";
                    header("location:tranfer.php?error=" . $error);
                }
            } else {
                $error = "Sô dư trong tài khoản không đủ !";
                header("location:tranfer.php?error=" . $error);
            }
        } else {
            $error = "Tài khoản không tồn tại !";
            header("location:tranfer.php?error=" . $error);
        }
    } else {
        $error = "Không thể thực hiên chuyển coin tới tài khoản của chính bạn !";
        header("location:tranfer.php?error=" . $error);
    }
}
?>
