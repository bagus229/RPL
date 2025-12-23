<link rel="stylesheet" href="assets/css/style.css">
<?php
$page = $_GET['page'] ?? 'kalender';

date_default_timezone_set('Asia/Jakarta');


switch ($page) {

    case 'kalender':
        require '../views/kalender/index.php';
        break;

    case 'event_create':
        require '../views/events/create.php';
        break;

    case 'event_store':
        require '../controllers/EventController.php';
        break;

    case 'notifications':
        require '../views/notifications/index.php';
        break;

    default:
        echo "Halaman tidak ditemukan";
}
