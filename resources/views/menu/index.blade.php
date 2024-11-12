@extends('layout.main')
@section('page-title', 'Data')
@section('page-subTitle', 'Data Menu')
@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Menu</h4>
                    <p class="card-description">Masukkan Data Menu</p>
                    <form action="{{ route('menu.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Menu</label>
                            <input type="text" class="form-control" name="menu_name">
                        </div>
                        <div class="form-group">
                            <label for="">Link Menu</label>
                            <input type="text" class="form-control" name="menu_link">
                        </div>
                        <div class="form-group">
                            <label for="">Icon Menu</label>
                            <input type="text" class="form-control" name="menu_icon">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Menu</h4>
                    <div class="table-responsive">
                        <table class="table" id="menuTable">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Link</th>
                                    <th>Icon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menu as $item)
                                    <tr>
                                        <td>{{ $item->menu_name }}</td>
                                        <td>{{ $item->menu_link }}</td>
                                        <td>{{ $item->menu_icon }}</td>
                                        <td>
                                            <a href="{{ route('menu.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('menu.delete', $item->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                <button class="btn btn-sm btn-danger delete-btn"
                                                    data-id="{{ $item->id }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
            $('#menuTable').DataTable({
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


    <script>
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function () {
                let userId = this.getAttribute('data-id');
                let url = "{{ route('menu.delete', ':id') }}";
                url = url.replace(':id', userId);
    
                if (confirm('Apakah Anda yakin ingin menghapus pengguna ini?')) {
                    fetch(url, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload();
                        }
                    })
                    .catch(error => console.error('Error:', error));
                }
            });
        });
    </script>

@endsection
