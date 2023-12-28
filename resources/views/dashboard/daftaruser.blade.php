@extends('dashboard/master')
@section('title', 'CRUD Simple')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Data Admin</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Daftar Data Admin</li>
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
                <form method="POST" action="{{ route('user_tambah') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="modal fade" id="modalTambah">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Tambah Data Baru</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control rounded-0 @error('name') is-invalid @enderror" id="name" name="name" value="" placeholder="isi nama admin" required>
                          </div>
                          <div class="form-group">
                            <label for="nama">Email</label>
                            <input type="email" class="form-control rounded-0 @error('email') is-invalid @enderror" id="email" name="email" value="" placeholder="isi email admin" required>
                          <div class="form-group">
                            <label for="nama">Password</label>
                            <input type="text" class="form-control rounded-0 @error('password') is-invalid @enderror" id="password" name="password" value="" placeholder="isi pasword admin" required>
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
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $item)
                    <tr>
                      <td class="text-center">{{ $loop->iteration }}</td>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->email }}</td>
                      <td>{{ $item->password }}</td>
                      <td>
                        <div class="text-center">
                          <!-- Button -->
                          <!-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit-{{ $item->id }}">
                            <i class="fas fa-edit"></i>
                          </button> -->
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus-{{ $item->id }}">
                            <i class="fas fa-trash"></i>
                          </button>
                        </div>
                        <!-- Modal Hapus -->
                        <form method="POST" action="{{ route('user_hapus', ['id' => $item->id]) }}" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          @method('delete')
                          <div class="modal fade" id="modalHapus-{{ $item->id }}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Hapus Data : {{ $item->name }}</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>Anda yakin akan menghapus data : {{ $item->name }}</p>
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
                        <form method="POST" action="/dashboard/crud/{{ $item->id }}/update" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          <div class="modal fade" id="modalEdit-{{ $item->id }}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Edit Data : {{ $item->nama }}</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control rounded-0 @error('nama') is-invalid @enderror" id="nama" name="nama" value=" {{ $item->nama }}">
                                  </div>
                                  <div class="form-group">
                                    <label for="nama">Email</label>
                                    <input type="email" class="form-control rounded-0 @error('email') is-invalid @enderror" id="email" name="email" value=" {{ $item->email }}">
                                  </div>
                                  <div class="form-group">
                                    <label for="nama">telepon</label>
                                    <input type="tel" class="form-control rounded-0 @error('telepon') is-invalid @enderror" id="telepon" name="telepon" value=" {{ $item->password }}">
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
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Aksi</th>
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
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('js')
<!-- DataTables  & Plugins -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
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
@endsection