<?php
error_reporting(E_ERROR | E_PARSE);
session_start();


//****************************** Users API ******************************


$service_url = "http://localhost/bankapp/api/users/read_single.php?account_id=$account_id";

$curl = curl_init($service_url);


curl_setopt($curl, CURLOPT_URL, $service_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);


$curl_response = curl_exec($curl);
//print_r($curl_response) . "<br><br>";

//die();
$output = preg_split('/(\r?\n){2}/', $curl_response, 2);
$data = json_decode($output[0]);
$current_balance = $data->balance;
//print_r($current_balance);
