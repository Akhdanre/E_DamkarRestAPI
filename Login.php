<?php

require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $db = new database;

    $db->query('SELECT * FROM user_listdata WHERE email = :email AND password = :pass');
    $db->bind(':email', $email);
    $db->bind(':pass', $pass);
    $data = $db->single();

    if ($data == null) {
        $json = ['kondisi' => false];
    } else {
        $json = [
            'kondisi' => true,
            'email' => $data['email'],
            'namaLengkap' => $data['namaLengkap'],

        ];
    }

    $json = json_encode($json);
    echo $json;
}
