<?php
include('./base.php');
$data = ['acc'=>$_POST['acc'],'pw'=>$_POST['pw']];

$admin = $Admin->find($data);

if(!empty($admin)){
    $_SESSION['user'] = $_POST['acc'];
    to('../back.php');
}else{
    echo "<script>";
    echo "alert('帳號或密碼錯誤')";
    echo "</script>";
    header("refresh:0;url=../index.php?do=login");
}

?>