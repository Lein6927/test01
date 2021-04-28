<?php
require_once 'mysql.php';
$response=openDB();
if($response['status']==200){
    try{
        $conn=$response['result'];
        echo $response;
        $sql="INSERT INTO `student` (`id`, `name`, `addr`, `birth`) 
    VALUES  (?,?,?,?)";
        $stmt=$conn->prepare($sql);
        $result=$stmt->execute(array($id,$name,$addr,$birth));
        if($result){
            $count=$stmt->rowCount();
            if($count<1){
                $response['status']=204;
                $response['message']="faild";

            }
            else{
                $response['status']=200;
                $response['message']="success";
            
            }
        }
        else{
        $response['status']=400;
        $response['message']=" SQL have something wrong";
        }

    }catch (PDOException $e){
        $response['status']=$e->getCode();
        $response['message']=$e->getMessage();

    }

}echo json_encode($response);
    //失敗
?>