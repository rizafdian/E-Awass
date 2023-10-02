    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Pengadilan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pengadilan</li>
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
                <h3 class="card-title"><a href="<?php echo site_url('Superadmin/pengadilan/') ?>"><i class="fas fa-arrow-left"></i> Back</a></h3>
              </div>
              <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $this->session->flashdata('success'); ?>
                </div>
              <?php endif; ?>

              <form action="" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?php echo $pengadilan->id?>">
                
                <div class="card-body">
                  <div class="form-group">
                    <label for="pengadilan">Nama Pengadilan</label>
                    <input name="pengadilan" type="text" class="form-control <?php echo form_error('pengadilan') ? 'is-invalid':'' ?>" id="pengadilan" data-dz-name placeholder="Masukkan nama pengadilan" value="<?php echo $pengadilan->pengadilan ?>">
                    <?php echo form_error('pengadilan') ?>
                  </div>
                  
                  <div class="form-group">
                    <label for="kota">Kota</label>
                    <input name="kota" type="text" class="form-control <?php echo form_error('kota') ? 'is-invalid':'' ?>" id="kota" placeholder="Masukan kota pengadilan" value="<?php echo $pengadilan->kota ?>">
                    <?php echo form_error('kota') ?>
                  </div>

                  <div class="form-group">
                    <label for="nama">Nama Ketua</label>
                    <input name="nama" type="text" class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" id="nama" placeholder="Masukan nama ketua lengkap beserta gelar" value="<?php echo $pengadilan->nama ?>">
                    <?php echo form_error('nama') ?>
                  </div>

                  <div class="form-group">
                    <label for="nip">NIP</label>
                    <input name="nip" type="number" class="form-control <?php echo form_error('nip') ? 'is-invalid':'' ?>" id="nip" placeholder="Masukan NIP Ketua" value="<?php echo $pengadilan->nip ?>">
                    <?php echo form_error('nip') ?>
                  </div>

                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Submit</button>
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
   