@extends('layouts.landing')

@section('title', 'Sistem Retribusi Badan Keuangan dan Aset Daerah')

@section('content')
<div class="row">
    <div class="col-md-2">
        <center><img src="{{ asset('img/logo.png') }}" width="150px" height="140px" class="navbar-brand-img" alt="..."></center>
    </div>
    <div class="col-md-10">
        <div class="alert alert-primary" role="alert">
            <strong class="display-4">Selamat Datang, {{ config('app.name') }}.</strong><br/>
            <p class="display-5">Adalah aplikasi yang dapat digunakan untuk mengelola retribusi pemanfaatan aset pada Pemerintah Kota Malang. Aplikasi dapat diakses melalui PC(Personal Computer), Laptop, Tablet, HP/Smartphone.</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card ">
            <div class="card-body">
                <form class="form-inline">
                    <div class="form-group mb-2 mx-2">
                        <select name="year" class="form-control">
                            @foreach ($tahun as $item)
                                <option value="{{ $item->tahun }}"
                                {{ $item->tahun == $yearActive ? "selected=true" : '' }}>
                                    Tahun {{ $item->tahun }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-primary mb-2 mx-2"><i class="fa fa-search"></i></button>
                    <a href="{{ route('admin.dashboard.index') }}" class="btn btn-outline-danger mb-2"><i class="fa fa-reset"></i> Reset</a>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Total piutang</h5>
                        <span class="h2 font-weight-bold mb-0">{{ format_idr($nominalPiutang, true) }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                            <i class="ni ni-money-coins"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Total penerimaan (hari ini)</h5>
                        <span class="h2 font-weight-bold mb-0">{{ format_idr($totalNominalTbp, true) }}</span>
                    </div>
                <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Grafik Total Penerimaan</h4>

            </div>
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="grafik_penerimaan" style="height: 230px;"></div>
                    </div>
                {{-- <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                    </div>
                </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Grafik Total Piutang Retribusi</h4>

            </div>
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="grafik_piutang" style="height: 230px;"></div>
                    </div>
                {{-- <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                    </div>
                </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Grafik Total Penerimaan Per Kecamatan</h4>

            </div>
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="grafik_penerimaan_perkecamatan" style="height: 200px;"></div>
                    </div>
                {{-- <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                    </div>
                </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="grafik_piutang_perkecamatan" style="height: 200px;"></div>
                    </div>
                {{-- <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                    </div>
                </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@php
    echo $data2;
@endphp
<div class="row">
    @foreach ($totalKlasifikasi as $item)
    <div class="col-md-4">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">{{ $item->jenis_klasifikasi }}</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $item->total_klasifikasi_count }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                            <i class="ni ni-chart-bar-32"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
@section('js')
<script>
            const grafik3 = {!!$penerimaanPerKecataman!!};
            const grafik4 = {!!$piutangPerKecamatan!!};
            Morris.Bar({
                element: 'grafik_penerimaan_perkecamatan',
                data: //[
                    grafik3
                    // { year: '2008', value: 1500 , a: 2000, b: 1000, c: 500 },
                    // { year: '2009', value: 1000, a: 2000, b: 1500, c: 1500},
                    // { year: '2010', value: 2000, a: 1500, b: 1000, c: 2500 },
                    // { year: '2011', value: 1500, a: 2500, b: 1500, c: 1500 },
                    // { year: '2012', value: 2000, a: 1000, b: 2000, c: 500 },
                    // { year: '2013', value: 2500, a: 1500, b: 500, c: 1500 },
                    // { year: '2014', value: 1000, a: 2000, b: 2500, c: 1500 },
                    // { year: '2015', value: 0, a: 2500, b: 1000 },
                    // { year: '2016', value: 1000, a: 2000, b: 1500 }
                //], //supply the response data (which is now a JS variable) directly, no extra brackets
                xkey: 'year',
                ykeys: ['value','a','b', 'c'],
                //   ymax: 'auto[30]',
                //   ymin: 'auto',
                //   xLabels: 'year',
                labels: ['Kecamatan A','Kecamatan B', 'Kecamatan C','Kecamatan D'],
                hideHover: 'auto',
                // axes: true;
                //   grid :  false,
                redraw: true,
                resize: true,
                pointStrokeColors: ['black'],
                pointFillColors:['#ffffff'],
                fillOpacity: 0.6,
                barWidth: '10px',
                // stacked:true,
                parseTime: true,
                behaveLikeLine : true,
                //   fillOpacity : '0.5',
                lineColors: ['Blue', 'Red', 'Gray'],
            });
            Morris.Line({
                element: 'grafik_piutang_perkecamatan',
                data: [
                    { year: '2008', value: 1500 , a: 2000, b: 1000, c: 500 },
                    { year: '2009', value: 1000, a: 2000, b: 1500, c: 1500},
                    { year: '2010', value: 2000, a: 1500, b: 1000, c: 2500 },
                    { year: '2011', value: 1500, a: 2500, b: 1500, c: 1500 },
                    { year: '2012', value: 2000, a: 1000, b: 2000, c: 500 },
                    { year: '2013', value: 2500, a: 1500, b: 500, c: 1500 },
                    { year: '2014', value: 1000, a: 2000, b: 2500, c: 1500 },
                    { year: '2015', value: 0, a: 2500, b: 1000 },
                    { year: '2016', value: 1000, a: 2000, b: 1500 }
                ], //supply the response data (which is now a JS variable) directly, no extra brackets
                xkey: 'year',
                ykeys: ['value','a','b','c'],
                //   ymax: 'auto[30]',
                //   ymin: 'auto',
                //   xLabels: 'year',
                labels: ['Kecamatan A','Kecamatan B', 'Kecamatan C','Kecamatan D'],
                hideHover: 'auto',
                // axes: true;
                //   grid :  false,
                redraw: true,
                resize: true,
                pointStrokeColors: ['black'],
                pointFillColors:['#ffffff'],
                // fillOpacity: 0.6,
                // barWidth: '10px',
                // stacked:true,
                parseTime: true,
                behaveLikeLine : true,
                //   fillOpacity : '0.5',
                lineColors: ['Blue', 'Red', 'Gray'],
            });
            Morris.Area({
                    element: 'grafik_piutang',
                    data: [
                        <?=$data2;?>
                    ], //supply the response data (which is now a JS variable) directly, no extra brackets
                    xkey: 'year',
                    ykeys: ['value'],
                    labels: ['Nominal Piutang'],
                    hideHover: 'auto',
                // axes: true;
                //   grid :  false,
                    resize: true,
                    pointStrokeColors: ['black'],
                    pointFillColors:['#ffffff'],
                    fillOpacity: 0.6,
                    lineWidth: '6px',
                    stacked:true,
                    parseTime: true,
                    behaveLikeLine : true,
                    lineColors: ['Blue', 'Pink'],
                });
            Morris.Area({
                element: 'grafik_penerimaan',
                data: [
                    <?= $data1;?>
                ], //supply the response data (which is now a JS variable) directly, no extra brackets
                xkey: 'year',
                ykeys: ['value'],
                //   ymax: 'auto[30]',
                //   ymin: 'auto',
                //   xLabels: 'year',
                labels: ['Nominal penjualan'],

                hideHover: 'auto',
                // axes: true;
                //   grid :  false,
                resize: true,
                pointStrokeColors: ['black'],
                pointFillColors:['#ffffff'],
                fillOpacity: 0.6,
                lineWidth: '6px',
                stacked:true,
                parseTime: true,
                behaveLikeLine : true,
                
                //   fillOpacity : '0.5',
                lineColors: ['Red', 'Pink'],
            });

            //

</script>
@endsection
