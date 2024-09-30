<?php

$datasetId = @$_GET['i'];

$formQuery = viewdata('tb_form', 'id_dataset', $datasetId);
$datasetDetails = mysql_fetch_assoc(mysql_query("SELECT * FROM tb_dataset WHERE id = $datasetId"));
?>

<div class="container">
    <div class="row">
    <h3><?= $datasetDetails['nama_dataset']; ?></h3>
    <p><?= $datasetDetails['keterangan']; ?></p>
    <table class="table table-condensed table-hover table-bordered">
        <thead>
            <th>No</th>
            <th>Data</th>
            <th>Keterangan Data</th>
        </thead>
        <tbody>

            <?php
            $rowNumber = 1;
            
            while ($formData = mysql_fetch_assoc($formQuery))
            {
                ?>
                    <tr>
                    <td><?= $rowNumber; ?></td>
                    <td><?= $formData['nama_form']; ?></td>
                    <td><?= $formData['deskripsi']; ?></td>
                    </tr>

                <?php

                $rowNumber++;
            }
            ?>
        </tbody>
    </table>
    </div>
</div>