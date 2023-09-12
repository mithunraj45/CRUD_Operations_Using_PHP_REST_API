<?php 

    header('Conbtent-Type:application/json');
    header('Access-Control-Allow-Origin:*');
    
    // $data=json_decode(file_get_contents('php://input'),true);
    // $name=$data['sname'];

    $name=isset($_GET['name'])?$_GET['name']:die();

    include '../database.php';

    $query="SELECT * FROM data WHERE name LIKE '%{$name}%'";
    $result=mysqli_query($con,$query) or die("SQL query failed");

    if(mysqli_num_rows($result)>0){
        $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
        echo json_encode($output);
    }else{
        echo json_encode(array('status'=>false,'message'=>'No Search found'));
    }



?>