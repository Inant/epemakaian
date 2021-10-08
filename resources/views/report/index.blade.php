@extends('layouts.dashboard')

@section('title', 'Laporan')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <style>
    ul.timeline {
        list-style-type: none;
        position: relative;
    }
    ul.timeline:before {
        content: ' ';
        background: #d4d9df;
        display: inline-block;
        position: absolute;
        left: 29px;
        width: 2px;
        height: 100%;
        z-index: 400;
    }
    ul.timeline > li {
        margin: 20px 0;
        padding-left: 20px;
    }
    ul.timeline > li:before {
        content: ' ';
        background: white;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 3px solid #22c0e8;
        left: 20px;
        width: 20px;
        height: 20px;
        z-index: 400;
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col">

        @include('shared.alert')

        <div class="card">
            <!-- Card header -->
            {{-- <div class="card-header border-0">
                <h3 class="mb-0">Data TBP</h3>
            </div> --}}

            <div class="card-body">
                <h2>Hari ini: {{ Carbon\Carbon::now()->format('d/m/Y H:i') }}</h2>
                <ul class="timeline">
                    <li>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#harianObjekRetribusi">
                            <i class="fas fa-download"></i>&nbsp;
                            Laporan Harian Objek Retribusi
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#nominalJenisPembayaran">
                            <i class="fas fa-download"></i>&nbsp;
                            Laporan Harian Nominal Berdasarkan Jenis Pembayaran
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#wajibRetribusi">
                        {{-- <a href="{{ route('report.wr_kecamatan') }}"> --}}
                            <i class="fas fa-download"></i>&nbsp;
                            Laporan Wajib Retribusi Per Kecamatan
                        </a>
                    </li>
                    <li>
                        {{-- <a href="javascript:void(0)" data-toggle="modal" data-target="#wajibRetribusiInsidentil"> --}}
                        <a href="{{ route('report.wr_insidentil') }}">
                            <i class="fas fa-download"></i>&nbsp;
                            Laporan Wajib Retribusi Jenis Insidentil (Reklame)
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#pembayaranRetribusi">
                        <i class="fas fa-download"></i>&nbsp;
                            Laporan Pembayaran Retribusi Per Kecamatan
                        </a>
                    </li>
                    <li>
                        {{-- <a href="javascript:void(0)" data-toggle="modal" data-target="#piutangPertahun"> --}}
                        <a href="{{ route('report.piutang_pertahun') }}">
                            <i class="fas fa-download"></i>&nbsp;
                            Laporan Piutang Per Tahun
                        </a>
                    </li>
                    <li>
                        {{-- <a href="javascript:void(0)" data-toggle="modal" data-target="#piutangPerObjekKelurahan"> --}}
                        <a href="{{ route('report.piutang_perkelurahan') }}">
                            <i class="fas fa-download"></i>&nbsp;
                            Laporan Piutang Per Objek Kelurahan
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@include('report.modal.wr_kecamatan')
@include('report.modal.harian_objek_retribusi')
@include('report.modal.harian_nominal_jenis_pembayaran')
@include('report.modal.pembayaran_retribusi_kecamatan')
@endsection

@section('js')
<script type="text/javascript">
//
</script>
@endsection

