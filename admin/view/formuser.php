<div class="card">
    <div class="card-content">
        <form method="post" class="bootstrap-form-with-validation" action="controls/user.php">
            <h2 class="text-center">Tambah Pengguna Baru</h2>
            <div class="form-group">
                <label class="control-label" for="nip-input">NIP</label>
                <input class="form-control" type="text" name="nip" id="nip-input" list="pegawai-list">
            </div>

            <datalist id="pegawai-list">
            <?php
                $pegawai_query = where('tb_peg');
                while ($pegawai = mysql_fetch_assoc($pegawai_query))
                {
            ?>
                <option value="<?=$pegawai['id'];?>"><?= $pegawai['nama'];?></option>
            <?php
                }
            ?>
            </datalist>
            <div class="form-group">
                <label class="control-label" for="password-input">Password</label>
                <input class="form-control" type="text" name="password" id="password-input">
            </div>                    
           
            <div class="form-group">
                <label class="control-label">Pengguna</label>
                <p class="form-static-control">Berisi Pengguna Open Data Tanjungpinang.</p>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="submit_new_user">Baru</button>
            </div>
        </form>
    </div>
</div>