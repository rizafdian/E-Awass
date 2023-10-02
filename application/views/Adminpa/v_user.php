    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
                <a href="<?php echo site_url('Adminpa/User/add') ?>"><i class="fas fa-plus"></i> Tambah</a>
              </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama</th>
                    <th>Satker</th>
                    <th>Username</th>
                    <!-- <th>Password</th> -->
                    <th>Role</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                   <?php foreach ($user as $users): ?>
                  <tr>
                    <td><?=$no++ ?></td>
                    <td><?=$users->nama ?></td>
                    <td><?=$users->pengadilan ?></td>
                    <td><?=$users->username ?></td>
                    <!-- <td><?=$users->password ?> -->
                    <td>
                        <?php if ($users->role == 1): ?>
                          Superadmin
                        <?php elseif ($users->role== 2): ?>
                          Tim Pemeriksa Bidang/Daerah PTA
                        <?php elseif ($users->role== 3): ?>
                          Admin
                        <?php elseif ($users->role== 4): ?>
                          Tim Pemeriksa Bidang PA
                        <?php elseif ($users->role== 5): ?>
                          Pegawai
                        <?php endif; ?>
                    </td>
                    <td><a href="<?php echo site_url('Adminpa/user/edit/'.$users->id_user) ?>"><span class="badge bg-warning"><i class="fas fa-edit"></i> Edit</span> </a>
                      <a href="<?php echo site_url('Adminpa/user/editpass/'.$users->id_user) ?>"><span class="badge bg-success"> Reset Pass</span> </a>
                        <a onclick="deleteConfirm('<?php echo site_url('Adminpa/user/delete/'.$users->id_user) ?>')"
                       href="#!"><span class="badge bg-danger"><i class="fas fa-trash"></i>  Hapus</span></a>
                  </tr>
                  <?php endforeach; ?>        
                </tbody>
              </table>
            </div>
          </div>
              <!-- /.card -->
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
   