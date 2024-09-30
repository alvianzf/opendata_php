<?php
include 'config/config.php';
include 'functions/sql.php';

$searchQuery = isset($_GET['z']) ? $_GET['z'] : '';
$currentPage = isset($_GET['page']) ? $_GET['page'] : '';

$isHomePage = '';
$isDatasetPage = '';
$isOrganizationPage = '';

switch ($currentPage) {
    case '':
    case 'utama':
        $isHomePage = 'active';
        break;
    case 'dataset':
        $isDatasetPage = 'active';
        break;
    case 'organisasi':
        $isOrganizationPage = 'active';
        break;
    default:
        // No active page
        break;
}
?>

<!DOCTYPE html>
<html>
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
                        <img src="assets/img/logo-tanjungpinang.png" height="50"> Open Data Tanjungpinang
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
                    <li class="<?= $isHomePage ?>" role="presentation"><a href="?page=utama">Beranda</a></li>
                    <li class="<?= $isDatasetPage ?>" role="presentation"><a href="?page=dataset">Dataset</a></li>
                    <li class="<?= $isOrganizationPage ?>" role="presentation"><a href="?page=organisasi">Organisasi</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container post">
    </div>
</body>
</html>