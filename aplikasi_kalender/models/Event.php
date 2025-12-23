<?php
class Event {

    public static function getAll($conn) {
        return mysqli_query($conn, "SELECT * FROM events");
    }

    public static function tambah($conn, $data) {
        $query = "INSERT INTO events 
        (users_id, kalender_id, nama_event, deskripsi, waktu_mulai, waktu_selesai)
        VALUES (
            1,
            '{$data['kalender_id']}',
            '{$data['nama_event']}',
            '{$data['deskripsi']}',
            '{$data['waktu_mulai']}',
            '{$data['waktu_selesai']}'
        )";

        return mysqli_query($conn, $query);
    }
}
