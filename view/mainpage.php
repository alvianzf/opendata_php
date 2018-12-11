<div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"> </h3></div>
                            <div class="panel-body">
                                <form action="search-detail.php" method="POST">
                                <input class="input-lg" type="text" name="search" placeholder="Cari data di sini" autofocus="">
                                <button class="btn btn-primary btn-lg" type="submit" name="cari">Cari </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Data Terbaru</h3></div>
                    <div class="panel-body">
                        <!-- start data -->
                        <?php

                            if (where("tb_form") == null)
                            {
                                echo "<h5>Tidak ada data untuk ditampilkan!</h5>";
                            }

                        $dataset = where("tb_form");
                        $i=0;

                        while ($data = mysql_fetch_assoc($dataset) AND $i<12)
                        {

                        ?>
                        
                        <a href="?q=<?= $data['id'];?>">
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-center"> <img src="assets/img/logo-tanjungpinang.png" width="100"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-center"><?= $data['nama_form'];?></p>
                                </div>
                            </div>
                        </div>
                        </a>
                        <?php
                        $i++;

                            }
                        ?>
                        <!-- end data -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Sambutan Walikota</h3></div>
                            <div class="panel-body">
                                <div class="col-md-2 col-md-offset-1"><img src="assets/img/logo-tanjungpinang.png" height="90"></div>
                                <div class="col-md-8">
                                    <p>assalamualaikum WR WB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>