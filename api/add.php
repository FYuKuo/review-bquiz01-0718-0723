<?php
include_once('./base.php');
$DB = new DB($_POST['table']);

$data = [];

dd($_FILES['img']);

if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],'../img/'.$_FILES['img']['name']);
    $data['img']=$_FILES['img']['name'];
}

if(isset($_POST['text'])) {
    
    $data['text']=$_POST['text'];
}


switch($_POST['table']) {
    case 'title':
        $data['sh']=0;
    break;
        
    case 'ad':
        $data['sh']=0;

    break;

    case 'mvim':

    break;

    case 'image':

    break;

    case 'total':

        
    break;

    case 'bottom':

    break;

    case 'news':

    break;

    case 'admin':

    break;

    case 'menu':

    break;
}

$DB->save($data);

to('../back.php?do='.$_POST['table']);
?>