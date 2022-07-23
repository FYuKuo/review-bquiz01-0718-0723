<?php
date_default_timezone_set('Asia/Taipei');

session_start();

class DB {

    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db15-0719";
    protected $user = 'root';
    protected $pw = '';
    protected $pdo;
    public $table;

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn,$this->user,$this->pw,);
    }

    // 找到特定條件的所有資料
    public function all(...$arg) {
        $sql = "SELECT * FROM `$this->table`";

        if(isset($arg[0])){
            if(is_array($arg[0])){
                foreach ($arg[0] as $key => $value) {
                    $tmp[]= "`$key`='$value'";
                }

                $sql = $sql . " WHERE" . join('AND',$tmp);
            }else {
                $sql = $sql . $arg[0];
            }
        }

        if(isset($arg[1])){
            $sql = $sql . $arg[1];
        
        }
        // echo $sql;

        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        
    }

    // 找尋特定條件的資料 只顯示一筆
    public function find($id) {
        $sql = "SELECT * FROM `$this->table`";

        if(is_array($id)){
            foreach ($id as $key => $value) {
                $tmp[]= "`$key`='$value'";
            }

            $sql = $sql . " WHERE" . join('AND',$tmp);
        }else {
            $sql = $sql . " WHERE `id`='$id'";
        }

        // echo $sql;

        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        
    }

    // 儲存或更新
    public function save($array){
        
        if(isset($array['id'])) {

            foreach ($array as $key => $value) {
                $tmp[]= "`$key`='$value'";
            }

            $sql = "UPDATE `$this->table` SET " . join(',',$tmp) . " WHERE `id`='{$array['id']}'";


        }else {

            $col = join("`,`",array_keys($array));
            $value = join("','",$array);

            $sql = "INSERT INTO `$this->table` (`$col`) VALUES ('$value')";
        }
        // echo $sql;

        return $this->pdo->exec($sql);
    }

    public function del($id) {
        $sql = "DELETE FROM `$this->table`";

        if(is_array($id)){
            foreach ($id as $key => $value) {
                $tmp[]= "`$key`='$value'";
            }

            $sql = $sql . " WHERE" . join('AND',$tmp);
        }else {
            $sql = $sql . " WHERE `id`='$id'";
        }
        // echo $sql;

        return $this->pdo->exec($sql);
    }
        
    // 算數
    public function math($math,...$arg) {
        $sql = "SELECT $math(*) FROM `$this->table`";

        if(isset($arg[0])){
            if(is_array($arg[0])){
                foreach ($arg[0] as $key => $value) {
                    $tmp[]= "`$key`='$value'";
                }
    
                $sql = $sql . " WHERE" . join('AND',$tmp);
            }else {
                $sql = $sql . $arg[0];
            }
        }

        if(isset($arg[1])){
            $sql = $sql . $arg[1];
        
        }

        // echo $sql;
        return $this->pdo->query($sql)->fetchColumn();
        
    }


}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url) {
    header("location:".$url);
}


class STR 
{
    public $header;
    public $img;
    public $text;
    public $acc;
    public $pw;
    public $pwCheck;
    public $href;
    public $child;
    public $updateBtn;
    public $addBtn;
    public $addHeader;
    public $addImg;
    public $addText;
    public $addHref;
    public $updateHeader;
    public $updateImg;
    public $updateHref;
    public $updateText;
    public $table;

    public function __construct($table)
    {
        $this->table = $table;

        switch($table) {

            case 'title':
            $this->header = '網站標題管理';
            $this->img = '網站標題';
            $this->text = '替代文字';
            $this->updateBtn = '更新圖片';
            $this->updateHeader = '更新標題區圖片';
            $this->updateImg = '標題區圖片：';
            $this->updateText = '標題區替代文字：';
            $this->addBtn = '新增網站標題圖片';
            $this->addHeader = '新增標題區圖片';
            $this->addImg = '標題區圖片：';
            $this->addText = '標題區替代文字：';
            break;

            case 'ad':
            $this->header = '動態文字管理';
            $this->text = '動態文字';
            $this->addBtn = '新增動態文字廣告';
            $this->addHeader = '新增動態文字廣告';
            $this->addText = '動態文字廣告：'; 
            break;

            case 'mvim':
            $this->header = '動畫圖片管理';
            $this->img = '動畫圖片';
            $this->updateBtn = '更換動畫';
            $this->updateHeader = '更新動畫圖片';
            $this->updateImg = '動畫圖片：';
            $this->addBtn = '新增動畫圖片';
            $this->addHeader = '新增動畫圖片';
            $this->addImg = '動畫圖片：'; 
            break;

            case 'image':
            $this->header = '校園映像資料管理';
            $this->img = '校園映像資料圖片';
            $this->updateBtn = '更換圖片';
            $this->updateHeader = '更新校園映像圖片';
            $this->updateImg = '校園映像圖片：';
            $this->addBtn = '新增校園映像圖片';
            $this->addHeader = '新增校園映像圖片';
            $this->addImg = '校園映像圖片：'; 
            break;

            case 'total':
            $this->header = '進站總人數管理';
            $this->text = '進站總人數：';
            
            break;

            case 'bottom':
            $this->header = '頁尾版權資料管理';
            $this->text = '頁尾版權資料：';
            break;

            case 'news':
            $this->header = '最新消息資料管理';
            $this->text = '最新消息資料內容';
            $this->addBtn = '新增最新消息資料';
            $this->addHeader = '新增最新消息資料';
            $this->addText = '最新消息資料：'; 
            break;

            case 'admin':
            $this->header = '管理者帳號管理';
            $this->acc = '帳號';
            $this->pw = '密碼';
            $this->pwCheck = '確認密碼';
            $this->addBtn = '新增管理者帳號';
            $this->addHeader = '新增管理者帳號';
            break;

            case 'menu':
            $this->header = '選單管理';
            $this->text = '主選單名稱';
            $this->href = '選單連結網址';
            $this->child = '次選單數';
            $this->updateBtn = '編輯次選單';
            $this->updateHeader = '編輯次選單';
            $this->updateText = '次選單名稱';
            $this->updateHref = '次選單連結網址';
            $this->addBtn = '新增主選單';
            $this->addHeader = '新增主選單';
            $this->addText = '主選單名稱：';
            $this->addHref = '選單連結網址：';
            break;


        }
    }
}


if(isset($do)){
    $STR = new STR($do);
    $DB = new DB($do);

}

$Title = new DB('title');
$Bottom = new DB('bottom');
$Total = new DB('total');
$Menu = new DB('menu');
$News = new DB('news');
$Ad = new DB('ad');
$Image = new DB('image');
$Mvim = new DB('mvim');
$Admin = new DB('admin');

?>