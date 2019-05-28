@extends('user-admin.layouts.app-layout')

@section('title', 'Dashboard')
@section('mainContent')
    <h4 class="c-grey-900 mT-10 mB-30">Data Konsumen</h4>
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        <div class="masonry-item col-md-10">
            <div class="bgc-white p-20 bd">
                <h5 class="c-grey-900 mB-20">Form Konsumen</h5>
                <hr>
                <div class="mT-30">
                    <form role="form" action="{{ route('operator_trucking.store') }}" method="post" enctype="multipart/form-data" class="container" id="needs-validation" novalidate>
                                                {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-md-4 mb-4">
                                <label for="validationCustom01">Tanggal</label>
                                <input type="date" class="form-control" id="validationCustom01" placeholder="" name="tanggal" required>
                                <div class="invalid-feedback">
                                    Wajib diisi.
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-4">
                                <label for="validationCustom02">No JO</label>
                                <input type="text" class="form-control" id="validationCustom02" name="no_jo" placeholder="no jo" required>
                                <div class="invalid-feedback">
                                    Wajib diisi.
                                </div>
                            </div>
                            <div class="form-group col-md-4 mb-4">
                                <label for="validationCustom02">No Kendaraan</label>
                                <input type="text" class="form-control" id="validationCustom02"  name="no_kendaraan" placeholder="no kendaraan" required>
                                <div class="invalid-feedback">
                                    Wajib diisi.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 mb-6">
                                <label for="validationCustom04">Nama Customer</label>
                                <input type="text" class="form-control" id="validationCustom04" name="customer" placeholder="nama customer" required>
                                <div class="invalid-feedback">
                                    Wajib diisi.
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-6">
                                <label for="validationCustom03">Nama Sopir</label>
                                <input type="text" class="form-control" id="validationCustom03" name="sopir" placeholder="nama sopir" required>
                                <div class="invalid-feedback">
                                    Wajib diisi.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 mb-6">
                                <label for="validationCustom04">Kota Asal</label>
                                <input type="text" class="form-control" id="validationCustom04"  name="tujuan_dari" placeholder="kota asal" required>
                                <div class="invalid-feedback">
                                    Wajib diisi.
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-6">
                                <label for="validationCustom03">Kota Tujuan</label>
                                <input type="text" class="form-control" id="validationCustom03" name="tujuan_ke" placeholder="kota tujuan" required>
                                <div class="invalid-feedback">
                                    Wajib diisi.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 mb-6">
                                <label for="validationCustom04">Jumlah BOP</label>
                                <input type="number" min="0" class="form-control" id="validationCustom04" name="jumlah_bop" placeholder="jumlah bop" required>
                                <div class="invalid-feedback">
                                    Wajib diisi.
                                </div>
                            </div>
                            <div class="form-group col-md-6 mb-6">
                                <label for="validationCustom03">Jumlah Tagihan</label>
                                <input type="number" min="0" class="form-control" id="validationCustom03" name="tagihan" placeholder="jumlah tagihan" required>
                                <div class="invalid-feedback">
                                    Wajib diisi.
                                </div>
                            </div>
                        </div>
                        <div class="text-right mrg-top-30">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </form>
                    <script>
                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                        (function () {
                            'use strict';

                            window.addEventListener('load', function () {
                                var form = document.getElementById('needs-validation');
                                form.addEventListener('submit', function (event) {
                                    if (form.checkValidity() === false) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                    }
                                    form.classList.add('was-validated');
                                }, false);
                            }, false);
                        })();
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
