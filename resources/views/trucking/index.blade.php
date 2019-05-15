@extends('layouts.manager-app')

@section('title', 'TRUCKING')

@section('content')
<div class="main-container inner-page">
    <div class="container">
        <div class="row clearfix">
            <h1 class="text-center title-1"> <b> TRUCKING </b> </h1>
            <div class="col-md-12">
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="m-t-20 text-right">
                            <a class="btn btn-primary submit-btn" href="{{ route('operator_trucking.create') }}">
                                <i class="fa fa-plus"></i> Tambah Transaksi Trucking
                            </a>
                        </div>
                    </div>
                </div>

                <div style="clear:both">
                    <hr>
                </div>
            </div>
            <div class="col-md-12">
                <div class="white-box">
                    <div class="card card-dark card-elements">
                        <div id="collapse1" class="panel-collapse collapse show">
                            <div class="card-body">
                                <div class="card card-dark card-elements">
                                    <div id="collapse1" class="panel-collapse collapse show">
                                        <div class="card-body">
                                            <div style="padding: 15px;">
                                                <div class="row">
                                                    <table class="table table-bordered table-striped custom-table mb-0">
                                                        <thead>
                                                          <tr>
                                                            <th>No.</th>
                                                            <th>Tanggal</th>
                                                            <th>No. Jo</th>
                                                            <th>No. Kendaraan</th>
                                                            <th>Sopir</th>
                                                            <th>Customer</th>
                                                            <th>Tujuan Dari</th>
                                                            <th>Tujuan Ke</th>
                                                            <th>Jumlah BOP</th>
                                                            <th>Tagihan</th>
                                                            <th>Revenue</th>
                                                            <th>Profit</th>
                                                            <th>Ket</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(!empty($trucking))
                                                                @foreach($trucking as $key => $value)
                                                                <tr>
                                                                    <td>{{ $key+1 }}</td>
                                                                    <td>{{ date('d-F-Y', strtotime($value['tanggal'])) }}</td>
                                                                    <td>{{ $value['no_jo'] }}</td>
                                                                    <td>{{ $value['no_kendaraan'] }}</td>
                                                                    <td>{{ $value['sopir'] }}</td>
                                                                    <td>{{ $value['customer'] }}</td>
                                                                    <td>{{ $value['tujuan_dari'] }}</td>
                                                                    <td>{{ $value['tujuan_ke'] }}</td>
                                                                    <td>{{ number_format($value['jumlah_bop'], 0, ',', '.') }}</td>
                                                                    <td>{{ number_format($value['tagihan'], 0, ',', '.') }}</td>
                                                                    <td>{{ number_format($value['revenue'], 0, ',', '.') }}</td>
                                                                    <td>{{ number_format($value['provit'], 0, ',', '.') }}</td>
                                                                    <td>{{ $value['ket'] }}</td>
                                                                </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection