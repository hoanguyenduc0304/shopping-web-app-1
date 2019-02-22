<?php
if (!isset($_SESSION['user'])) {
    $_SESSION['loginError'] = "Hãy đăng nhập để sử dụng chức năng này";
    header('location:login.php');
}
?>