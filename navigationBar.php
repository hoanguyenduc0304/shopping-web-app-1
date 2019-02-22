<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <title></title>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="shop.php">Trang chủ</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="informationUser.php">Tài khoản</a></li>
                    <li><a href="recharge.php">Nạp thẻ</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="tranfer.php">Chuyển khoản</a></li>
                    <li><a href="upgradeVip.php">V.I.P</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    require_once 'updateSession.php';
                    require_once 'checkVipUser.php';
                    if (!isset($_SESSION)) {
                        session_start();
                    }
                    if (isset($_SESSION['user'])) {
                        echo '<li><a><font color="Green">Xin chào ' . $_SESSION['user']['name'] . '</font></a></li>';
                        if ($_SESSION['user']['level'] == 2) {
                            $dayleft = (strtotime($_SESSION['user']['vip_expire']) - strtotime(date("Y-m-d"))) / (60 * 60 * 24); //tính ngày hết hạn vip
                            echo '<li><a><font color="Red">V.I.P(' . floor($dayleft) . ' ngày)</font> </a></li>';
                        }
                        echo '<li><a><font color="Blue">' . $_SESSION['user']['coin'] . ' Coin</font> </a></li>';
                        echo '<li><a href=xuly_logout.php>Đăng xuất</a></li>';
                    } else {
                        echo '<li><a href=login.php">Đăng nhập</a></li>';
                    }
                    ?>



                </ul>
            </div>
        </nav>
    </body>
</html>
