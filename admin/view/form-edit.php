<?php

$id = @$_GET['id'];

$qry = mysql_fetch_assoc(mysql_query("SELECT * FROM tb_form WHERE id= $id"));

?>
<div class="card">
                <div class="card-content">
         
                <form method="post" class="bootstrap-form-with-validation" action="controls/form-edit.php?id=<?=$id;?>&id_dataset=<?= @$_GET['id_dataset'];?>">
                    <h2 class="text-center">Edit Form</h2>
                    <p>Masukkan nama-nama kolom yang akan dimasukkan datanya:</p>
                    <br>
                    <div class="form-group">
                        <label class="control-label" for="text-input">Nama Form</label>
                        <input class="form-control" value="<?= $qry['nama_form'];?>" type="text" name="namaForm" id="text-input">
                        <label class="control-label" for="text-input">Deskripsi Form</label>
                        <textarea class="form-control" name="deskripsi"><?= $qry['deskripsi'];?></textarea>
                        <input class="form-control" type="hidden" name="id" value =<?= $_GET['id'];?>>
                    </div>
                  
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" name="OK">Ubah</button>
                    </div>
                </form>
                
                </div>
            </div>