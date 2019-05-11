@extends('layouts.manager-app')

@section('title', 'TRACKING')

@section('content')
<div class="main-container inner-page">
        <div class="container">
            <div class="row clearfix">
                <h1 class="text-center title-1"> <b> TRUCKING </b> </h1>
                <div style="clear:both">
                    <hr>
                </div>
                <div class="col-xl-12">
                    <div class="white-box">
                        <div class="card card-dark card-elements">
                            <div id="collapse1" class="panel-collapse collapse show">
                            <div class="card-body">
                                <div class="card card-dark card-elements">
                            <div id="collapse1" class="panel-collapse collapse show">
                            <div class="card-body">
                                
                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                    
                                    <div class="form-group">
                                    	<div class="col-sm-4" >
                                           
                                            <div class="row">
                                                <div class="col-sm-12">
                                                	<label class="col-form-label" for="formGroupExampleInput">Tanggal</label><br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class='col-sm-12'>
                                                    <div class="form-group">
                                                        <div class='input-group date' id='datetimepicker1'>
                                                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                            </span>
                                                            <input type='date' class="form-control" name="tanggal" required>
                                                            
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

                                        <div class="col-sm-4" >
                                        	<div class="form-group">
											    <label for="no_jo">No JO</label>
											    <input type="text" class="form-control" id="no_jo" placeholder="Enter No JO">
											</div>
                                        </div>
                                        
                                        <div class="col-sm-4" >
                                        	<div class="form-group">
											    <label for="no_kendaraan">No Kendaraan</label>
											    <input type="text" class="form-control" id="no_kendaraan" placeholder="Enter No Kendaraan">
											</div>
                                        </div>  
                                    </div>

                                    <div class="form-group">
	                                    <div class="col-sm-4">
	                                    	<div class="form-group">
											    <label for="sopir">Naman Sopir</label>
											    <input type="text" class="form-control" id="sopir" placeholder="Enter Nama Sopir">
											</div>
	                                    </div>

	                                    <div class="col-sm-12" >
	                                    	<div class="form-group">
											    <label for="customer">Naman Customer</label>
											    <input type="text" class="form-control" id="customer" placeholder="Enter Nama Customer">
											</div>
	                                    </div>     
                                    </div>
                                    
                                    <div class="form-group">
                                    	<div class="row" style="padding: 15px 0;">
                                            <div class="col-sm-12">
                                                <div class="col-sm-4">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
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