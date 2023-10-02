\
<div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">EDIT TEMUAN</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('wasda') ?>">Home</a></li>
              <li class="breadcrumb-item">Detail</li>
              <li class="breadcrumb-item ">Periksa</li>
              <li class="breadcrumb-item active">Edit </li>
            </ol>

          </div>

          
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">          
          <div class="col-lg-12">
            <div class="card">  
              <div class="card-header">
                <span class="badge bg-info"> <?= $subobjek->nama_objek ?></span>
                <span class="badge bg-teal"> <?= $subobjek->nama?></span>
                <div class="card-tools">
                  <a type="button" class="btn-sm bg-info" href="<?php echo site_url('Wasda/Periksatemuan/subarea/'.$subobjek->id_subobjek.'/'.$jadwal->id_jadwal) ?>"><i class="fa fa-angle-left"></i>  Back</a>
                </div>
              </div>

             <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert -success" role="alert">
                  <?php echo $this->session->flashdata('success'); ?>
                  yeyeyeyeye
                </div>
              <?php endif; ?>

              <form action="" method="post" enctype="multipart/form-data">


                <input type="hidden" name="id_temuan" value="<?php  echo $temuan->id_temuan ?>">

                  <div class="card-body">
              
                   <div class="form-group row">
                      <label for="kondisi"  class="col-sm-2 col-form-label">Kondisi/Temuan</label>
                      <div class="col-sm-10">
                        <textarea rows='8' name="kondisi" type="textarea" class="form-control" id="kondisi" placeholder="Masukan temuan"><?php echo $temuan->kondisi; ?></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                       <label for="kriteria" class="col-sm-2 col-form-label">Kriteria</label>
                        <div class="col-sm-10">
                          <textarea rows='4' name="kriteria" type="textarea" class="form-control" id="kriteria" placeholder="Masukan kriteria"><?php echo $temuan->kriteria; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="sebab" class="col-sm-2 col-form-label">Sebab</label>
                      <div class="col-sm-10">
                        <textarea name="sebab" type="textarea" class="form-control" id="sebab" placeholder="Masukan sebab"><?php echo $temuan->sebab; ?></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="akibat" class="col-sm-2 col-form-label">Akibat</label>
                      <div class="col-sm-10">
                        <textarea name="akibat" type="textarea" class="form-control" id="akibat" placeholder="Masukan akibat"><?php echo $temuan->akibat; ?></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="rekomendasi" class="col-sm-2 col-form-label">Rekomendasi</label>
                      <div class="col-sm-10">
                       <textarea name="rekomendasi" type="textarea" class="form-control" id="rekomendasi" placeholder="Masukan rekomendasi"><?php echo $temuan->rekomendasi; ?></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="card-footer">
                    <button type="Simpan" class="btn btn-warning">Submit</button>
                  </div>
              </form>
            </div>     
          </div>
        </div>
       
      </div>
    </div>
 