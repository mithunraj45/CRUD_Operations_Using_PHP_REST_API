<?php 
    header('Content-Type:application/json');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Method:PUT');
    header('Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Method,Authorization,X-Requested-With');

    #X-Requested-With tells that it only accepts values through ajax method


    $data=json_decode(file_get_contents("php://input"),true);
    #php://input is used to read the raw data coming from the request file and we dont know wheather GET or POST method is used to transfer hence we use this method to read the file

    $mno=$data['smno'];
    $name=$data['sname'];
    $age=$data['sage'];
    $id=$data['sid'];

    
    include "../database.php";

    $statement="SELECT * FROM data WHERE id={$id}";
    $result=mysqli_query($con,$statement);

    if(mysqli_num_rows($result)>0){
        $query="UPDATE data SET name='{$name}',mobile_no={$mno},age={$age} WHERE id={$id}";
        mysqli_query($con,$query);
        echo json_encode(array('status'=>true,'message'=>'Data Updated . . .'));
    }else{
        echo json_encode(array('status'=>false,'message'=>'No data updated . . .'));
    }
?>