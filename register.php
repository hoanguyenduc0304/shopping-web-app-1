<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">

        <title></title>
    </head>
    <body>


        <div class="form-container" style="display: block;text-align: center">
            <form action="xuly_register.php" method="Post"  style="display: inline-block">

                <div class="form-group">
                    <label style="margin-left:-225px;margin-top: 10%" for="username">Username</label>
                    <input type="text" class="form-control" style="width: 300px" id="username" name="username" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label style="margin-left: -233px" for="password">Password</label>
                    <input type="password" name="password" class="form-control" style="width: 300px" id="password" placeholder="Enter Password">
                </div>
                <div class="form-group">
                    <label style="margin-left: -216px" for="repassword">rePassword</label>
                    <input type="password" name="repassword" class="form-control" style="width: 300px" id="repassword">
                </div>
                <div class="form-group">
                    <label style="margin-left: -230px" for="name">Họ và Tên</label>
                    <input type="text" name="name" class="form-control" style="width: 300px" id="name">
                </div>
                <div class="form-group">
                    Nam:  <input type="radio"  name="sex"  value="Male"checked>
                    Nữ:   <input type="radio"  name="sex"  value="Female"> 
                </div>
                <div class="form-group">
                    <label style="margin-left: -221px" for="birthday">Ngày Sinh</label>
                    <input type="date" name="birthday" class="form-control" style="width: 300px" id="birthday">
                </div>
                <div class="form-group">
                    <label style="margin-left: -246px" for="address">Địa chỉ</label>
                    <input type="text" name="address" class="form-control" style="width: 300px" id="address">
                </div>
                <div class="form-group">
                    <label style="margin-left: -257px" for="email">Email</label>
                    <input type="email" name="email" class="form-control" style="width: 300px" id="email">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Register</button><br>
                <?php
                require_once './validate.php';
                if (isset($_GET['error'])) {
                    echo '<span style="color: red">' . test_input($_GET['error']) . '</span><br>';
                } else {
                    echo '';
                }
                ?>
            </form>
        </div>



        <script>
            var password = document.getElementById("password")
                    , repassword = document.getElementById("repassword");

            function validatePassword() {
                if (password.value !== repassword.value) {
                    repassword.setCustomValidity("Passwords Don't Match");
                    repassword.value = "";
                } else {
                    repassword.setCustomValidity('');
                }
            }

            password.onchange = validatePassword;
            repassword.onchange = validatePassword;
        </script>

    </body>
</html>
