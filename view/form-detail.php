<?php

$formId = @$_GET['q'];

$fieldsQuery = viewdata('tb_fields', 'id_form', $formId);
$formDetails = mysql_fetch_assoc($fieldsQuery);
?>

<div class="container">

<?php

$formName = viewdata1('tb_form', 'id', $formId, 'nama_form');
$formDescription = viewdata1('tb_form', 'id', $formId, 'deskripsi');

echo '<h4>' . $formName . '</h4>';
echo '<p>' . $formDescription . '</p>';

?>
<br/>

<a href="admin/controls/print-data.php?id=<?= $formId; ?>" class="btn btn-primary pull-right">Cetak PDF</a>
<br/>
<br/>

    <table class="table table-responsive table-hover table-striped table-condensed table-bordered">
            <thead>
            <tr>
            <th width="5%">No</th>

            <!-- populate data -->
            <?php

            $headerQuery = mysql_query("SELECT * FROM tb_fields WHERE id_form = $formId");
            while($headerData = mysql_fetch_assoc($headerQuery))
            {
                echo '<th>';
                echo $headerData['value'];
                echo '</th>';
            }
                ?>

                </tr>
            </thead>
            <tbody>

             

          <?php

                $valuesQuery = mysql_query("SELECT tb_fields.id_form, tb_values.value, tb_values.timestamp FROM tb_values INNER JOIN tb_fields ON tb_fields.id = tb_values.id_field WHERE id_form = $formId ORDER BY timestamp");
                $rowNumber = 1;

                $firstRow = mysql_fetch_assoc($valuesQuery);

                $currentTimestamp = date("Y-m-d H:i:s");

                while($row = mysql_fetch_assoc($valuesQuery))
                {

                    $rowTimestamp = $row['timestamp'];
                    if($currentTimestamp == $row['timestamp'])
                    {
                    
                        $currentTimestamp = $rowTimestamp;
                    }else{
                        $currentTimestamp = $rowTimestamp;
                        $cellQuery = mysql_query("SELECT * FROM tb_values WHERE timestamp = '$rowTimestamp'");
                        echo '<td>' . $rowNumber . '</td>';
                        $rowNumber++;

                        while($cellData = mysql_fetch_assoc($cellQuery))
                        {
                            echo '<td>' . $cellData['value'] . '</td>';
                        }
                    }
                    echo '</tr>';
                }
                            
            ?>            
           

            </tbody>
            </table>
    </div>
</div>