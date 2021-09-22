<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// JSON data uit de postdata halen
$data = json_decode(file_get_contents("php://input"));

// doe je ding alhier, en geef eventueel als resultaat een JSON object terug
sleep($data->extra);
$result = [$data->extra,$data->student->firstname,"c"];

http_response_code(201);
// output
echo json_encode($result);