@extends('layout.main')
@section('page-title', 'Data')
@section('page-subTitle', 'Data User')
@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data User</h4>
                    <p class="card-description">Masukkan Data User</p>
                    <form action="/user/simpan" method="post" class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputUsername1">Name</label>
                            <input type="text" class="form-control" name="name" id="exampleInputUsername1"
                                placeholder="Nama Kamu">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                placeholder="xxx@gmail.com">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">No Hp</label>
                            <input type="text" class="form-control" name="no_hp" id="exampleInputUsername1"
                                placeholder="Ex. 0895400956565">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputUsername1">Kota</label>
                            <input type="text" class="form-control" name="kota" id="exampleInputUsername1"
                                placeholder="Ex. Surabaya">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                                placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectRole">Role</label>
                            <select class="form-select" style="color: black" name="ID_jenis_user" placeholder="role"
                                id="exampleSelectRole">
                                <option value="1" style="color: black">Admin</option>
                                <option value="2" style="color: black">Staff</option>
                                <option value="3" style="color: black">Pengguna</option>
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
                    <h4 class="card-title">Data User</h4>
                    <div class="table-responsive">
                        <table class="table" id="userTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>No HP</th>
                                    <th>Kota</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->no_hp }}</td>
                                        <td>{{ $item->kota }}</td>
                                        <td>{{ $item->jenisUser->jenis_user }}</td>
                                        {{-- <td>{{ $item->status_user }}</td> --}}
                                        <td>
                                            @if ($item->status_user == 'active')
                                                <span class="badge bg-success">Online</span>
                                            @endif
                                            @if ($item->status_user == 'inactive')
                                                <span class="badge bg-secondary">Offline</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('user.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('user.delete', $item->id) }}" method="POST"
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
            $('#userTable').DataTable({
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
            let url = "{{ route('user.delete', ':id') }}";
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
