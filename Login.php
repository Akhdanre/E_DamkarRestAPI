<?php 
require_once 'database.php';

$username = $_POST['username'];
$pass = $_POST['pass'];

$db = new database; 

$db->query('SELECT * FROM userlistdata WHERE username = :username AND password = :pass'); 
$db->bind(':username', $username);
$db->bind(':pass', $pass);
$data = $db->single();

if($data == null){
    $json = ['kondisi' => false];
}else{
    $json = [
        'kondisi' => true, 
        'username' => $data['username'],
        'nama_lengkap' => $data['Nama_lengkap'],    
        'email' => $data['email'],
        'notelp' => $data['notel'], 

    ]; 
}

// var_dump($json);
$json = json_encode($json );
print_r($json);
