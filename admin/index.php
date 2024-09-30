<?php
include '../config/config.php';
include '../functions/sql.php';

session_start();

// Check if user is logged in
if (!isset($_SESSION['log']) || $_SESSION['log'] == '') {
    header("Location: ../login/");
    session_destroy();
    exit();
}

// Get the current admin page
$currentPage = $_GET['admin'] ?? 'dashboard';

// Define navigation items and their active states
$navItems = [
    'dashboard' => '',
    'user' => '',
    'dataset' => '',
    'forms' => '',
    'dinas' => ''
];

// Set active state for current page
if (array_key_exists($currentPage, $navItems)) {
    $navItems[$currentPage] = 'active';
}

// Function to include view files
function includeView($viewName) {
    $viewPath = "view/$viewName.php";
    if (file_exists($viewPath)) {
        include $viewPath;
    } else {
        echo "<h1>404 Page Not Found</h1>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Material-Card.css">
    <link rel="stylesheet" href="controls/DataTables/datatables.min.css">
</head>
<body>
    <div class="container">
        <div class="col-md-3">
            <div class="card">
                <div class="card-content">
                    <p><strong><?= viewdata1("tb_peg", "id", $_SESSION['nama'], "nama"); ?></strong></p>
                    <span><?= $_SESSION['nama']; ?></span>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="<?= $navItems['dashboard']; ?>"><a href="?admin=dashboard">Beranda</a></li>
                        <?php if (isset($_SESSION['auth']) && $_SESSION['auth']): ?>
                            <li class="<?= $navItems['user']; ?>"><a href="?admin=user">Kontrol Pengguna</a></li>
                            <li><a href="controls/log.txt" target="_blank">Riwayat penggunaan</a></li>
                            <li class="<?= $navItems['dinas']; ?>"><a href="?admin=dinas">Daftar OPD</a></li>
                        <?php endif; ?>
                        <li class="<?= $navItems['dataset']; ?>"><a href="?admin=dataset">Dataset</a></li>
                        <li><a href="out.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-content">
                    <?php
                    switch ($currentPage) {
                        case 'dashboard':
                            includeView('mainpage');
                            break;
                        case 'edit-user':
                            includeView('user-edit');
                            break;
                        case 'dataset-edit':
                            includeView('dataset-edit');
                            break;
                        case 'form-edit':
                            includeView('form-edit');
                            break;
                        case 'opd-edit':
                            includeView('opd-edit');
                            break;
                        case 'edit-peg':
                            includeView('edit-peg');
                            break;
                        case 'data':
                            includeView('data-list');
                            break;
                        case 'dataset':
                            includeView('dataset-list');
                            break;
                        case 'dinas':
                            if (isset($_SESSION['auth']) && $_SESSION['auth']) {
                                includeView('opd-list');
                            } else {
                                include 'errorpage';
                            }
                            break;
                        case 'peg':
                            includeView('pegawai-list');
                            break;
                        case 'user':
                            if (isset($_SESSION['auth']) && $_SESSION['auth']) {
                                includeView('user-list');
                            } else {
                                include 'errorpage';
                            }
                            break;
                        case 'forms':
                            includeView('form-list');
                            break;
                        default:
                            echo "<h1>404 Page Not Found</h1>";
                    }
                    ?>
                </div>
            </div>

            <?php
            $action = $_GET['action'] ?? '';
            switch ($action) {
                case 'newdataset':
                    includeView('formdataset');
                    break;
                case 'newopd':
                    includeView('formopd');
                    break;
                case 'newpegawai':
                    includeView('formpeg');
                    break;
                case 'newuser':
                    includeView('formuser');
                    break;
                case 'newform':
                    includeView('newdataform');
                    break;
            }

            if (isset($_GET['q']) && $_GET['q'] > 0) {
                includeView('form-new');
            }
            ?>
        </div>
    </div>
    <div class="well well-lg"><span>adminpanel @rioPutra-2018</span></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="controls/DataTables/datatables.min.js"></script>
    <script>
        $('.table').DataTable();
    </script>
</body>
</html>