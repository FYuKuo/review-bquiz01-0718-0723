<?php
include_once('./base.php');
$DB = new DB($_POST['table']);


if(isset($_POST['id'])){

    foreach ($_POST['id'] as $key => $value) {
        if(isset($_POST['del']) && in_array($value,$_POST['del'])){
            $DB->del($value);
        }else{

            $data = $DB->find($value);
        
            $data['text'] = $_POST['text'][$key];
            $data['href'] = $_POST['href'][$key];
    
            $DB->save($data);
        }



    }


}

if(isset($_POST['textAdd'])){
    foreach ($_POST['textAdd'] as $key => $value) {

        if($value != ''){
            
            $data = [];
                    
                    
            $data['text'] = $_POST['textAdd'][$key];
            $data['href'] = $_POST['hrefAdd'][$key];
            $data['sh']=1;
            $data['parent']= $_POST['parentId'];
                
                
            $DB->save($data);

        }
    }

}


to('../back.php?do='.$_POST['table']);

?>