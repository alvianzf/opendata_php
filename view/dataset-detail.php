<?php

$id = @$_GET['i'];

$qry = viewdata('tb_form', 'id_dataset', $id);
$det = mysql_fetch_assoc(mysql_query("SELECT * FROM tb_dataset WHERE id = $id"));
?>

<div class="container">
    <div class="row">
    <h3><?= $det['nama_dataset'];?></h3>
    <p><?= $det['keterangan'];?></p>
    <table class="table table-condensed table-hover table-bordered">
        <thead>
            <th>No</th>
            <th>Data</th>
            <th>Keterangan Data</th>
        </thead>
        <tbody>

            <?php
            $i = 1;
            
            while ($data = mysql_fetch_assoc($qry))
            {
                ?>
                    <tr>
                    <td><?= $i;?></td>
                    <td><?=$data['nama_form'];?></td>
                    <td><?= $data['deskripsi'];?></td>
                    </tr>

                <?php

                $i++;
            }
            ?>
        </tbody>
    </table>
    </div>
</div>