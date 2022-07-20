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

        if(is_array($arg[0])){
            foreach ($arg[0] as $key => $value) {
                $tmp[]= "`$key`='$value'";
            }

            $sql = $sql . " WHERE" . join('AND',$tmp);
        }else {
            $sql = $sql . $arg[0];
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

        return $this->pdo->exec($sql);
    }
        
    // 算數
    public function math($math,...$arg) {
        $sql = "SELECT $math(*) FROM `$this->table`";

        if(is_array($arg[0])){
            foreach ($arg[0] as $key => $value) {
                $tmp[]= "`$key`='$value'";
            }

            $sql = $sql . " WHERE" . join('AND',$tmp);
        }else {
            $sql = $sql . $arg[0];
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


?>