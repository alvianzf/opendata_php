            <h3>Daftar Data</h3>
            
            <table class="table table-responsive table-hover table-striped table-condensed table-bordered">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <?php
                        $id = $_GET['id'] ?? null;
                        $fields = getFields($id);
                        foreach ($fields as $field) {
                            echo "<th>" . htmlspecialchars($field['value']) . "</th>";
                        }
                        ?>
                        <th width="10%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <form method="POST" action="controls/data-controller.php?id=<?= htmlspecialchars($id); ?>">
                            <?php foreach ($fields as $field): ?>
                                <td>
                                    <input type="text" class="form-control" name="form[]">
                                </td>
                            <?php endforeach; ?>
                            <td><button class="btn btn-info btn-block" type="submit">Tambah</button></td>
                        </form>
                    </tr>
                    <?php
                    $values = getValues($id);
                    $no = 1;
                    $temp = null;
                    foreach ($values as $value) {
                        if ($temp !== $value['timestamp']) {
                            if ($temp !== null) {
                                echo "</tr>";
                            }
                            $temp = $value['timestamp'];
                            echo "<tr>";
                            echo "<td>" . $no++ . "</td>";
                        }
                        echo "<td>" . htmlspecialchars($value['value']) . 
                             "<a href='controls/deletedatalist.php?source=data&table=tb_fields&idd=" . 
                             htmlspecialchars($id) . "&id=" . htmlspecialchars($value['id']) . 
                             "' class='pull-right'>Hapus</a></td>";
                    }
                    if ($temp !== null) {
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>