<?php
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userid = $_POST['userid'];

    $db = new database;

    $db->query("SELECT * FROM pelaporan WHERE id_user = :iduser");
    $db->bind(':iduser', $userid);
    $data = $db->resultSet();

    if ($data != null) {
        $result = [
            'kondisi' => true,
            'dataPelaporan' => $data
        ];
    } else {
        $result = ['kondisi' => false];
    }

    echo json_encode($result);
}
