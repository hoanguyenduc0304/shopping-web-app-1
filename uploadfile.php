<?php

require_once 'config.php';
session_start();

// check file size
function checkSize($size, $min, $max) {
    $flag = false;
    if ($size >= $min && $size <= $max)
        $flag = true;
    return $flag;
}

//check file extensions
function checkExtension($fileName, $arrExtension) {
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $flag = FALSE;
    if (in_array(strtolower($ext), $arrExtension))
        $flag = true;
    return $flag;
}

$avatar = $_FILES['avatar-upload'];
$fileName = 'avatar' . $_SESSION['user']['id'] . '.' . pathinfo($avatar['name'], PATHINFO_EXTENSION);
$flagSize = checkSize($avatar['size'], 10 * 1024, 5 * 1024 * 1024); //(10Kb <= size <= 5MB)
$flagExtension = checkExtension($avatar['name'], array('jpg', 'png'));

if ($flagSize == true && $flagExtension == true) {
    move_uploaded_file($avatar['tmp_name'], './avatar/' . $fileName);
    $stmt = $conn1->prepare("UPDATE `user` SET `avatar` = './avatar/".$fileName."' WHERE `id`=" . $_SESSION['user']['id']);
    $stmt->execute();
    header("location:informationUser.php");
}else {
    header("location:informationUser.php");
}
?>
    
