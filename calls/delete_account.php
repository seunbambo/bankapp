<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

if (isset($_GET['account_id'])) {
    $accountId = $_GET['account_id'];
}

//****************************** Create User API ******************************


$service_url = 'http://localhost/bankapp/api/users/delete.php';

$curl = curl_init($service_url);

$curl_post_data = [
    "account_id" => $accountId
];


$curl_post_data = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_URL, $service_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);

$curl_response = curl_exec($curl);
//print_r($curl_response) . "<br><br>";
//$output = preg_split('/(\r?\n){2}/', $curl_response, 2);

//print_r($output);
curl_close($curl);

if (!$output) {
    header('Location: ../index.php');
}
