@extends('layouts.manager-app')

@section('title', 'Selamat Datang')

@section('content')
    
    <div class="intro-inner">
        <div class="about-intro" style="background:url(dist/images/bg2.jpg) no-repeat center; background-size:cover;">
            <div class="dtable hw100">
                <div class="dtable-cell hw100">
                    <div class="container text-center">
                        <h1 class="intro-title animated fadeInDown"> Sistem Informasi PT PAL INDONESIA (PERSERO) </h1>
                    </div>
                </div>
            </div>
        </div>
        <!--/.about-intro -->
    </div>
    <!-- /.intro-inner -->

    <div class="main-container inner-page">
        <div class="container">
            <div class="section-content">
                <div class="row ">
                    <h1 class="text-center title-1"> REPORT INSPEKSI </h1>
                    <hr class="center-block small text-hr">
                    <div class="col-sm-12">
                        <table class="table">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">No</th>
                              <th scope="col">Type of Crane</th>
                              <th scope="col">Nama Mesin</th>
                              <th scope="col">Petugas</th>
                              <th scope="col">Report</th>
                              <th scope="col">Maintenance</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($report as $data)
                            <tr>
                              <th scope="row">{{$data->id}}</th>
                              <td>{{$data->tipe_crane}}</td>
                              <td>{{$data->nama_mesin}}</td>
                              <td>{{$data->name}}</td>
                              @if($data->tipe_crane == 'goliath')
                              <td>
                                <a href="{{action('InspeksiController@viewCraneGoliath', $data->id)}}"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt" aria-hidden="true">&nbsp;</span>Show</button></a>
                              </td>
                              @elseif($data->tipe_crane == 'LLC' || $data->tipe_crane == 'llc')
                              <td>
                                <a href="{{action('InspeksiController@viewCraneLLC', $data->id)}}"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt" aria-hidden="true">&nbsp;</span>Show</button></a>
                              </td>
                              @elseif($data->tipe_crane == 'overhead')
                              <td>
                                <a href="{{action('InspeksiController@viewCraneOverhead', $data->id)}}"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt" aria-hidden="true">&nbsp;</span>Show</button></a>
                              </td>
                              @elseif($data->tipe_crane == 'ph')
                              <td>
                                <a href="{{action('InspeksiController@viewCranePH', $data->id)}}"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt" aria-hidden="true">&nbsp;</span>Show</button></a>
                              </td>
                              @endif
                              <td>
                                <a href="{{action('MaintenanceController@checkmaintenance', $data->id)}}"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true">&nbsp;</span>Edit</button></a>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.main-container -->
@endsection