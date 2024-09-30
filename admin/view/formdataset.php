             <div class="card">
                <div class="card-content">
                    <form method="post" class="bootstrap-form-with-validation" action="controls/dataset.php">
                        <h2 class="text-center">Tambah Dataset Baru</h2>
                        <?php
                        $form_fields = [
                            ['type' => 'text', 'name' => 'nama', 'label' => 'Nama Dataset'],
                            ['type' => 'textarea', 'name' => 'deskripsi', 'label' => 'Deskripsi'],
                            ['type' => 'select', 'name' => 'opd', 'label' => 'OPD', 'options' => get_opd_options()],
                        ];

                        foreach ($form_fields as $field) {
                            echo generate_form_group($field);
                        }

                        function generate_form_group($field) {
                            $html = '<div class="form-group">';
                            $html .= '<label class="control-label" for="' . $field['name'] . '">' . $field['label'] . '</label>';
                            
                            switch ($field['type']) {
                                case 'text':
                                    $html .= '<input class="form-control" type="text" name="' . $field['name'] . '" id="' . $field['name'] . '">';
                                    break;
                                case 'textarea':
                                    $html .= '<textarea class="form-control" name="' . $field['name'] . '" id="' . $field['name'] . '"></textarea>';
                                    break;
                                case 'select':
                                    $html .= '<select name="' . $field['name'] . '" id="' . $field['name'] . '" class="form-control">';
                                    $html .= $field['options'];
                                    $html .= '</select>';
                                    break;
                            }
                            
                            $html .= '</div>';
                            return $html;
                        }

                        function get_opd_options() {
                            $s = where('tb_opd');
                            $options = '';
                            while ($opd1 = mysql_fetch_assoc($s)) {
                                $options .= '<option value="' . $opd1['id'] . '">' . $opd1['singkatan'] . ' - ' . $opd1['nama_opd'] . '</option>';
                            }
                            return $options;
                        }
                        ?>
                        <div class="form-group">
                            <label class="control-label">Dataset</label>
                            <p class="form-static-control">Sebuah dataset adalah kumpulan data yang telah dikategorikan.</p>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" name="OK">Baru</button>
                        </div>
                    </form>
                </div>
            </div>