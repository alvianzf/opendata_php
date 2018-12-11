             <div class="card">
                <div class="card-content">
         
                <form method="post" class="bootstrap-form-with-validation" action="controls/dataset.php">
                    <h2 class="text-center">Tambah Dataset Baru</h2>
                    <div class="form-group">
                        <label class="control-label" for="text-input">Nama Dataset</label>
                        <input class="form-control" type="text" name="nama" id="text-input">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="textarea-input">Deskripsi </label>
                        <textarea class="form-control" name="deskripsi" id="textarea-input"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="OPD">OPD </label>
                        <select name="opd" id="OPD"  class="form-control">
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
                        <button class="btn btn-primary" type="submit" name="OK">Baru</button>
                    </div>
                </form>
                
                </div>
            </div>