@extends('layouts.manager-app')

@section('title', 'Selamat Datang')

@section('content')

    <div class="main-container inner-page">
        <div class="container">
            <div class="row clearfix">
            <div>
            	<a href="/admin/create"><button>Tambah data Vendor</button></a>
            	<a href="/tracking"><button>Tambah Transaksi Trucking</button></a>
            </div>               
                
                <div class="col-xl-12">
                    <div class="white-box">
                        <div class="card card-dark card-elements">
                            <div id="collapse1" class="panel-collapse collapse show">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tr style="text-align: center;">
                                                <th colspan="6" style="text-align: center;">Daftar Vendor</th>
                                            </tr>
                                            
                                            <tr>
                                                <th style="width: 15%">Nama Vendor</th>
                                                <th style="width: 15%">Alamat</td>
                                                <th style="width: 15%">Jabatan</th>
                                            </tr>
                                            <tr>
                                            	<th>Adi</th>
                                            	<th>Keputih</th>
                                            	<th>Direktur Utama</th>
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
    </div>
@endsection