<div class="card">
                <div class="card-content">
         
                <form method="post" class="bootstrap-form-with-validation" action="controls/user.php">
                    <h2 class="text-center">Tambah Pengguna Baru</h2>
                    <div class="form-group">
                        <label class="control-label" for="text-input">NIP</label>
                        <input class="form-control" type="text" name="nip" id="text-input" list="pegawai">
                    </div>

                    <datalist id="pegawai">
                    <?php
                        $ss = where('tb_peg');
                        while ($nama = mysql_fetch_assoc($ss))
                        {
                    ?>

                        <option value=<?=$nama['id'];?>><?= $nama['nama'];?></option>

                    <?php
                    }
                    ?>
                    </datalist>
                    <div class="form-group">
                        <label class="control-label" for="text-input">Password</label>
                        <input class="form-control" type="text" name="password" id="text-input">
                    </div>                    
                   
                    <div class="form-group">
                        <label class="control-label">Pengguna</label>
                        <p class="form-static-control">Berisi Pengguna Open Data Tanjungpinang.</p>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" name="OK">Baru</button>
                    </div>
                </form>
                
                </div>
            </div>