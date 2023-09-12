<?php

    header('Content-Type:application/json');
    header('Access-Control-Allow-Origin:*');

    $data=json_decode(file_get_contents("php://input"),true);
    #php://input is used to read the raw data coming from the request file and we dont know wheather GET or POST method is used to transfer hence we use this method to read the file

    $student_id=$data['sid'];
    
    include "../database.php";

    $query="SELECT * FROM data WHERE id={$student_id}";

    $result=mysqli_query($con,$query);

    if((mysqli_num_rows($result))>0){
        $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
        echo json_encode($output);
    }else{
        echo json_encode(array('status'=>'Failed','Message'=>'No data found . . .'));
    }

?>