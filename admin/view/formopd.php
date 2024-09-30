<div class="card">
    <div class="card-content">
        <form method="post" class="bootstrap-form-with-validation" action="controls/opd.php">
            <h2 class="text-center">Tambah OPD Baru</h2>
            <?php
            $form_fields = [
                ['type' => 'text', 'name' => 'nama', 'label' => 'Nama OPD'],
                ['type' => 'text', 'name' => 'singkatan', 'label' => 'Singkatan'],
            ];

            foreach ($form_fields as $field) {
                echo generate_form_group($field);
            }

            function generate_form_group($field) {
                $html = '<div class="form-group">';
                $html .= '<label class="control-label" for="' . $field['name'] . '">' . $field['label'] . '</label>';
                $html .= '<input class="form-control" type="' . $field['type'] . '" name="' . $field['name'] . '" id="' . $field['name'] . '">';
                $html .= '</div>';
                return $html;
            }
            ?>
            <div class="form-group">
                <label class="control-label">OPD</label>
                <p class="form-static-control">OPD adalah Organisasi Perangkat Daerah. Adalah perangkat Dinas yang ada di Kota Tanjungpinang.</p>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="OK">Baru</button>
            </div>
        </form>
    </div>
</div>