<?php
    include '../config/config.php';
    include '../functions/sql.php';

    session_start();

    $a = @$_GET['admin'];

    if ($_SESSION['log']== '')
    {
        header("location:../login/");
        session_destroy();  
    }

    $one  = '';
    $two = '';
    $three = '';
    $four = '';
    $five = '';

    if ($a == 'dashboard')
    {
        $one = "active";
    }
    else if ($a =='user')
    {
        $two = "active";
    }
    else if ($a =='dataset')
    {
        $three = "active";
    }
    else if ($a =='forms')
    {
        $four = "active";
    }else if ($a =='dinas')
    {
        $five = "active";
    }
?>

<!DOCTYPE html>
<html>

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
                    <p><strong><?= viewdata1("tb_peg", "id", $_SESSION['nama'], "nama");?></strong></p><span>
                        <?= $_SESSION['nama'];?>
                        </span>
                        <span>
                        </span></div>
            </div>
            <div class="card">
                <div class="card-content">
                    <ul class="nav nav-pills nav-stacked">
                        <li class=<?= $one; ?>><a href="?admin=dashboard">Beranda</a></li>
                        <?php
                            if(@$_SESSION['auth'])
                            {

                            ?>
                        <li class=<?= $two; ?>><a href="?admin=user">Kontrol Pengguna</a></li>
                        <li><a href="controls/log.txt" target="_blank">Riwayat penggunaan</a></li>
                        <li class=<?= $five; ?>><a href="?admin=dinas">Daftar OPD</a></li>

                        <?php
                            }
                        ?>
                        <li class=<?= $three; ?>><a href="?admin=dataset">Dataset</a></li>
                        <!-- <li class=<?= $four; ?>><a href="?admin=forms">Form</a></li> -->
                        <li><a href="out.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-content">
                    <?php
                        if (@$_GET['admin']=='' || @$_GET['admin']=='dashboard')
                        {
                            include 'view\mainpage.php';
                        }else if (@$_GET['admin']=='edit-user')
                        {
                            include 'view\user-edit.php';
                        }else if (@$_GET['admin']=='dataset-edit')
                        {
                            include 'view\dataset-edit.php';
                        }else if (@$_GET['admin']=='form-edit')
                        {
                            include 'view\form-edit.php';
                        }else if (@$_GET['admin']=='opd-edit')
                        {
                            include 'view\opd-edit.php';
                        }else if (@$_GET['admin']=='edit-peg')
                        {
                            include 'view\edit-peg.php';
                        }else if (@$_GET['admin']=='data')
                        {
                            include 'view\data-list.php';
                        }
                        else if (@$_GET['admin']=='dataset')
                        {
                            include 'view\dataset-list.php';
                        }else if (@$_GET['admin']=='dinas')
                        {
                            if (@$_SESSION['auth'])
                            {
                                include 'view\opd-list.php';
                            }else
                            {
                                include 'errorpage';
                            }
                        }else if(@$_GET['admin'] =='peg')
                        {
                            include 'view/pegawai-list.php';
                        }else if(@$_GET['admin'] =='user')
                        {
                            if (@$_SESSION['auth'])
                            {
                                include 'view/user-list.php';
                            }else
                            {
                                include 'errorpage';
                            }
                        }else if (@$_GET['admin'] == 'forms')
                        {
                            include 'view/form-list.php';
                        }
                        else{
                            echo "<h1>404 Halaman tidak ditemukan</h1>";
                        }
                    ?>
                </div>
            </div>

            
                    <?php

                    if (@$_GET['action'] == 'newdataset')
                    {
                        include 'view/formdataset.php';
                    }else if (@$_GET['action'] == 'newopd')
                    {
                        include 'view/formopd.php';
                    }else if (@$_GET['action'] == 'newpegawai')
                    {
                        include 'view/formpeg.php';
                    }else if (@$_GET['action'] == 'newuser')
                    {
                        include 'view/formuser.php';
                    }else if (@$_GET['action'] == 'newform')
                    {
                        include 'view/newdataform.php';
                    }else if (@$_GET['q'] >0)
                    {
                        include 'view/form-new.php';
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