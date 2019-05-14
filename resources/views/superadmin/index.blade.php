@extends('layouts.manager-app')

@section('title', 'Selamat Datang')

@section('content')

    <div class="main-container inner-page">
        <div class="container">
            <div class="row clearfix">
            <div>
            	<a href="/superadmin/create"><button>Tambah data</button></a>
            </div>               
                
                <div class="col-xl-12">
                    <div class="white-box">
                        <div class="card card-dark card-elements">
                            <div id="collapse1" class="panel-collapse collapse show">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tr style="text-align: center;">
                                                <th colspan="6" style="text-align: center;">Daftar Akun Pegawai</th>
                                            </tr>
                                            
                                            <tr>
                                                <th style="width: 15%">Nama</th>
                                                <th style="width: 15%">Email</td>
                                                <th style="width: 15%">Jabatan</th>
                                            </tr>
                                            <tr>
                                            	<th>Adi</th>
                                            	<th>adi@adi.com</th>
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