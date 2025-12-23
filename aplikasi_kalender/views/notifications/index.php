<?php

require_once __DIR__ . '/../../config/database.php';
date_default_timezone_set('Asia/Jakarta');

$db = new Database();
$conn = $db->connect();

/* 🔔 PANGGIL NOTIF BUBBLE */
include __DIR__ . '/../notifications/index.php';

$bulan = date('m');
$tahun = date('Y');
$jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

$hariIni = date('Y-m-d');

$qNotif = $conn->query("
    SELECT nama_event
    FROM events
    WHERE tanggal = '$hariIni'
");

if ($qNotif && $qNotif->num_rows > 0):
?>

<style>
.notif-bubble {
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    background: #ffffff;
    padding: 14px 20px;
    border-radius: 14px;
    box-shadow: 0 10px 25px rgba(0,0,0,.25);
    z-index: 99999;
    animation: drop .5s ease;
    font-weight: 600;
    color: #1f2937;
}

@keyframes drop {
    from {
        opacity: 0;
        transform: translate(-50%, -20px);
    }
    to {
        opacity: 1;
        transform: translate(-50%, 0);
    }
}
</style>

<div class="notif-bubble">
    📩 Kamu punya event hari ini
</div>

<?php endif; ?>
