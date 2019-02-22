<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'config.php';
        include 'checkRememberLogin.php';
        include 'checkLogin.php';
        require_once 'navigationBar.php';

        if (isset($_POST["save"])) {
            $oldpass = $_POST["oldpassword"];
            $newpass = md5($_POST["newpassword"]);
            if (md5($oldpass) != $_SESSION['user']['password']) {
                $error = 'Mật khẩu cũ không đúng !!';
            } else {
                $stmt = $conn1->prepare("UPDATE `user` SET `password` = '" . $newpass . "' WHERE `id` = " . $_SESSION['user']['id']);
                if ($stmt->execute()) {
                    $error = 'Thay đổi thành công !!';
                }
            }
        }
        ?>

        <div class="form-container" style="display: block;text-align: center">
            <form action="changePassword.php" method="Post"  style="display: inline-block">
                <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 style="font-size: 36px;color: #42B32F;text-align: center;font-weight: 500;margin-bottom: 70px;">Đổi mật khẩu</h1>
                </div>
                <div class="form-group">
                    <label style="margin-left: -530px;margin-top: 50%" for="oldpassword">Password</label>
                    <input type="password" name="oldpassword" class="form-control" style="width: 300px" id="oldpassword"  placeholder="Enter Old Password">
                </div>
                <div class="form-group">
                    <label style="margin-left: -199px" for="newpassword">New Password</label>
                    <input type="password" name="newpassword" class="form-control" style="width: 300px" id="newpassword" placeholder="Enter New Password">
                </div>
                <div class="form-group">
                    <label style="margin-left: -208px" for="repassword">Re-Password</label>
                    <input type="password" name="repassword" class="form-control" style="width: 300px" id="repassword">
                </div>
                <button type="submit" name="save" value="save" class="btn btn-primary">Save</button><br> 
                <?php
                require_once './validate.php';
                if (isset($error)) {
                    echo '<span style="color: red">' . test_input($error) . '</span><br>';
                } else {
                    echo '';
                }
                ?>
            </form>
        </div>








    </body>
    <script>
        var newpassword = document.getElementById("newpassword")
                , repassword = document.getElementById("repassword");

        function validatePassword() {
            if (newpassword.value !== repassword.value) {
                repassword.setCustomValidity("Passwords Don't Match");
                repassword.value = "";
            } else {
                repassword.setCustomValidity('');
            }
        }

        newpassword.onchange = validatePassword;
        repassword.onchange = validatePassword;
    </script>
</html>

