<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Daftar Dataset:</h3>
                
                <!-- start dataset -->
                <?php

                $datasets = where("tb_dataset");
                                        
                $datasetCount = 0;
                while ($currentDataset = mysql_fetch_assoc($datasets) && $datasetCount < 20)
                {
                    ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><a href="?i=<?=$currentDataset['id'];?>"><?= $currentDataset['nama_dataset'];?></a></h3>
                    </div>
                    <div class="panel-body"><span><a href="#">

                        <?php
                            $datasetId = $currentDataset['id'];

                            $formCount = 0;
                            $formQuery = viewdata('tb_form', 'id_dataset', $datasetId);
                            while($currentForm = mysql_fetch_assoc($formQuery) && $formCount < 5)
                            {
                                    echo '<a href="?q='.$currentForm['id'].'">';
                                    echo $currentForm['nama_form'];
                                    echo '</a> <br/>';
                                    $formCount++;
                                
                            }
                            ?>
                        </a>
                    </div>
                </div>

                <?php
                $datasetCount++;
                }
                ?>
                <!-- end dataset -->
            </div>
        </div>
    </div>