            <h3>Daftar Dataset</h3>
            <a href="index.php?admin=dataset&action=newdataset" class="btn btn-info pull-right">Tambah Dataset</a>
            <table class="table table-responsive table-hover table-striped table-condensed table-bordered">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Dataset</th>
                        <th>OPD</th>
                        <th width="20%">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $datasets = getDatasets();
                foreach ($datasets as $index => $dataset) {
                    $opdName = getOPDName($dataset['id_opd']);
                    ?>
                    <tr>
                        <td><?= $index + 1; ?></td>
                        <td><?= htmlspecialchars($dataset['nama_dataset']); ?></td>
                        <td><?= htmlspecialchars($opdName); ?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="?admin=dataset-edit&id=<?= $dataset['id']; ?>" class="btn btn-success">Edit</a>
                                <a href="controls/delete.php?table=tb_dataset&source=dataset&id=<?= $dataset['id']; ?>" class="btn btn-danger">Delete</a>
                            </div>
                            <a href="?admin=forms&id=<?= $dataset['id']; ?>" class="btn btn-info btn-block mt-2">Daftar Form</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
