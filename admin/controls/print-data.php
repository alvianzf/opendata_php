<?php

ob_start();

?>

<html>
<body>
<?php

include '../../config/config.php';
include '../../functions/sql.php';

$id = @$_GET['id'];

$namaform = mysql_fetch_assoc(mysql_query("SELECT * FROM tb_form WHERE id= $id"));

?>
<h3 style="text-align:center"><?=$namaform['nama_form'];?></h3>
<p style="text-align: center"><?=$namaform['deskripsi'];?></p>
<p style="text-align: center;"><?= date('d-m-Y');?></p>
<br/><br/>
<div style="margin: 0 auto;">
<div style="text-align: center;">
   
<table style="width:100%; border: 1px solid black; border-collapse: collapse;">
            <tr>
            <th style="width:5%; border: 1px solid black;">No</th>

            <!-- populate data -->
            <?php

            $qry = mysql_query("SELECT * FROM tb_fields WHERE id_form = $id");
            while($data = mysql_fetch_assoc($qry))
            {
                echo '<th style="width:15%; text-align:center; border: 1px solid black;">';
                echo $data['value'];
                echo '</th>';
            }
                ?>

                </tr>

             

            <?php

                $sql = mysql_query("SELECT tb_fields.id_form, tb_values.value, tb_values.timestamp FROM tb_values INNER JOIN tb_fields ON tb_fields.id = tb_values.id_field WHERE id_form = $id ORDER BY timestamp");
                $no =1;

                $o = mysql_fetch_assoc($sql);

                $temp = date("Y-m-d H:i:s");

                while($loop = mysql_fetch_assoc($sql))
                {

                    echo '<tr>';

                    $waktu = $loop['timestamp'];
                    if($temp == $loop['timestamp'])
                    {
                    
                        $temp = $waktu;
                    }else{
                        $temp = $waktu;
                        $query = mysql_query("SELECT * FROM tb_values WHERE timestamp = '$waktu'");
                        echo '<td style=" text-align:center; border: 1px solid black;">'.$no.'</td>';
                        $no++;

                        while($table = mysql_fetch_assoc($query))
                        {
                            echo '<td  style=" text-align:center; border: 1px solid black;">'.$table['value'].'</td>';
                        }
                    }
                    echo '</tr>';
                }
                            
            ?>  
            </table>
            </div>
</div>

</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();

require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output( 'data_detail.pdf','D');
?>
