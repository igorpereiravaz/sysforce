@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>

                Alteração de Cliente
                <small>Sistema SysForce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Alteração de Cliente</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Alteração de Cliente</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" method="POST" action="{{ route('Painel.Clientes.update') }}">

                                {{ csrf_field() }}


                                <div class="form-group">
                                    <label class="control-label label-error" for="nome">
                                        <i class="fa fa-info"></i> Nome
                                    </label>
                                    <input type="text" class="form-control" id="nome_cliente"
                                           placeholder="Ex: Felipe Assis Brasil"
                                           name="nome_cliente" value="{{$cat->nome_cliente}}" required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label label-error" for="cpf">
                                        <i class="fa fa-bars"></i> CPF
                                    </label>
                                    <input type="text" class="form-control" id="cpf_cliente"
                                           placeholder="Ex: 123.456.789-0"
                                           name="cpf_cliente" value="{{$cat->cpf_cliente}}" required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label label-error" for="nasc_cliente">
                                        <i class="fa fa-calendar"></i> Data Nascimento
                                    </label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" id="nasc_cliente"
                                               name="nasc_cliente" value="{{$data}}" required>
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="control-label label-error" for="telefone">
                                        <i class="fa fa-mobile-phone"></i> Telefone
                                    </label>
                                    <input type="text" class="form-control" id="telefone_cliente"
                                           placeholder="Ex: (18)97458-9854)"
                                           name="telefone_cliente" value="{{$cat->telefone_cliente}}" required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label label-error" for="endereco">
                                        <i class="fa fa-home"></i> Endereço
                                    </label>
                                    <input type="text" class="form-control" id="endereco_cliente"
                                           placeholder="Ex: Rua Vicente Fonsi"
                                           name="endereco_cliente" value="{{$cat->endereco_cliente}}" required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label label-error" for="bairro">
                                        <i class="fa fa-home"></i> Bairro
                                    </label>
                                    <input type="text" class="form-control" id="bairro_cliente"
                                           placeholder="Ex: Vila Tralles"
                                           name="bairro_cliente" value="{{$cat->bairro_cliente}}" required>
                                </div>

                                <div class="form-group">
                                    <label> <i class="fa fa-home"></i>Estado</label>
                                    <select class="form-control" name="estado_cliente" required>
                                        <option value="{{$cat->estado_cliente}}">{{$cat->estado_cliente}}</option>
                                        <option value="AC - Acre">AC - Acre</option>
                                        <option value="AL - Alagoas">AL - Alagoas</option>
                                        <option value="AP - Amapá">AP - Amapá</option>
                                        <option value="AP - Amapá">AP - Amapá</option>
                                        <option value="BA - Bahia">BA - Bahia</option>
                                        <option value="CE - Ceará">CE - Ceará</option>
                                        <option value="DF - Distrito Federal">DF - Distrito Federal</option>
                                        <option value="ES - Espírito Santo">ES - Espírito Santo</option>
                                        <option value="GO - Goiás">GO - Goiás</option>
                                        <option value="MA - Maranhão">MA - Maranhão</option>
                                        <option value="MT - Mato Grosso">MT - Mato Grosso</option>
                                        <option value="MS - Mato Grosso do Sul">MS - Mato Grosso do Sul</option>
                                        <option value="MG - Minas Gerais">MG - Minas Gerais</option>
                                        <option value="PA - Pará">PA - Pará</option>
                                        <option value="PB - Paraíba">APB - Paraíba</option>
                                        <option value="PR - Paraná">PR - Paraná</option>
                                        <option value="PE - Pernambuco">PE - Pernambuco</option>
                                        <option value="PI - Piauí">PI - Piauí</option>
                                        <option value="RJ - Rio de Janeiro">RJ - Rio de Janeiro</option>
                                        <option value="RN - Rio Grande do Norte">RN - Rio Grande do Norte</option>
                                        <option value="RS - Rio Grande do Sul">RS - Rio Grande do Sul</option>
                                        <option value="RO - Rondônia">RO - Rondônia</option>
                                        <option value="RR - Roraima">RR - Roraima</option>
                                        <option value="SC - Santa Catarina">SC - Santa Catarina</option>
                                        <option value="SP - São Paulo">SP - São Paulo</option>
                                        <option value="SE - Sergipe">SE - Sergipe</option>
                                        <option value="TO - Tocantins">TO - Tocantins</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label label-error" for="cidade">
                                        <i class="fa fa-user"></i> Cidade
                                    </label>
                                    <input type="text" class="form-control" id="cidade_cliente"
                                           placeholder="Ex: Santa Barbara D'oeste"
                                           name="cidade_cliente" value="{{$cat->cidade_cliente}}" required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label label-error" for="nomeemer">
                                        <i class="fa fa-user"></i> Nome para Emergência
                                    </label>
                                    <input type="text" class="form-control" id="nomeemer_cliente"
                                           placeholder="Ex: Adilson Mattos"
                                           name="nomeemer_cliente" value="{{$cat->nomeemer_cliente}}" required>
                                </div>

                                <div class="form-group">
                                    <label class="control-label label-error" for="telefoneemer">
                                        <i class="fa fa-mobile-phone"></i> Telefone para Emergência
                                    </label>
                                    <input type="text" class="form-control" id="telefoneemer_cliente"
                                           placeholder="Ex: (18)65478-8753"
                                           name="telefoneemer_cliente" value="{{$cat->telefoneemer_cliente}}" required>
                                </div>

                                <br>
                                <br>
                                <br>

                                <fieldset>
                                    <legend>Ficha Anamnese</legend>
                                    <div class="form-group">
                                        <label> <i class="fa fa-info"></i>Fuma</label>
                                        <select class="form-control" name="fuma_cliente" required>
                                            <option value="{{$cat->fuma_cliente}}">{{$cat->fuma_cliente}}</option>
                                            <option value="Sim">Sim</option>
                                            <option value="Não">Não</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label> <i class="fa fa-info"></i>Diabete</label>
                                        <select class="form-control" name="diabete_cliente" required>
                                            <option value="{{$cat->diabete_cliente}}">{{$cat->diabete_cliente}}</option>
                                            <option value="Sim">Sim</option>
                                            <option value="Não">Não</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label> <i class="fa fa-info"></i>Colesterol</label>
                                        <select class="form-control" name="colesterol_cliente" required>
                                            <option value="{{$cat->colesterol_cliente}}">{{$cat->colesterol_cliente}}</option>
                                            <option value="Sim">Sim</option>
                                            <option value="Não">Não</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label> <i class="fa fa-heartbeat"></i>Problema Cardiáco</label>
                                        <select class="form-control" name="cardiaco_cliente" required>
                                            <option value="{{$cat->cardiaco_cliente}}">{{$cat->cardiaco_cliente}}</option>
                                            <option value="Sim">Sim</option>
                                            <option value="Não">Não</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label label-error" for="qualcardiaco">
                                            <i class="fa fa-heartbeat"></i> Quais?
                                        </label>
                                        <input type="text" class="form-control" id="qualcardiaco_cliente"
                                               placeholder="Arritmia cardíaca"
                                               name="qualcardiaco_cliente" value="{{$cat->qualcardiaco_cliente}}" required>
                                    </div>



                                    <div class="form-group">
                                        <label> <i class="fa fa-info"></i>Lesão ou Problema Ortopédico</label>
                                        <select class="form-control" name="lesao_cliente" required>
                                            <option value="{{$cat->lesao_cliente}}">{{$cat->lesao_cliente}}</option>
                                            <option value="Sim">Sim</option>
                                            <option value="Não">Não</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label label-error" for="locallesao">
                                            <i class="fa fa-heartbeat"></i> Quais?
                                        </label>
                                        <input type="text" class="form-control" id="locallesao_cliente"
                                               placeholder="Perna Maior que a outra"
                                               name="locallesao_cliente" value="{{$cat->locallesao_cliente}}" required>
                                    </div>


                                    <div class="form-group">
                                        <label> <i class="fa fa-eyedropper"></i>Toma Medicamento?</label>
                                        <select class="form-control" name="medicamento_cliente" required>
                                            <option value="{{$cat->medicamento_cliente}}">{{$cat->medicamento_cliente}}</option>
                                            <option value="Sim">Sim</option>
                                            <option value="Não">Não</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label label-error" for="qualmedicamento">
                                            <i class="fa fa-eyedropper"></i> Quais?
                                        </label>
                                        <input type="text" class="form-control" id="qualmedicamento_cliente"
                                               placeholder="Omeprazol"
                                               name="qualmedicamento_cliente" value="{{$cat->qualmedicamento_cliente}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label> <i class="fa fa-square"></i>Pratica Atividade Física Regularmente?</label>
                                        <select class="form-control" name="atividadefisica_cliente" required>
                                            <option value="{{$cat->atividadefisica_cliente}}">{{$cat->atividadefisica_cliente}}</option>
                                            <option value="Sim">Sim</option>
                                            <option value="Não">Não</option>
                                        </select>
                                    </div>

                                </fieldset>


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
                                    <br>
                                @endif


                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                    <a href="{{ route('Painel.Clientes.index') }}" type="submit" class="btn btn-danger pull-right">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </section>
    </div>
@endsection
