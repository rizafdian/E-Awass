<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
  
</head>
<body style="font-size:14px;">
    <table class="table table-striped">
        <tr>
            <th colspan="2" class="text-center">
                KERTAS KERJA PENGAWASAN <?= strtoupper($area->nama) ?><br>
                PADA 
                <?php if ($jadwal->jenis == 1): ?>
                    PENGAWASAN BIDANG
                <?php elseif ($jadwal->jenis == 1): ?>
                    PENGAWASAN DAERAH
                <?php endif; ?>   
                <?= strtoupper($jadwal->pengadilan) ?> <br>
                Nomor Surat Surat Tugas <?= $jadwal->no_st ?> <br>
                Periode <?=$periode->nama ?> Tahun <?=$periode->tahun ?> 
            </th>
        </tr>
    </table>
    <br>
  
    <table class="table table-striped" >
                    <?php $nmr_temuan=1;?>
                      <tr>
                        <td colspan="6" class="table-dark" style="text-align: center;" >
                          <strong><?= strtoupper($area->nama) ?></strong>
                        </td>
                      </tr>
                      <?php foreach ($subarea as $subareas) : ?>                      
                          <?php $number = 1; foreach ($temuan as $temuans) : ?>
                            <?php if ($temuans->id_subobjek == $subareas->id_subobjek): ?>
                              <?php if ($number == 1): ?>
                                <tr>
                                  <td colspan="6" >
                                    <strong><?=$subareas->nama ?></strong>
                                  </td>
                                </tr>
                              <?php endif; ?>  
                              <tr>
                                <th rowspan="5" colspan="1" align="center"><?= $nmr_temuan++ ?></th>
                                <?php $number++; ?>
                                <td colspan="5">
                                  <b>Kondisi :</b> <br>
                                  <?= $temuans->kondisi ?></td>
                              </tr>
                              <tr>
                                <td colspan="5">
                                  <b>Kriteria :</b> <br>
                                  <?= $temuans->kriteria ?></td>
                              </tr>
                              <tr>
                                <td colspan="5">
                                  <b>Sebab :</b> <br>
                                  <?= $temuans->sebab ?></td>
                              </tr>
                              <tr>
                                <td colspan="5">
                                  <b>Akibat :</b> <br>
                                  <?= $temuans->akibat ?></td>
                              </tr>
                              <tr>
                                <td colspan="5">
                                  <b>Rekomendasi :</b> <br>
                                  <?= $temuans->rekomendasi ?></td>
                              </tr>
                            <?php endif; ?>
                          <?php endforeach ?>
                      <?php endforeach ?>
                    
                  </table>
    <br><br><br>
    <div class="row">
        <!-- <div class="col-sm-4 float-left" >
            <table>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>Yang diperiksa,</td>
                </tr>
                <tr>
                    <td>Ketua <?= $jadwal->pengadilan ?>, </td>
                </tr>
                <tr>
                    <td><br></td> 
                </tr>
                <tr>
                    <td><?= $jadwal->nama ?></td>
                </tr>
            </table>
        </div>
 -->        <div class="col-sm-7 float-right">
            <table>
                <tr>
                    <td><strong>Gorontalo,</strong> ..........</td>
                </tr>
                <tr>
                    <td><strong>Tim Pemeriksa,</strong><br></td>
                </tr>
                 <?php  foreach ($tim as $tims) : ?>
                    <?php if ($tims->role == 'Koordinator Pengawas Bidang'): ?>
                    <tr>
                        <td><?= $tims->nama ?><br><?= $tims->jabatan ?><br><?= $tims->role ?> <br><br></td> 
                        <td><br>......................................</td>
                    </tr>
                    <?php endif; ?>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</body>
</html>
