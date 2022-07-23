<?php
include('./base.php');
$DB = new DB($_POST['table']);

$data = $DB->find($_POST['id']);
$data['text'] = $_POST['text'];

$DB->save($data);

to('../back.php?do='.$_POST['table']);

?>