@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Painel Principal
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Painel Principal</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-lg-12 col-xs-12" style="padding:0;">
                    <h2 class="title_painel ">SysForce</h2>

                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-teal">
                            <div class="inner">
                                @inject('users', '\App\User')
                                <h3>{{ $users->count() }}</h3>
                                <p>Usuários do Sistema</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="{{ route('Painel.Usuarios.index') }}" class="small-box-footer">Manutenção <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-purple">
                            <div class="inner">
                                @inject('planos', '\App\Plano')
                                <h3>{{ $planos->count() }}</h3>
                                <p>Planos</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-tags"></i>
                            </div>
                            <a href="{{ route('Painel.Planos.index') }}" class="small-box-footer">Manutenção <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-red">
                            <div class="inner">
                                @inject('exercicios', '\App\Exercicio')
                                <h3>{{ $exercicios->count() }}</h3>
                                <p>Exercícios</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-book"></i>
                            </div>
                            <a href="{{ route('Painel.Exercicios.index') }}" class="small-box-footer">Manutenção <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-fuchsia">
                            <div class="inner">
                                @inject('turmas', '\App\Turma')
                                <h3>{{ $turmas->count() }}</h3>
                                <p>Turmas</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-database"></i>
                            </div>
                            <a href="{{ route('Painel.Turmas.index') }}" class="small-box-footer">Manutenção <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-light-blue">
                            <div class="inner">
                                @inject('clientes', '\App\Cliente')
                                <h3>{{ $clientes->count() }}</h3>
                                <p>Clientes</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <a href="{{ route('Painel.Clientes.index') }}" class="small-box-footer">Manutenção <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="title_painel ">Resumo de Matrículas</h2>
            @php
            $matriculas = App\Matricula::withTrashed()->get();
            $ativas = 0;
            $novos = 0;
            $desistentes = 0;
            $data = Carbon\Carbon::now('America/Sao_Paulo');
            $datacompara1 = substr($data, 0, 7);

            @endphp

            @foreach($matriculas as $matricula)

                @php
                    $datacompara2 = substr($matricula->data, 0 ,7);
                    $datacompara3 = substr($matricula->deleted_at, 0 ,7);
                @endphp

                @if($matricula->deleted_at == null)
                @php
                    $ativas = $ativas + 1;
                @endphp
                @endif


                @if($datacompara1 == $datacompara2)
                    @php
                        $novos = $novos + 1;
                    @endphp
                @endif


                @if($datacompara1 == $datacompara3)
                    @php
                        $desistentes = $desistentes + 1;
                    @endphp
                @endif

            @endforeach

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-blue-gradient">
                    <div class="inner">
                        <h3>{{$ativas}}</h3>
                        <p>Total Matriculados</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green-gradient">
                    <div class="inner">
                        <h3>{{$novos}}</h3>
                        <p>Novos Matriculados neste Mês</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-info"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-red-gradient">
                    <div class="inner">
                        <h3>{{$desistentes}}</h3>
                        <p>Encerrados este mês</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-close"></i>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
