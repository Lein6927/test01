<?php
$id=$_POST['id'];
$name=$_POST['name'];
$addr=$_POST['addr'];
$birth=$_POST['birth'];

echo $id,$name;
$db_host="db.mis.kuas.edu.tw";
$db_name="s1105137127";
$db_user="s1105137127";
$db_password="T225149132";
$dsn="mysql:host=$db_host;dbname=$db_name;charset=utf8";

try{
    $conn=new PDO($dsn,$db_user,$db_password);//success
    //$rows =$stmt->fetchAll(PDO::FETCH_ASSOC);    
    $sql="INSERT INTO  `student`(id,name,addr,birth) VALUES ('$id','$name','$addr','$birth')";
    $stmt=$conn->prepare($sql);
    echo $stmt;
    $result=$stmt->execute(array($id,$name,$addr,$birth));
    if($result){
        $count=$stmt->rowCount();
        if($count<1){
            //
            $respons['status']=204;
            $respons['message']="faild";
        }
        else{
            $respons['status']=200;
            $respons['message']="success";
        }
    }
    else{
        $respons['status']=400;
        $respons['message']="SQL Wrong";
    }
}catch (PDOException $e){
$respons['status']=$e->getCode();
$respons['message']=$e->getMessage();
}echo json_encode($respons);

echo $id;
echo "測試第15次";
//失敗 資料庫無法連接
?>