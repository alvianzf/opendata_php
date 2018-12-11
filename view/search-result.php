<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Daftar OPD:</h3>
                
                <!-- start dataset -->
                <?php

                $dataset = search("tb_dataset", "nama_dataset", );
                                        
                while ($data = mysql_fetch_assoc($dataset))
                {
                    ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= $data['nama_dataset'];?></h3>
                    </div>
                    <div class="panel-body"><span> </span><a href="#"><?= $data['nama_dataset'];?></a>
                    </div>
                </div>

                <?php
                }
                ?>
                <!-- end dataset -->
            </div>
        </div>
    </div>