<div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Pengawasan</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('hawasbid') ?>">Home</a></li>
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
             <a class="btn btn-app bg-danger" href="<?php echo site_url('Hawasbid/Temuan/index/'.$jadwal->id_jadwal) ?>">
              <i class="fas fa-barcode"></i> Temuan
            </a>
            <a class="btn btn-app bg-info" data-toggle="modal" data-target="#modaltemuan<?=$jadwal->id_jadwal?>">
              <i class="fas fa-file"></i> Upload Temuan
            </a>
            <a class="btn btn-app bg-success" href="https://drive.google.com/drive/folders/1eDTb2qLRJoOxCaXXDLW0uNbHCDH9HX2s?usp=sharing" target="_blank">
              <i class="fas fa-users"></i> Kontrak Kinerja
            </a>
            <a class="btn btn-app bg-warning" href="https://drive.google.com/drive/folders/1QIMcVxdNZ5lzs7BpSlcs-7fhx11E8WwI?usp=sharing" target="_blank">
              <i class="fas fa-inbox"></i> LHP
            </a>
            
            <a class="btn btn-app bg-secondary" data-toggle="modal" data-target="#modallhp<?=$jadwal->id_jadwal?>">
              <i class="fas fa-file"></i> Upload LHP
            </a>
          </div>
          <div class="col-lg-6">
               <a class="btn-sm bg-info float-sm-right" href="<?php echo site_url('hawasbid') ?>">
             <i class="fa fa-angle-left"></i>  Back</a>
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
                        <th>Progres Pengawasan</th>
                        <th>Jumlah Temuan</th>
                        <th>Periksa</th>
                      </tr>
                      </thead>
                      <tbody>
                       <?php $i = 0; foreach ($area as $areas): ?>
                        <tr>
                          <td><a href="<?php echo site_url('Hawasbid/Periksatemuan/index/'.$areas->id.'/'.$jadwal->id_jadwal) ?>"><?=$areas->nama ?></a>    
                          </td>
                          <td><span class="badge badge-secondary"><?= $pe[$i] ?></span></td>
                          <td><span class="badge badge-secondary"><?= $jt[$i] ?></span></td>
                          <td><span class="badge badge-secondary"><?= $tl[$i++] ?></span></td>
                          <td>
                            <a href="<?php echo site_url('Hawasbid/Periksatemuan/index/'.$areas->id.'/'.$jadwal->id_jadwal) ?>" class="text-muted text-center">
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

  <!-- modal upload temuan -->
<div class="modal fade" id="modaltemuan<?=$jadwal->id_jadwal ?>" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Upload Hasil Temuan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?php echo site_url('Hawasbid/detail/uploadtemuan/'.$jadwal->id_jadwal) ?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <input type="hidden" name="id_jadwal" value="<?php  echo $jadwal->id_jadwal ?>">
          <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="temuan" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info">Upload</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- akhir modal upload temuan -->

<!-- modal lhp -->
<div class="modal fade" id="modallhp<?=$jadwal->id_jadwal ?>" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Upload Laporan Hasil Pemeriksaan (LHP)</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?php echo site_url('Hawasbid/detail/uploadlhp/'.$jadwal->id_jadwal) ?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <input type="hidden" name="id_jadwal" value="<?php  echo $jadwal->id_jadwal ?>">
          <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="lhp" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-secondary">Upload</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- akhir modal lhp -->