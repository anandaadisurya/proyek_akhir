
<?php $__env->startSection('title', 'Daftar Produk'); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>DAFTAR PRODUK</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Daftar Produk</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">


            <div class="card">
              <div class="card-header">
                <!-- Button Tambah -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
                  <i class="fas fa-file"></i> Tambah Data
                </button>
                <!-- End Button Tambah -->
                <!-- Modal Tambah -->
                <form method="POST" action="<?php echo e(route('produk_tambah')); ?>" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>

                  <div class="modal fade" id="modalTambah">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Tambah Produk Baru</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="nama">Nama Produk</label>
                            <input type="text" class="form-control rounded-0 <?php $__errorArgs = ['nama_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nama_produk" name="nama_produk" value="" placeholder="isi nama kamu dong..">
                          </div>
                          <div class="form-group">
                            <label for="nama">Harga</label>
                            <input type="text" class="form-control rounded-0 <?php $__errorArgs = ['harga'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="harga" name="harga" value="" placeholder="jangan lupa harga...">
                          </div>
                          <div class="form-group">
                            <label for="nama">Status</label>
                            <input type="text" class="form-control rounded-0 <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="status" name="status" value="" placeholder="status....">
                          </div>
                          <div class="form-group">
                            <label for="nama">Gambar</label>
                            <input type="file" class="form-control-file rounded-0 <?php $__errorArgs = ['gambar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="gambar" name="gambar" value="" placeholder="gambar...">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Simpan Data</button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                </form>
                <!-- Modal Tambah End -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Nama Produk</th>
                      <th>Harga</th>
                      <th>Status</th>
                      <th>Gambar</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td class="text-center"><?php echo e($loop->iteration); ?></td>
                      <td><?php echo e($item->nama_produk); ?></td>
                      <td><?php echo e($item->harga); ?></td>
                      <td><?php echo e($item->status); ?></td>
                      <td>
                        <?php if($item->gambar): ?>
                        <img src="<?php echo e(asset('public/assets/gambar/' . $item->gambar)); ?>" alt="Gambar" width="200">
                        <?php else: ?>
                        Tidak Ada Gambar
                        <?php endif; ?>
                      </td>
                      <td>
                        <div class="text-center">
                          <!-- Button -->
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit-<?php echo e($item->id); ?>">
                            <i class="fas fa-edit"></i>
                          </button>
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus-<?php echo e($item->id); ?>">
                            <i class="fas fa-times"></i>
                          </button>
                        </div>
                        <!-- Modal Hapus -->
                        <form method="POST" action="<?php echo e(route('produk_hapus', ['id' => $item->id])); ?>" enctype="multipart/form-data">
                          <?php echo e(csrf_field()); ?>

                          <?php echo method_field('delete'); ?>
                          <div class="modal fade" id="modalHapus-<?php echo e($item->id); ?>">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Hapus Data : <?php echo e($item->nama_produk); ?></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>Anda yakin akan menghapus data : <?php echo e($item->nama_produk); ?></p>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-danger">Hapus Data</button>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                          <!-- /.modal -->
                        </form>
                        <!-- Modal Hapus End -->
                        <!-- Modal Edit -->
                        <form method="POST" action="<?php echo e(route('produk_update', ['id' => $item->id])); ?>" enctype="multipart/form-data">
                          <?php echo e(csrf_field()); ?>

                          <div class="modal fade" id="modalEdit-<?php echo e($item->id); ?>">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Edit Data : <?php echo e($item->nama_produk); ?></h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label for="nama_produk">Nama Produk</label>
                                    <input type="text" class="form-control rounded-0 <?php $__errorArgs = ['nama_produk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nama_produk" name="nama_produk" value=" <?php echo e($item->nama_produk); ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="nama">Harga</label>
                                    <input type="text" class="form-control rounded-0 <?php $__errorArgs = ['harga'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="harga" name="harga" value=" <?php echo e($item->harga); ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="nama">Status</label>
                                    <input type="text" class="form-control rounded-0 <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="status" name="status" value=" <?php echo e($item->status); ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <?php if($item->gambar): ?>
                                    <img src="<?php echo e(asset('public/assets/gambar/' . $item->gambar)); ?>" alt="Current Image" width="200">
                                    <?php else: ?>
                                    <p>No image available</p>
                                    <?php endif; ?>
                                    <input type="file" class="form-control-file" id="gambar" name="gambar">
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-warning">Update Data</button>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </form>
                        <!-- Modal Edit End -->

                      </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                  <tfoot>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Nama Produk</th>
                      <th>Harga</th>
                      <th>Status</th>
                      <th>Gambar</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                </table>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </div>
    <!-- /.container-fluid -->

  </section>
</div>


<!-- /.content -->
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<!-- DataTables  & Plugins -->
<script src="<?php echo e(asset('assets/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/jszip/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/pdfmake/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/pdfmake/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')); ?>"></script>
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard/master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ACER NITRO 5\Downloads\Compressed\laravel-9-simple-templates-main\laravel-9-simple-templates-main\resources\views/dashboard/produk.blade.php ENDPATH**/ ?>