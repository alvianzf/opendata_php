<div class="card">
    <div class="card-content">
        <form method="post" class="bootstrap-form-with-validation" action="controls/peg.php">
            <h2 class="text-center">Tambah Pegawai Baru</h2>
            <?php
            $bidang_form_pegawai = [
                ['tipe' => 'text', 'nama' => 'nama_pegawai', 'label' => 'Nama Pegawai'],
                ['tipe' => 'text', 'nama' => 'nip_pegawai', 'label' => 'NIP'],
                ['tipe' => 'text', 'nama' => 'jabatan_pegawai', 'label' => 'Jabatan'],
            ];

            foreach ($bidang_form_pegawai as $bidang) {
                echo buat_grup_form_pegawai($bidang);
            }

            function buat_grup_form_pegawai($bidang) {
                $html = '<div class="form-group">';
                $html .= '<label class="control-label" for="' . $bidang['nama'] . '">' . $bidang['label'] . '</label>';
                $html .= '<input class="form-control" type="' . $bidang['tipe'] . '" name="' . $bidang['nama'] . '" id="' . $bidang['nama'] . '">';
                $html .= '</div>';
                return $html;
            }
            ?>
            <div class="form-group">
                <label class="control-label" for="opd_pegawai">OPD</label>
                <select name="opd_pegawai" id="opd_pegawai" class="form-control">
                    <?php
                    $kueri_opd = where('tb_opd');
                    while ($opd = mysql_fetch_assoc($kueri_opd)) {
                        echo '<option value="' . $opd['id'] . '">' . $opd['singkatan'] . ' - ' . $opd['nama_opd'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Pegawai</label>
                <p class="form-static-control">Berisi Data inputan Aparatur Sipil Negara di Wilayah Tanjungpinang.</p>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="kirim_data_pegawai">Baru</button>
            </div>
        </form>
    </div>
</div>