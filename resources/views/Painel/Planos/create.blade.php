@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>

                Cadastro de Planos
                <small>Sistema SysForce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Cadastro de Planos</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cadastrando plano</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" method="POST" action="{{ route('Painel.Planos.store') }}">

                                {{ csrf_field() }}


                                <div class="form-group">
                                    <label class="control-label label-error" for="nome">
                                        <i class="fa fa-info"></i> Nome
                                    </label>
                                    <input type="text" class="form-control" id="nome_plano"
                                           placeholder="Ex: Fortalecimento"
                                    name="nome_plano" value="{{old('nome_plano')}}" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label label-error" for="qtdtreino_plano">
                                        <i class="fa fa-info"></i> Quantidade de treinos semanais
                                    </label>
                                    <input type="text" class="form-control" id="qtdtreino_semanais"
                                           placeholder="3"
                                           name="qtdtreino_plano" value="{{old('qtdtreino_plano')}}" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label label-error" for="valor">
                                        <i class="fa fa-info"></i> Valor
                                    </label>
                                    <input type="text" class="form-control" name="valor_plano"
                                           id="valor_plano" value="{{old('valor_plano')}}" required>
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
                                    <a href="{{ route('Painel.Planos.index') }}" type="submit" class="btn btn-danger pull-right">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </section>
    </div>
@endsection
