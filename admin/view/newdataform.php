<div class="card">
    <div class="card-content">
        <form method="post" class="bootstrap-form-with-validation" action="controls/newform.php?id=<?= @$_GET['id']; ?>">
            <h2 class="text-center">Form Baru</h2>
            <div class="form-group">
                <label class="control-label" for="field-count-input">Masukkan Jumlah Field dalam Tabel</label>
                <input class="form-control" type="number" name="field_count" id="field-count-input">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="submit_new_form">Buat Form</button>
            </div>
        </form>
    </div>
</div>