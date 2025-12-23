<?php
include "../config/database.php";

if (isset($_POST['tambah'])) {
    $tanggal = $_POST['tanggal'];
    $bulan   = $_POST['bulan'];
    $tahun   = $_POST['tahun'];
    $hari    = $_POST['hari'];

    $query = "INSERT INTO kalender 
    (tanggal, bulan, tahun, hari, users_id)
    VALUES 
    ('$tanggal', '$bulan', '$tahun', '$hari', 1)";

    mysqli_query($conn, $query);

    header("Location: ../views/kalender/index.php");
}
