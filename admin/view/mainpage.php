<h4>Statistik Data Terkini:</h4>

<table class="table table-condensed table-hover">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th>Kategori</th>
            <th width="20%"><center>Jumlah</center></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $statistik_items = [
            ['Dataset', 'tb_dataset'],
            ['Data', 'tb_form'],
            ['Organisasi Perangkat Daerah', 'tb_opd'],
            ['Pengguna', 'tb_user']
        ];

        foreach ($statistik_items as $index => $item) {
            $nomor = $index + 1;
            $kategori = $item[0];
            $tabel = $item[1];
            echo "<tr>
                <td>{$nomor}</td>
                <td>{$kategori}</td>
                <td><center>" . hitung($tabel) . "</center></td>
            </tr>";
        }
        ?>
    </tbody>
</table>