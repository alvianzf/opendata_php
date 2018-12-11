<?php

$id = @$_GET['id'];

$qry = mysql_fetch_assoc(mysql_query("SELECT * FROM tb_dataset WHERE id= $id"));

$id_opd = $qry['id_opd'];

$opd = mysql_fetch_assoc(mysql_query("SELECT * FROM tb_opd WHERE id=$id_opd"));

?>
<div class="card">
                <div class="card-content">
         
                <form method="post" class="bootstrap-form-with-validation" action="controls/dataset-edit.php?id=<?= $id; ?>">
                    <h2 class="text-center">Ubah Dataset</h2>
                    <div class="form-group">
                        <label class="control-label" for="text-input" ">Nama Dataset</label>
                        <input class="form-control" type="text" name="nama" id="text-input" value="<?= $qry['nama_dataset'];?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="textarea-input">Deskripsi </label>
                        <textarea class="form-control" name="deskripsi" id="textarea-input"><?= $qry['keterangan']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="OPD">OPD </label>
                        <select name="opd" id="OPD"  class="form-control">

                        <option value="<?= $opd['id'];?>" selected><?= $opd['singkatan']?> - <?= $opd['nama_opd']; ?></option>
                            <?php

                            $s = where('tb_opd');

                                while($opd1 = mysql_fetch_assoc($s))
                                {
                            ?>

                        <option value=<?=$opd1['id'];?> ><?= $opd1['singkatan'];?> - <?= $opd1['nama_opd'];?></option>

                            <?php
                                }

                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Dataset</label>
                        <p class="form-static-control">Sebuah dataset adalah kumpulan data yang telah dikategorikan.</p>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" name="OK">Ubah</button>
                    </div>
                </form>
                
                </div>
            </div>