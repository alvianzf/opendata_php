            <h3>Daftar Form</h3>
            <a href="index.php?admin=forms&action=newform&id=<?= htmlspecialchars($_GET['id'] ?? ''); ?>" class="btn btn-info pull-right">Tambah Form</a>
            <table class="table table-responsive table-hover table-striped table-condensed table-bordered">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nama Form</th>
                        <th>Deskripsi</th>
                        <th>Dataset</th>
                        <th width="20%">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $forms = getForms($_GET['id'] ?? null);
                foreach ($forms as $index => $form):
                    $datasetName = getDatasetName($form['id_dataset']);
                ?>
                    <tr>
                        <td><?= $index + 1; ?></td>
                        <td><?= htmlspecialchars($form['nama_form']); ?></td>
                        <td><?= htmlspecialchars($form['deskripsi']); ?></td>
                        <td><?= htmlspecialchars($datasetName); ?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="?admin=form-edit&id=<?= $form['id']; ?>&id_dataset=<?= $form['id_dataset']; ?>" class="btn btn-success">Edit</a>
                                <a href="controls/deletedata.php?source=forms&table=tb_form&id=<?= $form['id']; ?>&idd=<?= $form['id_dataset']; ?>" class="btn btn-danger">Delete</a>
                            </div>
                            <a href="?admin=data&id=<?= $form['id']; ?>" class="btn btn-info btn-block mt-2">Lihat Data</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
