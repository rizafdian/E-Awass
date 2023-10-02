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
              <li class="breadcrumb-item ">Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  <section class="content">
      <div class="container-fluid">
        <div class="row"> 
          <div class="col-12">

            <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title"><a href="<?php echo site_url('Adminpa/User/') ?>"><i class="fas fa-arrow-left"></i> Back</a></h3>
                </div>

                <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php endif; ?>

                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" >
                  <div class="card-body">

                    <input type="hidden" name="id" value="<?php echo $user->id_user?>">

                    <div class="form-group row">
                      <label for="nama"  class="col-sm-2 col-form-label">Nama User</label>
                      <div class="col-sm-10">
                        <input name="nama" type="text" class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" id="nama" data-dz-name placeholder="Masukkan nama pengguna" value="<?=$user->nama ?>">
                      <?php echo form_error('nama') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                       <label for="satker" class="col-sm-2 col-form-label">Satker</label>
                        <div class="col-sm-10">
                          <select name="id_pengadilan" class="form-control" required>
                            <option value="<?= $pengadilan->id ?>"> <?= $pengadilan->pengadilan?> </option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="username" class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-10">
                      <input name="username" type="text" class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>" id="username" placeholder="Masukan username tanpa spasi (contoh : pentagon123)" value="<?=$user->username ?>">
                      <?php echo form_error('username') ?>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="role" class="col-sm-2 col-form-label">Role</label>
                      <div class="col-sm-10">
                       <select name="role" class="form-control" required>
                          <option value="">--Pilih Role--</option>
                          <option value="4" <?= $user->role == 4 ? 'selected' : null ?>>Tim Pemeriksa PA</option>
                          <option value="5" <?= $user->role == 5 ? 'selected' : null ?>>Pegawai</option>
                        </select>
                      <?php echo form_error('role') ?>
                      </div>
                    </div>

                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Submit</button>
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
   