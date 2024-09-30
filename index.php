<?php
include 'config/config.php';
include 'functions/sql.php';

$page = $_GET['page'] ?? '';
$activePages = [
    'utama' => '',
    'dataset' => '',
    'organisasi' => ''
];

if ($page === '' || $page === 'utama') {
    $activePages['utama'] = 'active';
} elseif (array_key_exists($page, $activePages)) {
    $activePages[$page] = 'active';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Data Tanjungpinang</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link" href="?page=utama">
                    <span class="text-success text-title">
                        <img src="assets/img/logo-tanjungpinang.png" alt="Tanjungpinang Logo" height="50">
                        Open Data Tanjungpinang
                    </span>
                </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="<?= $activePages['utama'] ?>" role="presentation"><a href="?page=utama">Beranda</a></li>
                    <li class="<?= $activePages['dataset'] ?>" role="presentation"><a href="?page=dataset">Dataset</a></li>
                    <li class="<?= $activePages['organisasi'] ?>" role="presentation"><a href="?page=organisasi">Organisasi</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container post">
        <?php
        $itemId = $_GET['i'] ?? null;
        $queryId = $_GET['q'] ?? null;

        if (($page === '' || $page === 'utama') && $itemId === null && $queryId === null) {
            include 'view/mainpage.php';
        } elseif ($page === 'dataset') {
            include 'view/dataset.php';
        } elseif ($page === 'organisasi') {
            include 'view/organisasi.php';
        } elseif ($itemId !== null) {
            include 'view/dataset-detail.php';
        } elseif ($queryId !== null) {
            include 'view/form-detail.php';
        } elseif (isset($_GET['pencarian'])) {
            echo '<script>console.log("Search functionality not implemented");</script>';
        } else {
            echo "<h2>404 Halaman tidak ditemukan</h2>";
        }
        ?>
    </div>
    <footer>
        <sub>Open Data Tanjungpinang &copy; <?= date('Y') ?></sub>
        <br>
        <a href="login/" target="_blank">admin</a>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>