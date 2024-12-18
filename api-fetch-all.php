<?php


header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include_once "config.php";


$sql = "SELECT * FROM mohali";
$result = $conn->query($sql);

if($result->num_rows > 0){
    $output = $result->fetch_all(MYSQLI_ASSOC);

    echo json_encode($output);
}else{
    echo json_encode(array('message' => 'No Record Found.','status' => false));
}

