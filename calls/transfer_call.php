<?php
error_reporting(E_ERROR | E_PARSE);
session_start();


if (isset($_POST['account_id'])) {
    $account_id = $_POST['account_id'];
    $amount = $_POST['amount'];
}


include 'single_user.php';

$updated_balance = $current_balance + $amount;

//****************************** Create User API ******************************


$service_url = 'http://localhost/bankapp/api/users/update.php';

$curl = curl_init($service_url);

$curl_post_data = [
    "account_id" => $account_id,
    "balance" => $updated_balance
];


$curl_post_data = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_URL, $service_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);


$curl_response = curl_exec($curl);
//print_r($curl_response) . "<br><br>";
//$output = preg_split('/(\r?\n){2}/', $curl_response, 2);

//print_r($output);
curl_close($curl);

if ($output) {
    header('Location: ../index.php');
}
