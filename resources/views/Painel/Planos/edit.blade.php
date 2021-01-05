@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>

                Alteração de Plano
                <small>Sistema SysForce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Alteração de Plano</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Alteração de plano</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" method="POST" action="{{ route('Painel.Planos.update') }}">

                                {{ csrf_field() }}


                                <div class="form-group">
                                    <label class="control-label label-error" for="nome">
                                        <i class="fa fa-info"></i> Nome
                                    </label>
                                    <input type="text" class="form-control" id="nome_plano"
                                           placeholder="Ex: Fortalecimento"
                                           name="nome_plano" value="{{$cat->nome_plano}}" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label label-error" for="valor">
                                        <i class="fa fa-info"></i> Valor
                                    </label>
                                    <input type="text" class="form-control" id="valor_plano"
                                           placeholder="Ex: Fortalecimento"
                                           name="valor_plano" value="{{$valor = $cat->valor_plano = str_replace('.', ',',$cat->valor_plano)}}" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label label-error" for="qtdtreino">
                                        <i class="fa fa-info"></i> Quantidade de Treinos Semanais
                                    </label>
                                    <input type="number" class="form-control" id="qtdtreino_plano"
                                           placeholder="Ex: 2"
                                           name="qtdtreino_plano" value="{{$cat->qtdtreino_plano}}" required>
                                </div>


                                    <input id="cat_id"
                                           name="cat_id" value="{{$cat->id}}" hidden>

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
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                    <a href="{{ route('Painel.Usuarios.index') }}" type="submit" class="btn btn-danger pull-right">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </section>
    </div>
@endsection
