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
        require_once "config.php";
        session_start();
        if (isset($_POST["submit"])) {
            $username = addslashes($_POST["username"]);
            $password = md5($_POST["password"]);
            $gioitinh = $_POST["sex"];
            $email = addslashes($_POST["email"]);
            $hoten = $_POST["name"];
            $diachi = addslashes($_POST["address"]);
            $ngaysinh = $_POST["birthday"];

            if ($conn) {
                $stmt = $conn1->prepare("SELECT username FROM user WHERE username ='$username'");
                $stmt->execute();
                $rows = $stmt->fetch(PDO::FETCH_NUM);
                if ($rows != 0) {
                        $error = "Username đã tồn tại !";
                         header("location:register.php?error=" . $error);
                } else {
                    if (!preg_match('/^[^@]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+$/', $email)) {
                         $error = "Email không hợp lệ!";
                         header("location:register.php?error=" . $error);
  
                    } else {
                        try {
                            $stmt = $conn1->prepare('insert into user(username,password,email,name,diachi,ngaysinh,gioitinh) values(?,?,?,?,?,?,?)');
                            //Gán các biến (lúc này chưa mang giá trị) vào các placeholder theo thứ tự tương ứng
                            $stmt->bindParam(1, $username);
                            $stmt->bindParam(2, $password);
                            $stmt->bindParam(3, $email);
                            $stmt->bindParam(4, $hoten);
                            $stmt->bindParam(5, $diachi);
                            $stmt->bindParam(6, $ngaysinh);
                            $stmt->bindParam(7, $gioitinh);
                            if($stmt->execute()){
                                $error = "Đăng kí thành công !";
                                header("location:register.php?error=" . $error);
                            } else {
                                $error = "Đã có lỗi xảy ra !";
                                header("location:register.php?error=" . $error);
                            }   
                        } catch (PDOException $e) {
                            echo $e->getMessage();
                        }
                    }
                }
            }
        }
        ?>		
    </body>
</html>
