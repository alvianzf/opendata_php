<?php
ob_start();
include '../../config/config.php';
include '../../functions/sql.php';

function getFormData($id) {
    $query = "SELECT * FROM tb_form WHERE id = ?";
    $stmt = mysqli_prepare($GLOBALS['connection'], $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

function getFormFields($id) {
    $query = "SELECT * FROM tb_fields WHERE id_form = ?";
    $stmt = mysqli_prepare($GLOBALS['connection'], $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

function getFormValues($id) {
    $query = "SELECT tb_fields.id_form, tb_values.value, tb_values.timestamp 
              FROM tb_values 
              INNER JOIN tb_fields ON tb_fields.id = tb_values.id_field 
              WHERE id_form = ? 
              ORDER BY timestamp";
    $stmt = mysqli_prepare($GLOBALS['connection'], $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

function getValuesByTimestamp($timestamp) {
    $query = "SELECT * FROM tb_values WHERE timestamp = ?";
    $stmt = mysqli_prepare($GLOBALS['connection'], $query);
    mysqli_stmt_bind_param($stmt, "s", $timestamp);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

$id = $_GET['id'] ?? null;
if (!$id) {
    die("Form ID is required");
}

$formData = getFormData($id);
$formFields = getFormFields($id);
$formValues = getFormValues($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($formData['nama_form']) ?></title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 5px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h3 style="text-align:center"><?= htmlspecialchars($formData['nama_form']) ?></h3>
    <p style="text-align: center"><?= htmlspecialchars($formData['deskripsi']) ?></p>
    <p style="text-align: center;"><?= date('d-m-Y') ?></p>
    <br><br>
    <div style="margin: 0 auto;">
        <div style="text-align: center;">
            <table>
                <tr>
                    <th style="width:5%;">No</th>
                    <?php while ($field = mysqli_fetch_assoc($formFields)): ?>
                        <th style="width:15%;"><?= htmlspecialchars($field['value']) ?></th>
                    <?php endwhile; ?>
                </tr>
                <?php 
                $no = 1;
                $temp = null;
                while ($row = mysqli_fetch_assoc($formValues)):
                    if ($temp !== $row['timestamp']):
                        $temp = $row['timestamp'];
                        $values = getValuesByTimestamp($temp);
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <?php while ($value = mysqli_fetch_assoc($values)): ?>
                            <td><?= htmlspecialchars($value['value']) ?></td>
                        <?php endwhile; ?>
                    </tr>
                <?php 
                    endif;
                endwhile; 
                ?>
            </table>
        </div>
    </div>
</body>
</html>
<?php
$html = ob_get_clean();

require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P', 'A4', 'en');
$pdf->WriteHTML($html);
$pdf->Output('data_detail.pdf', 'D');
?>
