@extends('user-admin.layouts.app-layout')

@section('title', 'Dashboard')
@section('mainContent')
    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        <div class="masonry-item col-md-10">
            <div class="bgc-white p-20 bd">
                <h5 class="c-grey-900 mB-20">Form Konsumen</h5>
                <hr>
                <div class="mT-30">
                    <form role="form" action="{{ route('operator_trucking.store') }}" method="post" enctype="multipart/form-data" class="container" id="needs-validation" novalidate>
                                                {{ csrf_field() }}
                        @include('forms.create-konsumen')
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
