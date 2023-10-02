<div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Pengawasan</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('wasbid') ?>">Home</a></li>
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
          
          <div class="col-lg-6">
            <a class="btn btn-app bg-warning" href="<?php echo site_url('Wasbid/Temuan/index/'.$jadwal->id_jadwal) ?>">
              <i class="fas fa-barcode"></i> Tindak Lanjut
            </a>
            <a class="btn btn-app bg-success" data-toggle="modal" data-target="#modaledit<?=$jadwal->id_jadwal?>">
              <i class="fas fa-file"></i> Upload TLHP
            </a>
          </div>
          
          <div class="col-lg-6">
            <a class="btn-sm bg-info float-sm-right" href="<?php echo site_url('wasbid') ?>">
              <i class="fa fa-angle-left"></i>  Back
            </a>
          </div>

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
                    <table class="table m-0">
                      <thead>
                      <tr>
                        <th>Area Pengawasan</th>
                        <th>Progres Eviden</th>
                        <th>Jumlah Temuan</th>
                        <th>Tindak Lanjut</th>
                        <th>Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                       <?php $i = 0; foreach ($area as $areas): ?>
                        <tr>
                          <td><a href="<?php echo site_url('Wasbid/Periksa/index/'.$areas->id.'/'.$jadwal->id_jadwal) ?>"><?=$areas->nama ?></a>    
                          </td>
                          <td><span class="badge badge-secondary"><?= $pe[$i] ?></span></td>
                          <td><span class="badge badge-secondary"><?= $jt[$i] ?></span></td>
                          <td><span class="badge badge-secondary"><?= $tl[$i++] ?></span></td>
                          <td>
                            <a href="<?php echo site_url('Wasbid/Periksa/index/'.$areas->id.'/'.$jadwal->id_jadwal) ?>" class="text-muted text-center">
                              <i class="fas fa-edit"></i>
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
                <div class="card-footer clearfix">
                </div>
                <!-- /.card-footer -->
            </div>         
          </div>
          
          <div class="col-lg-4">
            
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Detail</h5>
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
                  <span class="info-box-icon bg-secondary">
                    <a href="<?= base_url('assets/upload/' . $jadwal->dok_temuan) ?>" target="_blank" >
                    <i class="fa fa-download"></i>
                    </a>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Lembar Temuan</span>
                    <span class="info-box-number">8 Temuan</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <?php endif; ?>
                <?php if ($jadwal->dok_tindaklanjut != null): ?>
                <div class="info-box">
                  <span class="info-box-icon bg-secondary">
                    <a href="<?= base_url('assets/upload/' . $jadwal->dok_tindaklanjut) ?>" target="_blank" >
                      <i class="fa fa-download"></i>
                    </a>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Tindak Lanjut Hasil Pengawasan</span>
                    <span class="info-box-number">Sudah ditindaklanjuti</span>
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

<!-- modal edit -->
<div class="modal fade" id="modaledit<?=$jadwal->id_jadwal ?>" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Upload Tindak Lanjut Hasil Pengawasan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?php echo site_url('Wasbid/detail/upload/'.$jadwal->id_jadwal) ?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <input type="hidden" name="id_jadwal" value="<?php  echo $jadwal->id_jadwal ?>">
          <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="tlhp" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Upload</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- akhir modal edit -->