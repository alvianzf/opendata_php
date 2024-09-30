<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Daftar OPD:</h3>
            
            <!-- start dataset list -->
            <?php
            $datasetResults = search("tb_dataset", "nama_dataset");
                                    
            while ($datasetItem = mysql_fetch_assoc($datasetResults)) {
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?= $datasetItem['nama_dataset']; ?></h3>
                    </div>
                    <div class="panel-body">
                        <span> </span>
                        <a href="#"><?= $datasetItem['nama_dataset']; ?></a>
                    </div>
                </div>
                <?php
            }
            ?>
            <!-- end dataset list -->
        </div>
    </div>
</div>