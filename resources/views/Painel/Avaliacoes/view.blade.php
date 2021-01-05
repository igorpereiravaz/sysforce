@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>

                Visualização de Avaliação
                <small>Sistema SysForce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Visualização de Avaliação</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Visualização de Avaliação</h3>
                        </div>
                        <h1>{{$cliente->nome_cliente}}</h1>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" method="POST" action="{{ route('Painel.Clientes.update') }}">

                                {{ csrf_field() }}


                                <div class="form-group">
                                    <label class="control-label label-error" for="dataa">
                                        <i class="fa fa-edit"></i> Data da Avaliação
                                    </label>
                                    <input type="text" class="form-control" id="dataa"
                                           placeholder="Ex: 22,35 "
                                           name="dataa" value="{{ date('d/m/Y H:i:s', strtotime($avaliacao->data)) }}" required disabled>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="bracoDireito">
                                            <i class="fa fa-edit"></i> Braço Direito(cm)
                                        </label>
                                        <input type="text" class="form-control" id="bracoDireito"
                                               placeholder="Ex: 22,35"
                                               name="bracoDireito" value="{{$avaliacao->bracoDireito}}" required disabled>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="bracoEsquerdo">
                                            <i class="fa fa-edit"></i> Braço Esquerdo(cm)
                                        </label>
                                        <input type="text" class="form-control" id="bracoEsquerdo"
                                               placeholder="Ex: 22,35"
                                               name="bracoEsquerdo" value="{{$avaliacao->bracoEsuqerdo}}" required disabled>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="antebracoDireito">
                                            <i class="fa fa-edit"></i> Antebraço Direito(cm)
                                        </label>
                                        <input type="text" class="form-control" id="antebracoDireito"
                                               placeholder="Ex: 22,35"
                                               name="antebracoDireito" value="{{$avaliacao->antebracoDireito}}"
                                               required disabled>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="antebracoEsquerdo">
                                            <i class="fa fa-edit"></i> Antebraço Esquerdo(cm)
                                        </label>
                                        <input type="text" class="form-control" id="antebracoEsquerdo"
                                               placeholder="Ex: 22,35 "
                                               name="antebracoEsquerdo" value="{{$avaliacao->antebracoEsquerdo}}"
                                               required disabled>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="busto">
                                            <i class="fa fa-edit"></i> Busto(cm)
                                        </label>
                                        <input type="text" class="form-control" id="busto"
                                               placeholder="Ex: 22,35 "
                                               name="busto" value="{{$avaliacao->busto}}" required disabled>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="peito">
                                            <i class="fa fa-edit"></i> Peito(cm)
                                        </label>
                                        <input type="text" class="form-control" id="peito"
                                               placeholder="Ex: 22,35 "
                                               name="peito" value="{{$avaliacao->peito}}" required disabled>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="cintura">
                                            <i class="fa fa-edit"></i> Cintura(cm)
                                        </label>
                                        <input type="text" class="form-control" id="cintura"
                                               placeholder="Ex: 22,35 "
                                               name="cintura" value="{{$avaliacao->cintura}}" required disabled>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="quadril">
                                            <i class="fa fa-edit"></i> Quadril(cm)
                                        </label>
                                        <input type="text" class="form-control" id="quadril"
                                               placeholder="Ex: 22,35 "
                                               name="quadril" value="{{$avaliacao->quadril}}" required disabled>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="coxaDireita">
                                            <i class="fa fa-edit"></i> Coxa Direita(cm)
                                        </label>
                                        <input type="text" class="form-control" id="coxaDireita"
                                               placeholder="Ex: 22,35 "
                                               name="coxaDireita" value="{{$avaliacao->coxaDireita}}" required disabled>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="coxaEsquerda">
                                            <i class="fa fa-edit"></i> Coxa Esquerda(cm)
                                        </label>
                                        <input type="text" class="form-control" id="coxaEsquerda"
                                               placeholder="Ex: 22,35 "
                                               name="coxaEsquerda" value="{{$avaliacao->coxaEsquerda}}" required disabled>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="panturrilhaDireita">
                                            <i class="fa fa-edit"></i> Panturrilha Direita(cm)
                                        </label>
                                        <input type="text" class="form-control" id="panturrilhaDireita"
                                               placeholder="Ex: 22,35 "
                                               name="panturrilhaDireita" value="{{$avaliacao->panturrihaDireita}}"
                                               required disabled>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="panturrilhaEsquerda">
                                            <i class="fa fa-edit"></i> Panturrilha Esquerda(cm)
                                        </label>
                                        <input type="text" class="form-control" id="panturrilhaEsquerda"
                                               placeholder="Ex: 22,35 "
                                               name="panturrilhaEsquerda" value="{{$avaliacao->panturrilhaEsquerda}}"
                                               required disabled>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="altura">
                                            <i class="fa fa-edit"></i> Altura(cm)
                                        </label>
                                        <input type="text" class="form-control" id="altura"
                                               placeholder="Ex: 22,35 "
                                               name="altura" value="{{$avaliacao->altura}}" required disabled>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                    <div class="form-group">
                                        <label class="control-label label-error" for="peso">
                                            <i class="fa fa-edit"></i> Peso
                                        </label>
                                        <input type="text" class="form-control" id="peso"
                                               placeholder="Ex: 22,35 "
                                               name="peso" value="{{$avaliacao->peso}}" required disabled>
                                    </div>
                                </div>

                                <div class="form-group col-xs-6">
                                <div class="form-group">
                                    <label class="control-label label-error" for="imca">
                                        <i class="fa fa-edit"></i> IMC
                                    </label>
                                    <input type="text" class="form-control" id="imca"
                                           placeholder="Ex: 22,35 "
                                           name="imca" value="{{$avaliacao->imc}}" required disabled>
                                </div>
                                </div>

                                <div class="box-footer">
                                    <a href="{{ route('Painel.Avaliacoes.index') }}" type="submit" class="btn btn-danger pull-right">Voltar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </section>
    </div>
@endsection
