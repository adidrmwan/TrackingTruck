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
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tr style="text-align: center;">
                                                <th colspan="9" style="text-align: center;">Data Trucking</th>
                                            </tr>
                                            
                                            <tr>
                                                <th style="width: 15%">Tanggal</th>
                                                <th style="width: 15%">No JO</td>
                                                <th style="width: 15%">No Kendaraan</th>
                                                <th style="width: 15%">Supir</th>
                                                <th style="width: 15%">Customer</td>
                                            	<th style="width: 15%;" colspan="3"> Aksi</th>
                                            </tr>
                                            <tr>
                                            	<th>Adi</th>
                                            	<th>adi@adi.com</th>
                                            	<th>Direktur Utama</th>
                                            	<th>adi@adi.com</th>
                                            	<th>Direktur Utama</th>
                                            	<td>
					                                <a href="><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true">&nbsp;</span>Acc</button></a>
					                              </td>
					                              <td>
					                                <a href="><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-edit" aria-hidden="true">&nbsp;</span>tolak</button></a>
					                              </td>
					                              <td>
					                                <a href="><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true">&nbsp;</span>Edit</button></a>
					                              </td>
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