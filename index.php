<?php
    include 'config/config.php';
    include 'functions/sql.php';

    $a = @$_GET['page'];
    $main = "";
    $dats = "";
    $org  = "";

    if($a == "utama"||$a=="")
    {
        $main = "active";
    }else if($a=="dataset")
    {
        $dats = "active";
    }else if($a=="organisasi")
    {
        $org="active";
    }else{
        // ga ada apa apa
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
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="?page=utama"><span class="text-success text-title"><img src="assets/img/logo-tanjungpinang.png" height="50"> Open Data Tanjungpinang</span></a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class=<?=$main;?> role="presentation"><a href="?page=utama">Beranda </a></li>
                    <li class=<?=$dats;?> role="presentation"><a href="?page=dataset">Dataset </a></li>
                    <li class=<?=$org;?> role="presentation"><a href="?page=organisasi">Organisasi </a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container post">
        <?php
            if (($a == "" || $a =='utama' ) && @$_GET['i'] == null && @$_GET['q'] == null)
            {
                include 'view/mainpage.php';
            }
            else if ($a == "dataset")
            {
                include 'view/dataset.php';
            }else if ($a =='organisasi')
            {
                include 'view/organisasi.php';
            }else if (@$_GET['i'] > 0)
            {
                include 'view/dataset-detail.php';
            }else if (@$_GET['q'] > 0)
            {
                include 'view/form-detail.php';
            }else if (isset($_GET['pencarian'])  ){

                echo '<script>alert("ASKJGRYAISGR");</script>';
            }
            else 
            {
                echo "<h2>404 Halaman tidak ditemukan</h2>";
            }
        ?>
    </div> 
    <!-- sampai sini -->
    <footer>
        <sub>Open Data Tanjungpinang &copy; 2018</sub>
        <br>
        <a href="login/" target="_blank">admin </a></footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>