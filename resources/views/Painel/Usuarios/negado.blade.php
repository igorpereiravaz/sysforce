@extends('Painel.Layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
               Permissão Negada
                <small>Sysforce</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('Painel.Principal.Show') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Permissão Negada</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-xs-12">

                    <div class="box ">
                        <div class="box-header">

                        </div>
                        <!-- /.box-header -->
                        <div class= "box-default bg-danger">
                            <h3>Você não tem permissão para acessar esta funcionalidade do sistema.</h3>
                        </div>
                        <a href="{{ route('Painel.Principal.Show') }}" type="submit" class="btn btn-danger pull-left">Voltar</a>
                    </div>

                </div>

            </div>
        </section>
    </div>
@endsection
