<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
   
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    
    @yield('style')
    
    
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/adminlte.min.css')}}">
    <style>
        .has-error .select2-selection {
            border-color: rgb(185, 74, 72) !important;
        }
    </style>

</head>
<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        @include('widgets.navbar')
        @include('widgets.sidebar')
        <div class="d-flex justify-content-center">
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        {!! \Session::get('success') !!}
                    </div>
                @elseif (\Session::has('danger'))
                    <div class="alert alert-danger">
                        {!! \Session::get('danger') !!}
                    </div>
                @endif
            </div>
        @yield('content')
    </div>

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    
    @yield('script')
    <!-- AdminLTE -->
    <script src="{{asset('assets/admin/js/adminlte.js')}}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('assets/admin/js/demo.js')}}"></script>

</body>
</html>