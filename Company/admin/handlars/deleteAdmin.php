<?php

 require("../admin_content/connection/connection.php");

if ($_SERVER['REQUEST_METHOD'] != "POST") {
    $error[] = "error in requst method";
    $_SESSION['errors'] = $error;
    header("location: ../admins.php");
}
session_start();

require("../checkLogin.php");
echo '<pre>';
 print_r($_POST);
echo '</pre>';
extract($_POST);
$sql="SELECT * FROM `admins` WHERE `admins`.`id`=$id";
$query=mysqli_query($conn,$sql);

if(mysqli_num_rows($query)<=0){
    $_SESSION['errors']=['no admin found'];
    header("location: ../admins.php");
}
$admin=mysqli_fetch_assoc($query);
$img=$admin['imge'];
$deletSql="DELETE FROM `admins` WHERE `admins`.`id`=$id";
if(mysqli_query($conn,$deletSql)){
 if($img!='defult.jpg'){
    unlink("../uplode/img/$img");
 }
    $_SESSION['success'] = "admin deleting successfuly";
    header("location: ../Admins.php");

}else{
    $_SESSION['errors']=['something wrong'];
    header("location: ../admins.php");

}



?>