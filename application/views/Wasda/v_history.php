<div class="content-header">
      <div class="container">
      </div>
</div>

<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">History Pengawasan</h3>

                <div class="card-tools">
                  <a class="btn-sm bg-info float-sm-right" href="<?php echo site_url('Wasda/Detail/index/'.$jdw->id_jadwal) ?>">
                  <i class="fa fa-angle-left"></i>  Back</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Periode</th>
                      <th>Jenis</th>
                      <th>Obrik</th>
                      <th>Status</th>
                      <th>Detail</th>
                    </tr>
                    </thead>
                    <tbody>
                     <?php foreach ($jadwal as $jadwals): ?>
                      <tr>
                        <td>Periode <?=$jadwals->nama ?>  <?=$jadwals->tahun ?></td>
                        <td> <?php if ($jadwals->jenis == 1): ?>
                               <span class="badge badge-dark">Bidang</span>
                             <?php elseif ($jadwals->jenis == 2): ?>
                               <span class="badge badge-info">Daerah</span>
                             <?php endif; ?>
                        </td>
                        <td><?=$jadwals->pengadilan ?></td>
                        <td>
                          <?php if ($jadwals->status == "Sudah"): ?>
                            <span class="badge badge-pill badge-success">Sudah</span>
                          <?php else: ?>
                            <span class="badge badge-pill badge-danger">Belum</span>
                          <?php endif; ?>
                        </td>
                        <td>
                          <a href="<?php echo site_url('Wasda/History/Detail/'.$jadwals->id_jadwal) ?>" class="text-muted">
                            <i class="fas fa-search"></i>
                          </a>
                        </td>
                      </tr>
                     <?php endforeach; ?> 
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
             
              <!-- /.card-footer -->
        </div>
      </div>
    </div>
  </div>
</div>
