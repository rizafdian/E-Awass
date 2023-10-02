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
    <table class="table table-sm table-bordered" style="border-color:black! important;">
       
        <tbody>
        <?php $nomor=1; foreach ($area as $areas) : ?>
            <tr>
                <td colspan="5" class="table-dark">
                    <strong><?=$nomor++ . '. ' . strtoupper($areas->nama) ?></strong>
                </td>
            </tr>
                <?php $number = 1; foreach ($temuan as $temuans) : ?>
                    <?php if ($temuans->id_objek == $areas->id): ?>
                        
                       <tr>
                            <td width="5%" align="center"><?= $number++ ?></td>
                            <td colspan="4">
                                <b>Kondisi </b> <br>
                                <?= $temuans->kondisi ?> <br>
                                <b>Sebab</b> <br>
                                <?= $temuans->sebab ?> <br>
                                <b>Akibat</b> <br>
                                <?= $temuans->akibat ?> <br>
                                <b>Rekomendasi</b> <br>
                                <?= $temuans->rekomendasi ?> <br>
                                <b>Tindak Lanjut</b> <br>
                                <?= $temuans->keterangan ?> <br>
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach ?>
        <?php endforeach ?>
       </tbody>
    </table>
    <br><br><br>
    <div class="row">
        <div class="col-sm-4 float-right">
            <table>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td>Gorontalo, <?= $jadwal->tgl_selesai ?></td>
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
    </div>
</body>
</html>
