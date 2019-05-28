@extends('finance.layouts.app-layout')

@section('title', 'Dashboard')
@section('mainContent')
<div class="container-fluid">
  <h4 class="c-grey-900 mT-10 mB-30">Konsumen</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">
        @if(session('success'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <a class="btn btn-primary submit-btn" href="{{ route('finance_manager.create') }}">
                    <i class="fa fa-plus"></i>&nbsp;&nbsp; Add Konsumen
                </a>
            </div>
        </div>
        <br>
        <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>No.</th>
              <th>Tanggal</th>
              <th>No. JO</th>
              <th>No. Kendaraan</th>
              <th>Customer</th>
              <th>Sopir</th>
              <th>Status</th>
              <th style="width: 15%;" colspan="3"> Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Tanggal</th>
              <th>No. JO</th>
              <th>No. Kendaraan</th>
              <th>Customer</th>
              <th>Sopir</th>
              <th>Status</th>
              <th style="width: 15%;" colspan="3"> Aksi</th>
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
              <td>{{ $value['sopir'] }}</td>
              <td>{{ $value['customer'] }}</td>
              <td class="text-center">
                  @if($value['status'] == 0)
                  <span class="badge badge-pill badge-warning">Belum dicek</span>
                  @elseif($value['status'] == 1)
                  <span class="badge badge-pill badge-info">Sudah dicek</span>
                  @elseif($value['status'] == 2)
                  <span class="badge badge-pill badge-success">Diterima</span>
                  @elseif($value['status'] == 3)
                  <span class="badge badge-pill badge-danger">Ditolak</span>
                  @endif
              </td>
              <td>
                  @if($value['status'] == 0)
                  <button class="btn btn-success" data-toggle="tooltip" 
                          data-placement="left" title="Silahkan, cek data konsumen terlebih dahulu.">
                          Accept
                  </button>
                  @elseif($value['status'] == 2|| $value['status'] == 3)
                  <button class="btn btn-success" disabled=""> Accept </button>
                  @elseif($value['status'] == 1)
                  <form action="{{ route('finance_manager.accept', ['id' => $value['id_trucking']]) }}">
                      <button class="btn btn-success" 
                          onclick="return confirm('Apakah anda yakin untuk menyetujui data ini?')">
                          <span class="glyphicon glyphicon-edit" aria-hidden="true" >&nbsp;</span>Accept
                      </button>
                  </form>
                  @endif
                </td>
                <td>
                  @if($value['status'] == 0)
                  <button class="btn btn-danger" data-toggle="tooltip" 
                          data-placement="left" title="Silahkan, cek data konsumen terlebih dahulu.">
                          Decline
                  </button>
                  @elseif($value['status'] == 2|| $value['status'] == 3)
                  <button class="btn btn-danger" disabled=""> Decline </button>
                  @elseif($value['status'] == 1)
                  <form action="{{ route('finance_manager.decline', ['id' => $value['id_trucking']]) }}">
                      <button class="btn btn-danger" 
                          onclick="return confirm('Apakah anda yakin untuk menolak data ini?')">
                          <span class="glyphicon glyphicon-edit" aria-hidden="true">&nbsp;</span>Decline
                      </button>
                  </form>
                  @endif
                </td>
                <td>
                  @if($value['status'] == 1 || $value['status'] == 2|| $value['status'] == 3)
                  <button href=" " class="btn btn-primary" disabled=""><span class="glyphicon glyphicon-edit" aria-hidden="true">&nbsp;</span>Check</button>
                  @elseif($value['status'] == 0)
                  <a href="{{ route('finance_manager.edit', ['id' => $value['id_trucking']]) }}" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true">&nbsp;</span>Check</a>
                  @endif
                </td>
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
