<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Daftar Dataset:</h3>
                
                <!-- start dataset -->
                <?php

                $dataset = where("tb_dataset");
                                        
                $i=0;
                while ($data = mysql_fetch_assoc($dataset) AND $i <20)
                {
                    ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><a href="?i=<?=$data['id'];?>"><?= $data['nama_dataset'];?></a></h3>
                    </div>
                    <div class="panel-body"><span><a href="#">

                        <?php
                            $id = $data['id'];

                            $q= 0;
                            $qry = viewdata('tb_form', 'id_dataset', $id);
                            while($form = mysql_fetch_assoc($qry) AND $q<5)
                            {
                                    echo '<a href="?q='.$form['id'].'">';
                                    echo $form['nama_form'];
                                    echo '</a> <br/>';
                                    $q++;
                                
                            }
                            ?>
                        </a>
                    </div>
                </div>

                <?php
                $i++;
                }
                ?>
                <!-- end dataset -->
            </div>
        </div>
    </div>