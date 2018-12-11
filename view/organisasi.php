<div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>Daftar OPD:</h3>
                
                <!-- start dataset -->
                <?php

                $dataset = where("tb_opd");
                                        
                while ($data = mysql_fetch_assoc($dataset))
                {
                    ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= $data['singkatan'];?></h3><h5><?= $data['nama_opd'];?></h5>
                    </div>
                    <div class="panel-body"><span> </span><a href="#">
                                <div class="col-md-12">
                                    <p class="text-center"> <img src="assets/img/logo-tanjungpinang.png" width="100"></p>
                                </div></a>
                    </div>
                </div>

                <?php
                }
                ?>
                <!-- end dataset -->
            </div>
        </div>
    </div>