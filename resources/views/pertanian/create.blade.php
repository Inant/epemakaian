@extends('layouts.dashboard')

@section('title', 'Tambah Lahan Pertanian')

@section('content')
<div class="row">
    <div class="col">
        <a href="{{ route('pertanian.index') }}" class="btn btn-sm btn-neutral mb-3">
            <i class="fa fa-chevron-left"></i> Daftar Lahan Pertanian
        </a>
        
        @include('shared.alert')

        <div class="card pb-4">
            <!-- Card header -->
            <div class="card-header border-0">
                <h3 class="mb-0">Tambah Lahan Pertanian</h3>
            </div>

            <form action="{{ route('pertanian.store') }}" method="POST">
                @csrf

                <div class="pl-lg-4 pr-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">No Perjanjian Sewa</label>
                        <input type="text" class="form-control" name="no_perjanjian_sewa" value="{{ old('no_perjanjian_sewa') }}" autocomplete="off"/>
                    </div>
                </div>

                <div class="pl-lg-4 pr-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Nama Penyewa</label>
                        <input type="text" class="form-control" name="nama_penyewa" value="{{ old('nama_penyewa') }}" autocomplete="off"/>
                    </div>
                </div>

                <div class="pl-lg-4 pr-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Lokasi Sewa</label>
                        <input type="text" class="form-control" name="lokasi" value="{{ old('lokasi') }}" autocomplete="off"/>
                    </div>
                </div>
                
                <div class="pl-lg-4 pr-lg-4">
                    <div class="form-group">
                        {{-- TODO: input number only --}}
                        <label class="form-control-label">Nominal Bayar</label>
                        <input type="text" class="form-control numeric" name="nominal" value="{{ old('nominal') }}" autocomplete="off"/>
                    </div>
                </div>

                <div class="pl-lg-4 pr-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Tanggal Sewa</label>
                        <input type="date" class="form-control" name="tanggal_sewa" value="{{ old('tanggal_sewa') }}" autocomplete="off"/>
                    </div>
                </div>

                <div class="pl-lg-4 pr-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Status Pembayaran</label>
                        <select name="status" class="form-control">
                            <option value="" selected>Pilih salah satu</option>
                            <option value="paid">Sudah Bayar</option>
                            <option value="unpaid">Belum Bayar</option>
                        </select>  
                    </div>
                </div>

                <div class="pl-lg-4 pr-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Keterangan</label>
                        <textarea name="keterangan" rows="5" class="form-control" style="resize: none;">{{ old('keterangan') }}</textarea>
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

@section('scripts')
<script type="text/javascript">
    $(".numeric").keyup(function(event) {
        alert('test');
        return /\d/.test(String.fromCharCode(event.keyCode));
    });
</script>
@endsection
