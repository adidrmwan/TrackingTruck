@extends('gm.layouts.app-layout')

@section('title', 'Dashboard')
@section('mainContent')
    <div class="container-fluid">
        <h4 class="c-grey-900 mT-10 mB-30">Laporan Harian Trucking</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>No. JO</th>
                            <th>No. Kendaraan</th>
                            <th>Customer</th>
                            <th>Sopir</th>
                            <th>Kota Asal</th>
                            <th>Kota Tujuan</th>
                            <th>Jumlah BOP</th>
                            <th>Tagihan</th>
                            <th>Revenue</th>
                            <th>Profit</th>
                            <th>Ket</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>No. JO</th>
                            <th>No. Kendaraan</th>
                            <th>Sopir</th>
                            <th>Customer</th>
                            <th>Kota Asal</th>
                            <th>Kota Tujuan</th>
                            <th>Jumlah BOP</th>
                            <th>Tagihan</th>
                            <th>Revenue</th>
                            <th>Profit</th>
                            <th>Ket</th>
                          </tr>
                        </tfoot>
                        <tbody>
                            @if(!empty($trucking))
                                @foreach($trucking as $key => $value)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ date('d/m/Y', strtotime($value['tanggal'])) }}</td>
                                    <td>{{ $value['no_jo'] }}</td>
                                    <td>{{ $value['no_kendaraan'] }}</td>
                                    <td>{{ $value['customer'] }}</td>
                                    <td>{{ $value['sopir'] }}</td>
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
@endsection
