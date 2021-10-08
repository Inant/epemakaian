<html>
<head>
	<style>
		body { font-family: "Times New Roman", Times, serif; }
		.col-print-1 {width:8%;  float:left;}
		.col-print-2 {width:16%; float:left;}
		.col-print-3 {width:25%; float:left;}
		.col-print-4 {width:33%; float:left;}
		.col-print-5 {width:42%; float:left;}
		.col-print-6 {width:50%; float:left;}
		.col-print-7 {width:58%; float:left;}
		.col-print-8 {width:66%; float:left;}
		.col-print-9 {width:75%; float:left;}
		.col-print-10{width:83%; float:left;}
		.col-print-11{width:92%; float:left;}
		.col-print-12{width:100%; float:left;}
		.clearfix{clear: both}
		table { width: 100%; }
		.content table, td, th { border: 1px solid black; }
		/* .content th { background: grey; } */
		.content table { border-collapse: collapse; width: 100%; }
        th { padding: 8px; font-size: 11px; }
		td { padding: 5px; margin-left: 7px; font-size: 12px; vertical-align: top; }
		.text-left{ text-align: left !important; }
		.text-center{ text-align: center !important; }
		.text-right{ text-align: right !important; }
		.font-weight-bold { font-weight: 700 !important; }
		.page-break { page-break-before: always; }
		.borderLeft { border: 0; border-left: 1px solid #000; }
		.borderBottom { border-bottom: 1px solid #000; }
		.borderNone { border: 0; }
        .header { border-bottom: 1px solid #000; }
    </style>
</head>
<body>
    <div class="container">
        <p class="text-center font-weight-bold" style="font-size: 16px;">
            UPDATE PIUTANG RETRIBUSI SEWA TANAH PEMAKAIAN KEKAYAAN DAERAH 2018 <br/>
            PER 31 DESEMBER 2019
        </p>
        <div class="clearfix"></div>

        <div class="col-print-12 content" style="font-size: 12px; margin: 0px 10px;">
            <table style="margin: 5px 0px 10px;">
                <tbody>
                    <tr>
                        <th class="text-center" style="width: 1%">NO.</th>
                        <th class="text-center">Uraian</th>
                        <th class="text-center">Nominal</th>
                        <th class="text-center">Jumlah Bayar</th>
                        <th class="text-center">Piutang 2019 <br/> sesudah koreksi</th>
                        <th class="text-center">Pelunasan atas saldo <br/> Piutang 2019</th>
                        <th class="text-center">Sisa Piutang <br/> Tahun 2019</th>
                        <th class="text-center">Penambahan Piutang <br/> Tahun 2019</th>
                        <th class="text-center">Saldo Piutang 2019</th>
                    </tr>

                    <tr>
                        <td class="borderLeft borderBottom text-center">1</td>
                        <td class="borderLeft borderBottom text-center">2</td>
                        <td class="borderLeft borderBottom text-center">3</td>
                        <td class="borderLeft borderBottom text-center">4</td>
                        <td class="borderLeft borderBottom text-center">5=3+4</td>
                        <td class="borderLeft borderBottom text-center">6</td>
                        <td class="borderLeft borderBottom text-center">7=5-6</td>
                        <td class="borderLeft borderBottom text-center">8</td>
                        <td class="borderLeft borderBottom text-center">9=7+8</td>
                    </tr>
                    
                    @for($i = 2014; $i <= 2019; $i++)
                    <tr>
                        <td class="borderLeft text-center"></td>
                        <td class="borderLeft">Piutang <?= $i ?></td>
                        <td class="borderLeft text-right">900.000,00</td>
                        <td class="borderLeft text-right">900.000,00</td>
                        <td class="borderLeft text-right">900.000,00</td>
                        <td class="borderLeft text-right">900.000,00</td>
                        <td class="borderLeft text-right">900.000,00</td>
                        <td class="borderLeft text-right">900.000,00</td>
                        <td class="borderLeft text-right">900.000,00</td>
                    </tr>
                    @endfor
                    
                    <!-- Blank Row -->
                    <tr>
                        @for ($i = 0; $i < 9; $i++)
                        <td class="borderLeft borderBottom"></td>
                        @endfor
                    </tr>

                    <tr>
                        <td class="borderLeft text-center"></td>
                        <td class="borderLeft">Jumlah</td>
                        <td class="borderLeft font-weight-bold text-right">300.000,00</td>
                        <td class="borderLeft font-weight-bold text-right">400.000,00</td>
                        <td class="borderLeft font-weight-bold text-right">500.000,00</td>
                        <td class="borderLeft font-weight-bold text-right">600.000,00</td>
                        <td class="borderLeft font-weight-bold text-right">700.000,00</td>
                        <td class="borderLeft font-weight-bold text-right">800.000,00</td>
                        <td class="borderLeft font-weight-bold text-right">100.000,00</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="clearfix"></div><br>
    </div>
</body>
</html>