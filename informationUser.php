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
        require_once 'config.php';
        require_once 'checkRememberLogin.php';
        require_once 'checkLogin.php';
        require_once 'navigationBar.php';
        ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-120 col-sm-60 col-md-60">
                    <div class="well well-sm">
                        <div class="row">
                            <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h1 style="font-size: 36px;color: #42B32F;text-align: center;font-weight: 500;margin-bottom: 35px;">Thông tin cá nhân</h1>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <form style="text-align: center !important; width: 100%" action="uploadfile.php" method="post" enctype="multipart/form-data">
                                    <img src="<?php echo $_SESSION['user']['avatar'] ?>" alt="avatar" class="img-rounded img-responsive" />
                                    <input style="display: inline;text-align: center" type="file" class="form-control-file" name="avatar-upload" /><br>
                                    <input type="submit" style="margin-left: 10px;text-align: center" class="btn btn-success btn-sm" name="submit"/>
                                </form>
                            </div>
                            <div class="col-sm-6 col-md-8">
                                <form action="informationUser.php" method="get">
                                    <h3 style="display: inline;line-height: 70px">Họ và tên : </h3> <?php
                                    if (!isset($_GET['changeName'])) {
                                        echo '<h3 style="display: inline">' . $_SESSION['user']['name'] . '</h3>';
                                        echo '<input type="submit" style="margin-left: 10px" class="btn btn-warning btn-xs" value="edit" name="changeName"><br>';
                                    } else {
                                        echo '<input type="text" class="form-control" style="width: 200px;display: inline" name="name" value="' . $_SESSION['user']['name'] . '" required>';
                                        echo '<input type="submit" class="btn btn-primary btn-sm" value="save" name="saveName"><br>';
                                    }if (isset($_GET['saveName'])) {
                                        $name = $_GET['name'];
                                        $stmt = $conn1->prepare("UPDATE `user` SET `name`='" . $name . "' WHERE `id` = " . $_SESSION['user']['id']);
                                        $stmt->execute();
                                        header("location:informationUser.php");
                                    }
                                    ?>
                                </form>
                                <form action="informationUser.php" method="get">
                                    <h3 style="display: inline;line-height: 70px">Giới tính : </h3><?php
                                    if (!isset($_GET['changeGender'])) {
                                        echo '<h3 style="display: inline">' . $_SESSION['user']['gioitinh'] . '</h3>';
                                        echo '<input type="submit" style="margin-left: 10px" class="btn btn-warning btn-xs" value="edit" name="changeGender"><br>';
                                    } else {
                                        echo '<h3 style="display: inline;margin-left: 10px">Nam</h3>  <input type="radio"  name="gender" value="Male"' . ($_SESSION['user']['gioitinh'] == 'Male' ? 'checked' : "") . '>';
                                        echo '<h3 style="display: inline;margin-left: 30px">Nữ</h3>   <input type="radio"  name="gender" value="Female"' . ($_SESSION['user']['gioitinh'] == 'Female' ? 'checked' : "") . '>';
                                        echo '<input type="submit" style="margin-left: 30px" class="btn btn-primary btn-sm" value="save" name="saveGender"><br>';
                                    }if (isset($_GET['saveGender'])) {
                                        $gender = $_GET['gender'];
                                        $stmt = $conn1->prepare("UPDATE `user` SET `gioitinh`='" . $gender . "' WHERE `id`=" . $_SESSION['user']['id']);
                                        $stmt->execute();
                                        header("location:informationUser.php");
                                    }
                                    ?>
                                </form>
                                <form action="informationUser.php" method="get">
                                    <h3 style="display: inline;line-height: 70px;">Ngày Sinh : </h3><?php
                                    if (!isset($_GET['changeBirthday'])) {
                                        echo '<h3 style="display: inline">' . $_SESSION['user']['ngaysinh'] . '</h3>';
                                        echo '<input type="submit" style="margin-left: 10px" class="btn btn-warning btn-xs" value="edit" name="changeBirthday"><br>';
                                    } else {
                                        echo '<input type="date" class="form-control" style="width: 200px;display: inline" name="birthday" value="' . $_SESSION['user']['ngaysinh'] . '">';
                                        echo '<input type="submit" class="btn btn-primary btn-sm" value="save" name="saveBirthday"><br>';
                                    }if (isset($_GET['saveBirthday'])) {
                                        $birthday = $_GET['birthday'];
                                        $stmt = $conn1->prepare("UPDATE `user` SET `ngaysinh`='" . $birthday . "' WHERE `id` = " . $_SESSION['user']['id']);
                                        $stmt->execute();
                                        header("location:informationUser.php");
                                    }
                                    ?>
                                </form>

                                <form action="informationUser.php" method="get">
                                    <h3 style="display: inline;line-height: 70px">Địa chỉ : </h3><?php
                                    if (!isset($_GET['changeAddress'])) {
                                        echo '<h3 style="display: inline">' . $_SESSION['user']['diachi'] . '</h3>';
                                        echo '<input type="submit" style="margin-left: 10px" class="btn btn-warning btn-xs" value="edit" name="changeAddress"><br>';
                                    } else {
                                        echo '<input type="text" class="form-control" style="width: 200px;display: inline" name="address" value="' . $_SESSION['user']['diachi'] . '">';
                                        echo '<input type="submit" class="btn btn-primary btn-sm" value="save" name="saveAddress"><br>';
                                    }if (isset($_GET['saveAddress'])) {
                                        $address = $_GET['address'];
                                        $stmt = $conn1->prepare("UPDATE `user` SET `diachi`='" . $address . "' WHERE `id` = " . $_SESSION['user']['id']);
                                        $stmt->execute();
                                        header("location:informationUser.php");
                                    }
                                    ?>
                                </form>
                                <form action="informationUser.php" method="get">
                                    <h3 style="display: inline;line-height: 70px">Email : </h3><?php
                                    if (!isset($_GET['changeEmail'])) {
                                        echo '<h3 style="display: inline">' . $_SESSION['user']['email'] . '</h3>';
                                        echo '<input type="submit" style="margin-left: 10px" class="btn btn-warning btn-xs" value="edit" name="changeEmail"><br>';
                                    } else {
                                        echo '<input type="text" class="form-control" style="width: 200px;display: inline" name="email" value="' . $_SESSION['user']['email'] . '">';
                                        echo '<input type="submit" class="btn btn-primary btn-sm" value="save" name="saveEmail"><br>';
                                    }if (isset($_GET['saveEmail'])) {
                                        $email = $_GET['email'];
                                        $stmt = $conn1->prepare("UPDATE `user` SET `email`='" . $email . "' WHERE `id` = " . $_SESSION['user']['id']);
                                        $stmt->execute();
                                        header("location:informationUser.php");
                                    }
                                    ?>
                                </form>
                                <a href="changePassword.php">Đổi mật khẩu</a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>













    </body>
</html>
