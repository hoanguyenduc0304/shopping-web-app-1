<?php
require_once 'config.php';
if (!isset($_SESSION)) {
    session_start();
}
$id = (int) $_GET['id'];
$quantity = (int) $_GET['quantity'];
if (is_int($id)) {
    $stmt = $conn1->prepare("SELECT * FROM `shop` WHERE `id` = " . $id);
    $stmt->execute();
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    if($_SESSION['user']['level']==2){
        $sale = 0.7; //vip dc giảm 30%
    }else{
        $sale = 1; 
    }
    if ($rows != null) {
        if ($rows['number_of'] >= $quantity) { //kiem tra so luong
            if ($quantity * $rows['price']*0.7 <= $_SESSION['user']['coin']) { //kiem tra so du trong tai khoan con du de mua hang
                //them vao bang hoa don mua hang
                $stmt = $conn1->prepare("INSERT INTO `be_bought`(`item_id`, `user_id`, `date`, `quantity`) VALUES (" . $id . "," . $_SESSION['user']['id'] . ",'" . date('Y-m-d H:i:s') . "'," . $quantity . ")");
                $stmt->execute();
                //cap nhat lai bang SHOP ( giam so luong san pham da duoc mua)
                $stmt = $conn1->prepare("UPDATE `shop` SET `number_of`= " . ((int) $rows['number_of'] - $quantity) . "  WHERE `id` =" . $id);
                $stmt->execute();
                // cap nhat bang user (cap nhat lại so coin sau khi mua hang)
                $stmt = $conn1->prepare("UPDATE `user` SET `coin`= " . ((int) $_SESSION['user']['coin'] - ($quantity * $rows['price']*0.7)) . " WHERE `id`=" . $_SESSION['user']['id']);
                $stmt->execute();
                $noterror = "Giao dịch thành công !!";
                header("location:shop.php?noterror=" . $noterror);
            } else {
                $error = "Số dư trong tài khoản không đủ !!";
                header("location:shop.php?error=" . $error);
            }
        } else {
            $error = "Số lượng hàng quá lớn !!";
            header("location:shop.php?error=" . $error);
        }
    } else {
        $error = "Đã có lỗi xảy ra !!";
        header("location:shop.php?error=" . $error);
    }
} else {
    $error = "Đã có lỗi xảy ra !!";
    header("location:shop.php?error=" . $error);
}
?>