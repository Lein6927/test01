<?php

$id =$_POST['id'];

$db_host="db.mis.kuas.edu.tw";
$db_name="s1105137127";
$db_user="s1105137127";
$db_password="T225149132";
$dsn="mysql:host=$db_host;dbname=$db_name;charset=utf8";


    try {
        $conn=new PDO($dsn,$db_user,$db_password);
        $sql = "DELETE FROM `student` WHERE id=?";
        $stmt=$conn->prepare($sql);
        $result=$stmt->execute(array($id));
        
        if($result){
            $count=$stmt->rowCount();//rowCount（）來確認是否更新與INSERT成功。
            if ($count < 1) {
                $response['status']=204; //無連接
                $response['message']="No Content";
               
            } else {
                $response['status']=200; //OK
                $response['message']="Success";
            }
        }
        else{
            $response['status']=400; //無連接
            $response['message']="SQL錯誤";
        }
     
    } catch (PDOException $ex) {
        $response['status']=$ex->getCode; //無連接
        $response['message']=$ex->getMessage();

    }
echo json_encode($response);


?>

