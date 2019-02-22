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
        include './validate.php';
        ?>
        <div class="container">
            <div class="col-xs-120 col-sm-60 col-md-60">
                <div class="well well-sm">
                    <div class="form-container" style="display: block;text-align: center">
                        <form action="xuly_recharge.php" method="Post"  style="display: inline-block">  
                            <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h1 style="font-size: 36px;color: #42B32F;text-align: center;font-weight: 500;margin-bottom: 70px;">Nạp Thẻ</h1>
                            </div>
                            <div class="form-group">
                                <label for="namecard">Loại Thẻ</label>
                                <select class="form-control" id="namecard" name="namecard">
                                    <option value="viettel">Viettel</option>
                                    <option value="mobifone">Mobifone</option>
                                    <option value="vinaphone">Vinaphone</option>
                                    <option value="vietnamobile">Vietnamobile</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="value">Mệnh Giá</label>
                                <select class="form-control" id="value" name="value">
                                    <option value="10000">10 000 VNĐ</option>
                                    <option value="20000">20 000 VNĐ</option>
                                    <option value="50000">50 000 VNĐ</option>
                                    <option value="100000">100 000 VNĐ</option>
                                    <option value="200000">200 000 VNĐ</option>
                                    <option value="500000">500 000 VNĐ</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label style="margin-left: -355px" for="serinumber">Seri</label>
                                <input type="number" name="serinumber" class="form-control" style="width: 386px" id="serinumber">
                            </div>
                            <div class="form-group">
                                <label style="margin-left: -333px" for="codenumber">Mã Thẻ</label>
                                <input type="text" name="codenumber" class="form-control" style="width: 386px" id="codenumber">
                            </div>
                            <button type="submit" value="Submit" name="submit" class="btn btn-primary">Submit</button><br><br>

                            <?php
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
    </body>
</html>
