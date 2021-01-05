<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SysForce | Login|Registro</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/AdminLTE.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/iCheck/square/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/app.css') }}">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">

    @yield('container')

    <script src="{{ asset('AdminLTE/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('AdminLTE/plugins/iCheck/icheck.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/app.css') }}">
    <!-- jQuery 3 -->
    <script src="{{ asset('AdminLTE/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- jQuery Mask -->
    <script src="{{ asset('AdminLTE/bower_components/jquery/dist/jquery.mask.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('AdminLTE/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ asset('AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('AdminLTE/bower_components/chart.js/Chart.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('AdminLTE/dist/js/demo.js') }}"></script>

    <script src="{{asset('AdminLTE/bower_components/sweetalert2/sweetalert2.js')}}"></script>


    <script src="{{asset('AdminLTE/bower_components/validacoes/validacoes.js')}}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>
</html>
