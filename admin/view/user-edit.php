<?php

$id = @$_GET['id'];

$qry = mysql_fetch_assoc(mysql_query("SELECT * FROM tb_user WHERE id_peg=$id"));

$idd = mysql_fetch_assoc(mysql_query("SELECT * FROM tb_peg WHERE id = $id"));
$idopd = $idd['id_opd'];

$opd = mysql_fetch_assoc(mysql_query("SELECT * FROM tb_opd WHERE id= $idopd"));

?>

<div class="card">
                <div class="card-content">
         
                <form method="post" class="bootstrap-form-with-validation" action="controls/user-edit.php?id=<?= $qry['id']; ?>">
                    <h2 class="text-center">Ubah Data Pengguna</h2>
                    <div class="form-group">
                        <label class="control-label" for="text-input">NIP</label>
                        <input class="form-control" type="text" name="nip" id="text-input" value="<?= $qry['id_peg'];?>" list="pegawai" disabled>
                    </div>

                    <datalist id="pegawai">
                    <?php
                        $ss = where('tb_peg');
                        while ($nama = mysql_fetch_assoc($ss))
                        {
                    ?>

                        <option value=<?=$nama['id'];?>><?= $nama['nama'];?></option>

                    <?php
                    }
                    ?>
                    </datalist>
                    <div class="form-group">
                        <label class="control-label" for="text-input">Password</label>
                        <input class="form-control" type="text" value="<?= $qry['password'];?>" name="password" id="text-input">
                    </div>                    
                    <div class="form-group">
                    <label class="control-label" for="OPD">OPD </label>
                        <select name="opd" id="OPD"  class="form-control" disabled>
                            <?php

                            $s = where('tb_opd');

                            echo '<option value="'.$qry['id_opd'].'" selected>'.$opd['singkatan'].' - '.$opd['nama_opd'].'</option>';

                                while($opd1 = mysql_fetch_assoc($s))
                                {
                            ?>

                        <option value=<?=$opd1['id'];?> ><?= $opd1['singkatan'];?> - <?= $opd1['nama_opd'];?></option>

                            <?php
                                }

                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Pengguna</label>
                        <p class="form-static-control">Berisi Pengguna Open Data Tanjungpinang.</p>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" name="OK">Ubah</button>
                    </div>
                </form>
                
                </div>
            </div>