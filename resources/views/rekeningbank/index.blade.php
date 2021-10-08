@extends('layouts.dashboard')

@section('title', 'Rekening Bank')

@section('content')
<div class="row">
    <div class="col">
        @can('rekening_bank-create')
            <a href="{{ route('rekening.create') }}" class="btn btn-sm btn-neutral mb-3">
                <i class="fa fa-plus"></i> Tambah Data
            </a>
        @endcan

        @include('shared.alert')

        <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
                <h3 class="mb-0">Data Rekening Bank</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Bank</th>
                            <th>No Rekening</th>
                            <th>Rekening Bendahara</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bank as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_bank }}</td>
                                <td>{{ $item->no_rekening }}</td>
                                <td>
                                    {{ $item->akunBendahara->kode }} {{ $item->akunBendahara->nama }}
                                </td>
                                <td>
                                    @can('rekening_bank-update')
                                        <a href="{{ route('rekening.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    @endcan

                                    @can('rekening_bank-delete')
                                        <a href="javascript:;" class="btn btn-sm btn-danger"
                                            data-toggle="modal" onclick="deleteData({{ $item->id }})" 
                                            data-target="#DeleteModal">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    @endcan
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
@include('shared.delete_confirmation.script', ['routeName' => 'rekening.destroy'])
@endsection
