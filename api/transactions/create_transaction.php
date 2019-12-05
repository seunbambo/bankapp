<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Transaction.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$transaction = new Transaction($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$transaction->amount = $data->amount;
$transaction->opening_balance = $data->opening_balance;
$transaction->closing_balance = $data->closing_balance;
$transaction->originator_account_id = $data->originator_account_id;
$transaction->beneficiary_account_id = $data->beneficiary_account_id;

// Create transaction
if ($transaction->create()) {
    echo json_encode(
        array('message' => 'Transaction Successful')
    );
} else {
    echo json_encode(
        array('message' => 'Transaction Not Successful')
    );
}
