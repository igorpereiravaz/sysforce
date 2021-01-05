@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>

                Visualização de Treinamento
                <small>Sistema SysForce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Visualização de Treinamento</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Visualização de Treinamento</h3>
                        </div>
                        <h1>{{$cliente->nome_cliente}}</h1>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" method="POST" action="{{ route('Painel.Clientes.update') }}">

                                {{ csrf_field() }}


                                <div class="form-group">
                                    <label class="control-label label-error" for="dataa">
                                        <i class="fa fa-edit"></i> Data de Criação
                                    </label>
                                    <input type="text" class="form-control" id="dataa"
                                           placeholder="Ex: 22,35 "
                                           name="dataa" value="{{ date('d/m/Y H:i:s', strtotime($data)) }}" required disabled>
                                </div>

                                <div class="form-group">
                                    <label class="control-label label-error" for="dataa">
                                        <i class="fa fa-edit"></i> Nome do Treinamento
                                    </label>
                                    <input type="text" class="form-control" id="dataa"
                                           placeholder="Ex: 22,35 "
                                           name="dataa" value="{{$treinamento->nome }}" required disabled>
                                </div>

                                <div class="form-group">
                                    <label class="control-label label-error" for="dataa">
                                        <i class="fa fa-edit"></i> Exercicios
                                    </label>
                                    @foreach($exercicios as $exercicio)
                                    <input type="text" class="form-control" id="dataa"
                                           placeholder="Ex: 22,35 "
                                           name="dataa" value="{{$exercicio->nome_exercicio }}" required disabled>
                                    @endforeach
                                </div>


                                <div class="box-footer">
                                    <a href="{{ route('Painel.Avaliacoes.index') }}" type="submit" class="btn btn-danger pull-right">Voltar</a>
                                    <a href="{{ route('Home.Principal.gerarPDF', $treinamento->id) }}" type="submit" class="btn btn-primary pull-right">Gerar PDF</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </section>
    </div>
@endsection
