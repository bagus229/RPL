<?php
include "../config/database.php";

if (isset($_POST['tambah'])) {
    $event_id = $_POST['event_id'];
    $waktu   = $_POST['waktu_pengingat'];

    $query = "INSERT INTO notifications 
    (event_id, waktu_pengingat, status)
    VALUES 
    ('$event_id', '$waktu', 'pending')";

    mysqli_query($conn, $query);

    header("Location: ../views/notification/list.php");
}
