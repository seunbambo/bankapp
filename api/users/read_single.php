<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/Database.php';
include_once '../models/User.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate user object
$user = new User($db);

// Get ID
$user->account_id = isset($_GET['account_id']) ? $_GET['account_id'] : die();

// Get user
$user->read_single();

// Create array
$user_arr = array(
    'account_id'    =>  $user->account_id,
    'firstname' =>  $user->firstname,
    'lastname'  =>  $user->lastname,
    'phone'  =>  $user->phone,
    'address'   =>  $user->address,
    'gender' =>  $user->gender,
    'balance' =>  $user->balance,
    'date_created' =>  $user->date_created
);

// Make JSON
print_r(json_encode($user_arr));
