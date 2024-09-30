        <div class="card">
            <div class="card-content">
                <form method="post" class="bootstrap-form-with-validation">
                    <h2 class="text-center">Sample Form</h2>
                    <?php
                    $form_fields = [
                        ['type' => 'text', 'name' => 'sample_text', 'label' => 'Sample Text Input'],
                        ['type' => 'textarea', 'name' => 'sample_textarea', 'label' => 'Sample Textarea'],
                    ];

                    foreach ($form_fields as $field) {
                        echo generate_form_field($field);
                    }

                    function generate_form_field($field) {
                        $html = '<div class="form-group">';
                        $html .= '<label class="control-label" for="' . $field['name'] . '">' . $field['label'] . '</label>';
                        
                        switch ($field['type']) {
                            case 'text':
                                $html .= '<input class="form-control" type="text" name="' . $field['name'] . '" id="' . $field['name'] . '">';
                                break;
                            case 'textarea':
                                $html .= '<textarea class="form-control" name="' . $field['name'] . '" id="' . $field['name'] . '"></textarea>';
                                break;
                        }
                        
                        $html .= '</div>';
                        return $html;
                    }
                    ?>
                    <div class="form-group">
                        <label class="control-label">Form Description</label>
                        <p class="form-static-control">This is a refactored template demonstrating how to create Bootstrap forms using form group components, labels, and input fields.</p>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
