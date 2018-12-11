<?php

$id = @$_GET['q'];

$qry = viewdata('tb_fields', 'id_form', $id);
$det = mysql_fetch_assoc($qry);
?>

<div class="container">

<?php

$nama = viewdata1('tb_form', 'id', $id, 'nama_form');

$deskripsi = viewdata1('tb_form', 'id', $id, 'deskripsi');

echo '<h4>'.$nama.'</h4>';
echo '<p>'.$deskripsi.'</p>';

?>
<br/>

<a href="admin/controls/print-data.php?id=<?= $id;?>" class="btn btn-primary pull-right">Cetak PDF</a>
<br/>
<br/>

    <table class="table table-responsive table-hover table-striped table-condensed table-bordered">
            <thead>
            <tr>
            <th width="5%">No</th>

            <!-- populate data -->
            <?php

            $qry = mysql_query("SELECT * FROM tb_fields WHERE id_form = $id");
            while($data = mysql_fetch_assoc($qry))
            {
                echo '<th>';
                echo $data['value'];
                echo '</th>';
            }
                ?>ia

                </tr>
            </thead>
            <tbody>

             

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
                            echo '<td>'.$table['value'].'</td>';
                        }
                    }
                    echo '</tr>';
                }
                            
            ?>            
           

            </tbody>
            </table>
    </div>
</div>