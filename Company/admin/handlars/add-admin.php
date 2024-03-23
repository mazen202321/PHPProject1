<?php

use function PHPSTORM_META\type;

session_start();
$error=[];

if($_SERVER['REQUEST_METHOD']!="POST"){
$error[]="error in requst method";
$_SESSION['errors']=$error;
header("location: ../creatAdmin.php");
}
if($_POST['name']==""){
    $error[]="name is requared";

}
if($_POST['email']==""){
    $error[]="email is requared";

}
if($_POST['password']==""){
    $error[]="password is requared";
}

extract($_POST);


require("./handelValidation.php");
$name=handelStr($name);
$password=handelStr($password);
$email=handelStr($email);
if(!validatEmail($email)){
    
    $error[]="email is notValed";
}
if(!validatPassword($password)){
    
    $error[]="passwrod is notValed must contain uppercase and length >=8";

}
$imageName;
if($_FILES["image"]["name"]!=''){
$pImg=$_FILES["image"];
if(checkIamgetype($pImg['type'])){
    if(handelImgSize5MB($pImg['size'])){
        $ext=pathinfo($pImg['name'],PATHINFO_EXTENSION);
      $imageName=uniqid().$name.'.'.$ext;
      
    }
    else{
        $error[]="image size must be less than 5MB";
    }
}else{
    $error[]="you allow just uplode image files";
}
}else{
    $imageName='defult.jpg';
}
if(!empty($error)){
$_SESSION['errors']=$error;
header("location: ../creatAdmin.php");
}else{


    require("../admin_content/connection/connection.php");
    $sqlChick="SELECT `id`  FROM `admins` where `email`='$email' ";
    $chickQuery=mysqli_query($conn,$sqlChick);
    if(mysqli_num_rows($chickQuery)!=0){
        $error[]="email alredy exest ";
        $_SESSION['errors']=$error;
        header("location: ../creatAdmin.php");
    }else{
        $hashpassword=password_hash($password,PASSWORD_DEFAULT);
         $sqlAdd="INSERT INTO `admins`(`name`,`email`,`password`,`imge`,`status`) VALUES ('$name','$email','$hashpassword','$imageName','$stats')";
       if(mysqli_query($conn,$sqlAdd)){
        if($imageName!='defult.jpg'){
       move_uploaded_file($_FILES['image']['tmp_name'],"../uplode/img/".$imageName);}
       }else{
        $error[]= 'something wrong';
        $_SESSION['errors']=$error;
        header("location: ../creatAdmin.php");
    }
       $_SESSION['success']="admin created successfuly";
       header("location: ../admins.php");
   }

    

}

?>