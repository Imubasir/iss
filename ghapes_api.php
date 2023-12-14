<?php
$invoice_no = 'FMS193614136';
$key = 'UDS-GH';
$requestHeaders = array(
  "token: GkWJ9t9HrdkVTN9nLeqbHQgTouDZX3WFmWCdPVGqJGmWC94mENzEKRodCVxN8hiSnTm4zmJJg1FUJ99mlVqE72sVY5HxZeZnGY99eqqO2gZgEUSCdaPlech64BS5wqr6",
  "key: UDS-GH"
);

$postRequest = array(
    "key" => $key
  );

$cURLConnection = curl_init('https://ghapes.org/api/request/document/process');
curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $requestHeaders);
curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $postRequest);
curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

$apiResponse = curl_exec($cURLConnection);
curl_close($cURLConnection);
$jsonArrayResponse = json_decode($apiResponse, true);
print_r($jsonArrayResponse);
var_dump($jsonArrayResponse);