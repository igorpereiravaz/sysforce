@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>

                Encerrar Matrícula
                <small>Sistema SysForce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">encerrar Cliente</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box box-warning">
                        <div class="box-header with-border">
                            @if (isset($mensagem))
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>{{ $mensagem}}</li>
                                    </ul>
                                </div>
                                <br />
                            @endif
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" method="POST" action="{{ route('Painel.Matriculas.checkout') }}">

                                {{ csrf_field() }}


                                <div class="form-group">
                                    <label class="control-label label-error" for="datames">
                                        <i class="fa fa-calendar"></i> Encerramento de Matrícula
                                    </label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" id="datames"
                                               name="datames" value="" required>
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <br />
                                @endif

                                @php
                                    $data = Carbon\Carbon::now('America/Sao_Paulo');;
                                @endphp
                                <input id="data"
                                       name="data" value="{{$data}}" hidden>
                                <input id="matricula"
                                       name="matricula" value="{{$matricula->id}}" hidden>

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Encerrar</button>
                                    <a href="{{ route('Painel.Matriculas.index') }}" type="submit" class="btn btn-danger pull-right">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </section>
    </div>
@endsection
