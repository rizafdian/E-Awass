<div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><small><?=$subobjek->nama_objek ?></small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('wasda') ?>">Home</a></li>
              <li class="breadcrumb-item">Detail</li>
              <li class="breadcrumb-item active">Periksa Temuan</li>
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
                <h3 class="card-title">Sub-area Pengawasan :<strong> <?=$subobjek->nama ?></strong></h3>
                <div class="card-tools">
                  <a type="button" class="btn-sm bg-info" href="<?php echo site_url('Wasda/Periksatemuan/index/'.$subobjek->id_objek.'/'.$jadwal->id_jadwal) ?>">
                     <i class="fa fa-angle-left"></i>  Back</a>
                  
                </div>
              </div>
              <div class="card-body p-0">
                <div class="card">
                  <div class="card-body">
                    <?php if ($eviden != null): ?>
                    <a href="<?=$eviden->eviden ?>" class="card-link" target="_blank"><span class="badge bg-success"><i class="fas fa-link" ></i> Tautan Eviden</a>
                    <?php endif; ?> 
                    <a type="button" href="<?php echo site_url('Wasda/Periksatemuan/formTambah/'.$subobjek->id_subobjek.'/'.$jadwal->id_jadwal) ?>">
                    <span class="badge bg-primary"><i class="fa fa-plus"></i>  Tambah Temuan</a>  
                  </div>
                </div>
                <!-- /.table-responsive -->

              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              </div>
              <!-- /.card-footer -->
            </div>       
          </div>
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body p-0">              
                <div class="table-responsive">
                  <table class="table table-bordered m-0">
                    <thead>
                      <tr>
                        <th width="50px">#</th>
                        <th>Temuan</th>
                        <th width="150px">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1; ?>
                        <?php foreach ($temuan as $temuans): ?>
                      <tr>
                        <td><?=$no++ ?></td>
                        <td>
                          <dl>
                            <dt>Kondisi</dt>
                              <dd><?= nl2br($temuans->kondisi) ?></dd>
                            <dt>Kriteria</dt>
                              <dd><?= nl2br($temuans->kriteria) ?></dd>
                            <dt>Sebab</dt>
                              <dd><?= nl2br($temuans->sebab) ?></dd>
                            <dt>Akibat</dt>
                              <dd><?= nl2br($temuans->akibat) ?></dd>
                            <dt>Rekomendasi</dt>
                              <dd><?= nl2br($temuans->rekomendasi) ?></dd>
                          </dl>
                        </td>
                        <td>
                          <a href="<?php echo site_url('Wasda/Periksatemuan/formEdit/'.$temuans->id_subobjek.'/'.$temuans->id_jadwal.'/'.$temuans->id_temuan) ?>" ><span class="badge bg-warning"><i class="fa fa-edit"></i> Edit</span> </a> 
                          <a onclick="deleteConfirm('<?php echo site_url('Wasda/Periksatemuan/delete/'.$temuans->id_subobjek.'/'.$temuans->id_jadwal.'/'.$temuans->id_temuan) ?>')"
                       href="#!"><span class="badge bg-danger"><i class="fas fa-trash"></i>  Hapus</span></a> 
                        </td>
                      </tr>
                      <?php endforeach; ?>    
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Temuan</th>
                      <th>Aksi</th>
                    </tr>
                    </tfoot>
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
              <div class="card-body p-0">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title"><strong>Panduan Pemeriksaan</strong></h5>
                    <p class="card-text">
                      <ol>
                        <?php  foreach ($pertanyaan as $pertanyaans): ?>
                          <li><?=$pertanyaans->pertanyaan ?></li>
                        <?php endforeach; ?> 
                      </ol>
                    </p> 
                  </div>
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

     <!-- Logout Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>