    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jadwal Pengawasan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Jadwal</li>
              <li class="breadcrumb-item ">Tambah</li>
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
                <h3 class="card-title"><a href="<?php echo site_url('Superadmin/jadwal/') ?>"><i class="fas fa-arrow-left"></i> Back</a></h3>
              </div>
              <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $this->session->flashdata('success'); ?>
                </div>
              <?php endif; ?>

              <form action="<?php echo site_url('Superadmin/jadwal/add') ?>" method="post" enctype="multipart/form-data">
                
                <div class="card-body">

                  <div class="form-group">
                    <label for="jenis">Jenis Pengawasan</label>
                    <select name="jenis" class="form-control" required>
                      <option value="">--Pilih--</option>
                      <option value="1">Pengawasan Bidang</option>
                      <option value="2">Pengawasan Daerah</option>
                    </select>
                    <?php echo form_error('id_pengadilan') ?>
                  </div>

                  <div class="form-group">
                    <label for="jenis">Periode</label>
                    <select name="id_periode" class="form-control" required>
                        <option value="">--Pilih--</option>
                          <?php foreach ($periode as $periodes): ?>
                            <option value="<?= $periodes->id_periode ?>">Periode <?=$periodes->nama ?>  <?=$periodes->tahun ?></option>
                          <?php endforeach ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="id_pengadilan">Pengadilan</label>
                      <select name="id_pengadilan" class="form-control" required>
                        <option value="">--Pilih--</option>
                        <option value="7">PTA Gorontalo</option>
                        <option value="1">PA Gorontalo</option>
                        <option value="2">PA Limboto</option>
                        <option value="3">PA Tilamuta</option>
                        <option value="4">PA Marisa</option>
                        <option value="5">PA Suwawa</option>
                        <option value="6">PA Kwandang</option>
                      </select>
                    <?php echo form_error('id_pengadilan') ?>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Nomor SK</label>
                      <input type="text" name="no_sk" class="form-control <?php echo form_error('no_sk') ? 'is-invalid':'' ?>" id="no_sk" placeholder="Masukan nomor SK" id="no_sk"  placeholder="Masukan nomor SK">
                      <?php echo form_error('no_sk') ?>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Upload SK</label>
                      <input type="file" accept=".pdf" class="form-control" id="uploadsk" name="file1">
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Nomor ST</label>
                      <input type="text" name="no_st" class="form-control <?php echo form_error('no_st') ? 'is-invalid':'' ?>" id="no_st"  placeholder="Masukan nomor ST" id="no_st">
                      <?php echo form_error('no_st') ?>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Upload ST</label>
                      <input type="file" accept=".pdf" class="form-control" id="uploadsk" name="file2">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="tgl_mulai">Tanggal Mulai</label>
                    <input name="tgl_mulai" type="date" class="form-control <?php echo form_error('tgl_mulai') ? 'is-invalid':'' ?>" id="tgl_mulai">
                    <?php echo form_error('tgl_mulai') ?>
                  </div>
                  
                  <div class="form-group">
                    <label for="tgl_selesai">Tanggal Selesai</label>
                    <input name="tgl_selesai" type="date" class="form-control <?php echo form_error('tgl_selesai') ? 'is-invalid':'' ?>" id="tgl_selesai">
                    <?php echo form_error('tgl_selesai') ?>
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
   