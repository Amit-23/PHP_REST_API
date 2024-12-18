<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

// Decode the incoming JSON data
$data = json_decode(file_get_contents("php://input"), true);
$student_id = $data['sid'];

include_once "config.php";

// Prepare and execute the DELETE SQL query
$sql = "DELETE FROM mohali WHERE id = {$student_id}";
$conn->query($sql);

// Check if any rows were affected
if ($conn->affected_rows > 0) {
    echo json_encode(array('message' => 'Record Deleted Successfully.', 'status' => true));
} else {
    echo json_encode(array('message' => 'No Record Found to Delete.', 'status' => false));
}
