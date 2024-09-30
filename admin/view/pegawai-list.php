
            <h3>Daftar Pegawai</h3>
            <a href="index.php?admin=peg&action=newpegawai"><button class="btn btn-info pull-right" name="addnew">Tambah Pegawai</button></a>
            <table id="table-pegawai" class="table table-responsive table-hover table-striped table-condensed table-bordered">
            <thead>
                <th width="5%">No</th>
                <th>NIP</th>
                <th>Nama Pegawai</th>
                <th>Jabatan</th>
                <th>OPD</th>
                <th width="20%">Opsi</th>
            </thead>
            <tbody>

            <!-- populate data -->
            <?php

            $rowNumber = 1;
            $pegawaiQuery = where('tb_peg');
            while($pegawaiData = mysql_fetch_assoc($pegawaiQuery))
            {
                $opdId = $pegawaiData['id_opd'];
                $pegawaiId = $pegawaiData['id'];
                ?>
                <tr>
                    <td><?= $rowNumber; ?></td>
                    <td><?= $pegawaiData['id'];?></td>
                    <td><?= $pegawaiData['nama'];?></td>
                    <td><?= $pegawaiData['jabatan'];?></td>
                    <td><?= viewdata1('tb_opd', 'id', $opdId, 'nama_opd');?></td>
                    <td>
                        <a href="?admin=edit-peg&id=<?= $pegawaiData['id'];?>">
                        <button class="btn btn-success" name="edit">Edit</button>
                        </a>
                        <a href="controls/delete.php?table=tb_peg&source=peg&id=<?= $pegawaiData['id']; ?>">
                        <button class="btn btn-danger" name="delete">Delete</button></a>
                    </td>
                </tr>
                <?php
                $rowNumber++;                
            }
                ?>
            </tbody>
            </table>
