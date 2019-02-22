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
    </head>
    <body>
        <?php
        require_once 'checkRememberLogin.php';
        require_once 'checkLogin.php';
        require_once 'navigationBar.php';
        ?>
        <div class="container">
            <div class="col-xs-120 col-sm-60 col-md-60">
                <div class="well well-sm">
                    <div class="form-container" style="display: block;text-align: center">
                        <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h1 style="font-size: 36px;color: #42B32F;text-align: center;font-weight: 500;margin-bottom: 30px;">Chuyển khoản</h1>
                        </div>
                        <form action="xuly_tranfer.php" method="Post"  style="display: inline-block">             
                            <div class="form-group">
                                <label style="margin-left: -236px;" for="username">Tài khoản chuyển đến</label>
                                <input type="text" name="username" class="form-control" style="width: 386px" id="username">
                            </div>
                            <div class="form-group">
                                <label style="margin-left: -333px" for="coin">Số tiền</label>
                                <input type="number" name="coin" class="form-control" style="width: 386px" id="coin">
                            </div>
                            <div class="form-group">
                                <label style="margin-left: -313px" for="password">Password</label>
                                <input type="password" name="password" class="form-control" style="width: 386px" id="password">
                            </div>
                            <button type="submit" value="Send" name="submit" class="btn btn-primary">Send</button><br><br>
                            <?php
                            if (isset($_GET['error'])) {
                                echo '<span style="color: red">' . $_GET['error'] . '</span><br>';
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
