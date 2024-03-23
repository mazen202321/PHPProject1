<?php

use function PHPSTORM_META\type;

session_start();
$error = [];


if ($_SERVER['REQUEST_METHOD'] != "POST") {
    $error[] = "error in requst method";
    $_SESSION['errors'] = $error;
    header("location: ../updateAdmin.php");
}
extract($_POST);
require("../admin_content/connection/connection.php");
$sqlImg = "SELECT * FROM `admins` WHERE `id`='$id'";
$admin = mysqli_fetch_assoc(mysqli_query($conn, $sqlImg));

if ($_POST['name'] == "") {
   $name=$admin['name'];
}
if ($_POST['email'] == "") {
    $email = $admin['email'];
}


require("./handelValidation.php");
$name = handelStr($name);
$email = handelStr($email);
if (!validatEmail($email)) {

    $error[] = "email is notValed";
}
$oldimge=$admin['imge'];
$imageName;
if ($_FILES['image']['name'] == '') {
    $imageName = $oldimge;
} else {
    $pImg = $_FILES["image"];
    if (checkIamgetype($pImg['type'])) {
        if (handelImgSize5MB($pImg['size'])) {
            $ext = pathinfo($pImg['name'], PATHINFO_EXTENSION);
            $imageName = uniqid() . $name . '.' . $ext;
        } else {
            $error[] = "image size must be less than 5MB";
        }
    } else {
        $error[] = "you allow just uplode image files";
    }
}

if (!empty($error)) {
    $_SESSION['errors'] = $error;
    header("location: ../admins.php");
} else {
 
 
    $sqlupdate = " UPDATE `admins` SET `name`='$name',`email`='$email',`imge`='$imageName',`status`='$stats' WHERE `admins`.`id`='$id'";
    if (mysqli_query($conn, $sqlupdate)) {
        if ($imageName != $oldimge) {
            move_uploaded_file($_FILES['image']['tmp_name'], "../uplode/img/" . $imageName);
            if ($oldimge != 'defult.jpg') {
                unlink("../uplode/img/$oldimge");
              
            }
        }
    } else {
        $error[] = 'something wrong';
        $_SESSION['errors'] = $error;
        header("location: ../admins.php");
    }
    $_SESSION['success'] = "admin updateing successfuly";
    header("location: ../Admins.php");
}
