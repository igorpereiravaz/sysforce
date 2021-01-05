@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>

                Editar Cliente
                <small>Sistema SysForce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">editar Cliente</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Editando cadastro de cliente</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" method="POST" action="{{ route('Painel.Matriculas.update') }}">

                                {{ csrf_field() }}

                                <div class="form-group">

                                    <input id="cat_id" name="cat_id" value="{{$cat->id}}" hidden>

                                    <div class="form-group">
                                        <label class="control-label label-error" for="cliente_id">
                                            <i class="fa fa-user"></i> Cliente
                                        </label>
                                        <input id="cliente_id" name="cliente_id" value="{{$cat->cliente_id}}" hidden>
                                        <input type="text" class="form-control" id="nome_cliente"
                                               placeholder="{{$cliente->nome_cliente}}"
                                               name="nome_cliente" value="{{$cliente->nome_cliente}}" disabled>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label> <i class="fa fa-search"></i>Planos Disponíveis</label>
                                    <select class="form-control" name="plano_id" required>
                                        <option value="{{$cat->plano_id}}">{{$plano->nome_plano.'-'.$plano->valor_plano}}</option>
                                        @foreach($planos as $plano)
                                            <option value="{{$plano->id ?? ''}}">{{$plano->nome_plano.'-'.$plano->valor_plano ?? ''}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label> <i class="fa fa-search"></i>Turma</label>
                                    <select class="form-control" name="turma_id">
                                        @if($valida == 0)
                                            <option value="">Escolha a turma</option>
                                        @endif
                                            @if($valida == 1)
                                                <option value="{{$cat->turma_id}}">{{$turmacli->nome_turma}}</option>
                                            @endif

                                        @foreach($turmas as $turma)
                                            <option value="{{$turma->id ?? ''}}">{{$turma->nome_turma ?? ''}}</option>
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
                                    $data = Carbon\Carbon::now('America/Sao_Paulo');
                                @endphp
                                <input id="data"
                                       name="data" value="{{$data}}" hidden>
                                <input id="cat_id"
                                       name="cat_id" value="{{$cat->id}}" hidden>

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
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
