
            <h3>Daftar Pengguna</h3>
            <a href="index.php?admin=peg"><button class="btn btn-warning pull-right" name="addnew">Daftar Pegawai</button></a>
            <a href="index.php?admin=user&action=newuser"><button class="btn btn-success pull-right" name="addnew">Tambah Pengguna</button></a>
            <table class="table table-responsive table-hover table-striped table-condensed table-bordered">
            <thead>
                <th width="5%">No</th>
                <th>NIP</th>
                <th>Nama Pegawai</th>
                <th>Password</th>
                <th>OPD</th>
                <th width="20%">Opsi</th>
            </thead>
            <tbody>

            <!-- populate data -->
            <?php

            $rowNumber = 1;
            $userQuery = where('tb_user');
            while($userData = mysql_fetch_assoc($userQuery))
            {
                $employeeId = $userData['id_peg'];
                $userId = $userData['id'];
                $opdId = viewdata1('tb_peg', 'id', $employeeId, 'id_opd');
                ?>
                <tr>
                    <td><?= $rowNumber; ?></td>
                    <td><?= $userData['id_peg']; ?></td>
                    <td><?= viewdata1('tb_peg', 'id', $employeeId, 'nama'); ?></td>
                    <td><?= $userData['password']; ?></td>
                    <td><?= viewdata1('tb_opd', 'id', $opdId, 'nama_opd'); ?></td>
                    <td>
                    <a href="?admin=edit-user&id=<?= $userData['id_peg']; ?>">
                        <button class="btn btn-success" name="edit">Edit</button>
                        </a>
                        <a href="controls/delete.php?table=tb_user&source=user&id=<?= $userId ?>" >
                            <button class="btn btn-danger" name="delete">Delete</button>
                        </a>
                    </td>
                </tr>
                <?php
                $rowNumber++;                
            }
                ?>
            </tbody>
            </table>
