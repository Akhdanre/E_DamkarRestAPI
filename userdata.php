<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once 'database.php';



$db = new database;

$db->query('SELECT * FROM userlistdata ');
$data = $db->resultSet();
if ($data == null) {
    $json = ['kondisi' => false];
} else {
    $json = [
        'kondisi' => true,
        'data' => $data
    ];
    
}

// var_dump($json);
$json = json_encode($json);
http_response_code(200);
echo $json;
