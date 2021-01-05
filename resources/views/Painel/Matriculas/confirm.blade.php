@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>

                Encerrar Matrícula
                <small>Sistema SysForce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">encerrar Cliente</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <input id="matricula"
                       name="matricula" value="{{$matricula->id}}" hidden>

                <div class="col-xs-12">
                    <div class="login-box ">
                        <h4>Cliente possui mensalidades atrasadas.</h4>
                        <h3>Deseja encerrar mesmo assim ?</h3>
                        <div class="">
                            <a href="{{ route('Painel.Matriculas.destroy',$matricula->id) }}" type="submit" class="btn btn-primary pull-left">Encerrar</a>
                            <a href="{{ route('Painel.Matriculas.index') }}" type="submit" class="btn btn-danger pull-right">Cancelar</a>
                        </div>
                    </div>


                </div>
        </section>
    </div>
@endsection
