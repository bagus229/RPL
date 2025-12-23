<?php
require_once __DIR__ . '/../config/database.php';

if (isset($_POST['simpan'])) {

    $db = new Database();
    $conn = $db->connect();

    $nama = $_POST['nama_event'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];
    $users_id = 1;

    $sql = "INSERT INTO events (nama_event, deskripsi, tanggal, users_id)
            VALUES ('$nama', '$deskripsi', '$tanggal', $users_id)";

    $conn->query($sql);

    header("Location: index.php?page=kalender");
    exit;
}
