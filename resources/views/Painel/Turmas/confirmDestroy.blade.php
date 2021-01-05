@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>

                Exclusão de Turma
                <small>Sistema SysForce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Exclusão de Turma</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <input id="matricula"
                       name="matricula" value="{{$cat->id}}" hidden>

                <div class="col-xs-12">
                    <div class="login-box ">
                        <h4>Confirmação de exclusão.</h4>
                        <h3>Realmente deseja excluir a turma ?</h3>
                        <div class="">
                            <a href="{{ route('Painel.Turmas.destroy',$cat->id) }}" type="submit" class="btn btn-primary pull-left">Excluir</a>
                            <a href="{{ route('Painel.Turmas.index') }}" type="submit" class="btn btn-danger pull-right">Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
