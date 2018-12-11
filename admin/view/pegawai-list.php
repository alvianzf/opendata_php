
            <h3>Daftar Pegawai</h3>
            <a href="index.php?admin=peg&action=newpegawai"><button class="btn btn-info pull-right" name="addnew">Tambah Pegawai</button></a>
            <table id="tbpegawai" class="table table-responsive table-hover table-striped table-condensed table-bordered">
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

            $i = 1;
            $sql = where('tb_peg');
            while($data = mysql_fetch_assoc($sql))
            {

                $id = $data['id_opd'];
                $idd= $data['id'];
                ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $data['id'];?></td>
                    <td><?= $data['nama'];?></td>
                    <td><?= $data['jabatan'];?></td>
                    <td><?= viewdata1('tb_opd', 'id', $id, 'nama_opd');?></td>
                    <td>
                        <a href="?admin=edit-peg&id=<?= $data['id'];?>">
                        <button class="btn btn-success" name="edit">Edit</button>
                        </a>
                        <a href="controls/delete.php?table=tb_peg&source=peg&id=<?= $data['id']; ?>">
                        <button class="btn btn-danger" name="delete">Delete</button></a>
                    </td>
                </tr>
                <?php
                $i++;                
            }
                ?>
            </tbody>
            </table>
