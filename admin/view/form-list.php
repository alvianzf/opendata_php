
            <h3>Daftar Form</h3>
            <a href="index.php?admin=forms&action=newform&id=<?= @$_GET['id'];?>"><button class="btn btn-info pull-right" name="addnew">Tambah Form</button></a>
            <table class="table table-responsive table-hover table-striped table-condensed table-bordered">
            <thead>
                <th width="5%">No</th>
                <th>Nama Form</th>
                <th>Deskripsi</th>
                <th>Dataset</th>
                <th width="20%">Opsi</th>
            </thead>
            <tbody>

            <!-- populate data -->
            <?php

            $i = 1;
            $sql = viewdata('tb_form', 'id_dataset', @$_GET['id']);
            while($data = mysql_fetch_assoc($sql))
            {

                $id = $data['id_dataset'];
                $idd= $data['id'];
                ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $data['nama_form'];?></td>
                    <td><?= $data['deskripsi'];?></td>
                    <td><?= viewdata1('tb_dataset', 'id', @$_GET['id'], 'nama_dataset');?></td>
                    <td>
                        <center>
                            <a href="?admin=form-edit&id=<?=$data['id'];?>&id_dataset=<?= $_GET['id']; ?>">
                            <button class="btn btn-success" name="edit">Edit</button></a>
                            <a href='controls/deletedata.php?source=forms&table=tb_form&id=<?= $idd; ?>&idd=<?= $id ?>'>
                            <button class="btn btn-danger" name="delete">Delete</button></a>
                        </center>
                        
                    <a href="?admin=data&id=<?= $idd ?>">
                        <button class="btn btn-info btn-block">Lihat Data</button></a>
                    </td>
                </tr>
                <?php
                $i++;                
            }
                ?>
            </tbody>
            </table>
