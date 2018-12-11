
            <h3>Daftar Dataset</h3>
            <a href="index.php?admin=dataset&action=newdataset"><button class="btn btn-info pull-right" name="addnew">Tambah Dataset</button></a>
            <table class="table table-responsive table-hover table-striped table-condensed table-bordered">
            <thead>
                <th width="5%">No</th>
                <th>Nama Dataset</th>
                <th>OPD</th>
                <th width="20%">Opsi</th>
            </thead>
            <tbody>

            <!-- populate data -->
            <?php

            $i = 1;
            $sql = where('tb_dataset');
            while($data = mysql_fetch_assoc($sql))
            {

                $id = $data['id_opd'];
                $idd= $data['id'];
                ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $data['nama_dataset'];?></td>
                    <td><?= viewdata1('tb_opd', 'id', $id, 'nama_opd');?></td>
                    <td>
                    <center>
                    <a href="?admin=dataset-edit&id=<?=$data['id'];?>">
                        <button class="btn btn-success" name="edit">Edit</button></a>
                        <a href="controls/delete.php?table=tb_dataset&source=dataset&id=<?= $idd;?>">
                           <button class="btn-danger btn">Delete</button>
                        </a>
                    </center>
                        <a href="?admin=forms&id=<?=$idd;?>">
                            <button class="btn btn-info btn-block">Daftar Form</button>
                        </a>
                    </td>
                </tr>
                <?php
                $i++;                
            }
                ?>
            </tbody>
            </table>
