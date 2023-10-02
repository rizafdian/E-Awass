    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sub-Area Pengawasan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Subarea</li>
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
                <h3 class="card-title"><a href="<?php echo site_url('Superadmin/subarea/') ?>"><i class="fas fa-arrow-left"></i> Back</a></h3>
              </div>
              <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $this->session->flashdata('success'); ?>
                </div>
              <?php endif; ?>

              <form action="<?php echo site_url('Superadmin/subarea/add') ?>" method="post" enctype="multipart/form-data">
                
                <div class="card-body">
                  
                  <div class="form-group">
                      <label for="">Area</label>
                        <select name="id_objek" class="form-control" required>
                          <option value="">--Pilih Area Pengawasan--</option>
                            <?php foreach ($area as $areas): ?>
                              <option value="<?= $areas->id ?>"><?= $areas->nama ?></option>
                            <?php endforeach ?>
                        </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="nama">Nama Sub-Area</label>
                    <input name="nama" type="text" class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" id="nama" placeholder="Masukan nama sub-area">
                    <?php echo form_error('nama') ?>
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
   