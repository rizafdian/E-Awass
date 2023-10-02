<div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=$subobjek->nama_objek ?></small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Detail</li>
              <li class="breadcrumb-item active">Eviden</li>
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
                  <a type="button" class="btn-sm bg-info" href="<?php echo site_url('Wasbid/Periksa/index/'.$subobjek->id_objek.'/'.$jadwal->id_jadwal) ?>">
                     <i class="fa fa-angle-left"></i>  Back</a>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title"><strong>Daftar Pemeriksaan</strong></h5>
                  </div>
                  <div class="card-body">
                      <ol>
                        <?php  foreach ($pertanyaan as $pertanyaans): ?>
                          <li><?=$pertanyaans->pertanyaan ?></li>
                        <?php endforeach; ?> 
                      </ol>
                      <?php if ($eviden != null): ?>
                        <a href="<?=''.$eviden->eviden ?>" class="card-link" target="_blank"><i class="fas fa-link" ></i> Tautan Eviden</a>
                      <?php endif; ?>
                  </div>
                </div>
                <!-- /.table-responsive -->

              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">    
                <span class="badge bg-primary">
                  <a type="button"  data-toggle="modal" data-target="#modal-lg">
                  <i class="fa fa-plus"></i>  Tambah Eviden</a>
               </span>
               <?php if ($eviden != null): ?>
                <span class="badge bg-warning">
                  <a type="button"  data-toggle="modal" data-target="#modal-edit">
                  <i class="fa fa-edit"></i>  Edit Eviden</a>
                </span>
                <span class="badge bg-danger">  
                  <a type="button" onclick="deleteConfirm('<?php echo site_url('Wasbid/Periksa/delete/'.$subobjek->id_subobjek.'/'.$jadwal->id_jadwal.'/'.$eviden->id_eviden) ?>')">
                  <i class="fa fa-trash"></i>  Hapus</a>
                </span>  
                <?php endif; ?> 
              </div>
              <!-- /.card-footer -->
            </div>
            <?php if ($this->session->flashdata('success')): ?>
              <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
              </div>
            <?php endif; ?>
            <div class="card">
              <div class="card-body p-0">              
                <div class="table-responsive">
                  <table class="table table-bordered m-0">
                    <thead>
                      <tr>
                        <th width="50px">#</th>
                        <th>Tindak Lanjut Temuan</th>
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
                            <?php if ($temuans->tindak_lanjut != null): ?>
                            <dt>Tindak Lanjut :</dt> 
                              <dd><?= nl2br($temuans->tindak_lanjut) ?></dd>
                              <a href="<?=$temuans->eviden_tindaklanjut ?>" class="card-link" target="_blank"><i class="fas fa-link" ></i> Eviden</a>
                            <?php endif; ?>
                          </dl>
                        </td>
                        <td>
                          <?php if ($temuans->tindak_lanjut == null): ?>
                            <span class="badge bg-primary">
                              <a type="button"  data-toggle="modal" data-target="#modaltambah<?=$temuans->id_temuan ?>">
                                <i class="fa fa-plus"></i>Tindak Lanjut</a>
                            </span> <br>
                          <?php endif; ?>
                          <?php if ($temuans->tindak_lanjut != null): ?>
                            <span class="badge bg-warning">
                              <a type="button"  data-toggle="modal" data-target="#modaledit<?=$temuans->id_temuan ?>">
                                <i class="fa fa-edit"></i>  Edit</a>
                            </span> <br>
                            <span class="badge bg-danger">  
                              <a type="button" onclick="deleteConfirm('<?php echo site_url('Wasbid/Periksa/delete_tl/'.$temuans->id_subobjek.'/'.$temuans->id_jadwal.'/'.$temuans->id_temuan) ?>')">
                                <i class="fa fa-trash"></i>  Hapus</a>
                            </span> 
                          <?php endif; ?> 
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

<!-- modal tambah -->
<div class="modal fade" id="modal-lg" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Masukkan Tautan Eviden</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?php echo site_url('Wasbid/Periksa/formTambah/'.$subobjek->id_subobjek.'/'.$jadwal->id_jadwal) ?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <input type="hidden" name="id_subobjek" value="<?php  echo $subobjek->id_subobjek ?>">
          <input type="hidden" name="id_jadwal" value="<?php  echo $jadwal->id_jadwal ?>"> 
          <textarea name="eviden" type="textarea" class="form-control" id="eviden" placeholder="......."></textarea>   
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- akhir modal tambah -->

<?php if ($eviden != null): ?>
<div class="modal fade" id="modal-edit" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Tautan Eviden</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?php echo site_url('Wasbid/Periksa/formEdit/'.$subobjek->id_subobjek.'/'.$jadwal->id_jadwal) ?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <input type="hidden" name="id_eviden" value="<?php  echo $eviden->id_eviden ?>"> 
          <textarea name="eviden" type="textarea" class="form-control" id="eviden" placeholder="......."><?php echo $eviden->eviden; ?></textarea>   
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning">Edit</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<?php endif; ?>

<?php $number = 1; foreach ($temuan as $temuans) : ?>
<!-- modal tambah -->
<div class="modal fade" id="modaltambah<?=$temuans->id_temuan ?>" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Buat Tindak Lanjut</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?php echo site_url('Wasbid/Periksa/formEdit_tl/'.$temuans->id_jadwal.'/'.$subobjek->id_subobjek) ?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <input type="hidden" name="id_temuan" value="<?php  echo $temuans->id_temuan ?>">
          <label>Tindak Lanjut</label>
          <textarea name="tindak_lanjut" type="textarea" class="form-control" id="tindak_lanjut" style="white-space: pre-wrap;" placeholder="isi disini"></textarea>
          <label>Tautan Eviden Tindak Lanjut</label>
          <textarea name="eviden_tindaklanjut" type="textarea" class="form-control" id="eviden_tindaklanjut" placeholder="isi disini"></textarea>   
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- akhir modal tambah -->
<?php endforeach ?>

<?php $number = 1; foreach ($temuan as $temuans) : ?>
<!-- modal edit -->
<div class="modal fade" id="modaledit<?=$temuans->id_temuan ?>" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Tindak Lanjut</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?php echo site_url('Wasbid/Periksa/formEdit_tl/'.$temuans->id_jadwal.'/'.$subobjek->id_subobjek) ?>" method="post" enctype="multipart/form-data" role="form">
        <div class="modal-body">
          <input type="hidden" name="id_temuan" value="<?php  echo $temuans->id_temuan ?>">
          <label>Tindak Lanjut</label>
          <textarea name="tindak_lanjut" type="textarea" class="form-control" id="tindak_lanjut" style="white-space: pre-wrap;" placeholder="isi disini"><?=$temuans->tindak_lanjut ?></textarea>
          <label>Tautan Eviden Tindak Lanjut</label>
          <textarea name="eviden_tindaklanjut" type="textarea" class="form-control" id="eviden_tindaklanjut" placeholder="isi disini"><?=$temuans->eviden_tindaklanjut ?></textarea>   
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning">Edit</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- akhir modal edit -->
<?php endforeach ?>
