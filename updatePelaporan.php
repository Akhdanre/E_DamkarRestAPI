<?php
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_POST['userid'];
    $idLaporan = $_POST['laporanid'];
    $dataLaporan = $_POST['pesanPelaporan'];

    $db = new database;

    $db->query("UPDATE pelaporan SET data_laporan = :dataLaporan WHERE id_laporan = :idLaporan AND id_user = :idUser");
    $db->bind(':dataLaporan', $dataLaporan);
    $db->bind(':idUser', $userid);
    $db->bind(':idLaporan', $idLaporan);

    $db->execute();
    $affect = $db->rowCount();
    if ($affect > 0) {
        $data = ['kondisi' => true];
    } else {
        $data = ['kondisi' => false];
    }

    echo json_encode($data);
}
