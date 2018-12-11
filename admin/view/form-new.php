<div class="card">
                <div class="card-content">
         
                <form method="post" class="bootstrap-form-with-validation" action="controls/newformcontrols.php">
                    <h2 class="text-center">Buat Form Baru</h2>
                    <p>Masukkan nama-nama kolom yang akan dimasukkan datanya:</p>
                    <br>
                    <div class="form-group">
                        <label class="control-label" for="text-input">Nama Form</label>
                        <input class="form-control" type="text" name="namaForm" id="text-input">
                        <label class="control-label" for="text-input">Deskripsi Form</label>
                        <textarea class="form-control" name="deskripsi"></textarea>
                        <input class="form-control" type="hidden" name="id" value =<?= $_GET['id'];?>>
                    </div>
                    <?php

                    $i = 0;
                    $q = @$_GET['q'];
                    $id = @$_GET['id'];

                    while ($i <$q)
                    {
                        ?>
                        <div class="form-group">
                        <label class="control-label" for="text-input">Value <?=$i+1; ?></label>
                        <input class="form-control" type="text" name="value[]" id="text-input">
                    </div>

                        <?php
                        $i++;
                    }

                    ?>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" name="OK">Simpan</button>
                    </div>
                </form>
                
                </div>
            </div>