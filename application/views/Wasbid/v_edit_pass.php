    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><small>Profil User</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
           <a class="btn-sm bg-info float-sm-right" href="<?php echo site_url('wasbid') ?>">
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
              <label for="inputName" class="col-sm-3 col-form-label">Password</label>            
                <input name="password" type="password" id="password" class="form-control" placeholder="Masukkan Password">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Edit Password">
            </div>
          </form>
          </div>
        </div>
      </div>
  </div>
    <!-- /.content -->
</div>
