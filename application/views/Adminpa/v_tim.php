    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tim Pengawasan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tim</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <a href="<?php echo site_url('Adminpa/Tim/add') ?>"><i class="fas fa-plus"></i> Tambah</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Jadwal Pengawasan</th>
                      <th>Role</th>
                      <th>Jabatan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no = 1; ?>
                      <?php foreach ($tim as $tims): ?>
                    <tr>
                      <td><?=$no++ ?></td>
                      <td><?=$tims->nama ?></td>
                      <td><?= $tims->pengadilan.'<br>'.$tims->tgl_mulai.' s.d '.$tims->tgl_selesai ?> </td>
                      <td><?=$tims->role ?></td>
                      <td><?=$tims->jabatan ?> </td>
                      <td><a href="<?php echo site_url('Adminpa/tim/edit/'.$tims->id_tim) ?>"><span class="badge bg-warning"><i class="fas fa-edit"></i> Edit</span> </a>
                          <a onclick="deleteConfirm('<?php echo site_url('Adminpa/tim/delete/'.$tims->id_tim) ?>')"
                         href="#!"><span class="badge bg-danger"><i class="fas fa-trash"></i>  Hapus</span></a>
                      </td>
                    </tr>
                    <?php endforeach; ?>    
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                      <th>Nama</th>
                      <th>Jadwal Pengawasan</th>
                      <th>Role</th>
                      <th>Jabatan</th>
                      <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

          </div>
            <!-- /.col -->
        </div>
          <!-- /.row -->
      </div>
        <!-- /.container-fluid -->
  </section>

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
   