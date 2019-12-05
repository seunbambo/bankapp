<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once '../config/Database.php';
include_once '../models/User.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$user = new User($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$user->firstname = $data->firstname;
$user->lastname = $data->lastname;
$user->phone = $data->phone;
$user->address = $data->address;
$user->gender = $data->gender;
$user->balance = $data->balance;

// Create user
if ($user->create()) {
    echo json_encode(
        array('message' => 'User Created')
    );
} else {
    echo json_encode(
        array('message' => 'User Not Created, phone number must be unique')
    );
}
