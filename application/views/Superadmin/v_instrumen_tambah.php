    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Instrumen Pengawasan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Instrumen</li>
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
                <h3 class="card-title"><a href="<?php echo site_url('Superadmin/instrumen/') ?>"><i class="fas fa-arrow-left"></i> Back</a></h3>
              </div>
              <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $this->session->flashdata('success'); ?>
                </div>
              <?php endif; ?>

              <form action="<?php echo site_url('Superadmin/instrumen/add') ?>" method="post" enctype="multipart/form-data">
                
                <div class="card-body">
                  
                  <div class="form-group">
                      <label for="id_subobjek">Sub-Area</label>
                        <select name="id_subobjek" class="form-control" required>
                          <option value="">--Pilih Sub-Area Pengawasan--</option>
                            <?php foreach ($subarea as $subareas): ?>
                              <option value="<?= $subareas->id_subobjek ?>"><?= $subareas->nama?> </option>
                            <?php endforeach ?>
                        </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="pertanyaan">Pertanyaan</label>
                    <input name="pertanyaan" type="text" class="form-control <?php echo form_error('pertanyaan') ? 'is-invalid':'' ?>" id="pertanyaan" placeholder="Masukan pertanyaan">
                    <?php echo form_error('pertanyaan') ?>
                  </div>

                  <div class="form-group">
                    <label for="subjek">Penanggung Jawab</label>
                    <input name="subjek" type="text" class="form-control <?php echo form_error('subjek') ? 'is-invalid':'' ?>" id="role" placeholder="Penanggung Jawab dari pertanyaan">
                    <?php echo form_error('subjek') ?>
                  </div>

                  <div class="form-group">
                    <label for="dokumen">Dokumen yang diperiksa</label>
                    <input name="dokumen" type="text" class="form-control <?php echo form_error('dokumen') ? 'is-invalid':'' ?>" id="jabatan" placeholder="Dokumen yang diperiksa">
                    <?php echo form_error('dokumen') ?>
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
   