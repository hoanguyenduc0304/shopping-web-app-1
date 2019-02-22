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
                            <h1 style="font-size: 36px;color: #42B32F;text-align: center;font-weight: 500;margin-bottom: 30px;">Nâng cấp tài khoản V.I.P</h1>
                        </div>
                        <div class="form-container" style="display: block;text-align: center">
                            <form action="xuly_upgradevip.php" method="Post"  style="display: inline-block">

                                <div class="form-group">
                                    <h3 style="display: inline;color: red"><strong>Một tháng</strong> : 100 000 VNĐ </h3><input type="radio" class="form-control" name="vip" value="100000">  <br>
                                    <h3 style="display: inline;color: orange"><strong>Ba tháng</strong>  : 275 000 VNĐ </h3><input type="radio" class="form-control" name="vip" value="275000">  <br>
                                    <h3 style="display: inline;color: yellow"><strong>Sáu tháng</strong> : 500 000 VNĐ </h3><input type="radio" class="form-control" name="vip" value="500000">  <br>
                                    <h3 style="display: inline;color: green"><strong>Một năm</strong>  : 950 000 VNĐ </h3><input type="radio" class="form-control" name="vip" value="950000">  <br><br>
                                </div>
                                <button type="submit" name="upgrade" value="Upgrade" class="btn btn-primary">Upgrade</button><br> 
                                <?php
                                require_once './validate.php';
                                if (isset($_GET['error'])) {
                                    echo '<span style="color: red">' . test_input($_GET['error']) . '</span><br>';
                                } else {
                                    echo "";
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>







    </body>
</html>
