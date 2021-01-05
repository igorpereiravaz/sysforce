@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>

                Matricular Cliente
                <small>Sistema SysForce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">matricular Cliente</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                 <div class="col-xs-12">

                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Matriculando cliente</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" method="POST" action="{{ route('Painel.Matriculas.store') }}">

                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label> <i class="fa fa-search"></i>Cliente Disponíveis</label>
                                    <select class="form-control" name="cliente_id" required>
                                        <option value="">Escolha o Cliente</option>

                                        @foreach($clientes as $cliente)
                                            @php
                                                $cont = 0;

                                            @endphp

                                            @foreach($matriculas as $matricula)

                                                @if($matricula->cliente_id == $cliente->id)
                                                    @if($matricula->deleted_at == null)
                                                        @php
                                                          $cont = $cont +1;
                                                        @endphp
                                                    @endif
                                                @endif
                                            @endforeach
                                            @if($cont == 0)
                                                <option value="{{$cliente->id ?? ''}}">{{$cliente->nome_cliente ?? ''}}</option>
                                            @endif

                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label> <i class="fa fa-search"></i>Planos Disponíveis</label>
                                    <select class="form-control" name="plano_id" required>
                                        <option value="">Escolha o plano</option>
                                        @foreach($planos as $plano)
                                            <option value="{{$plano->id ?? ''}}">{{$plano->nome_plano.' - R$'.$plano->valor_plano ?? ''}}</option>
                                        @endforeach
                                    </select>
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

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
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
