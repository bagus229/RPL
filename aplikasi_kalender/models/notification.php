<?php
require_once __DIR__ . '/../config/database.php';

class notification {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())->connect();
    }

    public function getAll() {
        $sql = "SELECT notifications.*, events.nama_event
                FROM notifications
                JOIN events ON notifications.event_id = events.id";
        return $this->conn->query($sql);
    }
}
