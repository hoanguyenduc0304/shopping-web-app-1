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
        if (!isset($_SESSION)) {
            session_start();
        }
        $stmt = $conn1->prepare("SELECT * FROM be_bought INNER JOIN shop ON be_bought.item_id=shop.id WHERE be_bought.user_id=".$_SESSION['user']['id']." ORDER BY be_bought.date DESC");
        $stmt->execute();
        ?>
        <div class="container">
            <div class="col-xs-120 col-sm-60 col-md-60">
                <div class="well well-sm">
                    <div class="form-container" style="display: block;text-align: center">
                        <div>
                            <h1 style="font-size: 36px;color: #42B32F;text-align: center;font-weight: 500;margin-bottom: 70px;">Sản phẩm đã mua</h1>
                        </div>
                        <table class="table" >
                            <thead>
                                <tr>
                                    <td><h3 style="font-weight: bold">#</h3></td>
                                    <td><h3 style="font-weight: bold">Tên sản phẩm</h3></td>
                                    <td><h3 style="font-weight: bold">Hình ảnh</h3></td>
                                    <td><h3 style="font-weight: bold">Số lượng</h3></td>
                                    <td><h3 style="font-weight: bold">Ngày giờ</h3></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 1;
                                while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<tr>';
                                    echo '<td>' . $count . '</td>';
                                     echo '<td>' . $rows['item_name'] . '</td>';
                                    echo '<td><img src="' . $rows['image'] . '" alt="' . $rows['item_name'] . 'class = "img-responsive" width="300" height="300" ></td>';
                                    echo '<td>' . $rows['quantity'] . '</td>';
                                    echo '<td>' . $rows['date'] . '</td>';
                                    echo ' </tr>';
                                    $count++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
