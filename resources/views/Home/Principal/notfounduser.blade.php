@extends('auth.Layouts.index')

@includeIf('Painel.Layouts.head')

<body>

<div class="login-box">
    @if (isset($mensagem))
        <div class="alert alert-danger">
            <ul>
                <li>{{ $mensagem}}</li>
            </ul>
        </div>
        <br />
    @endif
    <section class="content-header">
        <h1>

           Procurar Treino
            <small>Sistema SysForce</small>
        </h1>

    </section>
    <section class="content">

        <div class="row ">

            <div class="col-md-12 align-bottom ">

                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Procurar treino</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <form role="form" method="POST" action="{{ route('Home.Principal.list') }}">

                            {{ csrf_field() }}

                            <div class="login-box-body">

                                <div class="form-group col-xs-12">
                                    <label class="control-label label-error" for="cpf">
                                        <i class="fa fa-bars"></i> CPF
                                    </label>
                                    <input type="text" class="form-control" id="cpf_cliente"
                                           placeholder="Ex: 123.456.789-0"
                                           name="cpf_cliente" value="{{old('cpf_cliente')}}" required>
                                    <div>
                                        <button type="submit" class="btn btn-primary">Procurar</button>
                                        <a href="{{ route('Home.Principal.Show') }}" type="submit" class="btn btn-danger pull-right">Sair</a>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>



        </div>
    </section>
</div>

</body>

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

@includeIf('Painel.Layouts.javascript')
@includeIf('Home.Laytouts.javascript')


