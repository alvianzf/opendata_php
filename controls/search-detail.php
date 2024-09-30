<?php
include '../config/config.php';
include '../functions/sql.php';

// Handle search functionality
if (isset($_POST['search'])) {
    $query = $_POST['search'];
    $searchResults = searchform($query);
    // TODO: Process and display search results
}

// Handle GET parameter 'z'
if (isset($_GET['z'])) {
    $data = $_GET['z'];
    echo htmlspecialchars($data);
}

// Determine active page
$page = $_GET['page'] ?? '';
$activePages = [
    'utama' => '',
    'dataset' => '',
    'organisasi' => '',
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
                    <li class="<?=$activePages['utama']?>" role="presentation"><a href="?page=utama">Beranda</a></li>
                    <li class="<?=$activePages['dataset']?>" role="presentation"><a href="?page=dataset">Dataset</a></li>
                    <li class="<?=$activePages['organisasi']?>" role="presentation"><a href="?page=organisasi">Organisasi</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container post">
        <!-- Content goes here -->
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
