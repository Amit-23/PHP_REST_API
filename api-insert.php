<?php


header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


$data = json_decode(file_get_contents("php://input"),true);

$name = $data['sname'];
$age = $data['sage'];
$city = $data['scity'];

include_once "config.php";


$sql = "INSERT INTO mohali(student_name,age,city) VALUES ('{$name}', {$age},'{$city}')";
$conn->query($sql);

if($conn->query($sql)){

     echo json_encode(array('message' => 'Data Inserted Successfully.','status' => true));
}else{
    echo json_encode(array('message' => 'Data not inserted.','status' => false));
}

