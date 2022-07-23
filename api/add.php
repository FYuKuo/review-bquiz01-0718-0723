<?php
include_once('./base.php');
$DB = new DB($_POST['table']);

$data = [];


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
    case 'mvim':
    case 'image':
    case 'news':
        $data['sh']=1;

    break;

    case 'admin':
        if($_POST['pw'] == $_POST['pwCh']) {
            $data['acc'] = $_POST['acc'];
            $data['pw'] = $_POST['pw'];
        }else {
            echo "<script>";
            echo "alert('請重新確認密碼')";
            echo "</script>";
        }
    break;

    case 'menu':
        $data['text'] = $_POST['text'];
        $data['href'] = $_POST['href'];
        $data['sh']=1;
        $data['parent']=0;

    break;
}

if(!empty($data)){
    $DB->save($data);
}

header("refresh:0;url=../back.php?do={$_POST['table']}");

?>