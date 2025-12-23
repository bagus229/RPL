<style>
#notif-toggle {
    display: none;
}

.notif-bubble {
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    width: 320px;
    background: #ffffff;
    border-radius: 14px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.25);
    padding: 15px 18px;
    z-index: 99999;
    animation: slideDown 0.5s ease;
}

.notif-bubble h4 {
    margin: 0 0 6px;
    font-size: 15px;
    color: #2563eb;
    text-align: center;
}

.notif-bubble p {
    margin: 0;
    font-size: 13px;
    color: #374151;
    text-align: center;
}

.notif-bubble label {
    display: block;
    margin-top: 10px;
    text-align: center;
    font-size: 12px;
    color: #dc2626;
    cursor: pointer;
    font-weight: 600;
}

@keyframes slideDown {
    from {
        transform: translate(-50%, -25px);
        opacity: 0;
    }
    to {
        transform: translate(-50%, 0);
        opacity: 1;
    }
}

#notif-toggle:checked + .notif-bubble {
    display: none;
}
</style>

<input type="checkbox" id="notif-toggle">

<div class="notif-bubble">
    <h4>📩 Notifikasi</h4>
    <p>Kamu punya event di kalender bulan ini.</p>
    <label for="notif-toggle">Tutup</label>
</div>
<?php
$hariIni = date('Y-m-d');

/* ambil event hari ini */
$q = $conn->query("
    SELECT nama_event 
    FROM events 
    WHERE tanggal = '$hariIni'
");

if ($q && $q->num_rows > 0):
?>

<style>
.notif-bubble {
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    background: #ffffff;
    padding: 14px 18px;
    border-radius: 14px;
    box-shadow: 0 10px 25px rgba(0,0,0,.25);
    z-index: 99999;
    animation: drop .5s ease;
}

.notif-bubble h4 {
    margin: 0;
    font-size: 14px;
    color: #2563eb;
    text-align: center;
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
    <h4>📩 Kamu punya event hari ini</h4>
</div>

<?php endif; ?>
