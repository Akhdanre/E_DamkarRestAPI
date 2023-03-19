<?php

$username = $_POST['username'];
$pass = $_POST['password'];
$name = $_POST['namaLengkap'];
$email = $_POST['email'];
$notel = $_POST['notel'];

$db = new database; 
$db->query('INSERT INTO userlistdata VALUES (:username, :pass, :name, :email, :notel)');

