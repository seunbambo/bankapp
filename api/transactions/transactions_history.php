<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Transaction.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate transaction object
$transaction = new Transaction($db);

// transaction query
$result = $transaction->read();

// Get row count
$num = $result->rowCount();

// Check if any transactions
if ($num > 0) {
    // transaction array
    $transactions_arr = array();
    $transactions_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $transaction_list = array(
            'transaction_id'    =>  $transaction_id,
            'amount' =>  $amount,
            'opening_balance' =>  $opening_balance,
            'closing_balance' =>  $closing_balance,
            'originator_account_id'    =>  $originator_account_id,
            'beneficiary_account_id'  =>   $beneficiary_account_id,
            'date_created' =>  $date_created
        );

        // Push to "data
        array_push($transactions_arr['data'], $transaction_list);
    }

    // Turn to JSON & output
    echo json_encode($transactions_arr);
} else {
    // No transactions
    echo json_encode(
        array('message' => 'No Transaction Found')
    );
}
