@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>

                Clientes Inadimplentes
                <small>Sistema SysForce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Clientes Inadimplentes</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Clientes Inadimplentes</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" method="POST" action="{{ route('Painel.Relatorios.viewClientes') }}">

                                {{ csrf_field() }}


                                <div class="form-group">
                                    <label class="control-label label-error" for="mesref">
                                        <i class="fa fa-calendar"></i> Mês de Referência
                                    </label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" id="datames"
                                               name="datames" value="" required>
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>

                                    </div>
                                </div>


                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @php
                                    $data = Carbon\Carbon::now('America/Sao_Paulo');
                                @endphp



                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Gerar Relatório de Clientes</button>
                                    <a href="{{ route('Painel.Principal.Show') }}" type="submit" class="btn btn-danger pull-right">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </section>
    </div>
@endsection
