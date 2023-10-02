    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tim Pengawasan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item">Tim</li>
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
                <h3 class="card-title"><a href="<?php echo site_url('Superadmin/tim/') ?>"><i class="fas fa-arrow-left"></i> Back</a></h3>
              </div>
              <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $this->session->flashdata('success'); ?>
                </div>
              <?php endif; ?>

              <form action="<?php echo site_url('Superadmin/tim/add') ?>" method="post" enctype="multipart/form-data">
                
                <div class="card-body">
                  
                  <div class="form-group">
                      <label for="id_jadwal">Jadwal Pengawasan</label>
                        <select name="id_jadwal" class="form-control" required>
                          <option value="">--Pilih Jadwal Pengawasan--</option>
                            <?php foreach ($jadwal as $jadwals): ?>
                              <option value="<?= $jadwals->id_jadwal ?>"><?= $jadwals->pengadilan.' '.$jadwals->tgl_mulai.' s.d '.$jadwals->tgl_selesai ?> </option>
                            <?php endforeach ?>
                        </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input name="nama" type="text" class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" id="nama" placeholder="Masukan nama lengkap beserta gelar">
                    <?php echo form_error('nama') ?>
                  </div>

                  <div class="form-group">
                    <label for="role">Tugas</label>
                    <input name="role" type="text" class="form-control <?php echo form_error('role') ? 'is-invalid':'' ?>" id="role" placeholder="(Ketua/Anggota)">
                    <?php echo form_error('role') ?>
                  </div>

                  <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input name="jabatan" type="text" class="form-control <?php echo form_error('jabatan') ? 'is-invalid':'' ?>" id="jabatan" placeholder="Masukan Jabatan sesuai SIKEP">
                    <?php echo form_error('jabatan') ?>
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
   