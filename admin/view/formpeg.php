<div class="card">
                <div class="card-content">
         
                <form method="post" class="bootstrap-form-with-validation" action="controls/peg.php">
                    <h2 class="text-center">Tambah Pegawai Baru</h2>
                    <div class="form-group">
                        <label class="control-label" for="text-input">Nama Pegawai</label>
                        <input class="form-control" type="text" name="nama" id="text-input">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="text-input">NIP</label>
                        <input class="form-control" type="text" name="nip" id="text-input">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="text-input">Jabatan</label>
                        <input class="form-control" type="text" name="jabatan" id="text-input">
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
                        <label class="control-label">Pegawai</label>
                        <p class="form-static-control">Berisi Data inputan Aparatur Sipil Negara di Wilayah Tanjungpinang.</p>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" name="OK">Baru</button>
                    </div>
                </form>
                
                </div>
            </div>