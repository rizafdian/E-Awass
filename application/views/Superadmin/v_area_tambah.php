    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Area Pengawasan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Area</li>
              <li class="breadcrumb-item active">Tambah</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              
              <div class="card-header">
                <h3 class="card-title"><a href="<?php echo site_url('Superadmin/area/') ?>"><i class="fas fa-arrow-left"></i> Back</a></h3>
              </div>
              <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $this->session->flashdata('success'); ?>
                </div>
              <?php endif; ?>

              <form action="<?php echo site_url('Superadmin/area/add') ?>" method="post" enctype="multipart/form-data">
                
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama Area</label>
                    <input name="nama" type="text" class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" id="nama" placeholder="Masukkan nama area">
                    <?php echo form_error('nama') ?>
                  </div>
                  
                  <div class="form-group">
                    <label for="tujuan">Tujuan Pengawasan</label>
                    <textarea name="tujuan" type="textarea" class="form-control <?php echo form_error('tujuan') ? 'is-invalid':'' ?>" id="tujuan" placeholder="Masukan tujuan pengawasan"></textarea>
                    <?php echo form_error('tujuan') ?>
                  </div>

                  <div class="form-group">
                    <label for="metode">Metode Pengawasan</label>
                    <textarea name="metode" type="textarea" class="form-control <?php echo form_error('metode') ? 'is-invalid':'' ?>" id="metode" placeholder="Masukan metode pengawasan"></textarea>
                    <?php echo form_error('metode') ?>
                  </div>

                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
              </form>
            </div>
              <!-- /.card -->
          </div>
            <!-- /.col -->
        </div>
          <!-- /.row -->
      </div>
        <!-- /.container-fluid -->
  </section>
   