@extends('layouts.manager-app')

@section('title', 'Selamat Datang')

@section('content')

    <div class="main-container inner-page">
        <div class="container">
            <div class="row clearfix">
                <div class="col-xl-12">
                    <div class="white-box">
                        <div class="card card-dark card-elements">
                            <div id="collapse1" class="panel-collapse collapse show">
                                <div class="card-body">
                                    <div id="exTab2" class="container"> 
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a  href="#1" data-toggle="tab">Transaksi Trucking</a>
                                            </li>
                                            <li>
                                                <a href="#2" data-toggle="tab">Vendor</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content ">
                                            <div class="tab-pane active" id="1">
                                                <br>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="m-t-20 text-right">
                                                            <a class="btn btn-primary submit-btn" href="{{ route('admin.create') }}">
                                                                <i class="fa fa-plus"></i> Tambah Transaksi Trucking
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped mb-0">
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
                                            <div class="tab-pane" id="2">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="table">
                               <thead>
                                  <tr>
                                     <th>Id</th>
                                     <th>Name</th>
                                     <th>Email</th>
                                  </tr>
                               </thead>
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
    <script>
         $(function() {
               $('#table').DataTable({
               processing: true,
               serverSide: true,
               ajax: '{{ url('admin/getTruckingData') }}',
               columns: [
                        { data: 'id_trucking', name: 'id' },
                        { data: 'no_jo', name: 'name' },
                        { data: 'no_kendaraan', name: 'email' }
                     ]
            });
         });
    </script>
@endsection