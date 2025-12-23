<?php
require_once __DIR__ . '/../config/database.php';

class kalender {
    private $conn;

    public function __construct() {
        $this->conn = (new Database())->connect();
    }

    public function getAll() {
        return $this->conn->query("SELECT * FROM kalender");
    }
}
