<?php
require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $name = $_POST['namaLengkap'];


    $db = new database;
    $db->query("INSERT INTO user_listdata VALUES ('', :email, :pass, :name)");
    $db->bind(':email', $email);
    $db->bind(':pass', $pass);
    $db->bind(':name', $name);


    $db->execute();
    $affect = $db->rowCount();
    if ($affect > 0) {
        $data = ['kondisi' => true];
    } else {
        $data = ['kondisi' => false];
    }


    $json = json_encode($data);
    echo $json;
}
