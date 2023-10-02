<div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail History</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('wasda') ?>">Home</a></li>
              <li class="breadcrumb-item">History</li>
              <li class="breadcrumb-item active">Detail</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header --> 

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
       

          <div class="col-lg-8">

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Tim Pemeriksa</h5>
              </div>             
              <div class="card-body">
                <ul class="users-list clearfix p-0">
                  <?php foreach ($tim as $tims): ?>
                  <li>
                    <a class="users-list-date"><strong><?=$tims->nama ?></strong></a>
                    <span class="users-list-date"><?=$tims->role ?></span>
                  </li>
                  <?php endforeach; ?> 
                </ul>
              </div>             
            </div>

            <div class="card">       
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table">
                    <?php $nomor=1; foreach ($area as $areas) : ?>
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
                                <td width="5%" align="center"><?= $number++ ?></td>
                                <td colspan="4">
                                  <b>Kondisi :</b> <br>
                                  <?= $temuans->kondisi ?> <br>
                                  <b>Kriteria :</b> <br>
                                  <?= $temuans->kriteria ?> <br>
                                  <b>Sebab :</b> <br>
                                  <?= $temuans->sebab ?> <br>
                                  <b>Akibat :</b> <br>
                                  <?= $temuans->akibat ?> <br>
                                  <b>Rekomendasi :</b> <br>
                                  <?= $temuans->rekomendasi ?> <br>
                                  <?php if ($temuans->tindak_lanjut != null): ?>
                                    <b>Tindak Lanjut :</b> <br>
                                    <?= $temuans->tindak_lanjut ?> <br>
                                    <a href="<?='//'.$temuans->eviden_tindaklanjut ?>" class="card-link" target="_blank"><i class="fas fa-link" ></i> Eviden</a>
                                  <?php endif; ?>
                                  <br>
                                </td>
                              </tr>
                            <?php endif; ?>
                          <?php endforeach ?>
                        <?php endif; ?>
                      <?php endforeach ?>
                    <?php endforeach ?>
                  </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                </div>
                <!-- /.card-footer -->
            </div>         
          </div>

              
          
          <div class="col-lg-4">
               
           

            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Detail</h5>
                <a class="btn-sm bg-info float-sm-right" href="<?php echo site_url('Wasda/History/index/'.$jadwal->id_pengadilan) ?>">
                  <i class="fa fa-angle-left"></i>  Back</a>
              </div>
              <div class="card-body">
                <ul class="list-unstyled">
                  <li> <?php if ($jadwal->jenis == 1): ?>
                            <span class="badge badge-dark"> Pengawasan Bidang</span>
                          <?php elseif ($jadwal->jenis == 2): ?>
                            <span class="badge badge-info">Pengawasan Daerah</span>
                          <?php endif; ?>
                  </li>
                  <li>Periode <?=$jadwal->nama ?>  Tahun <?=$jadwal->tahun ?></li>
                  <li><strong><?=$jadwal->pengadilan ?></strong></li>
                  <li>
                    <?=date("d-m-Y", strtotime($jadwal->tgl_mulai)).' s.d '.date("d-m-Y", strtotime($jadwal->tgl_selesai)) ?> </li>
                </ul>
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Dokumen Pengawasan</h5>
              </div>
              <div class="card-body">
                <?php if ($jadwal->dok_temuan != null): ?>
                <div class="info-box">
                  <span class="info-box-icon bg-dark">
                    <a href="<?= base_url('assets/upload/' . $jadwal->dok_temuan) ?>" target="_blank" >
                    <i class="fa fa-download"></i>
                    </a>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text"><strong>Lembar Temuan</strong></span>
                    
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <?php endif; ?>
                <?php if ($jadwal->dok_lhp != null): ?>
                <div class="info-box">
                  <span class="info-box-icon bg-dark">
                    <a href="<?= base_url('assets/upload/' . $jadwal->dok_lhp) ?>" target="_blank" >
                      <i class="fa fa-download"></i>
                    </a>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text"><strong>Laporan Hasil Pemeriksaan</strong></span>
                    
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <?php endif; ?>
                <?php if ($jadwal->dok_tindaklanjut != null): ?>
                <div class="info-box">
                  <span class="info-box-icon bg-dark">
                    <a href="<?= base_url('assets/upload/' . $jadwal->dok_tindaklanjut) ?>" target="_blank" >
                      <i class="fa fa-download"></i>
                    </a>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text"><strong>Tindak Lanjut</strong></span>
                   
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <?php endif; ?>
              </div>
            </div>

          </div>

      </div>
    </div>
  </div>
