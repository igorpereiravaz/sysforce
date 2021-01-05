@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>

                Alteração de Exercício
                <small>Sistema SysForce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Alteração de Exercício</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Alteração de <avaliação></avaliação></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" method="POST" action="{{ route('Painel.Avaliacoes.update') }}">

                                {{ csrf_field() }}


                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="bracoDireito">
                                            <i class="fa fa-edit"></i> Braço Direito(cm)
                                        </label>
                                        <input type="text" class="form-control" id="bracoDireito"
                                               placeholder="Ex: 22,35"
                                               name="bracoDireito" value="{{$cat->bracoDireito}}" required>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="bracoEsquerdo">
                                            <i class="fa fa-edit"></i> Braço Esquerdo(cm)
                                        </label>
                                        <input type="text" class="form-control" id="bracoEsquerdo"
                                               placeholder="Ex: 22,35"
                                               name="bracoEsquerdo" value="{{$cat->bracoEsuqerdo}}" required>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="antebracoDireito">
                                            <i class="fa fa-edit"></i> Antebraço Direito(cm)
                                        </label>
                                        <input type="text" class="form-control" id="antebracoDireito"
                                               placeholder="Ex: 22,35"
                                               name="antebracoDireito" value="{{$cat->antebracoDireito}}" required>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="antebracoEsquerdo">
                                            <i class="fa fa-edit"></i> Antebraço Esquerdo(cm)
                                        </label>
                                        <input type="text" class="form-control" id="antebracoEsquerdo"
                                               placeholder="Ex: 22,35 "
                                               name="antebracoEsquerdo" value="{{$cat->antebracoEsquerdo}}" required>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="busto">
                                            <i class="fa fa-edit"></i> Busto(cm)
                                        </label>
                                        <input type="text" class="form-control" id="busto"
                                               placeholder="Ex: 22,35 "
                                               name="busto" value="{{$cat->busto}}" required>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="peito">
                                            <i class="fa fa-edit"></i> Peito(cm)
                                        </label>
                                        <input type="text" class="form-control" id="peito"
                                               placeholder="Ex: 22,35 "
                                               name="peito" value="{{$cat->peito}}" required>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="cintura">
                                            <i class="fa fa-edit"></i> Cintura(cm)
                                        </label>
                                        <input type="text" class="form-control" id="cintura"
                                               placeholder="Ex: 22,35 "
                                               name="cintura" value="{{$cat->cintura}}" required>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="quadril">
                                            <i class="fa fa-edit"></i> Quadril(cm)
                                        </label>
                                        <input type="text" class="form-control" id="quadril"
                                               placeholder="Ex: 22,35 "
                                               name="quadril" value="{{$cat->quadril}}" required>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="coxaDireita">
                                            <i class="fa fa-edit"></i> Coxa Direita(cm)
                                        </label>
                                        <input type="text" class="form-control" id="coxaDireita"
                                               placeholder="Ex: 22,35 "
                                               name="coxaDireita" value="{{$cat->coxaDireita}}" required>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="coxaEsquerda">
                                            <i class="fa fa-edit"></i> Coxa Esquerda(cm)
                                        </label>
                                        <input type="text" class="form-control" id="coxaEsquerda"
                                               placeholder="Ex: 22,35 "
                                               name="coxaEsquerda" value="{{$cat->coxaEsquerda}}" required>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="panturrilhaDireita">
                                            <i class="fa fa-edit"></i> Panturrilha Direita(cm)
                                        </label>
                                        <input type="text" class="form-control" id="panturrilhaDireita"
                                               placeholder="Ex: 22,35 "
                                               name="panturrilhaDireita" value="{{$cat->panturrihaDireita}}" required>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="panturrilhaEsquerda">
                                            <i class="fa fa-edit"></i> Panturrilha Esquerda(cm)
                                        </label>
                                        <input type="text" class="form-control" id="panturrilhaEsquerda"
                                               placeholder="Ex: 22,35 "
                                               name="panturrilhaEsquerda" value="{{$cat->panturrilhaEsquerda}}" required>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="altura">
                                            <i class="fa fa-edit"></i> Altura(cm)
                                        </label>
                                        <input type="text" class="form-control" id="altura"
                                               placeholder="Ex: 22,35 "
                                               name="altura" value="{{$cat->altura}}" required>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="peso">
                                            <i class="fa fa-edit"></i> Peso
                                        </label>
                                        <input type="text" class="form-control" id="peso"
                                               placeholder="Ex: 22,35 "
                                               name="peso" value="{{$cat->peso}}" required>
                                    </div>
                                </div>


                                <input id="cat_id"
                                       name="cat_id" value="{{$cat->id}}" hidden>
                                <input id="data"
                                       name="data" value="{{$data}}" hidden>
                                <input id="cliente_id"
                                       name="cliente_id" value="{{$cliente->id}}" hidden>

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
                                    <a href="{{ route('Painel.Avaliacoes.index') }}" type="submit" class="btn btn-danger pull-right">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </section>
    </div>
@endsection
