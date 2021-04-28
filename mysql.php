<?php

function openDB() {
    $db_host = 'db.mis.kuas.edu.tw';
    $db_name = 's1105137127';
    $db_user = 's1105137127';
    $db_password = 'T225149132';
    $dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8";
    try {
        $conn = new PDO($dsn, $db_user, $db_password);//PDO 引用別人定義好的東西，引用(連接)資料庫的東西
        $response['status']=200;
        $response['result']=$conn;
    } catch (PDOException $e) {
        $response['status']=$e->getCode();
        $response['message']=$e->getMessage();
        
    }
    return ($response);
}
//success
?>

