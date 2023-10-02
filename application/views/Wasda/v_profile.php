    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><small>Profil User</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
           <a class="btn-sm bg-info float-sm-right" href="<?php echo site_url('wasda') ?>">
             <i class="fa fa-angle-left"></i>  Back</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
  <div class="container">
    <div class="card">
        <div class="card-body row">
          <div class="col-6 text-center d-flex align-items-center justify-content-center">
            <div class="">
              <h2><strong><?=$user->nama ?></strong></h2>
              <p class="lead mb-5"><?=$user->pengadilan ?>, <?=$user->kota ?><br>
                Admin Pengurus PTA
              </p>
            </div>
          </div>
          <div class="col-6">
              <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php endif; ?>

            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" >
            <input type="hidden" name="id" value="<?php echo $user->id_user?>">
            <div class="form-group">
              <label for="inputName" class="col-sm-3 col-form-label">Nama Lengkap</label>            
                <input name="nama" type="text" id="nama" class="form-control" value="<?=$user->nama ?>">
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-sm-3 col-form-label">Satker</label>
                <select name="id_pengadilan" class="form-control" required>
                  <option value="">--Pilih Satker--</option>
                    <?php foreach ($pengadilan as $pengadilans): ?>
                  <option value="<?= $pengadilans->id ?>" <?= $user->id_pengadilan == $pengadilans->id ? 'selected' : null ?>> <?= $pengadilans->pengadilan?> </option>
                  <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
              <label for="inputSubject" class="col-sm-3 col-form-label">Username</label>
             
               <input name="username" type="text" class="form-control" id="username" placeholder="Masukan username tanpa spasi (contoh : pentagon123)" value="<?=$user->username ?>">
            </div>
            <div class="form-group">
              <label for="inputSubject" class="col-sm-3 col-form-label">Role</label>
                <select name="role" class="form-control" required>
                  <option value="">--Pilih Role--</option>
                  <option value="1" <?= $user->role == 1 ? 'selected' : null ?>>Superadmin</option>
                  <option value="2" <?= $user->role == 2 ? 'selected' : null ?>>Tim Pemeriksa Bidang/Daerah PTA</option>
                  <option value="3" <?= $user->role == 3 ? 'selected' : null ?>>Admin</option>
                  <option value="4" <?= $user->role == 4 ? 'selected' : null ?>>Tim Pemeriksa PA</option>
                  <option value="5" <?= $user->role == 5 ? 'selected' : null ?>>Pegawai</option>
                </select>             
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Edit">
            </div>
          </form>
          </div>
        </div>
      </div>
  </div>
    <!-- /.content -->
</div>
