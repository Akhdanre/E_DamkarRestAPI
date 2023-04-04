<?php
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_POST['userid'];
    $PesanPelaporan = $_POST['pesanPelaporan'];

    $db = new database;

    $db->query("INSERT INTO pelaporan VALUE ('', :iduser, :pelaporan)");
    $db->bind(':iduser', $userid);
    $db->bind(':pelaporan', $PesanPelaporan);

    $db->execute();
    $affect = $db->rowCount();
    if ($affect > 0) {
        $data = ['kondisi' => true];
    } else {
        $data = ['kondisi' => false];
    }

    echo json_encode($data);
}
