
            <h3>Daftar Data</h3>
            
            <table class="table table-responsive table-hover table-striped table-condensed table-bordered">
            <thead>
            <tr>
            <th width="5%">No</th>

            <!-- populate data -->
            <?php

            $id = @$_GET['id'];

            $qry = mysql_query("SELECT * FROM tb_fields WHERE id_form = $id");
            while($data = mysql_fetch_assoc($qry))
            {
                echo '<th>';
                echo $data['value'];
                echo '</th>';
            }
                ?>
                <th width="10%">Aksi</th>

                </tr>
            </thead>
            <tbody>

             <tr>
            <td></td>
            <form method="POST" action="controls/data-controller.php?id=<?= $id; ?>">
            
            <?php

            $loop = mysql_query("SELECT * FROM tb_fields WHERE id_form = $id");
            while ($form = mysql_fetch_assoc($loop))
            {
                ?>
                <td>
                <input type="text" class="form-control" name="form[]">
                </td>


                <?php
            }

            ?>
            
            <td><button class="btn btn-info btn-block" type="submit">Tambah</button></td>
            </tr>            
            </form>

            <?php

            $sql = mysql_query("SELECT tb_fields.id_form, tb_values.value, tb_values.timestamp FROM tb_values INNER JOIN tb_fields ON tb_fields.id = tb_values.id_field WHERE id_form = $id ORDER BY timestamp");
            $no =1;

            $o = mysql_fetch_assoc($sql);

            $temp = date("Y-m-d H:i:s");

            while($loop = mysql_fetch_assoc($sql))
            {

                $waktu = $loop['timestamp'];
                if($temp == $loop['timestamp'])
                {
                   
                    $temp = $waktu;
                }else{
                    $temp = $waktu;
                    $query = mysql_query("SELECT * FROM tb_values WHERE timestamp = '$waktu'");
                    echo '<td>'.$no.'</td>';
                    $no++;

                    while($table = mysql_fetch_assoc($query))
                    {
                        echo '<td>'.$table['value']. '<a href="controls/deletedatalist.php?source=data&table=tb_fields&idd='.$id.'&id='.$table['id'].'" class="pull-right">Hapus</a></td>';
                    }
                }
                echo '</tr>';
            }
        ?>

            
            
            
           

            </tbody>
            </table>