<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- csrf token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Fav and touch icons --}}
    <link href="{{ URL::asset('dist/assets/ico/apple-touch-icon-144-precomposed.png') }}" rel="apple-touch-icon-precomposed" sizes="144x144">
    <link href="{{ URL::asset('dist/assets/ico/apple-touch-icon-114-precomposed.png') }}" rel="apple-touch-icon-precomposed" sizes="114x114">
    <link href="{{ URL::asset('dist/assets/ico/apple-touch-icon-72-precomposed.png') }}" rel="apple-touch-icon-precomposed" sizes="72x72">
    <link href="{{ URL::asset('dist/assets/ico/apple-touch-icon-57-precomposed.png') }}" rel="apple-touch-icon-precomposed">
    <title>SAMUDERA INDONESIA - @yield('title')</title>
    {{-- Bootstrap core CSS --}}
    <link href="{{ URL::asset('dist/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dist/assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    {{-- Custom styles for this template --}}
    <link href="{{ URL::asset('dist/assets/css/style.css') }}" rel="stylesheet">
    {{-- styles needed for carousel slider --}}
    <link href="{{ URL::asset('dist/assets/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dist/assets/css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dist/assets/css/followbtn.css') }}" rel="stylesheet">
    {{-- favicon --}}
    <link href="{{ URL::asset('favicon.ico') }}" rel="shortcut icon" >
    {{-- Scripts --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    {{-- DataTable --}}
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <style type="text/css"></style>
    <script>
        paceOptions = {
            elements: true
        };
    </script>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="{{ URL::asset('dist/assets/js/pace.min.js') }}"></script>
    @yield('css')
</head>

<body>
    <div id="wrapper">
        <div class="header">
            @include('layouts.manager-navbar')
        </div>
        {{-- /.header --}}

        {{-- intro --}}
        @yield('intro')
        {{-- content --}}
        @yield('content')
        {{-- page-info page-info-bottom --}}
        @yield('page-info')

        {{-- footer --}}
        <div class="footer" id="footer">
            <div class="container">
                <ul class=" pull-left navbar-link footer-nav">
                    <li>
                        <a href="/"> Home </a>
                        <a href="/about-us"> Tentang Kami </a>
                </ul>
                <ul class=" pull-right navbar-link footer-nav">
                    <li> &copy; 2019 SEMERU INDONESIA</li>
                </ul>
            </div>
        </div>
        {{-- /.footer --}}
    </div>
    {{-- /.wrapper --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>


<script src="{{ URL::asset('dist/assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('dist/assets/js/bootstrap-datepicker.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
{{-- <script src="{{ URL::asset('dist/assets/js/jquery/1.10.1/jquery-1.10.1.min.js') }}"></script> --}}
{{-- include carousel slider plugin  --}}
<script src="{{ URL::asset('dist/assets/js/owl.carousel.min.js') }}"></script>
{{-- include equal height plugin  --}}
<script src="{{ URL::asset('dist/assets/js/jquery.matchHeight-min.js') }}"></script>
{{-- include jquery list shorting plugin plugin  --}}
<script src="{{ URL::asset('dist/assets/js/hideMaxListItem.js') }}"></script>
{{-- include jquery.fs plugin for custom scroller and selecter  --}}
<script src="{{ URL::asset('dist/assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js') }}"></script>
<script src="{{ URL::asset('dist/assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js') }}"></script>
{{-- include custom script for site  --}}
<script src="{{ URL::asset('dist/assets/js/script.js') }}"></script>
{{-- include jquery autocomplete plugin  --}}
<script src="{{ URL::asset('dist/assets/plugins/autocomplete/jquery.mockjax.js') }}" type="text/javascript"></script>
{{-- <script src="{{ URL::asset('dist/assets/plugins/autocomplete/jquery.autocomplete.js') }}" type="text/javascript"></script> --}}
<script src="{{ URL::asset('dist/assets/plugins/autocomplete/usastates.js') }}" type="text/javascript"></script>
{{-- <script src="{{ URL::asset('dist/assets/plugins/autocomplete/autocomplete-demo.js') }}" type="text/javascript"></script> --}}

<script >
    $(function () {
   var bindDatePicker = function() {
        $(".date").datetimepicker({
        format:'YYYY-MM-DD',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            }
        }).find('input:first').on("blur",function () {
            // check if the date is correct. We can accept dd-mm-yyyy and yyyy-mm-dd.
            // update the format if it's yyyy-mm-dd
            var date = parseDate($(this).val());

            if (! isValidDate(date)) {
                //create date based on momentjs (we have that)
                date = moment().format('YYYY-MM-DD');
            }

            $(this).val(date);
        });
    }
   
   var isValidDate = function(value, format) {
        format = format || false;
        // lets parse the date to the best of our knowledge
        if (format) {
            value = parseDate(value);
        }

        var timestamp = Date.parse(value);

        return isNaN(timestamp) == false;
   }
   
   var parseDate = function(value) {
        var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
        if (m)
            value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);

        return value;
   }
   
   bindDatePicker();
 });
</script>

<script>
    document.getElementById("user_avatar").onchange = function() {
        document.getElementById("user_image").submit();
    }
</script>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>


</body>
</html>
