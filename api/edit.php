<?php
include('./base.php');
$DB = new DB($_POST['table']);


foreach ($_POST['id'] as $key => $value) {

    if(isset($_POST['del']) && in_array($value,$_POST['del'])) {

        $DB->del($value);

    }else{
        $row = $DB->find($value);

        switch($_POST['table']) {
            case 'title':
                $row['text'] = $_POST['text'][$key];
                $row['sh'] = (isset($_POST['sh']) && $_POST['sh'] == $value)?1:0;
            break;
                
            case 'ad':
                $row['text'] = $_POST['text'][$key];
                $row['sh'] = (isset($_POST['sh']) && in_array($value,$_POST['sh']))?1:0;
        
            break;
        
            case 'mvim':
            case 'image':
            case 'news':    
                $row['sh'] = (isset($_POST['sh']) && in_array($value,$_POST['sh']))?1:0;
                break;
                
            case 'admin':
                $row['acc'] = $_POST['acc'][$key];
                $row['pw'] = $_POST['pw'][$key];
                break;
        
            case 'menu':
                $row['text'] = $_POST['text'][$key];
                $row['href'] = $_POST['href'][$key];
                $row['sh'] = (isset($_POST['sh']) && in_array($value,$_POST['sh']))?1:0;
        
            break;
        }

        $DB->save($row);
    }

   
}

to('../back.php?do='.$_POST['table']);
?>