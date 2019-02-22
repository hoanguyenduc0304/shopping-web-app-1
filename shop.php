<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
        <meta charset="UTF-8">
        <title>shop</title>     
    </head>

    <body>
        <style type="text/css">
            .gallery-title
            {
                font-size: 36px;
                color: #42B32F;
                text-align: center;
                font-weight: 500;
                margin-bottom: 70px;
            }
            .gallery-title:after {
                content: "";
                position: absolute;
                width: 7.5%;
                left: 46.5%;
                height: 45px;
                border-bottom: 1px solid #5e5e5e;
            }
            .filter-button
            {
                font-size: 18px;
                border: 1px solid #42B32F;
                border-radius: 5px;
                text-align: center;
                color: #42B32F;
                margin-bottom: 30px;

            }
            .filter-button:hover
            {
                font-size: 18px;
                border: 1px solid #42B32F;
                border-radius: 5px;
                text-align: center;
                color: #ffffff;
                background-color: #42B32F;

            }
            .btn-default:active .filter-button:active
            {
                background-color: #42B32F;
                color: white;
            }

            .port-image
            {
                width: 100%;
            }

            .gallery_product
            {
                margin-bottom: 30px;
            }
        </style>

        <?php
        require_once 'checkRememberLogin.php';
        require_once 'checkLogin.php';
        require_once 'navigationBar.php';
        include './validate.php';

        $stmt = $conn1->prepare("SELECT * FROM `shop`");
        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
        <a href="bought.php" class="btn btn-info btn-lg" style="float:right;margin-right: 50px">
            <span class="glyphicon glyphicon-list-alt"></span> Sản phầm đã mua
        </a>
        <div class="container">
            <div class="row">
                <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="gallery-title">Shop</h1>
                </div>
                <?php
                if (isset($_GET)) {
                    if (isset($_GET['noterror'])) {
                        echo '<h4 style="color: green;text-align: center">' . test_input($_GET['noterror']) . '</h4><br>';
                    } else if (isset($_GET['error'])) {
                        echo '<h4 style="color: red;text-align: center">' . test_input($_GET['error']) . '</h4><br>';
                    }
                } else {
                    echo "";
                }
                $stmt = $conn1->prepare("SELECT * FROM `shop`");
                $stmt->execute();
                while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    if ($rows['number_of'] > 0) {
                        echo '<div class = "gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter spray" style="text-align: center">';
                        echo '<form action="xuly_shop.php" method="get">';
                        echo '<img src="' . $rows['image'] . '" alt="' . $rows['item_name'] . 'class = "img-responsive" width="300" height="300" ><br>';
                        echo '<div style="max-width: 295px;height: 55px;margin: auto"><h3>' . $rows['item_name'] . '</h3></div>';
                        if ($_SESSION['user']['level'] == 2) {
                            echo '<h4 style="color:green;">Sale price : ' . $rows['price'] * 0.7 . ' Coin</h4>';
                            echo '<h4 style="color:red;"><strike>Price : ' . $rows['price'] . ' Coin</strike></h4>';
                        } else {
                            echo '<h4 style="color:green;">Price : ' . $rows['price'] . ' Coin</h4>';
                        }
                        echo '<input type="hidden" name="id" value="' . $rows['id'] . '">';
                        echo '<input type="number" class="form-control" style="width: 200px;display: inline" name="quantity" min="1" placeholder="Nhập số lượng" required>';
                        echo '<input type="submit" name="confirm" class="btn btn-primary" value="buy" ><br>';
                        echo '</form>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>
