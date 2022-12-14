@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>

                Cadastro de Clientes
                <small>Sistema SysForce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Cadastro de Clientes</li>
            </ol>
        </section>
        <section class="content">
            <div class="row ">

                <div class="col-md-12 ">

                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cadastrando cliente</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <form role="form" method="POST" action="{{ route('Painel.Clientes.store') }}">

                                {{ csrf_field() }}

                                <div class="col-xs-12">
                                    <div class="form-group col-xs-4">
                                        <label class="control-label label-error" for="nome">
                                            <i class="fa fa-info"></i> Nome
                                        </label>
                                        <input type="text" class="form-control" id="nome_cliente"
                                               placeholder="Ex: Felipe Assis Brasil"
                                               name="nome_cliente" value="{{old('nome_cliente')}}" required>
                                    </div>

                                    <div class="form-group col-xs-4">
                                        <label class="control-label label-error" for="cpf">
                                            <i class="fa fa-bars"></i> CPF
                                        </label>
                                        <input type="text" class="form-control" id="cpf_cliente"
                                               placeholder="Ex: 123.456.789-0"
                                               name="cpf_cliente" value="{{old('cpf_cliente')}}" required>
                                    </div>

                                    <div class="form-group col-xs-4">
                                        <label class="control-label label-error" for="nasc_cliente">
                                            <i class="fa fa-calendar"></i> Data Nascimento
                                        </label>
                                        <div class="input-group date col-xs-4">
                                            <input type="text" class="form-control" id="nasc_cliente"
                                                   name="nasc_cliente" value="{{old('nasc_cliente')}}" required>
                                            <div class="input-group-addon">
                                                <span class="glyphicon glyphicon-th"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-xs-8">
                                        <label class="control-label label-error" for="telefone">
                                            <i class="fa fa-mobile-phone"></i> Telefone
                                        </label>
                                        <input type="text" class="form-control" id="telefone_cliente"
                                               placeholder="Ex: (18)97458-9854)"
                                               name="telefone_cliente" value="{{old('telefone_cliente')}}" required>
                                    </div>

                                    <div class="form-group col-xs-6">
                                        <label class="control-label label-error" for="telefone">
                                            <i class="fa fa-home"></i> Endere??o
                                        </label>
                                        <input type="text" class="form-control" id="endereco_cliente"
                                               placeholder="Ex: Rua Vicente Fonsi"
                                               name="endereco_cliente" value="{{old('endereco_cliente')}}" required>
                                    </div>

                                    <div class="form-group col-xs-6">
                                        <label class="control-label label-error" for="telefone">
                                            <i class="fa fa-home"></i> Bairro
                                        </label>
                                        <input type="text" class="form-control" id="bairro_cliente"
                                               placeholder="Ex: Vila Tralles"
                                               name="bairro_cliente" value="{{old('bairro_cliente')}}" required>
                                    </div>

                                    <div class="form-group col-xs-4">
                                        <label> <i class="fa fa-home"></i>Estado</label>
                                        <select class="form-control" name="estado_cliente" required>
                                            <option value="">Escolha o hor??rio</option>
                                            <option value="AC - Acre">AC - Acre</option>
                                            <option value="AL - Alagoas">AL - Alagoas</option>
                                            <option value="AP - Amap??">AP - Amap??</option>
                                            <option value="AP - Amap??">AP - Amap??</option>
                                            <option value="BA - Bahia">BA - Bahia</option>
                                            <option value="CE - Cear??">CE - Cear??</option>
                                            <option value="DF - Distrito Federal">DF - Distrito Federal</option>
                                            <option value="ES - Esp??rito Santo">ES - Esp??rito Santo</option>
                                            <option value="GO - Goi??s">GO - Goi??s</option>
                                            <option value="MA - Maranh??o">MA - Maranh??o</option>
                                            <option value="MT - Mato Grosso">MT - Mato Grosso</option>
                                            <option value="MS - Mato Grosso do Sul">MS - Mato Grosso do Sul</option>
                                            <option value="MG - Minas Gerais">MG - Minas Gerais</option>
                                            <option value="PA - Par??">PA - Par??</option>
                                            <option value="PB - Para??ba">PB - Para??ba</option>
                                            <option value="PR - Paran??">PR - Paran??</option>
                                            <option value="PE - Pernambuco">PE - Pernambuco</option>
                                            <option value="PI - Piau??">PI - Piau??</option>
                                            <option value="RJ - Rio de Janeiro">RJ - Rio de Janeiro</option>
                                            <option value="RN - Rio Grande do Norte">RN - Rio Grande do Norte</option>
                                            <option value="RS - Rio Grande do Sul">RS - Rio Grande do Sul</option>
                                            <option value="RO - Rond??nia">RO - Rond??nia</option>
                                            <option value="RR - Roraima">RR - Roraima</option>
                                            <option value="SC - Santa Catarina">SC - Santa Catarina</option>
                                            <option value="SP - S??o Paulo">SP - S??o Paulo</option>
                                            <option value="SE - Sergipe">SE - Sergipe</option>
                                            <option value="TO - Tocantins">TO - Tocantins</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-xs-6">
                                        <label class="control-label label-error" for="cidade">
                                            <i class="fa fa-user"></i> Cidade
                                        </label>
                                        <input type="text" class="form-control" id="cidade_cliente"
                                               placeholder="Ex: Santa Barbara D'oeste"
                                               name="cidade_cliente" value="{{old('cidade_cliente')}}" required>
                                    </div>

                                    <div class="form-group col-xs-6">
                                        <label class="control-label label-error" for="nomeemer">
                                            <i class="fa fa-user"></i> Nome para Emerg??ncia
                                        </label>
                                        <input type="text" class="form-control" id="nomeemer_cliente"
                                               placeholder="Ex: Adilson Mattos"
                                               name="nomeemer_cliente" value="{{old('nomeemer_cliente')}}" required>
                                    </div>

                                    <div class="form-group col-xs-6">
                                        <label class="control-label label-error" for="telefoneemer">
                                            <i class="fa fa-mobile-phone"></i> Telefone para Emerg??ncia
                                        </label>
                                        <input type="text" class="form-control" id="telefoneemer_cliente"
                                               placeholder="Ex: (18)65478-8753"
                                               name="telefoneemer_cliente" value="{{old('telefoneemer_cliente')}}" required>
                                    </div>

                                </div>

                                <div class="col-xs-12">
                                    <br><br><br>
                                </div>



                                <div class="col-xs-12">
                                    <fieldset>
                                        <legend>Ficha Anamnese</legend>

                                        <div class="form-group col-xs-4">
                                            <label> <i class="fa fa-info"></i>Fuma</label>
                                            <select class="form-control" name="fuma_cliente" required>
                                                <option value="">-Escolha-</option>
                                                <option value="Sim">Sim</option>
                                                <option value="N??o">N??o</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-xs-4">
                                            <label> <i class="fa fa-info"></i>Diabete</label>
                                            <select class="form-control" name="diabete_cliente" required>
                                                <option value="">-Escolha-</option>
                                                <option value="Sim">Sim</option>
                                                <option value="N??o">N??o</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-xs-4">
                                            <label> <i class="fa fa-info"></i>Colesterol</label>
                                            <select class="form-control" name="colesterol_cliente" required>
                                                <option value="">-Escolha-</option>
                                                <option value="Sim">Sim</option>
                                                <option value="N??o">N??o</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-xs-6">
                                            <label> <i class="fa fa-heartbeat"></i>Problema Cardi??co</label>
                                            <select class="form-control" name="cardiaco_cliente" id="checkcardiaco" required>
                                                <option value="">-Escolha-</option>
                                                <option value="Sim">Sim</option>
                                                <option value="N??o">N??o</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-xs-6">
                                            <label class="control-label label-error" for="qualcardiaco">
                                                <i class="fa fa-heartbeat"></i> Quais?
                                            </label>
                                            <input type="text" class="form-control" id="qualcardiaco_cliente"
                                                   placeholder="Arritmia card??aca"
                                                   name="qualcardiaco_cliente" value="{{old('qualcardiaco_cliente')}}" required>
                                        </div>



                                        <div class="form-group col-xs-6">
                                            <label> <i class="fa fa-info"></i>Les??o ou Problema Ortop??dico</label>
                                            <select class="form-control" name="lesao_cliente" id="checklesao" required>
                                                <option value="">-Escolha-</option>
                                                <option value="Sim">Sim</option>
                                                <option value="N??o">N??o</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-xs-6">
                                            <label class="control-label label-error" for="locallesao">
                                                <i class="fa fa-heartbeat"></i> Quais?
                                            </label>
                                            <input type="text" class="form-control" id="locallesao_cliente"
                                                   placeholder="Perna Maior que a outra"
                                                   name="locallesao_cliente" value="{{old('locallesao_cliente')}}" required>
                                        </div>


                                        <div class="form-group col-xs-6">
                                            <label> <i class="fa fa-eyedropper"></i>Toma Medicamento?</label>
                                            <select class="form-control" name="medicamento_cliente" id="checkremedio" required>
                                                <option value="">-Escolha-</option>
                                                <option value="Sim">Sim</option>
                                                <option value="N??o">N??o</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-xs-6">
                                            <label class="control-label label-error" for="qualmedicamento">
                                                <i class="fa fa-eyedropper"></i> Quais?
                                            </label>
                                            <input type="text" class="form-control" id="qualmedicamento_cliente"
                                                   placeholder="Omeprazol"
                                                   name="qualmedicamento_cliente" value="{{old('qualmedicamento_cliente')}}" required>
                                        </div>

                                        <div class="form-group col-xs-4">
                                            <label> <i class="fa fa-square"></i>Pratica Atividade F??sica Regularmente?</label>
                                            <select class="form-control" name="atividadefisica_cliente" required>
                                                <option value="">-Escolha-</option>
                                                <option value="Sim">Sim</option>
                                                <option value="N??o">N??o</option>
                                            </select>
                                        </div>

                                    </fieldset>
                                </div>

                                <div class="col-xs-12">
                                    <br><br><br>
                                </div>



                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
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
