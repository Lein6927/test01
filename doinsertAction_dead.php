<?php
$db_host="db.mis.kuas.edu.tw";
$db_name="s1105137127";
$db_user="s1105137127";
$db_password="T225149132";
$dsn="mysql:host=$db_host;dbname=$db_name;charset=utf8";

try{
    $conn=new PDO($dsn,$db_user,$db_password);
    $sql="INSERT INTO `student` (`id`, `name`, `addr`, `birth`) VALUES ('A01','TRY', '台中市', '2011-05-27')";
    $stmt=$conn->prepare($sql);
    $result=$stmt->execute();
    if($result){
        $count=$stmt->rowCount();
        if($count<1){//如果有新增成功 count<1
            $response['status']=204;
            $response['message']="新增失敗";
        }else{
            $response['status']=200;
            $response['message']="新增成功";
            }                
        }
        else{
            $response['status']=400;
            $response['message']="SQL錯誤";      
        }
    }catch (PDOException $e){
        $response['status']=$e->getCode();
        $response['message']=$e->getMessage();
    }
    echo json_encode($response);
#success 寫死的新增

?>