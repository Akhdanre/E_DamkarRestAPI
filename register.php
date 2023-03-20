<?php

$username = $_POST['username'];
$pass = $_POST['password'];
$name = $_POST['namaLengkap'];
$email = $_POST['email'];
$notel = $_POST['notel'];

$db = new database;
$db->query('INSERT INTO userlistdata VALUES (:username, :pass, :name, :email, :notel)');
$db->bind(':username', $username);
$db->bind(':pass', $pass);
$db->bind(':name', $name);
$db->bind(':email', $email);
$db->bind(':notel', $notel);

$db->execute();
$affect = $db->rowCount();
if ($affect > 0) {
    $data = ['kondisi' => 'berhasil'];
} else {
    $data = ['kondisi' => 'gagal'];
}


$json = json_encode($data);
echo $json;