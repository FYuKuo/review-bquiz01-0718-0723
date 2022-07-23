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
                $row['sh'] = (isset($_POST['sh']) && in_array($value,$_POST['sh']))?1:0;
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

        $DB->save($row);
    }

   
}

to('../back.php?do='.$_POST['table']);
?>