@extends('layout.main')
@section('page-title', 'Data')
@section('page-subTitle', 'Data User')
@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.update', $data->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <!-- Name Field -->
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ old('name', $data->name) }}" required>
                                </div>

                                <!-- Email Field -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ old('email', $data->email) }}" required>
                                </div>

                                <!-- No HP (Phone Number) Field -->
                                <div class="form-group">
                                    <label for="no_hp">Nomor HP</label>
                                    <input type="text" name="no_hp" id="no_hp" class="form-control"
                                        value="{{ old('no_hp', $data->no_hp) }}">
                                </div>
                                <!-- Kota Field -->
                                <div class="form-group">
                                    <label for="no_hp">Kota</label>
                                    <input type="text" name="kota" id="kota" class="form-control"
                                        value="{{ old('kota', $data->kota) }}">
                                </div>
                                <!-- ID Jenis User Field -->
                                <div class="form-group">
                                    <label for="ID_jenis_user">Role</label>
                                    <select name="ID_jenis_user" id="ID_jenis_user" class="form-control" required>
                                        @foreach ($jenis_users as $jenis_user)
                                            <option value="{{ $jenis_user->ID_jenis_user }}"
                                                {{ $data->ID_jenis_user == $jenis_user->ID_jenis_user ? 'selected' : '' }}>
                                                {{ $jenis_user->jenis_user }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- <!-- Status User Field -->
                                <div class="form-group">
                                    <label for="status_user">Status User</label>
                                    <select name="status_user" id="status_user" class="form-control" required>
                                        <option value="active" {{ $data->status_user == 'active' ? 'selected' : '' }}>
                                            Active
                                        </option>
                                        <option value="inactive" {{ $data->status_user == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                </div> --}}

                            <!-- Submit Button -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
