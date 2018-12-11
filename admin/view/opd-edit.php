<?php

$id = @$_GET['id'];

$qry = mysql_fetch_assoc(mysql_query("SELECT * FROM tb_opd WHERE id=$id"));

?>
<div class="card">
                <div class="card-content">
         
                <form method="post" class="bootstrap-form-with-validation" action="controls/opd-edit.php?id=<?=$id;?>">
                    <h2 class="text-center">Ubah Data OPD</h2>
                    <div class="form-group">
                        <label class="control-label" for="textarea-input">Nama OPD </label>
                        <textarea class="form-control" name="nama" id="textarea-input"><?=$qry['nama_opd'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="text-input">Singkatan</label>
                        <input class="form-control" type="text" value="<?= $qry['singkatan'];?>" name="singkatan" id="text-input">
                    </div>
                   
                    <div class="form-group">
                        <label class="control-label">OPD</label>
                        <p class="form-static-control">OPD adalah Organisasi Perangkat Daerah. Adalah perangkat Dinas yang ada di Kota Tanjungpinang.</p>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" name="OK">Ubah</button>
                    </div>
                </form>
                
                </div>
            </div>