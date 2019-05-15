@extends('layouts.manager-app')

@section('title', 'TRUCKING')

@section('content')
<div class="main-container inner-page">
    <div class="container">
        <div class="row clearfix">
            <h1 class="text-center title-1"> <b> TRUCKING </b> </h1>
            <div style="clear:both">
                <hr>
            </div>
            <div class="col-md-12">
                <div class="white-box">
                    <div class="card card-dark card-elements">
                        <div id="collapse1" class="panel-collapse collapse show">
                            <div class="card-body">
                                <div class="card card-dark card-elements">
                                    <div id="collapse1" class="panel-collapse collapse show">
                                        <div class="card-body">
                                            <form role="form" action="{{ route('finance_manager.store') }}" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div style="padding: 15px;">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="validationDefault01">Tanggal<span class="text-danger">*</span></label>
                                                                <div class='input-group date' id='datetimepicker1'>
                                                                    <span class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                                    </span>
                                                                    <input type='date' class="form-control" name="tanggal" required>
                                                                </div>
                                                                <script type="text/javascript">
                                                                    $(function () {
                                                                        $('#datetimepicker1').datetimepicker();
                                                                    });
                                                                </script>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4" >
                                                        	<div class="form-group">
                    										    <label for="no_jo">No JO</label>
                    										    <input type="text" class="form-control" id="no_jo" name="no_jo" placeholder="Masukkan No JO">
                    										</div>
                                                        </div>
                                                        <div class="col-sm-4" >
                                                        	<div class="form-group">
                    										    <label for="no_kendaraan">No Kendaraan</label>
                    										    <input type="text" class="form-control" id="no_kendaraan" name="no_kendaraan" placeholder="Masukkan no kendaraan">
                    										</div>
                                                        </div>  
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-6" >
                                                        	<div class="form-group">
                    										    <label for="customer">Nama Customer</label>
                    										    <input type="text" class="form-control" id="customer" name="customer" placeholder="Masukkan nama customer">
                    										</div>
                                                        </div>     
                                                        <div class="col-sm-6">
                                                        	<div class="form-group">
                    										    <label for="sopir">Nama Sopir</label>
                    										    <input type="text" class="form-control" id="sopir" name="sopir" placeholder="Masukkan nama sopir">
                    										</div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="sopir">Kota Asal</label>
                                                                <input type="text" class="form-control" id="tujuan_dari" name="tujuan_dari" placeholder="Masukkan kota asal">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6" >
                                                            <div class="form-group">
                                                                <label for="customer">Kota Tujuan</label>
                                                                <input type="text" class="form-control" id="tujuan_ke" name="tujuan_ke" placeholder="Masukkan kota tujuan">
                                                            </div>
                                                        </div>     
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="sopir">Jumlah BOP</label>
                                                                <input type="number" class="form-control" id="jumlah_bop" name="jumlah_bop" placeholder="Masukkan jumlah BOP">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6" >
                                                            <div class="form-group">
                                                                <label for="customer">Jumlah Tagihan</label>
                                                                <input type="number" class="form-control" id="tagihan" name="tagihan" placeholder="Masukkan jumlah tagihan">
                                                            </div>
                                                        </div>     
                                                    </div>
                                                    <br>
                                                	<div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="m-t-20 text-right">
                                                                <button class="btn btn-primary submit-btn">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <h3> Revenue didapat dari Tagihan : 1,1 <br>
                                                    Profit Didapat dari Revenue - Jumlah BOP
                                                  </h3> -->
                                            </form>
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
@endsection