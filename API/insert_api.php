<?php 
    header('Content-Type:application/json');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Method:POST');
    header('Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Method,Authorization,X-Requested-With');

    #X-Requested-With tells that it only accepts values through ajax method


    $data=json_decode(file_get_contents("php://input"),true);
    #php://input is used to read the raw data coming from the request file and we dont know wheather GET or POST method is used to transfer hence we use this method to read the file

    $mno=$data['smno'];
    $name=$data['sname'];
    $age=$data['sage'];

    
    include "../database.php";

    $query="INSERT INTO data(name,mobile_no,age) VALUES('{$name}',{$mno},{$age})";


    if(mysqli_query($con,$query)){
        echo json_encode(array('message'=>'Data inserted . . .','status'=>true));
    }else{
        echo json_encode(array('message'=>'No data inserted . . .','status'=>false));
    }
?>