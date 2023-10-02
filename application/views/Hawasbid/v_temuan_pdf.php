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
                LEMBAR TEMUAN PENGAWASAN <br>
                PADA <?= strtoupper($jadwal->pengadilan) ?> <br>
                Nomor Surat Tugas <?= $jadwal->no_st ?> <br>
                Periode <?=$periode->nama ?> Tahun <?=$periode->tahun ?> 
            </th>
        </tr>
    </table>
    <br>
    <table class="table table-sm table-bordered" style="border-color:black! important;">
        <?php $nomor=1; foreach ($area as $areas) : ?>
            <tr>
                <td colspan="6" class="table-dark">
                    <strong><?=$nomor++ . '. ' . strtoupper($areas->nama) ?></strong>
                </td>
            </tr>
                <?php $number = 1; foreach ($temuan as $temuans) : ?>
                    <?php if ($temuans->id == $areas->id): ?>
                        <tr>
                            <td width="5%" align="center"><?= $number++ ?></td>
                            <td colspan="5">
                                <b>Kondisi :</b> <br>
                                <?= $temuans->kondisi ?> <br>
                                <b>Kriteria :</b> <br>
                                <?= $temuans->kriteria ?> <br>
                                <b>Sebab :</b> <br>
                                <?= $temuans->sebab ?> <br>
                                <b>Akibat :</b> <br>
                                <?= $temuans->akibat ?> <br>
                                <b>Rekomendasi :</b> <br>
                                <?= $temuans->rekomendasi ?> <br><br>
                            </td>
                        </tr>
                    <?php endif; ?>
            <?php endforeach ?>
        <?php endforeach ?>
        <tr>
            <td class="table-dark" colspan="6"><b>TANGGAPAN OBRIK</b></td>
        </tr>
        <tr>
            <td colspan="6"><?= $jadwal->tanggapan_obrik ?></td>
        </tr>
    </table>
    <br><br><br>
    <div class="row">
        <div class="col-sm-1 float-left" >
        </div>
        <div class="col-sm-4 float-left" >
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
                    <td><br><br></td>
                </tr>
                <tr>
                    <td><?= $jadwal->nama ?></td>
                </tr>
            </table>
        </div>
        <div class="col-sm-6 float-left">
            <table>
                <tr>
                    <td>Gorontalo,___________</td>
                </tr>
                <tr>
                    <td>Tim Pemeriksa,</td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                 <?php  foreach ($tim as $tims) : ?>
                    <tr>
                        <td><?= $tims->nama ?><br><?= $tims->role ?><br><?= $tims->jabatan ?> <br><br></td> 
                        <td><br>......................................</td>
                    </tr>  
                <?php endforeach ?>
            </table>
        </div>
    </div>
</body>
</html>
