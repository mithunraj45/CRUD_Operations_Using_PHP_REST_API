<?php 

    header('Content-Type:application/json');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Method:DELETE');
    header('Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Method');

    $data=json_decode(file_get_contents("php://input"),true);

    $id=$data['sid'];

    include '../database.php';

    $statement="SELECT * FROM data WHERE id={$id}";
    $result=mysqli_query($con,$statement);

    if(mysqli_num_rows($result)>0){
        
        $query="DELETE FROM data WHERE id={$id}";
        mysqli_query($con,$query);
        echo json_encode(array("status"=>true,"message"=>"Data deleted successfully. . . "));

    }else{
        echo json_encode(array("status"=>false,"message"=>"No Data deleted. . . "));
    }

?>