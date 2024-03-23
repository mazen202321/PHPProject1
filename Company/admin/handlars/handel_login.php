<?php

session_start();

if($_SERVER['REQUEST_METHOD']!="POST"){
$error[]="error in requst method";
$_SESSION['errors']=$error;
header("location: ../login.php");
}
if($_POST['email']==""){
    $error[]="password is requared";

}
if($_POST['password']==""){
    $error[]="password is requared";
}

extract($_POST);

require("./handelValidation.php");

$password=handelStr($password);
$email=handelStr($email);
if(!validatEmail($email)){
    
    $error[]="email is notValed";
}
if($password<8){
    
    $error[]="passwrod is notValed must length >=8";

}
if(!empty($error)){
$_SESSION['errors']=$error;
header("location: ../login.php");
}else{
    require("../admin_content/connection/connection.php");
    
    $sql="SELECT * FROM `admins` WHERE `email`='$email'";
    $query=mysqli_query($conn,$sql);

    if(mysqli_num_rows($query)< 1 ){
        $error[]=  "email is not exest";
        $_SESSION['errors']=$error;
header("location: ../login.php");
    }
$user=mysqli_fetch_assoc($query);
$dBPass=$user['password'];
if(!password_verify($password,$dBPass) ){
    $error[]=  "password is invaled";
    $_SESSION['errors']=$error;
header("location: ../login.php");
}else{

 $_SESSION['admin']=$user;  

header("location: ../index.php") ;

}
}
?>