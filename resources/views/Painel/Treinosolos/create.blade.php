@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>

                Criação de Treino
                <small>Sistema SysForce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"> Criação de Treino</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Criando Treino</h3>
                        </div>
                        <h2>{{$cliente->nome_cliente}}</h2>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <br/>
                            @endif
                            <form role="form" method="POST" action="{{ route('Painel.Treinosolos.store') }}">

                                {{ csrf_field() }}

                                <div class="col-xs-12">
                                    <div class="form-group col-xs-6">
                                        <label class="control-label label-error" for="nome">
                                            <i class="fa fa-info"></i> Nome do Treino
                                        </label>
                                        <input type="text" class="form-control" id="nome"
                                               placeholder="Ex: Fortalecimento"
                                               name="nome" value="{{old('nome')}}" required>
                                    </div>
                                </div>
                                <div class="col-xs-12"></div>

                                <div class="col-xs-12">
                                    <fieldset>
                                        <label><h3>Escolha os Exercícios</h3></label>
                                            <select class="form-control select2" name="exercicio[]" id="exercicio" multiple="multiple" data-placeholder="Seleciones exercícios" >
                                            @foreach($exercicios as $exercicio)
                                                    <option class="flat-red" value="{{$exercicio->id}}" >{{$exercicio->nome_exercicio}}</option>
                                            @endforeach
                                            </select>

                                    </fieldset>
                                </div>

                                @php
                                    $data = Carbon\Carbon::now('America/Sao_Paulo');
                                @endphp
                                <input id="data"
                                       name="data" value="{{$data}}" hidden>

                                <input id="cliente_id"
                                       name="cliente_id" value="{{$cliente->id}}" hidden>


                                <div class="col-xs-12"><br><br><br></div>


                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                    <a href="{{ route('Painel.Treinosolos.index') }}" type="submit" class="btn btn-danger pull-right">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </section>
    </div>
@endsection
