<?php

function encodeRememberMe($user, $password) {
    $expiration = date("Y-m-d", strtotime("+1 day"));
    $str = $user . "||" . $password . "||" . $expiration;
    return base64_encode($str);
}

require_once "config.php";
if (isset($_POST["submit"])) {
    session_start();
    $captcha;

    if (isset($_POST['g-recaptcha-response'])) {
        $captcha = $_POST['g-recaptcha-response'];
    }
    if (!$captcha) {
        $error = "Hãy xác thực Captcha !!";
        $_SESSION['loginError'] = $error;
        header("location:login.php");
    } else {
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lf4WIwUAAAAAJ7vldqA9hNzEr2sS8elC5lEv0hH&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
        if ($response . success == false) {
            $error = "SPAM !!";
            $_SESSION['loginError'] = $error;
            header("location:login.php");
        } else {
            $username = $_POST['username'];
            $password = md5(($_POST["password"]));
            if ($conn) {
                $stmt = $conn1->prepare("SELECT * FROM `user` WHERE username='" . $username . "' and password='" . $password . "'");
                $stmt->execute();
                $rows = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($rows == null) {
                    $error = "Sai tài khoản hoặc mật khẩu!!";
                    $_SESSION['loginError'] = $error;
                    header("location:login.php");
                } else {
                    if ($_POST['rememberme'] == 'checked') {
                        $remember_token = encodeRememberMe($rows['username'], $rows['password']);
                        //set cookie
                        setcookie('remember_me', $remember_token, time() + (86400), "/"); // 86400 = 1 day
                        //save in database
                        $sql = "UPDATE user SET remember_token=? WHERE id=?";
                        $conn1->prepare($sql)->execute([$remember_token, $rows['id']]);
                    }
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
                    header("location:shop.php");
                }
            }
        }
    }
}
?>
