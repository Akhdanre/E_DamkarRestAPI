<?php

header('Content-Type: application/json');

require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $db = new database;

    $db->query('SELECT id, email, namaLengkap FROM user_listdata WHERE email = :email AND password = :pass');
    $db->bind(':email', $email);
    $db->bind(':pass', $pass);
    $data = $db->single();

    if ($data == null) {
        http_response_code(400);
        $json = ['kondisi' => false];
    } else {
        http_response_code(200);
        $json = [
            'kondisi' => true,
            'data' => $data
        ];
    }

    $json = json_encode($json);

    echo $json;
}
