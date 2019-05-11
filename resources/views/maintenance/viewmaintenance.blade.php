@extends('layouts.manager-app')

@section('title', 'Selamat Datang')

@section('content')

    <div class="main-container inner-page">
        @foreach ($maintenance as $data)
        <div class="container">
            <div class="row clearfix">
                <div class="row">
                    <div class="col-xs-6">
                        <a href="{{action('PdfGenerateController@pdfviewMaintenance', $data->id)}}" class="btn btn-primary">Download as PDF</a>
                        <a href="{{ route('report') }}" class="btn btn-primary">Back to Home</a>
                    </div>
                    <div class="col-xs-4">
                        
                    </div>
                     <div style="clear:both">
                    <hr>
                </div>
                </div>
                
                
                <div class="col-xl-12">
                    <div class="white-box">
                        <div class="card card-dark card-elements">
                            <div id="collapse1" class="panel-collapse collapse show">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tr style="text-align: center;">
                                                <th colspan="6" style="text-align: center;">LAPORAN HASIL CEK<br>MAINTENANCE</th>
                                            </tr>
                                            
                                            <tr>
                                                <th style="width: 15%">Nama Mesin</th>
                                                <td style="width: 15%">{{$data->nama_mesin}}</td>
                                                <th style="width: 15%">Kode Mesin</th>
                                                <td style="width: 15%">{{$data->kode_mesin}}</td>
                                                <th style="width: 15%">Bengkel</th>
                                                <td style="width: 15%">{{$data->bengkel}}</td>
                                            </tr>
                                            <tr>
                                                <th colspan="2">Operator/Petugas</th>
                                                <td colspan="2">{{$data->name}}</td>
                                                <th>Divisi</th>
                                                <td>{{$data->divisi}}</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Mulai</th>
                                                <td>{{$data->tgl_mulai}}</td>
                                                <th>Hari/Tanggal</th>
                                                <td>{{$data->tgl_inspeksi}}</td>
                                                <th rowspan="2">Pelaksana</th>
                                                <td rowspan="2"></td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Selesai</th>
                                                <td>{{$data->tgl_selesai}}</td>
                                                <th>Waktu Total (jam)</th>
                                                <td>{{$waktutotal}}</td>
                                            </tr>
                                        </table>

                                        <table class="table table-bordered">
                                          <tr>
                                            <th colspan="2" style="text-align: center;">PROBLEM</th>
                                          </tr>
                                          <tr>
                                            <th  style="text-align: center; width: 50%">Kategori A</th>
                                            <th  style="text-align: center; width: 50%">Kategori B</th>
                                          </tr>
                                          <tr>
                                            <td>
                                              @if(!empty($data->problem_kat_A_1))
                                              <span><i class=" fa fa-check-square"></i> Pergantian</span><br>
                                              @else
                                              <span><i class="fa fa-square-o"></i> Pergantian</span><br>
                                              @endif

                                              @if(!empty($data->problem_kat_A_2))
                                              <span><i class="fa fa-check-square"></i> Penambahan Alat/Komponen</span><br>
                                              @else
                                              <span><i class="fa fa-square-o"></i> Penambahan Alat/Komponen</span><br>
                                              @endif

                                              @if(!empty($data->problem_kat_A_3))
                                              <span><i class="fa fa-check-square"></i> Penyimpangan</span><br>
                                              @else
                                              <span><i class="fa fa-square-o"></i> Penyimpangan</span>
                                              @endif
                                            </td>
                                            <td>
                                              @if(!empty($data->problem_kat_B_1))
                                              <span><i class=" fa fa-check-square"></i> Perbaikan Mesin</span><br>
                                              @else
                                              <span><i class="fa fa-square-o"></i> Perbaikan Mesin</span><br>
                                              @endif

                                              @if(!empty($data->problem_kat_B_2))
                                              <span><i class="fa fa-check-square"></i> Modifikasi Alat/Komponen</span><br>
                                              @else
                                              <span><i class="fa fa-square-o"></i> Modifikasi Alat/Komponen</span><br>
                                              @endif

                                              @if(!empty($data->problem_kat_B_3))
                                              <span><i class="fa fa-check-square"></i> Lain-lain</span><br>
                                              @else
                                              <span><i class="fa fa-square-o"></i> Lain-lain</span>
                                              @endif
                                            </td>
                                          </tr>
                                        </table>
                                        
                                        <table class="table table-bordered">
                                          <tr>
                                            <th style="text-align: center;">LAPORAN PELAKSANAAN/HAMBATAN/KEMAJUAN/DLL</th>
                                          </tr>
                                          <tr>
                                            <td>{{$data->laporan_pelaksanaan}}</td>
                                          </tr>
                                          <tr>
                                            <th style="text-align: center;">MATERIAL YANG DIPAKAI (NAMA/UKURAN/SATUAN/JUMLAH/KODE)</th>
                                          </tr>
                                          <tr>
                                            <td>{{$data->ket_material}}</td>
                                          </tr>
                                        </table>

                                        <table class="table table-bordered">
                                          <tr>
                                            <th style="text-align: center; width: 25%;">PELAKSANA<br><br><br><br><br><br><u>........................................</u></th>
                                            <th style="text-align: center; width: 25%;">KEPALA BENGKEL<br><br><br><br><br><br><u>........................................</u></th>
                                            <th style="text-align: center; width: 25%;">KABIRO HARKAN<br><br><br><br><br><br><u>DWI JOGO SOESILO</u></th>
                                            <th style="text-align: center; width: 25%;">DISETUJUI,<br>MANAGER DUK. PRODUKSI<br><br><br><br><br><u>UNGGUL WIDODO</u></th>
                                          </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection