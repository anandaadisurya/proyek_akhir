@extends('dashboard/master')
@section('title', 'Daftar Produk')
@section('content')
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
                <form method="POST" action="{{ route('produk_tambah') }}" enctype="multipart/form-data">
                  {{ csrf_field() }}
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
                            <input type="text" class="form-control rounded-0 @error('nama_produk') is-invalid @enderror" id="nama_produk" name="nama_produk" value="" placeholder="isi nama produk" required>
                          </div>
                          <div class="form-group">
                            <label for="nama">Harga Per Jam</label>
                            <input type="text" class="form-control rounded-0 @error('harga') is-invalid @enderror" id="harga" name="harga" value="" placeholder="isi daftar harga" required>
                          </div>
                          <div class="form-group">
                            <label for="nama">Status</label>
                            <input type="text" class="form-control rounded-0 @error('status') is-invalid @enderror" id="status" name="status" value="" placeholder="status" required>
                          </div>
                          <div class="form-group">
                            <label for="nama">Gambar</label>
                            <input type="file" class="form-control-file rounded-0 @error('gambar') is-invalid @enderror" id="gambar" name="gambar" value="" placeholder="gambar produk" required>
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
                      <th>Harga Per Jam</th>
                      <th>Status</th>
                      <th>Gambar</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($produk as $item)
                    <tr>
                      <td class="text-center">{{ $loop->iteration }}</td>
                      <td>{{ $item->nama_produk }}</td>
                      <td>{{ $item->harga }}</td>
                      <td>{{ $item->status }}</td>
                      <td>
                        @if ($item->gambar)
                        <img src="{{ asset('public/assets/gambar/' . $item->gambar) }}" alt="Gambar" width="200">
                        @else
                        Tidak Ada Gambar
                        @endif
                      </td>
                      <td>
                        <div class="text-center">
                          <!-- Button -->
                          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit-{{ $item->id }}">
                            <i class="fas fa-edit"></i>
                          </button>
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus-{{ $item->id }}">
                            <i class="fas fa-times"></i>
                          </button>
                        </div>
                        <!-- Modal Hapus -->
                        <form method="POST" action="{{ route('produk_hapus', ['id' => $item->id]) }}" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          @method('delete')
                          <div class="modal fade" id="modalHapus-{{ $item->id }}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Hapus Data : {{ $item->nama_produk }}</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>Anda yakin akan menghapus data : {{ $item->nama_produk }}</p>
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
                        <form method="POST" action="{{ route('produk_update', ['id' => $item->id]) }}" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          <div class="modal fade" id="modalEdit-{{ $item->id }}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Edit Data : {{ $item->nama_produk }}</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label for="nama_produk">Nama Produk</label>
                                    <input type="text" class="form-control rounded-0 @error('nama_produk') is-invalid @enderror" id="nama_produk" name="nama_produk" value=" {{ $item->nama_produk}}" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="nama">Harga Per Jam</label>
                                    <input type="text" class="form-control rounded-0 @error('harga') is-invalid @enderror" id="harga" name="harga" value=" {{ $item->harga }}" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="nama">Status</label>
                                    <input type="text" class="form-control rounded-0 @error('status') is-invalid @enderror" id="status" name="status" value=" {{ $item->status }}" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="gambar">Gambar Produk</label>
                                    <br>
                                    @if ($item->gambar)
                                    <img src="{{ asset('public/assets/gambar/' . $item->gambar) }}" alt="Current Image" width="200">
                                    @else
                                    <p>No image available</p>
                                    @endif
                                    <input type="file" class="form-control-file" id="gambar" name="gambar" >
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
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Nama Produk</th>
                      <th>Harga Per Jam</th>
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