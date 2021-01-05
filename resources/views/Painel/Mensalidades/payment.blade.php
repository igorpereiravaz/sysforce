@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>

                Pagamento de Mensalidade
                <small>Sistema SysForce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Pagamento de mensalidade</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Pagamento de Mensalidade</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" method="POST" action="{{ route('Painel.Mensalidades.pay') }}">

                                {{ csrf_field() }}

                                <div class="form-group">
                                <label class="control-label label-error" for="nomecliente" hidden>
                                    <i class="fa fa-calendar"></i> Data de Início
                                </label><br>
                                <input id="datainicio"
                                       name="datainicio" value="{{$datainicio}}" hidden>
                                </div>

                                <div class="form-group">
                                    <label class="control-label label-error" for="nomecliente">
                                        <i class="fa fa-user"></i> Cliente
                                    </label>
                                    <input type="text" class="form-control" id="nomecliente"

                                           name="nomecliente" value="{{$cliente->nome_cliente}}" required disabled>
                                </div>
                                <div class="form-group">
                                    <label class="control-label label-error" for="valor">
                                        <i class="fa fa-money"></i> Valor a ser Pago
                                    </label>
                                    <input type="text" class="form-control" id="valor"
                                           name="valor" value="{{$plano->valor_plano}}" required disabled>
                                </div>

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
                                <input id="datapagamento"
                                       name="datapagamento" value="{{$data}}" hidden>
                                <input id="matricula_id"
                                       name="matricula_id" value="{{$matricula->id}}" hidden>
                                <input id="valor"
                                       name="valor" value="{{$plano->valor_plano}}" hidden>


                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Salvar Pagamento</button>
                                    <a href="{{ route('Painel.Mensalidades.index') }}" type="submit" class="btn btn-danger pull-right">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </section>
    </div>
@endsection
