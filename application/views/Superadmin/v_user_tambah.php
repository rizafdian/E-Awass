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
              <li class="breadcrumb-item ">Tambah</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
              <!-- /.card -->

            <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title"><a href="<?php echo site_url('Superadmin/User/') ?>"><i class="fas fa-arrow-left"></i> Back</a></h3>
                </div>

                <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php endif; ?>

                <form class="form-horizontal" action="<?php echo site_url('Superadmin/user/add') ?>" method="post" enctype="multipart/form-data" >
                  <div class="card-body">
                    <div class="form-group row">
                      <label for="nama"  class="col-sm-2 col-form-label">Nama User</label>
                      <div class="col-sm-10">
                        <input name="nama" type="text" class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" id="nama" data-dz-name placeholder="Masukkan nama pengguna" required>
                      <?php echo form_error('nama') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="id_pengadilan" class="col-sm-2 col-form-label">Satker</label>
                        <div class="col-sm-10">
                          <select name="id_pengadilan" class="form-control" required>
                            <option value="">--Pilih Satker--</option>
                              <?php foreach ($pengadilan as $pengadilans): ?>
                                <option value="<?= $pengadilans->id ?>"><?= $pengadilans->pengadilan ?></option>
                              <?php endforeach ?>
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="username" class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-10">
                      <input name="username" type="text" class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>" id="username" placeholder="Masukan username tanpa spasi (contoh : pentagon123)" required>
                      <?php echo form_error('username') ?>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="password" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                      <input name="password" type="password" class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>" id="password" placeholder="Masukan password" required>
                       <?php echo form_error('password') ?>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="role" class="col-sm-2 col-form-label">Role</label>
                      <div class="col-sm-10">
                       <select name="role" class="form-control" required>
                          <option value="">--Pilih Role--</option>
                          <option value="1">Superadmin</option>
                          <option value="2">Tim Pemeriksa Bidang/Daerah PTA</option>
                          <option value="3">Admin</option>
                          <option value="4">Tim Pemeriksa PA</option>
                          <option value="5">Pegawai</option>
                        </select>
                      <?php echo form_error('role') ?>
                      </div>
                    </div>

                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info">Tambah</button>
                  </div>
                </form>
                
            </div>

          </div>
            <!-- /.col -->
        </div>
          <!-- /.row -->
      </div>
        <!-- /.container-fluid -->
  </section>
   