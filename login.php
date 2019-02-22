<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
        <script src='https://www.google.com/recaptcha/api.js?hl=vi'></script>
    </head>
    <body>
        <div class="container">
            <div class="col-xs-120 col-sm-60 col-md-60">
                <div class="well well-sm">
                    <div class="form-container" style="display: block;text-align: center">
                        <form action="xuly_login.php" method="Post"  style="display: inline-block">
                            <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h1 style="font-size: 36px;color: #42B32F;text-align: center;font-weight: 500;margin-top:70px;">Đăng nhập</h1>
                            </div>
                            <div class="form-group">
                                <label style="margin-left: -233px;margin-top: 20%" for="username">Username</label>
                                <input type="text" class="form-control" style="width: 300px" id="username" name="username" placeholder="Enter Username">
                            </div>
                            <div class="form-group">
                                <label style="margin-left: -233px" for="InputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" style="width: 300px" id="InputPassword1" placeholder="Password">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="rememberme" value="checked" class="form-check-input" id="rememberme">
                                <label class="form-check-label" for="rememberme">Remember me</label>
                            </div>
                            <div class="g-recaptcha" data-sitekey="6Lf4WIwUAAAAAFBcPgiA0i5KVZjoUftaMjYxd9rF"></div><br>
                            <button type="submit" name="submit" class="btn btn-primary">Login</button><br>
                            <a href="register.php">Đăng ký tài khoản</a><br>
                            <?php
                            require_once './validate.php';
                            if (!isset($_SESSION)) {
                                session_start();
                            }
                            if (isset($_SESSION['loginError'])) {
                                echo '<span style="color: red">' . test_input($_SESSION['loginError']) . '</span><br>';
                                unset($_SESSION['loginError']);
                            } else {
                                echo '';
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
