<?php
    include 'function.php';
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    include_once '../dbconn.php';
    header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization,X-Request-with') ; 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      

     

      $data = json_decode(file_get_contents("php://input"));

      $student->name = $data->name;
      $student->address = $data->address;
      $student->age = $data->age;
    
      if($student->postData()) {
        echo json_encode(array('message' => 'Entry added'));
      } else {
        echo json_encode(array('message' => 'Entry Not added, try again!'));
      }
    } else {
        echo json_encode(array('message' => "Error: incorrect Method!"));
    }?>