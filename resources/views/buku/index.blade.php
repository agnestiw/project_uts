@extends('layout.main')
@section('page-title', 'Data')
@section('page-subTitle', 'Data Buku')
@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Buku</h4>
                    <p class="card-description">Masukkan Data Buku</p>
                    <form action="/buku/simpan" method="post" class="forms-sample">
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputKode1">Kode</label>
                          <input type="text" class="form-control" name="kode" id="exampleInputKode1"
                              placeholder="Kode Buku">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputBuku1">Nama Buku</label>
                            <input type="text" class="form-control" name="judul" id="exampleInputBuku1"
                                placeholder="Judul Buku">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPengarang1">Nama Pengarang</label>
                          <input type="text" class="form-control" name="pengarang" id="exampleInputPengarang1"
                              placeholder="Judul Pengarang">
                        </div>
                        <div class="form-group">
                          <label for="">Kategori Buku</label>
                          <select name="kategori_id" id="" class="form-select">
                              <option value="">Pilih Menu</option>
                              @foreach ($kategori as $item)
                                  <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                              @endforeach
                          </select>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Kategori</h4>
                    <div class="table-responsive">
                        <table class="table" id="bukuTable">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Judul</th>
                                    <th>Pengarang</th>
                                    <th>Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($buku as $item)
                                    <tr>
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ $item->pengarang }}</td>
                                        <td>{{ $item->kategori->nama_kategori }}</td>
                                        <td>
                                            <a href="{{ route('kategori.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('kategori.delete', $item->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                <button class="btn btn-sm btn-danger delete-btn"
                                                    data-id="{{ $item->id }}">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#bukuTable').DataTable({
                dom: '<"top"Bfli>rt<"bottom"ip><"clear">',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true, 
                info: true,
                autoWidth: false,
                responsive: true
            });
        });
    </script>


@endsection
