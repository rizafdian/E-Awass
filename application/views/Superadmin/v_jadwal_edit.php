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
                <h3 class="card-title"><a href="<?php echo site_url('Superadmin/jadwal/') ?>"><i class="fas fa-arrow-left"></i> Back</a></h3>
              </div>
              <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $this->session->flashdata('success'); ?>
                </div>
              <?php endif; ?>

              <form action="" method="post" enctype="multipart/form-data">
                
                <div class="card-body">

                   <input type="hidden" class="form-control" name="id" value="<?= $jadwal->id_jadwal ?>" required>

                  <div class="form-group">
                    <label for="jenis">Jenis Pengawasan</label>
                    <select name="jenis" class="form-control" required>
                      <option value="">--Pilih--</option>
                      <option value="1" <?= $jadwal->jenis == 1 ? 'selected' : null ?>>Pengawasan Bidang</option>
                      <option value="2" <?= $jadwal->jenis == 2 ? 'selected' : null ?>>Pengawasan Daerah</option>
                    </select>
                    <?php echo form_error('id_pengadilan') ?>
                  </div>

                  <div class="form-group">
                    <label for="jenis">Periode</label>
                    <select name="id_periode" class="form-control" required>
                        <option value="">--Pilih--</option>
                          <?php foreach ($periode as $periodes): ?>
                            <option value="<?= $periodes->id_periode ?>" <?= $periodes->id_periode == $jadwal->id_periode ? 'selected' : null ?>>Periode <?=$periodes->nama ?>  <?=$periodes->tahun ?></option>
                          <?php endforeach ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="id_pengadilan">Pengadilan</label>
                      <select name="id_pengadilan" class="form-control" required>
                        <option value="">--Pilih--</option>
                        <option value="7" <?= $jadwal->id_pengadilan == 7 ? 'selected' : null ?>>PTA Manado</option>
                        <option value="1" <?= $jadwal->id_pengadilan == 1 ? 'selected' : null ?>>PA Manado</option>
                        <option value="2" <?= $jadwal->id_pengadilan == 2 ? 'selected' : null ?>>PA Kotamobagu</option>
                        <option value="3" <?= $jadwal->id_pengadilan == 3 ? 'selected' : null ?>>PA Tahuna</option>
                        <option value="4" <?= $jadwal->id_pengadilan == 4 ? 'selected' : null ?>>PA Tondano</option>
                        <option value="5" <?= $jadwal->id_pengadilan == 5 ? 'selected' : null ?>>PA Bitung</option>
                        <option value="6" <?= $jadwal->id_pengadilan == 6 ? 'selected' : null ?>>PA Amurang</option>
                        <option value="6" <?= $jadwal->id_pengadilan == 9 ? 'selected' : null ?>>PA Boroko</option>
                        <option value="6" <?= $jadwal->id_pengadilan == 10 ? 'selected' : null ?>>PA Tutuyan</option>
                        <option value="6" <?= $jadwal->id_pengadilan == 11 ? 'selected' : null ?>>PA Bolaang Uki</option>
                        <option value="6" <?= $jadwal->id_pengadilan == 12 ? 'selected' : null ?>>PA Lolak</option>
                      </select>
                    <?php echo form_error('id_pengadilan') ?>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Nomor SK</label>
                      <input type="text" name="no_sk" class="form-control <?php echo form_error('no_sk') ? 'is-invalid':'' ?>" id="no_sk" placeholder="Masukan nomor SK" id="no_sk" value="<?php echo $jadwal->no_sk ?>">
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
                      <input type="text" name="no_st" class="form-control <?php echo form_error('no_st') ? 'is-invalid':'' ?>" id="no_st"  placeholder="Masukan nomor ST" id="no_st" value="<?php echo $jadwal->no_st ?>">
                      <?php echo form_error('no_st') ?>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Upload ST</label>
                      <input type="file" accept=".pdf" class="form-control" id="uploadsk" name="file2">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="tgl_mulai">Tanggal Mulai</label>
                    <input name="tgl_mulai" type="date" class="form-control <?php echo form_error('tgl_mulai') ? 'is-invalid':'' ?>" id="tgl_mulai" value="<?php echo $jadwal->tgl_mulai ?>" >
                    <?php echo form_error('tgl_mulai') ?>
                  </div>
                  
                  <div class="form-group">
                    <label for="tgl_selesai">Tanggal Selesai</label>
                    <input name="tgl_selesai" type="date" class="form-control <?php echo form_error('tgl_selesai') ? 'is-invalid':'' ?>" id="tgl_selesai" value="<?php echo $jadwal->tgl_selesai ?>">
                    <?php echo form_error('tgl_selesai') ?>
                  </div>

                  <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" required>
                      <option value="">--Pilih--</option>
                      <option value="Belum" <?= $jadwal->status == 'Belum' ? 'selected' : null ?>>Belum</option>
                      <option value="Sudah" <?= $jadwal->status == 'Sudah' ? 'selected' : null ?>>Sudah</option>
                    </select>
                    <?php echo form_error('status') ?>
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
   