@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>

                Cadastro de Turmas
                <small>Sistema SysForce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Cadastro de Turma</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cadastrando turma</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form role="form" method="POST" action="{{ route('Painel.Turmas.store') }}">

                                {{ csrf_field() }}


                                <div class="form-group">
                                    <label class="control-label label-error" for="nome">
                                        <i class="fa fa-info"></i> Nome
                                    </label>
                                    <input type="text" class="form-control" id="nome_turma"
                                           placeholder="Ex: Seg/Ter/Qua-19h"
                                    name="nome_turma" value="{{old('nome_turma')}}" required>
                                </div>

                                <div class="form-group">
                                    <label> <i class="fa fa-adn"></i>Dias de Treino</label>
                                    <select class="form-control" name="dias" required>
                                        <option value="">Escolha os dias</option>
                                        <option value="Segunda-Quarta-Sexta">Segunda-Quarta-Sexta</option>
                                        <option value="Terça-Quinta">Terça-Quinta</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label> <i class="fa fa-clock-o"></i>Horários</label>
                                    <select class="form-control" name="horario" required>
                                        <option value="">Escolha o horário</option>
                                        <option value="06:00 as 07:00">06:00 as 07:00</option>
                                        <option value="07:00 as 08:00">07:00 as 08:00</option>
                                        <option value="08:00 as 09:00">08:00 as 09:00</option>
                                        <option value="09:00 as 10:00">09:00 as 10:00</option>
                                        <option value="10:00 as 11:00">10:00 as 11:00</option>

                                        <option value="14:00 as 15:00">14:00 as 15:00</option>
                                        <option value="15:00 as 16:00">15:00 as 16:00</option>
                                        <option value="16:00 as 17:00">16:00 as 17:00</option>
                                        <option value="17:00 as 18:00">17:00 as 18:00</option>

                                        <option value="18:30 as 19:30">18:30 as 19:30</option>
                                        <option value="19:30 as 20:30">19:30 as 20:30</option>
                                        <option value="20:30 as 21:30">20:30 as 21:30</option>

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

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                    <a href="{{ route('Painel.Turmas.index') }}" type="submit" class="btn btn-danger pull-right">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </section>
    </div>
@endsection
