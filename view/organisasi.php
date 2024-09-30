<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3>Daftar OPD:</h3>
            
            <!-- start dataset -->
            <?php

            $opdDataset = where("tb_opd");
                                    
            while ($opdData = mysql_fetch_assoc($opdDataset))
            {
                ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= $opdData['singkatan']; ?></h3>
                    <h5><?= $opdData['nama_opd']; ?></h5>
                </div>
                <div class="panel-body">
                    <a href="#">
                        <div class="col-md-12">
                            <p class="text-center">
                                <img src="assets/img/logo-tanjungpinang.png" width="100" alt="Logo Tanjungpinang">
                            </p>
                        </div>
                    </a>
                </div>
            </div>

            <?php
            }
            ?>
            <!-- end dataset -->
        </div>
    </div>
</div>