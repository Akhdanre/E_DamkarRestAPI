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
    $json = 'data kosong';
}else{
    $json = json_encode($data);
}

print_r($json);
