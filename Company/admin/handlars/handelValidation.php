<?php

 
function validatEmail($email){
return filter_var($email,FILTER_VALIDATE_EMAIL);
}
function validatPassword($password){
    $res=true;
    if(strlen($password) < 8){
        $res=false;
    }elseif(!preg_match('/[A-Z]/' ,$password)){
        $res=false;
    }
    return $res;
}
function handelStr($string){
  $newStr=strip_tags($string);
  return trim($newStr);
}
function checkIamgetype(String $type){
    if(preg_match("/image/",$type)){
        return true;
    }else{return false;}
}
function handelImgSize5MB(int $size){
$custemSize=5*(1024*1024);
return $size<=$custemSize;

}

?>