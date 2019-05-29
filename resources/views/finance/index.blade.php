@extends('finance.layouts.app-layout')

@section('title', 'Dashboard')
@section('mainContent')
    <div class="container-fluid">
        <div class="masonry-item  w-100">
            <div class="row gap-20">
                <!-- #Toatl Visits ==================== -->
                <div class='col-md-3'>
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">Total Konsumen</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <span id="sparklinedash3"></span>
                                </div>
                                <div class="peer">
                                    <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">
                                        {{$total_konsumen}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- #Total Page Views ==================== -->
                <div class='col-md-3'>
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">Total Vendor</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <span id="sparklinedash2"></span>
                                </div>
                                <div class="peer">
                                    <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500">
                                        {{$total_vendor}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- #Unique Visitors ==================== -->
                <div class='col-md-3'>
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">Total Konsumen Diterima</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <span id="sparklinedash"></span>
                                </div>
                                <div class="peer">
                                    <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">
                                        {{$total_konsumen_diterima}}
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- #Bounce Rate ==================== -->
                <div class='col-md-3'>
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">Total Konsumen Ditolak</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <span id="sparklinedash4"></span>
                                </div>
                                <div class="peer">
                                    <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">
                                        {{$total_konsumen_ditolak}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    <div class="row">
                        <div class="col-md-6">        
                           <h4 class="c-grey-900 mT-10 mB-30">Daftar Konsumen</h4>
                        </div>
                        <div class="col-md-6  text-right">
                            <a class="btn btn-primary submit-btn" href="{{ route('finance_manager.create') }}">
                                <i class="fa fa-plus"></i>&nbsp;&nbsp; Add Konsumen
                            </a>
                        </div>
                    </div>
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>No.JO</th>
                            <th>No.Kendaraan</th>
                            <th>Customer</th>
                            <th>Sopir</th>
                            <th>Vendor</th>
                            <th>Status</th>
                            <th>Accept</th>
                            <th>Decline</th>
                            <th>Check</th>
                          </tr>
                        </thead>
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
                                    <td class="text-center">
                                        @if(!empty(\App\Models\Vendor::where('id_trucking', $value['id_trucking'])->first()))
                                        <span class="badge bgc-green-50 c-green-700 p-10 lh-0 tt-c badge-pill">Ada</span>
                                        @else
                                        <span class="badge bgc-red-50 c-red-700 p-10 lh-0 tt-c badge-pill">Tidak Ada</span>
                                        @endif
                                    </td>    
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
                  <a href="{{ route('finance_manager.show.konsumen', ['id' => $value['id_trucking']]) }}" class="btn btn-primary"><span class="glyphicon glyphicon-edit" aria-hidden="true">&nbsp;</span>Check</a>
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
