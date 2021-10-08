@extends('layouts.dashboard')

@section('title', 'OPD')

@section('content')
<div class="row">
    <div class="col">
        @can('opd-create')
            <a href="{{ route('opd.create') }}" class="btn btn-sm btn-neutral mb-3">
                <i class="fa fa-plus"></i> Tambah OPD
            </a>
        @endcan

        @if ($message = session('success'))
            <div class="alert alert-success alert-dismissable fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                {{ $message }}
            </div>
        @endif

        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
                <h3 class="mb-0">Data OPD</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>Kode OPD</th>
                            <th>Nama Pejabat</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($opds as $opd)
                            <tr>
                                <td>{{ $opd->kode }}</td>
                                <td>{{ $opd->nama }}</td>
                                <td>
                                    @can('opd-update')
                                        <a href="{{ route('opd.edit', $opd->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    @endcan

                                    @can('opd-delete')
                                        <a href="javascript:;" class="btn btn-sm btn-danger"
                                            data-toggle="modal" onclick="deleteData({{ $opd->id }})" 
                                            data-target="#DeleteModal">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    @endcan

                                    <a href="{{ route('petugas.index') }}" title="Data Petugas OPD" class="btn btn-sm btn-info">
                                        <i class="fa fa-users"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer py-4">
            </div>
        </div>
    </div>
</div>

@include('shared.delete_confirmation.modal')
@endsection

@section('js')
@include('shared.delete_confirmation.script', ['routeName' => 'opd.destroy'])
@endsection
