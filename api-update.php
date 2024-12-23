<?php


header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


$data = json_decode(file_get_contents("php://input"),true);

$id = $data['sid'];
$name = $data['sname'];
$age = $data['sage'];
$city = $data['scity'];

include_once "config.php";


$sql = "UPDATE mohali SET student_name = '{$name}', age = {$age}, city = '{$city}' WHERE id = {$id}";


if($conn->query($sql)){

     echo json_encode(array('message' => 'Data Updated Successfully.','status' => true));
}else{
    echo json_encode(array('message' => 'Data not updated.','status' => false));
}

