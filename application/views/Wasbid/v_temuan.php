<div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Temuan Pengawasan</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('wasbid') ?>">Home</a></li>
              <li class="breadcrumb-item">Detail</li>
              <li class="breadcrumb-item active">Temuan</li>
            </ol>

          </div>

          
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">          
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-transparent">
                <div class="card-tools">
                  <a type="button" class="btn btn-dark btn-sm" href="<?php echo site_url('Wasbid/temuan/pdfmake/'.$jadwal->id_jadwal) ?>" target="_blank"><i class="fa fa-file-pdf"></i>  PDF</a>
                  <a type="button" class="btn btn-sm bg-info" href="<?php echo site_url('Wasbid/Detail/index/'.$jadwal->id_jadwal) ?>">
                     <i class="fa fa-angle-left"></i>  Back</a>
                  </a>
                </div>
              </div>
              <div class="card-body">
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
                                  <?= nl2br($temuans->kondisi) ?> <br>
                                  <b>Kriteria :</b> <br>
                                  <?= nl2br($temuans->kriteria) ?> <br>
                                  <b>Sebab :</b> <br>
                                  <?= nl2br($temuans->sebab) ?> <br>
                                  <b>Akibat :</b> <br>
                                  <?= nl2br($temuans->akibat) ?> <br>
                                  <b>Rekomendasi :</b> <br>
                                  <?= nl2br($temuans->rekomendasi) ?> <br>
                                  <?php if ($temuans->tindak_lanjut != null): ?>
                                    <b>Tindak Lanjut :</b> <br>
                                    <?= nl2br($temuans->tindak_lanjut) ?> <br>
                                    <a href="<?=$temuans->eviden_tindaklanjut ?>" class="card-link" target="_blank"><i class="fas fa-link" ></i> Eviden</a>
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
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
