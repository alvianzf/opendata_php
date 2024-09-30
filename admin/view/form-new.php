<div class="card">
    <div class="card-content">
        <form method="post" class="bootstrap-form-with-validation" action="controls/newformcontrols.php">
            <h2 class="text-center">Buat Form Baru</h2>
            <p>Masukkan nama-nama kolom yang akan dimasukkan datanya:</p>
            <br>
            <div class="form-group">
                <label class="control-label" for="namaForm">Nama Form</label>
                <input class="form-control" type="text" name="namaForm" id="namaForm" required>
                <label class="control-label" for="deskripsi">Deskripsi Form</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
                <input type="hidden" name="id" value="<?= htmlspecialchars($_GET['id'] ?? ''); ?>">
            </div>
            <?php
            $q = intval($_GET['q'] ?? 0);
            $id = $_GET['id'] ?? '';

            for ($i = 0; $i < $q; $i++) {
                ?>
                <div class="form-group">
                    <label class="control-label" for="value-<?= $i; ?>">Value <?= $i + 1; ?></label>
                    <input class="form-control" type="text" name="value[]" id="value-<?= $i; ?>" required>
                </div>
                <?php
            }
            ?>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="OK">Simpan</button>
            </div>
        </form>
    </div>
</div>