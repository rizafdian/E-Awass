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
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           
            <div class="card">
              <div class="card-header">
                <a href="<?php echo site_url('Superadmin/Subarea/add') ?>"><i class="fas fa-plus"></i> Tambah</a>
              </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nama Area</th>
                    <th>Sub-Area</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                   <?php foreach ($subarea as $subareas): ?>
                  <tr>
                    <td><?=$no++ ?></td>
                    <td><?=$subareas->nama ?></td>
                    <td><?=$subareas->nama_subobjek ?></td>
                    </td>
                    <td><a href="<?php echo site_url('Superadmin/subarea/edit/'.$subareas->id_subobjek) ?>"><span class="badge bg-warning"><i class="fas fa-edit"></i> Edit</span> </a>
                        <a onclick="deleteConfirm('<?php echo site_url('Superadmin/subarea/delete/'.$subareas->id_subobjek) ?>')"
                       href="#!"><span class="badge bg-danger"><i class="fas fa-trash"></i>  Hapus</span></a>
                  </tr>
                  <?php endforeach; ?>        
                </tbody>
              </table>
            </div>
          </div>
              <!-- /.card -->
          </div>
            <!-- /.col -->
        </div>
          <!-- /.row -->
      </div>
        <!-- /.container-fluid -->
  </section>

  <!-- Logout Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>
   