<div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Tindak Lanjut Pengawasan</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('wasda') ?>">Home</a></li>
              <li class="breadcrumb-item">Detail</li>
              <li class="breadcrumb-item active">Tindak lanjut</li>
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
                  <a type="button" class="btn btn-dark btn-sm" href="<?php echo site_url('Wasda/Tindaklanjut/pdfmake/'.$jadwal->id_jadwal) ?>" target="_blank"><i class="fa fa-file-pdf"></i>  PDF</a>
                  <a type="button" class="btn btn-sm bg-info" href="<?php echo site_url('Wasda/Detail/index/'.$jadwal->id_jadwal) ?>">
                     <i class="fa fa-angle-left"></i>  Back</a>
                  </a>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered m-0">
                    <thead>
                    <tr>
                      <th width="10px">#</th>
                      <th>Kondisi/Temuan</th>
                      <th>Rekomendasi</th>
                      <th>Tindak Lanjut</th>
                      <th>Keterangan</th>
                      <th>Eviden</th>
                    </tr>
                    </thead>
                    <tbody>
                     <?php $no=1; foreach ($temuan as $temuans): ?>
                      <tr>
                        <td><?=$no++ ?></td>
                        <td><?=$temuans->kondisi ?></td>
                        <td><?=$temuans->rekomendasi ?></td>
                        <td>
                             <?php if ($temuans->tindak_lanjut == 1): ?>
                                          Telah ditindaklanjuti
                            <?php elseif ($temuans->tindak_lanjut == 2): ?>
                                          Dalam Proses
                            <?php elseif ($temuans->tindak_lanjut == 3) : ?>
                                          Belum ditindaklanjuti
                            <?php elseif ($temuans->tindak_lanjut == 4) : ?>
                                          Tidak dapat ditindaklanjuti
                            <?php endif; ?>
                        </td>
                        <td><?=$temuans->keterangan ?></td>
                        <td> <?php if (filter_var($temuans->eviden_tindaklanjut, FILTER_VALIDATE_URL) !== false): ?>
                              <a href="<?= $temuans->eviden_tindaklanjut ?>" target="_blank"><i class="fas fa-link" ></i>Link Eviden</a>
                            <?php endif; ?></td>
                      </tr>
                     <?php endforeach; ?> 
                    </tbody>
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