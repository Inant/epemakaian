@extends('layouts.dashboard')

@section('title', 'Buat User')

@section('content')
<div class="row">
    <div class="col">
        <a href="{{ route('users.index') }}" class="btn btn-sm btn-neutral mb-3">
            <i class="fa fa-chevron-left"></i> Daftar User
        </a>

        {{-- flash message --}}
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissable fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif

        <div class="card pb-4">
            <!-- Card header -->
            <div class="card-header border-0">
                <h3 class="mb-0">Buat User</h3>
            </div>

            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="pl-lg-4 pr-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Nama</label>
                        <input type="text" class="form-control" name="nama"
                            value="{{ old('nama') }}">
                    </div>
                </div>
                <div class="pl-lg-4 pr-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Username</label>
                        <input type="text" class="form-control" name="username"
                            value="{{ old('username') }}">
                    </div>
                </div>
                <div class="pl-lg-4 pr-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Email</label>
                        <input type="text" class="form-control" name="email"
                            value="{{ old('email') }}">
                    </div>
                </div>
                <div class="pl-lg-4 pr-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Hak Akses</label>
                        <select name="hak_akses" class="form-control">
                            <option value="" selected disabled>-- Pilih --</option>
                            <option value="petugas">Petugas</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="pl-lg-4 pr-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Password</label>
                        <input type="password" class="form-control" name="password"
                            value="">
                    </div>
                </div>
                <div class="pl-lg-4 pr-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" name="password_confirmation"
                            value="">
                    </div>
                </div>

                <div class="text-right pr-lg-4">
                    <button type="submit" class="btn btn-primary">
                       <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection