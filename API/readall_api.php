<?php

    header('Content-Type:application/json');
    header('Access-Control-Allow-Origin:*');


    include "../database.php";

    $query="SELECT * FROM data";

    $result=mysqli_query($con,$query);

    if((mysqli_num_rows($result))>0){
        $output=mysqli_fetch_all($result,MYSQLI_ASSOC);
        echo json_encode($output);
    }else{
        echo json_encode(array('status'=>'Failed','Message'=>'No data found . . .'));
    }

?>