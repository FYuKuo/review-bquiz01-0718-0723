<?php
include('./base.php');
$DB = new DB($_POST['table']);
$row = $DB->find($_POST['id']);

// unlink('../img/'.$row['img']);

$data = [];

$data['id'] = $_POST['id'];

if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],'../img/'.$_FILES['img']['name']);
    $data['img']=$_FILES['img']['name'];
}

$DB->save($data);

to('../back.php?do='.$_POST['table']);

?>