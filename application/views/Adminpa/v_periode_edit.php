    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Periode Pengawasan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Periode</li>
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
                <h3 class="card-title"><a href="<?php echo site_url('Superadmin/periode/') ?>"><i class="fas fa-arrow-left"></i> Back</a></h3>
              </div>
              <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $this->session->flashdata('success'); ?>
                </div>
              <?php endif; ?>

              <form action="" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?php echo $periode->id_periode?>" />

                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Periode</label>
                    <input name="nama" type="text" class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" id="nama" placeholder="Masukkan periode (ex : 1 atau 2" value="<?php echo $periode->nama ?>">
                    <?php echo form_error('nama') ?>
                  </div>
                  <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <input name="tahun" type="number" class="form-control <?php echo form_error('tahun') ? 'is-invalid':'' ?>" id="tahun" placeholder="Masukan tahun (contoh : 2022" value="<?php echo $periode->tahun ?>">
                    <?php echo form_error('tahun') ?>
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
   