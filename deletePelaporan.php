<?php
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $idLaporan = $_GET['laporanid'];

    $db = new database;

    $db->query("DELETE FROM pelaporan WHERE id_laporan = :idLaporan");
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
