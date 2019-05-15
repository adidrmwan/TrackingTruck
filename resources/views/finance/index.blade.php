@extends('layouts.manager-app')

@section('title', 'Selamat Datang')

@section('content')

    <div class="main-container inner-page">
        <div class="container">
            <div class="row clearfix">
            <h1 class="text-center title-1"> <b> TRUCKING </b> </h1>
                
                <div class="col-md-12">
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="m-t-20 text-right">
                                <a class="btn btn-primary submit-btn" href="{{ route('finance_manager.create') }}">
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
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped custom-table mb-0">
                                            <thead>
                                                <tr>
                                                    <th style="width: 3%">No</th>
                                                    <th style="width: 15%">Tanggal</th>
                                                    <th style="width: 15%">No JO</th>
                                                    <th style="width: 15%">No Kendaraan</th>
                                                    <th style="width: 15%">Sopir</th>
                                                    <th style="width: 15%">Customer</th>
                                                    <th style="width: 15%">Status</th>
                                                    <th style="width: 15%;" colspan="3"> Aksi</th>
                                                </tr>
                                            </thead>
                                            @if(!empty($trucking))
                                            @foreach($trucking as $key => $value)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                            	<td>{{ date('d-F-Y', strtotime($value['tanggal'])) }}</td>
                                            	<td>{{ $value['no_jo'] }}</td>
                                                <td>{{ $value['no_kendaraan'] }}</td>
                                                <td>{{ $value['sopir'] }}</td>
                                                <td>{{ $value['customer'] }}</td>
                                                <td>
                                                    @if($value['status'] == 0)
                                                    <span class="label label-warning">Belum dicek</span>
                                                    @elseif($value['status'] == 1)
                                                    <span class="label label-success">Sudah dicek</span>
                                                    @elseif($value['status'] == 2)
                                                    <span class="label label-danger">Diterima</span>
                                                    @elseif($value['status'] == 3)
                                                    <span class="label label-danger">Ditolak</span>
                                                    @endif
                                                </td>
                                            	<td>
                                                    @if($value['status'] == 0 || $value['status'] == 2|| $value['status'] == 3)
                                                    <button href="" class="btn btn-success" disabled=""><span class="glyphicon glyphicon-edit" aria-hidden="true">&nbsp;</span>Acc</button>
                                                    @elseif($value['status'] == 1)
                                                    <form action="{{ route('finance_manager.accept', ['id' => $value['id_trucking']]) }}">
    					                                <button class="btn btn-success" 
                                                            onclick="return confirm('Apakah anda yakin untuk menyetujui data ini?')">
                                                            <span class="glyphicon glyphicon-edit" aria-hidden="true" >&nbsp;</span>Acc
                                                        </button>
                                                    </form>
                                                    @endif
					                              </td>
					                              <td>
                                                    @if($value['status'] == 0 || $value['status'] == 2|| $value['status'] == 3)
                                                    <button href="" class="btn btn-danger" disabled=""><span class="glyphicon glyphicon-edit" aria-hidden="true">&nbsp;</span>tolak</button>
                                                    @elseif($value['status'] == 1)
                                                    <form action="">
                                                        <button class="btn btn-danger" 
                                                            onclick="return confirm('Apakah anda yakin untuk menolak data ini?')">
                                                            <span class="glyphicon glyphicon-edit" aria-hidden="true">&nbsp;</span>Tolak
                                                        </button>
                                                    </form>
                                                    @endif
					                              </td>
					                              <td>
                                                    @if($value['status'] == 1 || $value['status'] == 2|| $value['status'] == 3)
                                                    <button href=" " class="btn btn-warning" disabled=""><span class="glyphicon glyphicon-edit" aria-hidden="true">&nbsp;</span>Edit</button>
                                                    @elseif($value['status'] == 0)
                                                    <a href="{{ route('finance_manager.edit', ['id' => $value['id_trucking']]) }}" class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true">&nbsp;</span>Edit</a>
                                                    @endif
					                              </td>
                                            </tr>
                                            @endforeach
                                            @endif
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