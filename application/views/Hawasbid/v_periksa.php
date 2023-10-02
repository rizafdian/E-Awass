<div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Kertas Kerja Pengawasan</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('hawasbid') ?>">Home</a></li>
              <li class="breadcrumb-item">Detail</li>
              <li class="breadcrumb-item active">Periksa</li>
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
              <div class="card-header border-transparent">
                <h3 class="card-title">Area Pengawasan :<strong> <?=$area->nama ?></strong></h3>
                <div class="card-tools">
                  <a type="button" class="btn btn-dark btn-sm" href="<?php echo site_url('Hawasbid/pdf/pdfmake/'.$area->id.'/'.$jadwal->id_jadwal) ?>" target="_blank"><i class="fa fa-file-pdf"></i>  PDF</a>
                  <a type="button" class="btn btn-sm bg-info" href="<?php echo site_url('Hawasbid/Detail/index/'.$jadwal->id_jadwal) ?>">
                     <i class="fa fa-angle-left"></i>  Back</a>
                  </a>
                </div>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th width="350px">Sub-Area</th>
                      <th>Eviden</th>
                      <th>Jumlah Temuan</th>
                      <th>Periksa</th>
                    </tr>
                    </thead>
                    <tbody>
                     <?php $i = 0; foreach ($subarea as $subareas): ?>
                      <tr>
                        <td><a href="<?php echo site_url('Hawasbid/Periksatemuan/subarea/'.$subareas->id_subobjek.'/'.$jadwal->id_jadwal) ?>" target="_blank"><?=$subareas->nama ?></a></td>     
                        <td>
                            <?php if ($eviden[$i] == 1): ?>
                              <span class="badge badge-success"><i class="fa fa-check"></i></span>
                            <?php else: ?>
                              <span class="badge badge-danger"><i class="fa fa-minus"></i></span>
                            <?php endif; ?>
                        </td>
                        <td><span class="badge badge-secondary"><?= $temuan[$i++] ?></td>
                        <td>
                          <a href="<?php echo site_url('Hawasbid/Periksatemuan/subarea/'.$subareas->id_subobjek.'/'.$jadwal->id_jadwal) ?>" class="text-muted text-center">
                            <i class="fas fa-edit"></i>
                          </a>
                        </td>
                      </tr>
                     <?php endforeach; ?> 
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              </div>
              <!-- /.card-footer -->
            </div>       
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->