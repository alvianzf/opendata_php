
            <h3>Daftar Organisasi Perangkat Daerah (OPD)</h3>
            <a href="index.php?admin=dinas&action=newopd"><button class="btn btn-info pull-right" name="addnew">Tambah OPD</button></a>
            <table class="table table-responsive table-hover table-striped table-condensed table-bordered">
            <thead>
                <th width="5%">No</th>
                <th>Nama OPD</th>
                <th>Singkatan</th>
                <th width="20%">Opsi</th>
            </thead>
            <tbody>

            <!-- populate data -->
            <?php

            $rowNumber = 1;
            $opdRecords = where('tb_opd');
            while($opdData = mysql_fetch_assoc($opdRecords))
            {
                $opdId = $opdData['id'];
                ?>
                <tr>
                    <td><?= $rowNumber; ?></td>
                    <td><?= $opdData['nama_opd']; ?></td>
                    <td><?= $opdData['singkatan']; ?></td>
                    <td>
                    <a href="?admin=opd-edit&id=<?= $opdData['id']; ?>">
                        <button class="btn btn-success" name="edit">Edit</button>
                    </a>
                        <a href="controls/delete.php?table=tb_opd&source=dinas&id=<?= $opdId; ?>"><button class="btn btn-danger" name="delete">Delete</button></a>
                    </td>
                </tr>
                <?php
                $rowNumber++;                
            }
                ?>
            </tbody>
            </table>
