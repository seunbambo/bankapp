<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once '../config/Database.php';
include_once '../models/User.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate user object
$user = new User($db);

// Get raw usered data
$data = json_decode(file_get_contents("php://input"));

// Set ID to update
//$user->firstname = $data->firstname;
//$user->lastname = $data->lastname;
//$user->phone = $data->phone;
//$user->address = $data->address;
//$user->gender = $data->gender;
$user->balance = $data->balance;
$user->account_id = $data->account_id;

// Update user
if ($user->update()) {
    echo json_encode(
        array('message' => 'User Updated')
    );
} else {
    echo json_encode(
        array('message' => 'User Not Updated')
    );
}
