@extends('layouts.manager-app')

@section('title', 'Selamat Datang')

@section('content')
    <div class="main-container inner-page">
         @include('sweet::alert')
        <div class="container">
            <div class="row clearfix">
                <h1 class="text-center title-1"> <b> MAINTENANCE </b> </h1>
                <div style="clear:both">
                    <hr>
                </div>
                <div class="col-xl-12">
                    <div class="white-box">
                        <div class="card card-dark card-elements">
                            <div id="collapse1" class="panel-collapse collapse show">
                            <div class="card-body">
                                @foreach($crane as $data)
                                <form role="form" action="{{ route('maintenance.submit')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="col-sm-6" style="padding: 15px 10px;">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                <label class="col-form-label" for="formGroupExampleInput">Nama Mesin</label><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <select class="form-control" id="inlineFormCustomSelectPref" name="crane_id">
                                                        <option value="{{$data->id}}">{{$data->nama_mesin}}</option> 
                                                    </select>
                                                </div>                                   
                                            </div>
                                        </div>
                                        <div class="col-sm-6" style="padding: 15px 10px;">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                <label class="col-form-label" for="formGroupExampleInput">SHIFT/HOUR</label><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <select class="form-control" id="inlineFormCustomSelectPref" name="shift_hour">
                                                        <option value="">{{$data->shift_hour}}</option>
                                                    </select>
                                                </div>                                   
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12" style="padding: 15px 10px;">
                                           
                                            <div class="row">
                                                <div class="col-sm-6">
                                                <label class="col-form-label" for="formGroupExampleInput">Hari / Tanggal</label><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select class="form-control" id="inlineFormCustomSelectPref" name="tgl_inspeksi">
                                                        <option value="">{{$data->tgl_inspeksi}}</option>
                                                    </select>
                                                </div>                                   
                                            </div>
                                        </div>

                                        <div class="col-sm-6" style="padding: 15px 10px;">
                                           
                                            <div class="row">
                                                <div class="col-sm-6">
                                                <label class="col-form-label" for="formGroupExampleInput">Tanggal Mulai</label><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class='col-sm-12'>
                                                    <div class="form-group">
                                                        <div class='input-group date' id='datetimepicker1'>
                                                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                            </span>
                                                            <input type='date' class="form-control" name="tgl_mulai" required>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <script type="text/javascript">
                                                    $(function () {
                                                        $('#datetimepicker1').datetimepicker();
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-sm-6" style="padding: 15px 10px;">
                                           
                                            <div class="row">
                                                <div class="col-sm-6">
                                                <label class="col-form-label" for="formGroupExampleInput">Tanggal Selesai</label><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class='col-sm-12'>
                                                    <div class="form-group">
                                                        <div class='input-group date' id='datetimepicker1'>
                                                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                            </span>
                                                            <input type='date' class="form-control" name="tgl_selesai" required>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <script type="text/javascript">
                                                    $(function () {
                                                        $('#datetimepicker1').datetimepicker();
                                                    });
                                                </script>
                                            </div>
                                        </div>

                                        <div class="row" style="padding-bottom: 5px;">
                                            <div class="col-sm-12">
                                                <div class="alert alert-info">
                                                  <strong>Perhatian!</strong> Wajib mengisi <b>kondisi</b> pada setiap unit. 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="padding-bottom: 5px;">
                                            <div class="col-sm-12">
                                                <h3 class="text-center" style="padding-bottom: 35px;"> <b> PROBLEM : </b></h3>
                                                    <div class="col-sm-6">
                                                         <label class="col-form-label" for="formGroupExampleInput">Kategori A</label>
                                                    </div>
                                                     <div class="col-sm-6">
                                                        <label class="col-form-label" for="formGroupExampleInput">Kategori B</label>
                                                      </div>                                              
                                            </div>
                                        </div>
                                        <div class="row" style="padding: 15px 0;">
                                            <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                     <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="Pergantian" id="defaultCheck1" name="problem_kat_A_1">
                                                      <label class="form-check-label" for="defaultCheck1">
                                                        Pergantian
                                                      </label>
                                                    </div>
                                                </div>
                                                 <div class="col-sm-6">
                                                    <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="Perbaikan Mesin" id="defaultCheck1" name="problem_kat_B_1">
                                                      <label class="form-check-label" for="defaultCheck1">
                                                        Perbaikan Mesin
                                                      </label>
                                                    </div>
                                                  </div>                                              
                                            </div>
                                        </div>
                                        <div class="row" style="padding: 15px 0;">
                                            <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                     <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="Penambahan Alat/Komponen" id="defaultCheck1" name="problem_kat_A_2">
                                                      <label class="form-check-label" for="defaultCheck1">
                                                        Penambahan Alat/Komponen
                                                      </label>
                                                    </div>
                                                </div>
                                                 <div class="col-sm-6">
                                                    <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="Modifikasi Alat/Komponen" id="defaultCheck1" name="problem_kat_B_2">
                                                      <label class="form-check-label" for="defaultCheck1">
                                                        Modifikasi Alat/Komponen
                                                      </label>
                                                    </div>
                                                  </div>                                              
                                            </div>
                                        </div>
                                        <div class="row" style="padding: 15px 0;">
                                            <div class="col-sm-12">
                                                <div class="col-sm-6">
                                                     <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="Penyimpangan" id="defaultCheck1" name="problem_kat_A_3">
                                                      <label class="form-check-label" for="defaultCheck1">
                                                        Penyimpangan
                                                      </label>
                                                    </div>
                                                </div>
                                                 <div class="col-sm-6">
                                                    <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="Lain-lain" id="defaultCheck1" name="problem_kat_B_3">
                                                      <label class="form-check-label" for="defaultCheck1">
                                                        Lain-lain
                                                      </label>
                                                    </div>
                                                  </div>                                              
                                            </div>
                                        </div>
                                        <div class="row" style="padding: 30px 0;">
                                            <div class="col-sm-12">
                                                 <div class="col-sm-12">
                                                    <label class="col-form-label" for="formGroupExampleInput">LAPORAN PELAKSANAAN/HAMBATAN/KEMAJUAN/DLL</label>
                                                    <div class="input-group">
                                                      <textarea class="form-control" aria-label="With textarea" style="resize: none; height: 200px; width: 975px;" name="laporan_pelaksanaan" required="Wajib disi"></textarea>
                                                    </div>
                                                 </div>                                              
                                            </div>
                                        </div>
                                        <div class="row" style="padding: 30px 0;">
                                            <div class="col-sm-12">
                                                 <div class="col-sm-12">
                                                    <label class="col-form-label" for="formGroupExampleInput">MATERIAL YANG DIPAKAI (NAMA/UKURAN/SATUAN/JUMLAH/KODE)</label>
                                                    <div class="input-group">
                                                      <textarea class="form-control" aria-label="With textarea" style="resize: none; height: 200px; width: 975px;" name="ket_material" required="Wajib disi"></textarea>
                                                    </div>
                                                 </div>                                              
                                            </div>
                                        </div>

                                        <div class="row" style="padding: 15px 0;">
                                            <div class="col-sm-12">
                                                <div class="col-sm-4">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                         
                                    </div>
                                </form>
                                @endforeach
                                <!-- end of form -->

                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection