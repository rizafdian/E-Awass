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
              <li class="breadcrumb-item ">Reset Password</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title"><a href="<?php echo site_url('Superadmin/User/') ?>"><i class="fas fa-arrow-left"></i> Back</a></h3>
                </div>

                <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php endif; ?>

                <form action="" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?php echo $user->id_user?>">
                
                <div class="card-body">
                  <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input name="password" type="password" class="form-control <?php echo form_error('pengadilan') ? 'is-invalid':'' ?>" id="password"  placeholder="Masukkan password baru">
                    <?php echo form_error('password') ?>
                  </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
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
   