<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
</head>
<body style="font-size:12px;">
    <table class="table table-striped">
        <tr>
            <th colspan="2" class="text-center">
                LEMBAR TINDAK LANJUT HASIL 
                <?php if ($jadwal->jenis == 1): ?>
                        PENGAWASAN BIDANG
                <?php elseif ($jadwal->jenis == 2): ?>
                        PENGAWASAN DAERAH
                <?php endif; ?>
                <br>
                (TLHP) <br>
                PADA <?= strtoupper($jadwal->pengadilan) ?> <br>
                Periode <?=$periode->nama ?> Tahun <?=$periode->tahun ?> 
            </th>
        </tr>
    </table>
    <br>
    <table class="table table-striped" >
                    <?php $nomor=1; $nmr_temuan=1; foreach ($area as $areas) : ?>
                      <tr>
                        <td colspan="6" class="table-dark">
                          <strong><?=$nomor++ . '. ' . strtoupper($areas->nama) ?></strong>
                        </td>
                      </tr>
                      <?php foreach ($subarea as $subareas) : ?>
                        <?php if ($subareas->id_objek == $areas->id): ?>
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
                                <th rowspan="6" colspan="1" align="center"><?= $nmr_temuan++ ?></th>
                                <?php $number++; ?>
                                <td colspan="5">
                                  <b>Kondisi :</b> <br>
                                  <?= nl2br($temuans->kondisi) ?></td>
                              </tr>
                              <tr>
                                <td colspan="5">
                                  <b>Kriteria :</b> <br>
                                  <?= nl2br($temuans->kriteria) ?></td>
                              </tr>
                              <tr>
                                <td colspan="5">
                                  <b>Sebab :</b> <br>
                                  <?= nl2br($temuans->sebab) ?></td>
                              </tr>
                              <tr>
                                <td colspan="5">
                                  <b>Akibat :</b> <br>
                                  <?= nl2br($temuans->akibat) ?></td>
                              </tr>
                              <tr>
                                <td colspan="5">
                                  <b>Rekomendasi :</b> <br>
                                  <?= nl2br($temuans->rekomendasi) ?></td>
                              </tr>
                              <tr>
                                <td colspan="5">
                                  <b>Tindak Lanjut :</b> <br>
                                  <?= nl2br($temuans->tindak_lanjut) ?></td>
                              </tr>
                            <?php endif; ?>
                          <?php endforeach ?>
                        <?php endif; ?>
                      <?php endforeach ?>
                    <?php endforeach ?>
    </table>
    <br>
    <div class="row">
        <div class="col-sm-4 float-right">
            <table>
                <!-- <tr>
                    <td></td>
                </tr> -->
                <tr>
                    <td>Gorontalo, <?= $jadwal->tgl_selesai ?>               
                    <br>
                    Ketua <?= $jadwal->pengadilan ?>,             
                    <br><br><br> 
                    <?= $jadwal->nama ?></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
