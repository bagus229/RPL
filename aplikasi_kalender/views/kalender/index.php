<?php
require_once __DIR__ . '/../../config/database.php';
date_default_timezone_set('Asia/Jakarta');

$db = new Database();
$conn = $db->connect();

/* ================= NOTIF EVENT HARI INI ================= */
$hariIni = date('Y-m-d');

$qNotif = $conn->query("
    SELECT nama_event 
    FROM events 
    WHERE tanggal = '$hariIni'
");

$notifAda = false;
$notifNama = '';

if ($qNotif && $qNotif->num_rows > 0) {
    $notifAda = true;
    $rowNotif = $qNotif->fetch_assoc();
    $notifNama = $rowNotif['nama_event'];
}

/* ================= KALENDER ================= */
$bulan = date('m');
$tahun = date('Y');
$jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

/* event bulan ini */
$result = $conn->query("
    SELECT nama_event, deskripsi, tanggal 
    FROM events
    WHERE MONTH(tanggal) = '$bulan'
    AND YEAR(tanggal) = '$tahun'
");

$events = [];
while ($row = $result->fetch_assoc()) {
    $events[$row['tanggal']][] = [
        'nama' => $row['nama_event'],
        'deskripsi' => $row['deskripsi']
    ];
}
?>

<style>
* { box-sizing: border-box; }

body {
    font-family: "Segoe UI", Arial, sans-serif;
    background: #f4f6f9;
    padding: 20px;
    color: #333;
}

/* ============ NOTIF BUBBLE ============ */
#notif-close {
    display: none;
}

#notif-close:checked + .notif-bubble {
    display: none;
}

.notif-bubble {
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    background: #ffffff;
    padding: 16px 22px;
    border-radius: 16px;
    box-shadow: 0 12px 30px rgba(0,0,0,.25);
    z-index: 9999;
    font-weight: 600;
    text-align: center;
    animation: dropDown .5s ease;
}

.notif-close-btn {
    display: inline-block;
    margin-top: 8px;
    font-size: 12px;
    color: #dc2626;
    cursor: pointer;
}

@keyframes dropDown {
    from {
        opacity: 0;
        transform: translate(-50%, -20px);
    }
    to {
        opacity: 1;
        transform: translate(-50%, 0);
    }
}

/* ============ KALENDER ============ */
h2, h3 {
    text-align: center;
    color: #2c3e50;
}

table {
    width: 100%;
    max-width: 900px;
    margin: 20px auto;
    border-collapse: collapse;
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}

th {
    background: #4f46e5;
    color: #fff;
    padding: 14px;
}

td {
    height: 110px;
    padding: 8px;
    text-align: right;
    vertical-align: top;
    border: 1px solid #e5e7eb;
    font-weight: 600;
}

td small {
    display: block;
    margin-top: 6px;
    font-size: 11px;
    color: #e11d48;
}

a {
    display: inline-block;
    margin: 20px auto;
    padding: 12px 18px;
    background: #22c55e;
    color: #fff;
    text-decoration: none;
    border-radius: 8px;
    font-weight: 600;
}

ul {
    list-style: none;
    max-width: 900px;
    margin: auto;
    padding: 0;
}

li {
    background: #fff;
    padding: 15px;
    margin-bottom: 12px;
    border-left: 6px solid #4f46e5;
    border-radius: 10px;
    box-shadow: 0 5px 12px rgba(0,0,0,0.1);
}
</style>

<!-- ============ NOTIF ============ -->
<?php if ($notifAda): ?>
<input type="checkbox" id="notif-close">
<div class="notif-bubble">
    📢 <strong>Event Hari Ini</strong><br>
    <?= htmlspecialchars($notifNama) ?><br>
    <label for="notif-close" class="notif-close-btn">Tutup</label>
</div>
<?php endif; ?>

<h2>Kalender <?= date('F Y') ?></h2>

<table>
<tr>
  <th>Min</th><th>Sen</th><th>Sel</th><th>Rab</th>
  <th>Kam</th><th>Jum</th><th>Sab</th>
</tr>
<tr>

<?php
$hariPertama = date('w', strtotime("$tahun-$bulan-01"));

for ($i = 0; $i < $hariPertama; $i++) echo "<td></td>";

for ($hari = 1; $hari <= $jumlahHari; $hari++) {
    $tgl = "$tahun-$bulan-" . str_pad($hari, 2, '0', STR_PAD_LEFT);

    echo "<td>$hari";
    if (isset($events[$tgl])) {
        echo "<small>📌 Event</small>";
    }
    echo "</td>";

    if ((++$hariPertama) % 7 == 0) echo "</tr><tr>";
}
?>
</tr>
</table>

<a href="index.php?page=event_create">+ Tambah Event</a>

<hr>

<h3>Daftar Event Bulan Ini</h3>

<?php if (!empty($events)): ?>
<ul>
<?php foreach ($events as $tgl => $list): ?>
    <?php foreach ($list as $ev): ?>
        <li>
            <strong><?= $ev['nama'] ?></strong><br>
            <?= $ev['deskripsi'] ?><br>
            <small><?= date('d F Y', strtotime($tgl)) ?></small>
        </li>
    <?php endforeach; ?>
<?php endforeach; ?>
</ul>
<?php else: ?>
<p style="text-align:center;">Belum ada event</p>
<?php endif; ?>
