@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>

                Cadastro de Exercícios
                <small>Sistema SysForce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Cadastro de Exercícios</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cadastrando exercicio</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" method="POST" action="{{ route('Painel.Exercicios.store') }}">

                                {{ csrf_field() }}


                                <div class="form-group">
                                    <label class="control-label label-error" for="nome">
                                        <i class="fa fa-info"></i> Nome
                                    </label>
                                    <input type="text" class="form-control" id="nome_exercicio"
                                           placeholder="Ex: Supino Reto"
                                    name="nome_exercicio" value="{{old('nome_exercicio')}}" required>
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

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                    <a href="{{ route('Painel.Exercicios.index') }}" type="submit" class="btn btn-danger pull-right">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </section>
    </div>
@endsection
