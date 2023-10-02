<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Top Navigation</title>
  <link rel="stylesheet" type="text/css" href=''>
</head>

<body style="font-size: 10px;">
    <table>
        <tr>
            <th class="text-center">
                KERTAS KERJA PENGAWASAN <br>
                <?= strtoupper($area->nama) ?> <br>
                PADA <?= strtoupper($jadwal->pengadilan) ?> <br>
                Periode <?=$periode->nama ?>  s.d <?=$periode->tahun ?> 
            </th>
        </tr>
    </table>
    <table border="0" width="90%" align="center" cellpadding="3px" style="border-collapse: collapse;">
        <tr>
            <td width="25%"><b>Obrik</b></td>
            <td>: </td>
            <td> <?= $jadwal->pengadilan ?></td>
        </tr>
        <tr>
            <td><b>Jenis Pengawasan</b></td>
            <td>: </td>
            <td>
                <?php if ($jadwal->jenis == 1): ?>
                    Pengawasan Bidang
                <?php elseif ($jadwal->jenis == 2): ?>
                    Pengawasan Daerah
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td><b>Tanggal Pengawasan</b></td>
            <td>: </td>
            <td><?=date("d-m-Y", strtotime($jadwal->tgl_mulai)).' s.d '.date("d-m-Y", strtotime($jadwal->tgl_selesai)) ?></td>
        </tr>
        <tr>
            <td><b>Tim Pemeriksaan</b></td>
            <td>: </td>
            <td><?php $number= 1;?> 
                 <?php   foreach ($tim as $tims): ?>
                <?= '    '.$number++ . '. ' . $tims->nama .' ('.$tims->role . ')' ?><br>
                <?php endforeach ?>
                
            </td>
        </tr>
    </table>
    <table border="0" width="90%" align="center" cellpadding="3px" style="border-collapse: collapse;">
        <thead>
            <tr>
                <td><b>Tujuan Pemeriksaan</b></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $area->tujuan ?></td>
            </tr>
        </tbody>
    </table>
    <table border="0" width="90%" align="center" cellpadding="3px" style="border-collapse: collapse;">
        <thead>
            <tr>
                <td colspan="2"><b>Objek Pemeriksaan</b></td>
            </tr>
        </thead>
        <tbody>
            <?php
            $num = 1;
            foreach ($subarea as $subareas) : ?>
                <tr>
                    <td><?= $num++ . '. '. $subareas->nama ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <table border="0" width="90%" align="center" cellpadding="3px" style="border-collapse: collapse;">
        <thead>
            <tr>
                <td><b>Metode Pemeriksaan</b></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $area->metode ?></td>
            </tr>
        </tbody>
    </table>
    <br><br>
    <table border="0" width="90%" align="center" cellpadding="3px" style="border-collapse: collapse;">
        <tr>
            <td><b>Unsur-unsur yang diperiksa</b></td>
        </tr>
    </table>
    <table >
        <thead>
            <tr>
                <td align="center"><b>No.</b></td>
                <td align="center"><b>Uraian</b></td>
                <td align="center"><b>Penanggung jawab</b></td>
                <td align="center"><b>Dokumen Yang Diperiksa</b></td>
                <td align="center"><b>Ya/Tidak</b></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($subarea as $subareas) : ?>
                <tr>
                    <td><b><?= $subareas->nama ?></b></td>
                </tr>
                <?php
                $number = 1;
                foreach ($pertanyaan as $pertanyaans) : ?>
                    <tr>
                        <td align="center"><?= $number++ . '.' ?></td>
                        <td><?= $pertanyaans->pertanyaan ?></td>
                        <td><?= $pertanyaans->subjek ?></td>
                        <td><?= $pertanyaans->dokumen ?></td>
                        <td align="center"><?php
                            if ($pertanyaans->keterangan == null) {
                            } else {
                                echo $pertanyaans->keterangan;
                            }?>
                            
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endforeach ?>
        </tbody>
    </table>
        <br>
     <table border="0" align="center" width="35%" style="font-size: 12px; float: right;">
        <tr>
            <td>Gorontalo, <?= tgl_indo($data->tgl_selesai) ?></td>
        </tr>
        <tr>
            <td>Ketua Tim Pemeriksa,</td>
        </tr>
            
            <?php if ($jadwal->jenis == 1): ?>

                <?php  foreach ($tim as $tims) : ?>
        
                    <?php if ($tims->role == 'Ketua'): ?>
                        <tr>
                            <td><?= $tims->role . '(' . $tims->jabatan . ')' ?></td>
                        </tr>
                        <tr>
                            <td><br><br><br></td>
                        </tr>

                        <tr>
                            <td><?= $tims->nama ?></td>
                        </tr>
                        <tr>
                            <td><br><br></td>
                        </tr>
                    <?php endif; ?>

                <?php endforeach ?>
        
            <?php elseif ($jadwal->jenis == 2): ?>
            
                <?php  foreach ($tim as $tims) : ?>

                    <?php if ($tims->role == $area->nama): ?>
                         <tr>
                            <td><?= $tims->jabatan . ' ' . $tims->role?></td>
                        </tr>
                        <tr>
                            <td><br><br><br></td>
                        </tr>

                        <tr>
                            <td><?= $tims->nama ?></td>
                        </tr>
                        <tr>
                            <td><br><br></td>
                        </tr>

                    <?php endif; ?>

                <?php endforeach ?>

            <?php endif; ?>  
    </table>
</body>



</html>